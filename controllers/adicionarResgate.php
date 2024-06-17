<?php
include("../models/conexao.php");

$varNomeResgate = mysqli_real_escape_string($conexao, $_POST["nomeResgate"]);
$varDescricaoResgate = mysqli_real_escape_string($conexao, $_POST["descricaoResgate"]);
$varEnderecoResgate = mysqli_real_escape_string($conexao, $_POST["enderecoResgate"]);
$varStatus = mysqli_real_escape_string($conexao, $_POST["resgate_status"]);

$diretorio = "../files/images/resgates";
$arquivos = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

if ($arquivos && $arquivos['error'] == UPLOAD_ERR_OK) {
    $varResgateImg = $arquivos['name'];
    $temp = $arquivos['tmp_name'];
    $extensao = strtolower(pathinfo($varResgateImg, PATHINFO_EXTENSION));

    if ($extensao == 'png') {
        $varResgateImgRandom = md5(uniqid()) . "." . $extensao;
        $destino = $diretorio . "/" . $varResgateImgRandom;

        if (move_uploaded_file($temp, $destino)) {
            $varResgateImg = $varResgateImgRandom;
        } else {
            echo "<script>alert('Erro ao mover o arquivo.'); window.location='../cms/gestaoGatos.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Insira apenas arquivos PNG.'); window.location='../cms/gestaoGatos.php';</script>";
        exit();
    }
} else {
    $varResgateImg = NULL;
}

$query = "INSERT INTO resgate (nome, descricao, endereco, resgate_status, foto) VALUES ('$varNomeResgate', '$varDescricaoResgate', '$varEnderecoResgate', '$varStatus', ";

if ($varResgateImg !== NULL) {
    $query .= "'$varResgateImg')";
} else {
    $query .= "NULL)";
}

mysqli_query($conexao, $query);

if (mysqli_affected_rows($conexao) > 0) {
    echo "<script>alert('Resgate cadastrado com sucesso!'); window.location='../cms/gestaoResgates.php';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar o resgate.'); window.location='../cms/gestaoResgates.php';</script>";
}

mysqli_close($conexao);
?>
