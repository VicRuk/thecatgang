<?php
include ("../models/conexao.php");
include ("../views/blades/header4.php");
include ("../views/blades/sidebar.php");

$idb = $_GET["idb"];
$query = mysqli_query($conexao, "SELECT * FROM gato WHERE id = $idb");
?>
<div class="main container-fluid p-5">
    <?php
        while ($exibe = mysqli_fetch_array($query)) {
        $Data = new DateTime($exibe[7]);
        $stringDate = $Data -> format('d/m/Y, H:i:s');
    ?>
    <a href="gestaoGatos.php"><i class="lni lni-chevron-left text-secondary mb-4" id="back"></i></a>
    <h1>Editar <?php echo $exibe[1] ?></h1>
    <div class="row">
        <div class="col-12 col-sm-5 d-flex justify-content-center align-items-center">
            <img class="img-fluid" src="<?php echo $exibe['foto'] ? "../files/images/gatos/{$exibe['foto']}" : "../files/images/cathand.png"; ?>">
        </div>
        <form name="atualizar" class="col-12 col-sm-7" enctype="multipart/form-data" action="../controllers/atualizarGato.php" method="post">
            <input type="hidden" name="id" value="<?php echo $exibe[0] ?>">
            <p class="mb-1">Nome do Gato</p>
            <input class="form-control" type="text" name="nomeGato" required value="<?php echo $exibe[1]?>" placeholder="Nome do Gato"><br>

            <p class="mb-1">Descrição</p>
            <textarea class="form-control" rows="5" type="text" name="descricaoGato" required
                placeholder="Conte mais sobre o gato"><?php echo $exibe[2]?></textarea><br>

            <div class="mb-3">
                <p>Castrado</p>
                <input type="radio" id="castrado_sim" name="castrado" value="1"
                    <?php echo ($exibe['castrado'] == 1) ? 'checked' : ''; ?> required>
                <label for="castrado_sim">Sim</label><br>
                <input type="radio" id="castrado_nao" name="castrado" value="0"
                    <?php echo ($exibe['castrado'] == 0) ? 'checked' : ''; ?> required>
                <label for="castrado_nao">Não</label><br>
            </div>

            <div class="mb-3">
                <p>Alocado em Clínica</p>
                <input type="radio" id="alocado_sim" name="alocado_clinica" value="1" <?php echo ($exibe['alocado_clinica'] == 1) ? 'checked' : ''; ?> required>
                <label>Sim</label><br>
                <input type="radio" id="alocado_nao" name="alocado_clinica" value="0" <?php echo ($exibe['alocado_clinica'] == 0) ? 'checked' : ''; ?> required>
                <label>Não</label><br>
            </div>

            <div class="mb-3">
                <p>Doado?</p>
                <input type="radio" id="doacao_sim" name="doacao" value="1" <?php echo ($exibe['doacao'] == 1) ? 'checked' : ''; ?>
                    required>
                <label>Sim</label><br>
                <input type="radio" id="doado_nao" name="doacao" <?php echo ($exibe['doacao'] == 0) ? 'checked' : ''; ?>
                    value="0" required>
                <label>Não</label><br>
            </div>

            <p class="mb-1">Adicione ou Edite uma foto do gato</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
            <div class="row mb-1">
                <div class="col-sm-12">
                    <input class="fw-bold form-control custom-file-input" type="file" name="arquivo"
                        multiple="multiple" />
                </div>
            </div>
            <div class="mb-2"><p2 class="text-muted">Gato adicionado em <?php echo $stringDate?></p2></div>
            <div class="d-flex justify-content-between">
                <input class="btn fw-bold" id="button1" type="submit" value="Editar Gato">
                <a class="btn btn-danger d-flex justify-content-center" href="../controllers/deletarGato.php?idb=<?php echo $exibe[0]?>">Excluir Gato</a>
            </div>
        </form>
    </div>
    <?php } ?>
</div>

<?php
include ("../views/blades/footer3.php");
?>