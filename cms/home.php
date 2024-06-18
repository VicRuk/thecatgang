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
?>

<div class="main container-fluid p-5">
    <h1>Bem vindo <?php echo $_SESSION["usuario"]?>!</h1>
    <h4>A sua tela principal, Alguns dados pendentes.</h4>
    <hr class="pb-4">
    <div class="container-fluid">
        <div class="row g-2">
            <div class="col-6">
                <div class="p-4 rounded-4 home table-responsive">
                    <div class="d-flex justify-content-between">
                        <h4 class="pb-4 text">Castrações Pendentes</h4>
                        <a href="gestaoCastracoes.php" class="botao-link">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <?php
                    if (isset($_POST["buscar"])) {
                        $varBuscar = $_POST["buscar"];
                        $query = mysqli_query($conexao, "SELECT * FROM gato WHERE nome LIKE '%$varBuscar%' AND castrado = 0 ORDER BY id DESC LIMIT 4");
                    } else {
                        $query = mysqli_query($conexao, "SELECT * FROM gato WHERE castrado = 0 ORDER BY id DESC LIMIT 4");
                    }

                    if (mysqli_num_rows($query) === 0) {
                        echo "Nenhum resultado";
                    } else {
                    ?>

                        <table class="table table-bordered border-white table-striped table-hover justify-content-center">
                            <tr>
                                <td class="text-center"><b>Nome</b></td>
                                <td class="text-center"><b>Castrado</b></td>
                                <td class="text-center"><b>Alocado em Cliníca</b></td>
                                <td class="text-center"><b>Doação</b></td>
                            </tr>

                            <?php
                            while ($exibe = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td class="text-center"><b><?php echo substr($exibe['nome'], 0, 30) ?></b></p></td>
                                    <td class="text-center"><b><?php if ($exibe['castrado'] == 1) { echo "Está castrado"; } else { echo "Não está castrado"; } ?></b></td>
                                    <td class="text-center"><b><?php if ($exibe['alocado_clinica'] == 1) { echo "Está alocado em clínica"; } else { echo "Não está alocado em clínica"; } ?></b></td>
                                    <td class="text-center"><b><?php if ($exibe['doacao'] == 1) { echo "Foi doado"; } else { echo "Não foi doado"; } ?></b></td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6">
                <div class="p-4 rounded-4 home table-responsive">
                    <div class="d-flex justify-content-between">
                        <h4 class="pb-4 text">Gatos Alocados em Clínicas</h4>
                        <a href="gestaoClinicas.php" class="botao-link">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <?php
                    if (isset($_POST["buscar"])) {
                        $varBuscar = $_POST["buscar"];
                        $query = mysqli_query($conexao, "SELECT * FROM gato WHERE nome LIKE '%$varBuscar%' AND alocado_clinica = 1 ORDER BY id DESC LIMIT 4");
                    } else {
                        $query = mysqli_query($conexao, "SELECT * FROM gato WHERE alocado_clinica = 1 ORDER BY id DESC LIMIT 4");
                    }

                    if (mysqli_num_rows($query) === 0) {
                        echo "Nenhum resultado";
                    } else {
                        ?>

                        <table class="table table-bordered border-white table-striped table-hover justify-content-center">
                            <tr>
                                <td class="text-center"><b>Nome</b></td>
                                <td class="text-center"><b>Castrado</b></td>
                                <td class="text-center"><b>Alocado em Cliníca</b></td>
                                <td class="text-center"><b>Doação</b></td>
                            </tr>

                            <?php
                            while ($exibe = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td class="text-center"><b><?php echo substr($exibe['nome'], 0, 30) ?></b></p></td>
                                    <td class="text-center"><b><?php if ($exibe['castrado'] == 1) { echo "Está castrado"; } else { echo "Não está castrado"; } ?></b></td>
                                    <td class="text-center"><b><?php if ($exibe['alocado_clinica'] == 1) { echo "Está alocado em clínica"; } else { echo "Não está alocado em clínica"; } ?></b></td>
                                    <td class="text-center"><b><?php if ($exibe['doacao'] == 1) { echo "Foi doado"; } else { echo "Não foi doado"; } ?></b></td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6">
                <div class="p-4 rounded-4 home table-responsive">
                    <div class="d-flex justify-content-between">
                        <h4 class="pb-4 text">Resgates</h4>
                        <a href="gestaoResgates.php" class="botao-link">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <?php
                        $query = mysqli_query($conexao, "SELECT * FROM resgate WHERE resgate_status = 0 ORDER BY id DESC LIMIT 4");

                    if (mysqli_num_rows($query) === 0) {
                        echo "Nenhum resultado";
                    } else {
                        ?>
                        <div>
                            <table class="table table-bordered border-white table-striped table-hover justify-content-center">
                                <tr>
                                    <td class="text-center"><b>Nome</b></td>
                                    <td class="text-center"><b>Descrição</b></td>
                                    <td class="text-center"><b>Endereço</b></td>
                                    <td class="text-center"><b>Registrado em</b></td>
                                </tr>

                                <?php
                                while ($exibe = mysqli_fetch_array($query)) {
                                    $Data = new DateTime($exibe[1]);
                                    $stringDate = $Data -> format('d/m/Y, H:i:s');
                                    ?>
                                    <tr>
                                        <td class="text-center"><b><?php echo substr($exibe['nome'], 0, 30) ?></b></p></td>
                                        <td class="text-center"><b><?php echo substr($exibe['descricao'], 0, 30) . "..." ?></b></td>
                                        <td class="text-center"><b><?php echo substr($exibe['endereco'], 0, 50)?></b></td>
                                        <td class="text-center"><b><?php echo $stringDate?></b></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6">
                <div class="p-4 rounded-4 home table-responsive">
                    <div class="d-flex justify-content-between">
                        <h4 class="pb-4 text">Voluntários Pendentes</h4>
                        <a href="gestaoVoluntarios.php" class="botao-link">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <?php
                    if (isset($_POST["buscar"])) {
                        $varBuscar = $_POST["buscar"];
                        $query = mysqli_query($conexao, "SELECT * FROM user WHERE nome LIKE '%$varBuscar%' AND user_status = 'Em análise' ORDER BY id DESC LIMIT 4");
                    } else {
                        $query = mysqli_query($conexao, "SELECT * FROM user WHERE user_status = 'Em análise' ORDER BY id DESC LIMIT 4");
                    }

                    if (mysqli_num_rows($query) === 0) {
                        echo "Nenhum resultado";
                    } else {
                        ?>

                        <table class="table table-bordered border-white table-striped table-hover justify-content-center">
                            <tr>
                                <td class="text-center"><b>Nome</b></td>
                                <td class="text-center"><b>Data de Nascimento</b></td>
                                <td class="text-center"><b>Email</b></td>
                                <td class="text-center"><b>Celular</b></td>
                                <td class="text-center"><b>Tipo</b></td>
                            </tr>

                            <?php
                            while ($exibe = mysqli_fetch_array($query)) {
                                $dataNascimento = new DateTime($exibe['data_nascimento']);
                                $stringDataNascimento = $dataNascimento->format('d/m/Y');
                                ?>
                                <tr>
                                    <td class="text-center"><b><?php echo substr($exibe['nome'], 0, 30) ?></b></td>
                                    <td class="text-center"><b><?php echo $stringDataNascimento?></b></td>
                                    <td class="text-center"><b><?php echo substr($exibe['email'], 0, 30) ?></b></td>
                                    <td class="text-center"><b><?php echo $exibe['celular']?></b></td>
                                    <td class="text-center"><b><?php echo $exibe['tipo']?></b></td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("../views/blades/footer3.php");
?>