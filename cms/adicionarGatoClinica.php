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

<?php
include ("../views/blades/footer3.php");
?>
