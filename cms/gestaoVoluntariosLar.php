<?php
include ("../models/conexao.php");
include ("../views/blades/header4.php");
include ("../views/blades/sidebar.php");
?>
<div class="main container-fluid p-5">
    <div class="d-flex justify-content-between">
        <h1>Lar Voluntários</h1>
    </div>
    <form action="gestaoVoluntariosLar.php" method="post">
        <input class="form-control" type="text" name="buscar" placeholder="Digite a busca">
    </form>
    <div class="table-responsive" style="height: 70vh; overflow-y: auto;">
        <hr>
        <?php
        if (isset($_POST["buscar"])) {
            $varBuscar = $_POST["buscar"];
            $query = mysqli_query($conexao, "SELECT * FROM user WHERE nome LIKE '%$varBuscar%' AND tipo = 'Lar Voluntário' AND user_status='Aprovado' ORDER BY id DESC");
        } else {
            $query = mysqli_query($conexao, "SELECT * FROM user WHERE tipo = 'Lar Voluntário' AND user_status='Aprovado' ORDER BY id DESC");
        }

        if (mysqli_num_rows($query) === 0) {
            echo "Nenhum resultado";
        } else {
            ?>
            <h2 class="mt-3">Voluntários Aprovados</h2>
            <table class="table table-bordered table-striped table-hover justify-content-center">
                <tr>
                    <td class="text-center"><b>Nome</b></td>
                    <td class="text-center"><b>Data de Nascimento</b></td>
                    <td class="text-center"><b>Email</b></td>
                    <td class="text-center"><b>Celular</b></td>
                    <td class="text-center"><b>Visualizar</b></td>
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
                        <td class="text-center"><a class="btn btn-primary d-flex justify-content-center" href="visualizarVoluntario.php?idb=<?php echo $exibe['id'] ?>">Visualizar</a></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
    <div class="table-responsive" style="height: 90vh; overflow-y: auto;">
        <hr>
        <h2>Voluntários Pendentes</h2>
        <?php
        if (isset($_POST["buscar"])) {
            $varBuscar = $_POST["buscar"];
            $query = mysqli_query($conexao, "SELECT * FROM user WHERE nome LIKE '%$varBuscar%' AND user_status = 'Em análise' AND tipo = 'Lar Voluntário' ORDER BY id DESC");
        } else {
            $query = mysqli_query($conexao, "SELECT * FROM user WHERE user_status = 'Em análise' AND tipo = 'Lar Voluntário' ORDER BY id DESC");
        }

        if (mysqli_num_rows($query) === 0) {
            echo "Nenhum resultado";
        } else {
            ?>

            <table class="table table-bordered table-striped table-hover justify-content-center">
                <tr>
                    <td class="text-center"><b>Nome</b></td>
                    <td class="text-center"><b>Data de Nascimento</b></td>
                    <td class="text-center"><b>Email</b></td>
                    <td class="text-center"><b>Celular</b></td>
                    <td class="text-center"><b>Visualizar</b></td>
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
                        <td class="text-center"><a class="btn btn-primary d-flex justify-content-center" href="visualizarVoluntario.php?idb=<?php echo $exibe['id'] ?>">Visualizar</a></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
</div>

<?php
include ("../views/blades/footer3.php");
?>
