<?php
session_start();
if(empty($_SESSION))
{
print "<script>location.href='../cms/index.php';</script>";
}
$usuariocodigo = $_SESSION["usuarioCodigo"];
include("../models/conexao.php");
include("../views/blades/header4.php");
include("../views/blades/sidebar.php");
?>
    <div class="main container-fluid p-5">
        <h1>Bem vindo <?php echo $_SESSION["usuario"]?>! tela1</h1></h1>
    </div>

<?php
include("../views/blades/footer3.php");
?>