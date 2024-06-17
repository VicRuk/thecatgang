<?php
include("../models/conexao.php");

$idb = $_GET["idb"];
$query = "UPDATE gato SET alocado_clinica = 1 WHERE id = '$idb'";

mysqli_query($conexao, $query);
header("location:../cms/adicionarGatoClinica.php");
mysqli_close($conexao);
?>
