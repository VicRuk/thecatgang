<?php
include("../models/conexao.php");

$idUser = $_POST["userId"];
$query = "UPDATE user SET user_status = 'Aprovado' WHERE id = '$idUser'";

mysqli_query($conexao, $query);
header("location:../cms/gestaoVoluntarios.php");
mysqli_close($conexao);
?>
