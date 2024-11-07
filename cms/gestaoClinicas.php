<?php
session_start();
if(empty($_SESSION)) {
    header("Location: ../views/login.php");
    exit();
}
include ("../models/conexao.php");
include ("../views/blades/header4.php");
include ("../views/blades/sidebar.php");
?>
<div class="main container-fluid p-5">
    <div class="d-flex justify-content-between">
        <h1>Gatos alocados em Clínicas</h1>
        <a href="adicionarGatoClinica.php" class="text-button text-center"><button type="button" class="btn btn-lg fw-bold mb-3" id="button1"><b><i class="lni lni-circle-plus"></i></b> Adicionar Gato</button></a>
    </div>

    <div class="table-responsive">
        <form action="gestaoCastracoes.php" method="post">
            <input class="form-control" type="text" name="buscar" placeholder="Digite a busca">
        </form>
        <hr>
        <?php
        if (isset($_POST["buscar"])) {
            $varBuscar = $_POST["buscar"];
            $query = mysqli_query($conexao, "SELECT * FROM gato WHERE nome LIKE '%$varBuscar%' AND alocado_clinica = 1 ORDER BY id DESC");
        } else {
            $query = mysqli_query($conexao, "SELECT * FROM gato WHERE alocado_clinica = 1 ORDER BY id DESC");
        }

        if (mysqli_num_rows($query) === 0) {
            echo "Nenhum resultado";
        } else {
            ?>

            <table class="table table-bordered table-striped table-hover justify-content-center">
                <tr>
                    <td class="text-center"><b>Imagem</b></td>
                    <td class="text-center"><b>Nome</b></td>
                    <td class="text-center"><b>Descrição</b></td>
                    <td class="text-center"><b>Castrado</b></td>
                    <td class="text-center"><b>Alocado em Cliníca</b></td>
                    <td class="text-center"><b>Doação</b></td>
                    <td class="text-center"></td>
                </tr>

                <?php
                while ($exibe = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td class="d-flex justify-content-center">
                            <a href="editarGato.php?idb=<?php echo $exibe['id'] ?>"><img class="img-fluid" src="<?php echo $exibe['foto'] ? "../files/images/gatos/{$exibe['foto']}" : "../files/images/cathand.png"; ?>" width="200"></a>
                        </td>
                        <td class="text-center"><b><?php echo substr($exibe['nome'], 0, 30) ?></b></p></td>
                        <td class="text-center"><b><?php echo substr($exibe['descricao'], 0, 30) . "..." ?></b></td>
                        <td class="text-center"><b><?php if ($exibe['castrado'] == 1) { echo "Está castrado"; } else { echo "Não está castrado"; } ?></b></td>
                        <td class="text-center"><b><?php if ($exibe['alocado_clinica'] == 1) { echo "Está alocado em clínica"; } else { echo "Não está alocado em clínica"; } ?></b></td>
                        <td class="text-center"><b><?php if ($exibe['doacao'] == 1) { echo "Foi doado"; } else { echo "Não foi doado"; } ?></b></td>
                        <td class="text-center"><a class="btn btn-success d-flex justify-content-center" href="../controllers/atualizarClinica.php?idb=<?php echo $exibe['id'] ?>"><i class="lni lni-checkmark"></i></a></td>
                    </tr></a>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
</div>
<script>
let currentRequest = null;
const debounceTimeout = 300;
let debounceTimer = null;

function showAlert(message, type) {
    const alertElement = document.getElementById('alertMessage');
    alertElement.textContent = message;
    alertElement.className = `alert alert-${type}`;
    alertElement.classList.remove('d-none');
    setTimeout(() => alertElement.classList.add('d-none'), 3000);
}

function setLoading(loading) {
    const spinner = document.getElementById('loadingSpinner');
    spinner.classList.toggle('d-none', !loading);
}

function createGatosTable(gatos) {
    if (gatos.length === 0) {
        return '<p class="text-center">Nenhum resultado encontrado</p>';
    }

    return `
        <table class="table table-bordered table-striped table-hover justify-content-center">
            <tr>
                <td class="text-center"><b>Imagem</b></td>
                <td class="text-center"><b>Nome</b></td>
                <td class="text-center"><b>Descrição</b></td>
                <td class="text-center"><b>Castrado</b></td>
                <td class="text-center"><b>Alocado em Cliníca</b></td>
                <td class="text-center"><b>Doação</b></td>
                <td class="text-center"></td>
            </tr>
            ${gatos.map(gato => `
                <tr>
                    <td class="d-flex justify-content-center">
                        <a href="editarGato.php?idb=${gato.id}">
                            <img class="img-fluid" src="${gato.foto ? `../files/images/gatos/${gato.foto}` : '../files/images/cathand.png'}" width="200">
                        </a>
                    </td>
                    <td class="text-center"><b>${gato.nome.substring(0, 30)}</b></td>
                    <td class="text-center"><b>${gato.descricao.substring(0, 30)}...</b></td>
                    <td class="text-center"><b>${gato.castrado == 1 ? 'Está castrado' : 'Não está castrado'}</b></td>
                    <td class="text-center"><b>${gato.alocado_clinica == 1 ? 'Está alocado em clínica' : 'Não está alocado em clínica'}</b></td>
                    <td class="text-center"><b>${gato.doacao == 1 ? 'Foi doado' : 'Não foi doado'}</b></td>
                    <td class="text-center">
                        <a class="btn btn-success d-flex justify-content-center" href="../controllers/atualizarClinica.php?idb=${gato.id}"><i class="lni lni-checkmark"></i></a>
                    </td>
                </tr>
            `).join('')}
        </table>
    `;
}

async function fetchGatos(search = '') {
    if (currentRequest) {
        currentRequest.abort();
    }

    try {
        const controller = new AbortController();
        currentRequest = controller;

        const response = await fetch('../controllers/buscarGatos.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ busca: search, alocado_clinica: 1 }),
            signal: controller.signal
        });

        if (!response.ok) {
            throw new Error('Erro ao buscar dados');
        }

        const data = await response.json();
        
        if (data.success) {
            document.getElementById('tableContainer').innerHTML = createGatosTable(data.gatos);
        } else {
            throw new Error(data.message || 'Erro ao carregar os dados');
        }
    } catch (error) {
        if (error.name === 'AbortError') {
            return;
        }
        showAlert(error.message, 'danger');
    } finally {
        setLoading(false);
        currentRequest = null;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const clearButton = document.getElementById('clearSearch');

    fetchGatos();

    searchInput.addEventListener('input', function(e) {
        clearTimeout(debounceTimer);
        setLoading(true);
        
        debounceTimer = setTimeout(() => {
            fetchGatos(e.target.value);
        }, debounceTimeout);
    });

    clearButton.addEventListener('click', function() {
        searchInput.value = '';
        fetchGatos();
    });
});
</script>

<?php
include ("../views/blades/footer3.php");
?>
