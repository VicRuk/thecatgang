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
    <a href="gestaoGatos.php"><i class="lni lni-chevron-left text-secondary mb-4" id="back"></i></a>
    <h1>Adicionar Gato</h1>
    <div class="row">
        <div class="col-12 col-sm-5 d-flex justify-content-center align-items-center">
            <img src="../files/images/cathand.png" class="img-fluid">
        </div>
        <form id="catForm" name="upload" class="col-12 col-sm-7" enctype="multipart/form-data">
            <div id="alertMessage" class="alert d-none" role="alert"></div>
            
            <p class="mb-1">Nome do Gato</p>
            <input class="form-control" type="text" name="nomeGato" required placeholder="Nome do Gato"><br>

            <p class="mb-1">Descrição</p>
            <textarea class="form-control" rows="5" type="text" name="descricaoGato" required
                placeholder="Conte mais sobre o gato"></textarea><br>

            <div class="mb-3">
                <p>Castrado</p>
                <input type="radio" id="castrado_sim" name="castrado" value="1" required>
                <label>Sim</label><br>
                <input type="radio" id="castrado_nao" name="castrado" value="0" required>
                <label>Não</label><br>
            </div>

            <div class="mb-3">
                <p>Alocado em Clínica</p>
                <input type="radio" id="alocado_sim" name="alocado_clinica" value="1" required>
                <label>Sim</label><br>
                <input type="radio" id="alocado_nao" name="alocado_clinica" value="0" required>
                <label>Não</label><br>
            </div>

            <div class="mb-3">
                <p>Doado?</p>
                <input type="radio" id="doacao_sim" name="doacao" value="1" required>
                <label>Sim</label><br>
                <input type="radio" id="doado_nao" name="doacao" value="0" required>
                <label>Não</label><br>
            </div>

            <p class="mb-1">Adicione uma foto do gato</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
            <div class="row">
                <div class="col-sm-12">
                    <input class="fw-bold form-control custom-file-input" type="file" name="arquivo"
                        accept=".png" /><br>
                </div>
            </div>

            <button type="submit" class="btn btn-success fw-bold" id="submitButton">
                Adicionar Gato
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('catForm');
    const alertMessage = document.getElementById('alertMessage');
    const submitButton = document.getElementById('submitButton');
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

    async function uploadCat(formData) {
        try {
            const response = await fetch('../controllers/adicionarGato.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            
            if (result.success) {
                console.log("Gato cadastrado com sucesso!");
                setTimeout(() => {
                    window.location.href = '../cms/gestaoGatos.php';
                }, 1500);
            } else {
                throw new Error(result.message || 'Erro ao cadastrar o gato');
            }
        } catch (error) {
            console.log(error.message, 'danger');
            setLoading(false);
        }
    }

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        setLoading(true);
        alertMessage.classList.add('d-none');

        const formData = new FormData(this);
        const fileInput = form.querySelector('input[type="file"]');
        
        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            if (file.type !== 'image/png') {
                showAlert('Por favor, insira apenas arquivos PNG.', 'danger');
                setLoading(false);
                return;
            }
        }

        await uploadCat(formData);
    });
});
</script>

<?php include ("../views/blades/footer3.php"); ?>