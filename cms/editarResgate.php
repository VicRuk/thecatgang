<?php
include ("../models/conexao.php");
include ("../views/blades/header4.php");
include ("../views/blades/sidebar.php");

$idb = $_GET["idb"];
$query = mysqli_query($conexao, "SELECT * FROM resgate WHERE id = $idb");
?>
<div class="main container-fluid p-5">
    <?php
        while ($exibe = mysqli_fetch_array($query)) {
        $Data = new DateTime($exibe[1]);
        $stringDate = $Data -> format('d/m/Y, H:i:s');
    ?>
    <a href="gestaoResgate.php"><i class="lni lni-chevron-left text-secondary mb-4" id="back"></i></a>
    <h1>Editar Resgate</h1>
    <div class="align-items-center d-flex flex-column">
        <div class="col-12 col-sm-5 d-flex justify-content-center align-items-center">
            <img class="img-fluid" src="<?php echo $exibe['foto'] ? "../files/images/resgates/{$exibe['foto']}" : "../files/images/cat-car.png"; ?>">
        </div>
        <form name="atualizar" class="col-12" enctype="multipart/form-data" action="../controllers/atualizarResgate.php" method="post">
            <input type="hidden" name="id" value="<?php echo $exibe[0] ?>">
            <p class="mb-1">Nome do Resgate</p>
            <input class="form-control" type="text" name="nomeResgate" value="<?php echo $exibe['nome'] ?>" required placeholder="Nome do Resgate"><br>

            <p class="mb-1">Descrição</p>
            <textarea class="form-control" rows="5" type="text" name="descricaoResgate" required
                placeholder="Conte mais sobre o caso"><?php echo $exibe['descricao'] ?></textarea><br>

            <p class="mb-1">Endereço</p>
            <textarea class="form-control" rows="3" type="text" name="enderecoResgate" required
                placeholder="Digite o Endereço de Solicitação de Resgate"><?php echo $exibe['endereco'] ?></textarea><br>

            <select name="resgate_status" class="form-control mb-3" id="resgate_status" required>
                <option value="0" <?php echo ($exibe['resgate_status'] == "0") ? 'selected' : ''; ?>>Pendente</option>
                <option value="1" <?php echo ($exibe['resgate_status'] == "1") ? 'selected' : ''; ?>>Finalizado</option>
            </select>
            <p class="mb-1">Adicione uma foto do Resgate</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
            <div class="row">
                <div class="col-sm-12">
                    <input class="fw-bold form-control custom-file-input" type="file" name="arquivo"
                        multiple="multiple" /><br>
                </div>
            </div>
            <div class="mb-2"><p2 class="text-muted">Registrado em <?php echo $stringDate?></p2></div>
            <div class="d-flex justify-content-between">
                <input class="btn fw-bold" id="button1" type="submit" value="Editar Resgate">
                <a class="btn btn-danger d-flex justify-content-center" href="../controllers/deletarResgate.php?idb=<?php echo $exibe[0]?>">Excluir Resgate</a>
            </div>
        </form>
    </div>
    <?php } ?>
</div>

<?php
include ("../views/blades/footer3.php");
?>