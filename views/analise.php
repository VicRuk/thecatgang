<?php
include ("../models/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="../files/images/logo2.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/styleLogin.css" type="text/css">

    <!-- Ícones -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

    <title>CrazyCatGang</title>
</head>

<body style="background: #FDF1FD">
    <nav class="navbar navbar-expand-lg px-2" style="background-color: #FDF1FD;">
        <div class="container-fluid" id="nav-content">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center">
                <a href="login.php" class="logo-link"><img src="../files/images/logo.png" class="img-fluid"
                        style="width: 100px !important;" id="nav-img"></a>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-0 text-white position-relative" style="background-color: #FDF1FD;" id="hero">
        <div class="d-flex flex-column justify-content-center align-items-center text-center p-1"
            style="height: 90vh;">
            <h2>Seu perfil está em análise!</h2>
            <dotlottie-player src="../files/json/gato_digitando.json" background="transparent" speed="1"
                style="width:400px; height: 250px;" loop autoplay></dotlottie-player>
            <p>Ficamos muito felizes que você esteja querendo se tornar um voluntário!</p>
            <p2 class="mb-3">Entraremos em contato em breve!</p2>
            <a href="login.php" class="text-button text-center"><button type="button" class="btn btn-lg fw-bold mb-3"
                    style="background-color: #FFCB04; color: #000;">Voltar</button></a>
        </div>
    </div>
</body>

</html>