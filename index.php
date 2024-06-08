<?php
// include("models/conexao.php");
include("views/blades/header.php");
?>      
        <!-- HEADER -->
        <header class="header position-relative start-0 top-0 end-0 px-0 align-items-center">
            <div class="hero d-flex justify-content-center align-items-center overflow-hidden position-relative">
                <video playsinline autoplay muted loading="lazy" class="hero_video">
                    <source src="files/movies/cat2.mp4" type="video/mp4">
                </video>

                <div class="hero_content h-100 container-xxl position-relative text-center align-items-center">
                    <div class="container-fluid" style="color: black; margin-top: 200px;" id="hero_text">
                        <h1><b>A CrazyCatGang resgata, castra e doa gatinhos abandonados.<br> Ajude você também.</b></h1>
                    </div>
                </div>
            </div>   
        </header>

        <section>
        <!-- SOBRE NÓS -->
        <div class="container-fluid px-0 text-white position-relative" id="sobrenos">
            <div class="d-flex align-items-center justify-content-center mb-0">
                <div class="col-lg-10 col-md-10 col-sm-12 col-12 p-5 text-center position-relative" id="sobrenos-content">
                    <div class="d-flex justify-content-center position-absolute top-0 start-50 translate-middle-x w-100">
                        <img src="files/images/patinhas.png" class="img-fluid">
                    </div>
                    <h1 class="reveal fw-bold mt-0 fs-1">Sobre nós</h1>
                    <img src="files/images/logo.png" class="reveal img-fluid p-4">
                    <div class="reveal container w-75" id="sobrenos-text">
                        <p style="color: #000">Somos um ONG formada majoritariamente por mulheres, e que busca instruir a sociedade em relação ao abandono, cuidados com os felinos, entre outros.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- HOME -->
        <div class="container-fluid px-0 text-white position-relative" id="home">
            <div class="row align-items-center mb-0 flex-sm-row-reverse">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12 p-5">
                    <div class="reveal2">
                        <h2 class="fw-bold my-3 fs-1" id="title">Nós ajudamos a construir uma sociedade melhor!</h3>
                        <p>Nossa ONG nasceu em 2014, e desde o início nosso objetivo é ajudar os gatinhos, que ainda são estigmatizados em nossa sociedade.<br><br>
                        Por isso nossa missão é conscientizar e instruir a população de maneira responsável, realizando um trabalho social almejando reduzir a população de gatos de rua.
                        </p>
                    </div>
                    <div id="botao"> 
                        <a href="#sobre" class="text-button text-center"><button type="button" class="btn btn-lg fw-bold mb-3" id="button1">Quero ajudar!</button></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-12 container-fluid">
                    <img src="files/images/cat-img.png" class="img-fluid">
                </div>
            </div>
        </div>

        <!-- SOBRE -->
        <div class="container-fluid px-0 text-white position-relative mb-4" id="sobre">
            <div class="col-12 p-4 text-dark">
                <div class="container pt-3 mb-5" id="secao1">
                    <h1 class='fw-bold mb-3'>Como posso ajudar?</h1>
                    <p>
                        Nossa ong depende 100% da SUA AJUDA. Existem algumas frentes para ajudar a nossa ong, e temos certeza que uma delas vai dar certo com você.</p>
                    </p>
                    <ul>
                        <li><a href="#">Adotar um gatinho</a></li>
                        <li><a href="#">Comprar nossa Rifinha</a></li>
                        <li><a href="#">Doar</a></li>
                        <li><a href="#">Fazer Lar Temporário</a></li>
                        <li><a href="#">Se tornar voluntário</a></li>
                        <li><a href="#">Doar ração, medicamentos, etc</a></li>
                        <li><a href="#">Engajar com nosso conteúdo</a></li>
                    </ul>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="files/images/gatos.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- ADOÇÃO -->
        <div class="container-fluid px-0 text-white position-relative" id="adote">
            <div class="row align-items-center px-5 flex-sm-row-reverse">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="reveal2">
                        <div class="my-2">
                            <h2 class="fw-bold" id="title2">Sissi</h3>
                            <p3 class="position-absolute" style="top: 100px">Para Adoção</p3>
                        </div>
                        <p>Olá. Aqui é a Sissi. Quando cheguei na ONG, estava assustada e bem insegura. Com o tempo, ganhei confiança e percebi que as tias não iriam me machucar. Assim, fui adotada e achei que seria feliz, que teria uma família e um ambiente acolhedor para evoluir.<br><br>
                        Porém, não foi bem assim… fui devolvida após alguns meses. Não tiveram paciência comigo e com minha evolução. Agora, estou esperando uma nova chance de ser feliz. Ainda sou um tanto quanto insegura, então preciso de um humano paciente e amoroso.<br> 
                        Será que é você?
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 container-fluid">
                    <img src="files/images/sissi.png" class="img-fluid reveal3">
                </div>
            </div>
            <div class="container-fluid px-4">
                <h3 class='fw-bold text-muted'>Assim como Sissi...<br>Esses gatos também precisam de um lugar para se chamar de lar</h3>
            </div>
            <div class="carousel-container my-3">
                <div class="carousel">
                    <img src="files/images/cenoura.png" class="carousel-image">
                    <img src="files/images/manu.png" class="carousel-image">
                    <img src="files/images/shuri.png" class="carousel-image">
                    <img src="files/images/nemo.png" class="carousel-image">
                    <img src="files/images/wakanda.png" class="carousel-image">
                    <img src="files/images/godofredo.png" class="carousel-image">
                    <img src="files/images/chokito.png" class="carousel-image">
                    <img src="files/images/chuchu.png" class="carousel-image">
                    <img src="files/images/biju.png" class="carousel-image">
                    <img src="files/images/qualy.png" class="carousel-image">
                    <img src="files/images/tubaina.png" class="carousel-image">
                </div>
            </div>
            <div class="row align-items-center px-5 flex-sm-row-reverse" id="adote-secao">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div>
                        <h2 class="fw-bold my-3 fs-1" id="title">Quer dar amor e um lar para um gatinho? </h3>
                        <p>Cadastre-se agora e faça parte dessa jornada incrível de adoção!<br><br></p>
                    </div>
                    <div id="botao"> 
                        <a href="cadastro" class="text-button text-center"><button type="button" class="btn btn-lg fw-bold mb-3" id="button2">Cadastre-se</button></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 text-center container-fluid">
                    <img src="files/images/adote.png" class="img-fluid">
                    <h1 style="font-size: 80px !important">Adote um gatinho!</h1>
                </div>
            </div>
        </div>
        
        <!-- RIFAS -->
        <div class="position-relative start-0 top-0 end-0 px-0 align-items-center" id="rifas">
            <div class="rifas d-flex justify-content-center align-items-center overflow-hidden position-relative">
                <img src="files/images/rifas_cut4.png" class="rifas-img image-fluid w-100">

                <div class="hero_content h-100 container-xxl position-relative text-center align-items-center">
                    <div class="container-fluid w-75 reveal2" style="color: black; margin-top: 5%;" id="rifas-conteudo">
                        <h1>Compre nossa Rifinha!</h1>
                        <p4>Compre nossa Rifa, estamos sempre criando novas rifas com prêmios variados.<br>
                        Nossa rifinha nos ajuda a angariar parte do valor necessário para cobrir os custos da ong.<br>
                        Acesse o link e solicite um número:<br><br></p4>
                        <div id="botao"> 
                            <a href="https://api.whatsapp.com/message/KT46S26DKF5QO1?autoload=1&app_absent=0" class="text-button text-center"><button type="button" class="btn btn-lg fw-bold mb-3" id="button2">Quero comprar</button></a>
                        </div>
                    </div>
                </div>
            </div>   
        </div>

        <!-- INSTALAÇÕES -->
        <div class="container-fluid px-0 text-white position-relative p-5" id="instalacoes">
            <div class="row align-items-center mb-0">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-5">
                    <div>
                        <h1 class="fw-bold my-3 fs-1" id="title">Instalações</h1>
                        <p>Somos uma ONG virtual, ou seja, não possuímos um espaço físico.<br><br>
                        Nós atuamos em parcerias com clínicas veterinárias, onde nossos gatos ficam durante o tratamento de doenças ou enquanto aguardam lares temporários. Lares temporários são voluntários que cedem o seu espaço (carinho, dedicação e muito mais) para receber os miaus até a doação, sendo todos os insumos providos pela ONG.<br><br>
                        Além dos lares temporários, temos um grande número de voluntárias que ajudam a realizar a logística desse nosso projeto. São elas as tias do resgate, do CED, as veterinárias, a tia do financeiro, nossa advogata, a voluntária que coordena os LTs, a tia da Rifinha, as meninas da comunicação e as voluntárias que cuidam de todas as mensagens que recebemos de vocês em nossas redes sociais.<br><br>
                        Pessoas que doam seu tempo, suas habilidades e muito carinho para ajudar nossos gatinhos. Você quer ser uma dessas pessoas? Então se torne um voluntário.
                        Tá esperando o quê?
                        </p>
                    </div>
                    <div id="botao"> 
                        <a href="#sobre" class="text-button text-center"><button type="button" class="btn btn-lg fw-bold mb-3" id="button3">Quero ajudar!</button></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 container-fluid px-5">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 p-0 align-items-center">
                            <div class="mb-2 reveal2"><div style="height:300px; overflow:hidden"><img src="files/images/cat1.png" class="image-fluid w-100" style="height: auto"></div></div>
                            <div class="reveal2"><div style="height:300px; overflow:hidden"><img src="files/images/cat2.png" class="image-fluid w-100"></div></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 pt-5" style="top:-250px"><div class="reveal2" style=" height:550px; background-image: url('files/images/cat3.png'); background-repeat: no-repeat"></div></div>
                    </div>
                    <div class="row">
                        <div class="col-12 pt-3 reveal2 p-0"><img src="files/images/cat4.png" class="image-fluid w-100"></div></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DENÚNCIA -->
        <div class="container-fluid px-0 text-white position-relative" style="background-color: #000" id="denuncia">
            <div class="row align-items-center mb-0">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-5">
                    <div>
                        <h1 class="fw-bold my-3 fs-1 text-white" id="title">Maus tratos contra animais</h1>
                        <h1 class="text-danger position-relative" style="top: -20px !important;">É CRIME!</h1>
                        <div class="bg-danger px-2 me-5 text-center">
                            <p class="text-white">Lei Federal 9.605/98 ART. 32</p>
                        </div>
                        <p class="text-white">Texto
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 container-fluid">
                    <img src="files/images/cat-denuncia.png" class="img-fluid">
                </div>
            </div>
        </div>

        <!-- DOAÇÕES -->
        <div class="container-fluid px-0 text-white position-relative" style="background-color: #000" id="doacao">
            <div class="row align-items-center mb-0 flex-sm-row-reverse px-5">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div>
                        <h1 class="fw-bold my-3 fs-1 text-white" id="title">Você doa, e nós continuamos a resgatar e cuidar dos gatinhos em situação de risco</h1>
                        <p class="text-white">AJUDE-NOS A CONTINUAR CUIDANDO.<br>
                        Você pode contribuir das seguintes formas:<br>

                        Transferência Bancária para:<br></p>
                        <p2 class="text-white">Banco Cora (403)<br>
                          Agência: 0001 <br>
                          Conta: 1385067-3 <br>
                          Nome da Associação: Crazy Cat Gang<br> 
                          CNPJ: 41.942.573/0001-11<br><br></p2>

                        <p class="text-white">PIX</p>
                        <p2 class="text-white">e-mail: ccgcwb@gmail.com<br>
                        <p2 class="text-white">CNPJ: 41.942.573/0001-11<br><br></p2>

                        <p class="text-white">Faça uma doação online mensal:</p>
                        <p2 class="text-white">Picpay: crazycatgang</p2><br>
                        <p2 class="text-white">Padrim: padrim.com.br/crazycatgang</p2><br>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12 container-fluid">
                    <img src="files/images/catgang.png" class="img-fluid">
                </div>
            </div>
        </div>

        <!-- BLOG -->
        <div class="header position-relative start-0 top-0 end-0 px-0" id="blog">
            <div class="hero overflow-hidden position-relative" style="background-image: url('files/images/blog.png')">
                <div class="hero_content h-100 container-xxl position-relative">
                    <div class="d-flex h-100 align-items-center">
                        <div class="container-fluid px-5 text-white text-center">
                            <h3 class="fw-semibold mb-1 fs-1" id="header-title">Gostou da gente?<br>Quer saber mais do mundo felino?<br></h1>
                            <div id="botao" class="p-2"> 
                                <a href="https://crazycatgang.com.br/" class="text-button text-center"><button type="button" class="btn btn-lg fw-bold mb-3" id="button1">Acesse o nosso blog</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
<?php
include("views/blades/footer.php");
?>   