<?php
include ("../models/conexao.php");
include ("../views/blades/header4.php");
include ("../views/blades/sidebar.php");
?>
<div class="main container-fluid p-5">
    <a href="gestaoGatos.php"><i class="lni lni-chevron-left text-secondary mb-4" id="back"></i></a>
    <h1>Adicionar Gato</h1>
    <div class="row">
        <div class="col-12 col-sm-5 d-flex justify-content-center align-items-center">
            <img src="../files/images/cathand.png" class="img-fluid">
        </div>
        <form name="upload" class="col-12 col-sm-7" enctype="multipart/form-data" action="../controllers/adicionarGato.php" method="post">
            <p class="mb-1">Nome do Gato</p>
            <input class="form-control" type="text" name="nomeGato" required placeholder="Nome do Gato"><br>

            <p class="mb-1">Descrição</p>
            <textarea class="form-control" rows="5" type="text" name="descricaoGato" required
                placeholder="Conte mais sobre o gato"></textarea><br>

            <div class="mb-3">
                <p>Castrado</p>
                <input type="radio" id="castrado_sim" name="castrado" value="1"
                    required>
                <label>Sim</label><br>
                <input type="radio" id="castrado_nao" name="castrado"
                    value="0" required>
                <label>Não</label><br>
            </div>

            <div class="mb-3">
                <p>Alocado em Clínica</p>
                <input type="radio" id="alocado_sim" name="alocado_clinica" value="1"
                    required>
                <label>Sim</label><br>
                <input type="radio" id="alocado_nao" name="alocado_clinica"
                    value="0" required>
                <label>Não</label><br>
            </div>

            <div class="mb-3">
                <p>Doado?</p>
                <input type="radio" id="doacao_sim" name="doacao" value="1"
                    required>
                <label>Sim</label><br>
                <input type="radio" id="doado_nao" name="doacao"
                    value="0" required>
                <label>Não</label><br>
            </div>

            <p class="mb-1">Adicione uma foto do gato</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
            <div class="row">
                <div class="col-sm-12">
                    <input class="fw-bold form-control custom-file-input" type="file" name="arquivo"
                        multiple="multiple" /><br>
                </div>
            </div>

            <input class="btn btn-success fw-bold" id="button1" type="submit" value="Adicionar Gato">
        </form>
    </div>

</div>

<?php
include ("../views/blades/footer3.php");
?>