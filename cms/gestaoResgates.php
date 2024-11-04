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
        <h1>Resgates</h1>
        <a href="adicionarResgate.php" class="text-button text-center"><button type="button" class="btn btn-lg fw-bold mb-3" id="button1"><b><i class="lni lni-circle-plus"></i></b> Registrar Resgate</button></a>
    </div>

    <div class="table-responsive" style="height: 50vh; overflow-y: auto;">
        <p>Resgates Pendentes</p>
        <hr>
        <?php
            $query = mysqli_query($conexao, "SELECT * FROM resgate WHERE resgate_status = 0 ORDER BY id DESC");

        if (mysqli_num_rows($query) === 0) {
            echo "Nenhum resultado";
        } else {
            ?>
            <div>
                <table class="table table-bordered table-striped table-hover justify-content-center">
                    <tr>
                        <td class="text-center"><b>Foto</b></td>
                        <td class="text-center"><b>Nome</b></td>
                        <td class="text-center"><b>Descrição</b></td>
                        <td class="text-center"><b>Endereço</b></td>
                        <td class="text-center"><b>Registrado em</b></td>
                        <td class="text-center"><b>Editar</b></td>
                    </tr>

                    <?php
                    while ($exibe = mysqli_fetch_array($query)) {
                        $Data = new DateTime($exibe[1]);
                        $stringDate = $Data -> format('d/m/Y, H:i:s');
                        ?>
                        <tr>
                            <td class="d-flex justify-content-center">
                                <a href="editarResgate.php?idb=<?php echo $exibe['id'] ?>"><img class="img-fluid" src="<?php echo $exibe['foto'] ? "../files/images/resgates/{$exibe['foto']}" : "../files/images/cat-car.png"; ?>" width="200"></a>
                            </td>
                            <td class="text-center"><b><?php echo substr($exibe['nome'], 0, 30) ?></b></p></td>
                            <td class="text-center"><b><?php echo substr($exibe['descricao'], 0, 30) . "..." ?></b></td>
                            <td class="text-center"><b><?php echo substr($exibe['endereco'], 0, 50)?></b></td>
                            <td class="text-center"><b><?php echo $stringDate?></b></td>
                            <td class="text-center"><a class="btn btn-primary d-flex justify-content-center" href="editarResgate.php?idb=<?php echo $exibe['id'] ?>">Editar</a></td>    
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
    </div>
    <div class="table-responsive" style="height: 50vh; overflow-y: auto;">
        <p>Resgates Finalizados</p>
        <hr>
        <?php
            $query = mysqli_query($conexao, "SELECT * FROM resgate WHERE resgate_status = 1 ORDER BY id DESC");

        if (mysqli_num_rows($query) === 0) {
            echo "Nenhum resultado";
        } else {
            ?>
            <div>
                <table class="table table-bordered table-striped table-hover justify-content-center">
                    <tr>
                        <td class="text-center"><b>Foto</b></td>
                        <td class="text-center"><b>Nome</b></td>
                        <td class="text-center"><b>Descrição</b></td>
                        <td class="text-center"><b>Endereço</b></td>
                        <td class="text-center"><b>Registrado em</b></td>
                        <td class="text-center"><b>Editar</b></td>
                    </tr>

                    <?php
                    while ($exibe = mysqli_fetch_array($query)) {
                        $Data = new DateTime($exibe[1]);
                        $stringDate = $Data -> format('d/m/Y, H:i:s');
                        ?>
                        <tr>
                            <td class="d-flex justify-content-center">
                                <a href="editarResgate.php?idb=<?php echo $exibe['id'] ?>"><img class="img-fluid" src="<?php echo $exibe['foto'] ? "../files/images/resgates/{$exibe['foto']}" : "../files/images/cat-car.png"; ?>" width="200"></a>
                            </td>
                            <td class="text-center"><b><?php echo substr($exibe['nome'], 0, 30) ?></b></p></td>
                            <td class="text-center"><b><?php echo substr($exibe['descricao'], 0, 30) . "..." ?></b></td>
                            <td class="text-center"><b><?php echo substr($exibe['endereco'], 0, 50)?></b></td>
                            <td class="text-center"><b><?php echo $stringDate?></b></td>
                            <td class="text-center"><a class="btn btn-primary d-flex justify-content-center" href="editarResgate.php?idb=<?php echo $exibe['id'] ?>">Editar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
    </div>
    <div class="table-responsive">
        <p>Todos os Resgates</p>
        <hr>
        <?php
            $query = mysqli_query($conexao, "SELECT * FROM resgate ORDER BY id DESC");

        if (mysqli_num_rows($query) === 0) {
            echo "Nenhum resultado";
        } else {
            ?>
            <div style="height: 75vh; overflow-y: auto;">
                <table class="table table-bordered table-striped table-hover justify-content-center">
                    <tr>
                        <td class="text-center"><b>Foto</b></td>
                        <td class="text-center"><b>Nome</b></td>
                        <td class="text-center"><b>Descrição</b></td>
                        <td class="text-center"><b>Endereço</b></td>
                        <td class="text-center"><b>Registrado em</b></td>
                        <td class="text-center"><b>Editar</b></td>
                    </tr>

                    <?php
                    while ($exibe = mysqli_fetch_array($query)) {
                        $Data = new DateTime($exibe[1]);
                        $stringDate = $Data -> format('d/m/Y, H:i:s');
                        ?>
                        <tr>
                            <td class="d-flex justify-content-center">
                                <a href="editarResgate.php?idb=<?php echo $exibe['id'] ?>"><img class="img-fluid" src="<?php echo $exibe['foto'] ? "../files/images/resgates/{$exibe['foto']}" : "../files/images/cat-car.png"; ?>" width="200"></a>
                            </td>
                            <td class="text-center"><b><?php echo substr($exibe['nome'], 0, 30) ?></b></p></td>
                            <td class="text-center"><b><?php echo substr($exibe['descricao'], 0, 30) . "..." ?></b></td>
                            <td class="text-center"><b><?php echo substr($exibe['endereco'], 0, 50)?></b></td>
                            <td class="text-center"><b><?php echo $stringDate?></b></td>
                            <td class="text-center"><a class="btn btn-primary d-flex justify-content-center" href="editarResgate.php?idb=<?php echo $exibe['id'] ?>">Editar</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
    </div>
</div>

<?php
include ("../views/blades/footer3.php");
?>
