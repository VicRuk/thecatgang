<?php
include("../models/conexao.php");

$idGato = $_POST["id"];
$varNomeGato = mysqli_real_escape_string($conexao, $_POST["nomeGato"]);
$varDescricaoGato = mysqli_real_escape_string($conexao, $_POST["descricaoGato"]);
$varCastrado = mysqli_real_escape_string($conexao, $_POST["castrado"]);
$varAlocado = mysqli_real_escape_string($conexao, $_POST["alocado_clinica"]);
$varDoado = mysqli_real_escape_string($conexao, $_POST["doacao"]);

$diretorio = "../files/images/gatos";
$arquivos = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

$query = "SELECT foto FROM gato WHERE id = '$idGato'";
$result = mysqli_query($conexao, $query);
$gato = mysqli_fetch_array($result);
$varGatoImgAntiga = $gato['foto'];

if ($arquivos && $arquivos['error'] == UPLOAD_ERR_OK) {
    $temp = $arquivos['tmp_name'];
    $extensao = strtolower(pathinfo($arquivos['name'], PATHINFO_EXTENSION));

    if ($extensao == 'png') {
        $varGatoImgRandom = md5(uniqid()) . "." . $extensao;
        $destino = $diretorio . "/" . $varGatoImgRandom;

        if (move_uploaded_file($temp, $destino)) {
            $varGatoImgNova = $varGatoImgRandom;

            if (!empty($varGatoImgAntiga)) {
                $caminhoImagemAntiga = $diretorio . "/" . $varGatoImgAntiga;
                if (file_exists($caminhoImagemAntiga)) {
                    unlink($caminhoImagemAntiga);
                }
            }

        } else {
            echo "<script>alert('Erro ao mover o arquivo.'); window.location='../cms/gestaoGatos.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Insira apenas arquivos PNG.'); window.location='../cms/gestaoGatos.php';</script>";
        exit();
    }
} else {
    $varGatoImgNova = $varGatoImgAntiga;
}

$query = "UPDATE gato SET 
            nome = '$varNomeGato',
            descricao = '$varDescricaoGato',
            foto = '$varGatoImgNova',
            castrado = '$varCastrado',
            alocado_clinica = '$varAlocado',
            doacao = '$varDoado'
          WHERE id = '$idGato'";

mysqli_query($conexao, $query);

if (mysqli_affected_rows($conexao) > 0) {
    echo "<script>alert('Gato atualizado com sucesso!'); window.location='../cms/gestaoGatos.php';</script>";
} else {
    echo "<script>alert('Erro ao atualizar o gato.'); window.location='../cms/gestaoGatos.php';</script>";
}

mysqli_close($conexao);
?>
