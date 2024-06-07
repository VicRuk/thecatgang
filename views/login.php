<?php
include("../models/conexao.php");
include("blades/header3.php");
?>
<div class="body-usuario">
<div class="container d-flex justify-content-center align-items-center min-vh-100">
<!-- <button class="btn btn-primary botaoLogin" type="submit">Button</button> -->
    <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background:#FFCB04 ;">
            <div class="featured-image mb-3">
                <img src="../files/images/logo.png" class="img-fluid" style="width: 500px">
            </div>
            <p class="text fs-3">The Cat Gang</p>
        </div>
        <div class="col-md-6 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-4">
                    <h2>Bem Vindo, Usuario</h2>
                    <p>coloque seus dados abaixo:</p>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Usuario">
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Senha">
                </div>
                <div class="input-group mb-3 botao-login" >
                    <button class="btn btn-lg btn-warning w-100 fs-6">Login</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
        <!-- <p>teste</p> -->
<?php
include("blades/footer3.php")
?>