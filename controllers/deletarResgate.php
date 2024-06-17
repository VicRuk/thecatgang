<?php
include("../models/conexao.php");
$diretorio = "../files/images/resgates";
$idb = $_GET["idb"];

$query = mysqli_query($conexao, "SELECT foto FROM resgate WHERE id = $idb");
while ($exibe = mysqli_fetch_assoc($query)) {
    $arquivo = $exibe['foto'];
    $destino = $diretorio . "/" . $arquivo;
    if (file_exists($destino)) {
        unlink($destino);
    }
}

mysqli_query($conexao, "DELETE FROM resgate WHERE id = $idb");
header("location:../cms/gestaoResgates.php");
?>