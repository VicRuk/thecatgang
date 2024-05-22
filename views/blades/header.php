<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css" type="text/css">
        
    <!-- Ícones -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
    <title>The Cat Gang</title>
</head>
<body>
    <div class="container-fluid px-0 bg-white">
        <!-- NAV -->
        <nav class="navbar navbar-expand-lg navbar-dark px-3">
            <div class="container-fluid" id="nav-content">
                <div class="col-1">
                    <a class="navbar-brand" href="#"><img src="files/images/logo.png" class="img-fluid" style="width: 100px !important;"></a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h3 class="htitle offcanvas-title fw-bold text-black" id="offcanvasNavbarLabel"><img src="files/images/logo.png" class="col-3"></h3>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-flex flex-column flex-lg-row align-items-lg-center">
                        <ul class="navbar-nav d-flex flex-column flex-lg-row justify-content-center flex-grow-1">
                            <li class="nav-item px-1">
                                <a class="fw-semibold nav-link active text-dark" aria-current="page" href="#sobre">Sobre</a>
                            </li>
                            <li class="nav-item px-1">
                                <a class="fw-semibold nav-link active text-dark" aria-current="page" href="#projeto">Projeto</a>
                            </li>
                            <li class="nav-item px-1">
                                <a class="fw-semibold nav-link active text-dark" aria-current="page" href="#equipe">Equipe</a>
                            </li>
                            <li class="nav-item px-1">
                                <a class="fw-semibold nav-link active text-dark" aria-current="page" href="#home-noticias">Notícias</a>
                            </li>
                        </ul>
                        <span class="navbar-text text-dark mt-3 mt-lg-0">
                            Log in
                        </span>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</body>
</html>
