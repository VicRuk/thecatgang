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
    <a href="gestaoResgate.php"><i class="lni lni-chevron-left text-secondary mb-4" id="back"></i></a>
    <h1>Adicionar Resgate</h1>
    <div class="align-items-center d-flex flex-column">
            <img src="../files/images/cat-car.png" class="img-fluid mb-3">
        
        <form name="upload" class="col-12" enctype="multipart/form-data" action="../controllers/adicionarResgate.php" method="post">
            <p class="mb-1">Nome do Resgate</p>
            <input class="form-control" type="text" name="nomeResgate" required placeholder="Nome do Resgate"><br>

            <p class="mb-1">Descrição</p>
            <textarea class="form-control" rows="5" type="text" name="descricaoResgate" required
                placeholder="Conte mais sobre o caso"></textarea><br>

            <p class="mb-1">Endereço</p>
            <textarea class="form-control" rows="3" type="text" name="enderecoResgate" required
                placeholder="Digite o Endereço de Solicitação de Resgate"></textarea><br>

            <select name="resgate_status" class="form-control mb-3" id="resgate_status" required>
                <option value="0">Pendente</option>
                <option value="1">Finalizado</option>
            </select>
            <p class="mb-1">Adicione uma foto do Resgate</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
            <div class="row">
                <div class="col-sm-12">
                    <input class="fw-bold form-control custom-file-input" type="file" name="arquivo"
                        multiple="multiple" /><br>
                </div>
            </div>

            <input class="btn fw-bold" id="button1" type="submit" value="Adicionar Resgate">
        </form>
    </div>

</div>

<?php
include ("../views/blades/footer3.php");
?>