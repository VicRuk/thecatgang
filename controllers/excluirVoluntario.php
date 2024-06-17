<?php
include("../models/conexao.php");
$idb = $_GET["idb"];

mysqli_query($conexao, "DELETE FROM user WHERE id = $idb");
header("location:../cms/gestaoVoluntarios.php");
?>