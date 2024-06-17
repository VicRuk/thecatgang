<?php
include("../models/conexao.php");

$idb = $_GET["idb"];
$query = "UPDATE user SET user_status = 'Recusado' WHERE id = '$idb'";

mysqli_query($conexao, $query);
header("location:../cms/gestaoVoluntarios.php");
mysqli_close($conexao);
?>
