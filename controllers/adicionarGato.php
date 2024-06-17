<?php
include("../models/conexao.php");

$varNomeGato = mysqli_real_escape_string($conexao, $_POST["nomeGato"]);
$varDescricaoGato = mysqli_real_escape_string($conexao, $_POST["descricaoGato"]);
$varCastrado = mysqli_real_escape_string($conexao, $_POST["castrado"]);
$varAlocado = mysqli_real_escape_string($conexao, $_POST["alocado_clinica"]);
$varDoado = mysqli_real_escape_string($conexao, $_POST["doacao"]);

$diretorio = "../files/images/gatos";
$arquivos = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

if ($arquivos && $arquivos['error'] == UPLOAD_ERR_OK) {
    $varGatoImg = $arquivos['name'];
    $temp = $arquivos['tmp_name'];
    $extensao = strtolower(pathinfo($varGatoImg, PATHINFO_EXTENSION));

    if ($extensao == 'png') {
        $varGatoImgRandom = md5(uniqid()) . "." . $extensao;
        $destino = $diretorio . "/" . $varGatoImgRandom;

        if (move_uploaded_file($temp, $destino)) {
            $varGatoImg = $varGatoImgRandom;
        } else {
            echo "<script>alert('Erro ao mover o arquivo.'); window.location='../cms/gestaoGatos.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Insira apenas arquivos PNG.'); window.location='../cms/gestaoGatos.php';</script>";
        exit();
    }
} else {
    $varGatoImg = NULL;
}

$query = "INSERT INTO gato (nome, descricao, foto, castrado, alocado_clinica, doacao) 
          VALUES ('$varNomeGato', '$varDescricaoGato', ";

if ($varGatoImg !== NULL) {
    $query .= "'$varGatoImg', ";
} else {
    $query .= "NULL, ";
}

$query .= "'$varCastrado', '$varAlocado', '$varDoado')";

mysqli_query($conexao, $query);

if (mysqli_affected_rows($conexao) > 0) {
    echo "<script>alert('Gato cadastrado com sucesso!'); window.location='../cms/gestaoGatos.php';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar o gato.'); window.location='../cms/gestaoGatos.php';</script>";
}

mysqli_close($conexao);
?>
