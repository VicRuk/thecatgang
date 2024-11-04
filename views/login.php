<?php
include("../models/conexao.php");
include("blades/header2.php");
?>
<div class="body-usuario">
    <div class="fixed-left">
        <img src="../files/images/adote.png" class="w-75">
    </div>
    <div class="scrollable-right">
        <div class="content-wrapper px-5">
            <div class="text mb-3">
                <h2 class="fw-bold fs-1" id="title">Login</h2>
                <p>Bem vindo de volta!</p>
            </div>
            <div id="mensagens-login"></div>
            <form id="loginForm" class="w-100">
                <div class="mb-3">
                    <label class="fw-bold mb-1">Email</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="fw-bold mb-1">Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn fw-bold" id="button1">
                        <span class="button-text">Entrar</span>
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </form>
            <p>Ainda não é voluntário? <a href="cadastro.php">Cadastre-se</a></p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const loginForm = document.getElementById('loginForm');
        const button = document.getElementById('button1');
        const spinner = button.querySelector('.spinner-border');
        const mensagensDiv = document.getElementById('mensagens-login');

        function iniciarLoading() {
            button.classList.add('btn-loading');
            button.disabled = true;
        }

        function pararLoading() {
            button.classList.remove('btn-loading');
            button.disabled = false;
        }

        function realizarLogin(email, senha) {
            return new Promise((resolve, reject) => {
                const formData = new FormData();
                formData.append('email', email);
                formData.append('senha', senha);

                fetch('../controllers/login.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            resolve(data);
                        } else {
                            reject(data.error || 'Erro ao realizar login');
                        }
                    })
                    .catch(error => {
                        reject('Erro na conexão com o servidor');
                    });
            });
        }

        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            mensagensDiv.innerHTML = '';

            const email = loginForm.querySelector('input[name="email"]').value;
            const senha = loginForm.querySelector('input[name="senha"]').value;

            iniciarLoading();

            try {
                const resultado = await realizarLogin(email, senha);
                console.log('Login realizado com sucesso! Redirecionando...', 'success');
                setTimeout(() => {
                    window.location.href = resultado.redirectUrl;
                }, 1000);
            } catch (erro) {
                console.log(erro, 'danger');
                pararLoading();
            }
        });
    });
</script>
<?php
include("blades/footer2.php")
    ?>