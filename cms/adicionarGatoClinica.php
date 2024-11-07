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
    <a href="gestaoClinicas.php"><i class="lni lni-chevron-left text-secondary mb-4" id="back"></i></a>
    <h1>Colocar Gato em Clínica</h1>
    <div class="row">
        <div class="col-12 col-sm-3 d-flex justify-content-center align-items-center">
            <img src="../files/images/sick.png" class="img-fluid h-75">
        </div>
        <div class="col-12 col-sm-1">
        </div>
        <div class="col-12 col-sm-8" style="height: 75vh; overflow-y: auto;">
            <p>Gatos que não estão alocados em clínicas</p>
            <form action="adicionarGatoClinica.php" method="post" class="mb-3">
                <input class="form-control" type="text" name="buscar" placeholder="Digite a busca">
            </form>
            <hr>
            <?php
            if (isset($_POST["buscar"])) {
                $varBuscar = $_POST["buscar"];
                $query = mysqli_query($conexao, "SELECT * FROM gato WHERE nome LIKE '%$varBuscar%' AND alocado_clinica = 0 ORDER BY id DESC");
            } else {
                $query = mysqli_query($conexao, "SELECT * FROM gato WHERE alocado_clinica = 0 ORDER BY id DESC");
            }

            if (mysqli_num_rows($query) === 0) {
                echo "<p>Nenhum resultado encontrado.</p>";
            } else {
                ?>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Imagem</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Descrição</th>
                            <th class="text-center">Castrado</th>
                            <th class="text-center">Doação</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($exibe = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td class="d-flex justify-content-center">
                                <a href="editarGato.php?idb=<?php echo $exibe['id']; ?>">
                                    <img class="img-fluid" src="<?php echo $exibe['foto'] ? "../files/images/gatos/{$exibe['foto']}" : "../files/images/cathand.png"; ?>" width="200">
                                </a>
                            </td>
                            <td class="text-center"><b><?php echo substr($exibe['nome'], 0, 30); ?></b></td>
                            <td class="text-center"><?php echo substr($exibe['descricao'], 0, 30) . "..."; ?></td>
                            <td class="text-center">
                                <b><?php echo $exibe['castrado'] == 1 ? "Está castrado" : "Não está castrado"; ?></b>
                            </td>
                            <td class="text-center">
                                <b><?php echo $exibe['doacao'] == 1 ? "Foi doado" : "Não foi doado"; ?></b>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-success d-flex justify-content-center" href="../controllers/adicionarClinica.php?idb=<?php echo $exibe['id']; ?>">
                                    <i class="lni lni-checkmark"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('catForm'); // Altere 'catForm' para o id do seu formulário se for diferente
    const alertMessage = document.getElementById('alertMessage'); // Altere 'alertMessage' para o id do elemento de alerta se for diferente
    const submitButton = document.getElementById('submitButton'); // Altere 'submitButton' para o id do botão de envio se for diferente
    const spinner = submitButton.querySelector('.spinner-border');

    function showAlert(message, type) {
        alertMessage.textContent = message;
        alertMessage.className = `alert alert-${type}`;
        alertMessage.classList.remove('d-none');
    }

    function setLoading(loading) {
        submitButton.disabled = loading;
        spinner.classList.toggle('d-none', !loading);
    }

    async function submitFormData(formData) {
        try {
            const response = await fetch('URL_DO_SEU_SCRIPT_PHP', { // Substitua pela URL correta do script PHP
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            
            if (result.success) {
                console.log("Dados enviados com sucesso!");
                setTimeout(() => {
                    window.location.href = 'URL_PARA_REDIRECIONAMENTO'; // Substitua pela URL de redirecionamento desejada
                }, 1500);
            } else {
                throw new Error(result.message || 'Erro ao enviar os dados');
            }
        } catch (error) {
            console.log(error.message);
            showAlert(error.message, 'danger');
            setLoading(false);
        }
    }

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        setLoading(true);
        alertMessage.classList.add('d-none');

        const formData = new FormData(this);
        const fileInput = form.querySelector('input[type="file"]');
        
        if (fileInput && fileInput.files.length > 0) {
            const file = fileInput.files[0];
            if (file.type !== 'image/png') {
                showAlert('Por favor, insira apenas arquivos PNG.', 'danger');
                setLoading(false);
                return;
            }
        }

        await submitFormData(formData);
    });
});
</script>

<?php
include ("../views/blades/footer3.php");
?>
