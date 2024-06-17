<?php
include("../models/conexao.php");

$idb = $_GET["idb"];
$query = "UPDATE gato SET castrado = 1 WHERE id = '$idb'";

mysqli_query($conexao, $query);
header("location:../cms/gestaoCastracoes.php");
mysqli_close($conexao);
?>
