<?php
include ("../models/conexao.php");
include ("blades/header2.php");
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
            <form action="../controllers/login.php" method="POST" class="w-100">
                <div class="mb-3">
                    <label class="fw-bold mb-1">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="fw-bold mb-1">Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn fw-bold" id="button1">Entrar</button>
                </div>
            </form>
            <p>Ainda não é voluntário? <a href="cadastro.php">Cadastre-se</a></p>
        </div>
    </div>
</div>
<?php
include ("blades/footer2.php")
    ?>