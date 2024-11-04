<?php
session_start();
if(empty($_SESSION)) {
    header("Location: ../views/login.php");
    exit();
}

$usuariocodigo = $_SESSION["usuarioCodigo"];
include("../models/conexao.php");
include("../views/blades/header4.php");
include("../views/blades/sidebar.php");

function executeQuery($conexao, $query) {
    $result = mysqli_query($conexao, $query);
    if ($result === false) {
        return [
            'success' => false,
            'error' => mysqli_error($conexao)
        ];
    }
    
    $data = [];
    while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    }
    
    return [
        'success' => true,
        'data' => $data
    ];
}
function getCastracoesPendentes($conexao, $busca = '') {
    $query = "SELECT * FROM gato WHERE castrado = 0";
    if (!empty($busca)) {
        $busca = mysqli_real_escape_string($conexao, $busca);
        $query .= " AND nome LIKE '%$busca%'";
    }
    $query .= " ORDER BY id DESC LIMIT 4";
    
    return executeQuery($conexao, $query);
}

function getGatosClinicas($conexao, $busca = '') {
    $query = "SELECT * FROM gato WHERE alocado_clinica = 1";
    if (!empty($busca)) {
        $busca = mysqli_real_escape_string($conexao, $busca);
        $query .= " AND nome LIKE '%$busca%'";
    }
    $query .= " ORDER BY id DESC LIMIT 4";
    
    return executeQuery($conexao, $query);
}

function getResgatesPendentes($conexao) {
    $query = "SELECT * FROM resgate WHERE resgate_status = 0 ORDER BY id DESC LIMIT 4";
    return executeQuery($conexao, $query);
}

function getVoluntariosPendentes($conexao, $busca = '') {
    $query = "SELECT * FROM user WHERE user_status = 'Em análise'";
    if (!empty($busca)) {
        $busca = mysqli_real_escape_string($conexao, $busca);
        $query .= " AND nome LIKE '%$busca%'";
    }
    $query .= " ORDER BY id DESC LIMIT 4";
    
    return executeQuery($conexao, $query);
}

// Carregamento dos dados
$busca = isset($_POST["buscar"]) ? $_POST["buscar"] : '';

// Executar todas as queries e armazenar os resultados
$castracoes = getCastracoesPendentes($conexao, $busca);
$clinicas = getGatosClinicas($conexao, $busca);
$resgates = getResgatesPendentes($conexao);
$voluntarios = getVoluntariosPendentes($conexao, $busca);

// Tratamento de erros
if (!$castracoes['success']) {
    error_log("Erro ao buscar castrações: " . $castracoes['error']);
}
if (!$clinicas['success']) {
    error_log("Erro ao buscar clínicas: " . $clinicas['error']);
}
if (!$resgates['success']) {
    error_log("Erro ao buscar resgates: " . $resgates['error']);
}
if (!$voluntarios['success']) {
    error_log("Erro ao buscar voluntários: " . $voluntarios['error']);
}
?>

<div class="main container-fluid p-5">
    <h1>Bem vindo <?php echo $_SESSION["usuario"]?>!</h1>
    <h4>A sua tela principal, Alguns dados pendentes.</h4>
    <hr class="pb-4">
    <div class="container-fluid">
        <div class="row g-2">
            <!-- Castrações Pendentes -->
            <div class="col-6">
                <div class="p-4 rounded-4 home table-responsive">
                    <div class="d-flex justify-content-between">
                        <h4 class="pb-4 text">Castrações Pendentes</h4>
                        <a href="gestaoCastracoes.php" class="botao-link">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <?php if ($castracoes['success'] && !empty($castracoes['data'])): ?>
                        <table class="table table-bordered border-white table-striped table-hover justify-content-center">
                            <tr>
                                <td class="text-center"><b>Nome</b></td>
                                <td class="text-center"><b>Castrado</b></td>
                                <td class="text-center"><b>Alocado em Cliníca</b></td>
                                <td class="text-center"><b>Doação</b></td>
                            </tr>
                            <?php foreach ($castracoes['data'] as $gato): ?>
                                <tr>
                                    <td class="text-center"><b><?php echo substr($gato['nome'], 0, 30) ?></b></td>
                                    <td class="text-center"><b><?php echo $gato['castrado'] ? "Está castrado" : "Não está castrado" ?></b></td>
                                    <td class="text-center"><b><?php echo $gato['alocado_clinica'] ? "Está alocado em clínica" : "Não está alocado em clínica" ?></b></td>
                                    <td class="text-center"><b><?php echo $gato['doacao'] ? "Foi doado" : "Não foi doado" ?></b></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <p>Nenhum resultado encontrado</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Gatos em Clínicas -->
            <div class="col-6">
                <div class="p-4 rounded-4 home table-responsive">
                    <div class="d-flex justify-content-between">
                        <h4 class="pb-4 text">Gatos Alocados em Clínicas</h4>
                        <a href="gestaoClinicas.php" class="botao-link">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <?php if ($clinicas['success'] && !empty($clinicas['data'])): ?>
                        <table class="table table-bordered border-white table-striped table-hover justify-content-center">
                            <tr>
                                <td class="text-center"><b>Nome</b></td>
                                <td class="text-center"><b>Castrado</b></td>
                                <td class="text-center"><b>Alocado em Cliníca</b></td>
                                <td class="text-center"><b>Doação</b></td>
                            </tr>
                            <?php foreach ($clinicas['data'] as $gato): ?>
                                <tr>
                                    <td class="text-center"><b><?php echo substr($gato['nome'], 0, 30) ?></b></td>
                                    <td class="text-center"><b><?php echo $gato['castrado'] ? "Está castrado" : "Não está castrado" ?></b></td>
                                    <td class="text-center"><b><?php echo $gato['alocado_clinica'] ? "Está alocado em clínica" : "Não está alocado em clínica" ?></b></td>
                                    <td class="text-center"><b><?php echo $gato['doacao'] ? "Foi doado" : "Não foi doado" ?></b></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <p>Nenhum resultado encontrado</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Resgates -->
            <div class="col-6">
                <div class="p-4 rounded-4 home table-responsive">
                    <div class="d-flex justify-content-between">
                        <h4 class="pb-4 text">Resgates</h4>
                        <a href="gestaoResgates.php" class="botao-link">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <?php if ($resgates['success'] && !empty($resgates['data'])): ?>
                        <table class="table table-bordered border-white table-striped table-hover justify-content-center">
                            <tr>
                                <td class="text-center"><b>Nome</b></td>
                                <td class="text-center"><b>Descrição</b></td>
                                <td class="text-center"><b>Endereço</b></td>
                                <td class="text-center"><b>Registrado em</b></td>
                            </tr>
                            <?php foreach ($resgates['data'] as $resgate): ?>
                                <?php
                                $Data = new DateTime($resgate[1]);
                                $stringDate = $Data->format('d/m/Y, H:i:s');
                                ?>
                                <tr>
                                    <td class="text-center"><b><?php echo substr($resgate['nome'], 0, 30) ?></b></td>
                                    <td class="text-center"><b><?php echo substr($resgate['descricao'], 0, 30) . "..." ?></b></td>
                                    <td class="text-center"><b><?php echo substr($resgate['endereco'], 0, 50) ?></b></td>
                                    <td class="text-center"><b><?php echo $stringDate ?></b></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <p>Nenhum resultado encontrado</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Voluntários Pendentes -->
            <div class="col-6">
                <div class="p-4 rounded-4 home table-responsive">
                    <div class="d-flex justify-content-between">
                        <h4 class="pb-4 text">Voluntários Pendentes</h4>
                        <a href="gestaoVoluntarios.php" class="botao-link">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <?php if ($voluntarios['success'] && !empty($voluntarios['data'])): ?>
                        <table class="table table-bordered border-white table-striped table-hover justify-content-center">
                            <tr>
                                <td class="text-center"><b>Nome</b></td>
                                <td class="text-center"><b>Data de Nascimento</b></td>
                                <td class="text-center"><b>Email</b></td>
                                <td class="text-center"><b>Celular</b></td>
                                <td class="text-center"><b>Tipo</b></td>
                            </tr>
                            <?php foreach ($voluntarios['data'] as $voluntario): ?>
                                <?php
                                $dataNascimento = new DateTime($voluntario['data_nascimento']);
                                $stringDataNascimento = $dataNascimento->format('d/m/Y');
                                ?>
                                <tr>
                                    <td class="text-center"><b><?php echo substr($voluntario['nome'], 0, 30) ?></b></td>
                                    <td class="text-center"><b><?php echo $stringDataNascimento ?></b></td>
                                    <td class="text-center"><b><?php echo substr($voluntario['email'], 0, 30) ?></b></td>
                                    <td class="text-center"><b><?php echo $voluntario['celular'] ?></b></td>
                                    <td class="text-center"><b><?php echo $voluntario['tipo'] ?></b></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <p>Nenhum resultado encontrado</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../views/blades/footer3.php"); ?>