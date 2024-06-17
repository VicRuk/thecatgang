<?php
include("../models/conexao.php");

$idb = $_GET["idb"];
$query = "UPDATE gato SET alocado_clinica = 0 WHERE id = '$idb'";

mysqli_query($conexao, $query);
header("location:../cms/gestaoClinicas.php");
mysqli_close($conexao);
?>
