<?php
include("../models/conexao.php");

$idResgate = $_POST["id"];
$varNomeResgate = mysqli_real_escape_string($conexao, $_POST["nomeResgate"]);
$varDescricaoResgate = mysqli_real_escape_string($conexao, $_POST["descricaoResgate"]);
$varEnderecoResgate = mysqli_real_escape_string($conexao, $_POST["enderecoResgate"]);
$varStatus = mysqli_real_escape_string($conexao, $_POST["resgate_status"]);

$diretorio = "../files/images/resgates";
$arquivos = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

$query = "SELECT foto FROM resgate WHERE id = '$idResgate'";
$result = mysqli_query($conexao, $query);
$resgate = mysqli_fetch_array($result);
$varResgateImgAntiga = $resgate['foto'];

if ($arquivos && $arquivos['error'] == UPLOAD_ERR_OK) {
    $temp = $arquivos['tmp_name'];
    $extensao = strtolower(pathinfo($arquivos['name'], PATHINFO_EXTENSION));

    if ($extensao == 'png') {
        $varResgateImgRandom = md5(uniqid()) . "." . $extensao;
        $destino = $diretorio . "/" . $varResgateImgRandom;

        if (move_uploaded_file($temp, $destino)) {
            $varResgateImgNova = $varResgateImgRandom;

            if (!empty($varResgateImgAntiga)) {
                $caminhoImagemAntiga = $diretorio . "/" . $varResgateImgAntiga;
                if (file_exists($caminhoImagemAntiga)) {
                    unlink($caminhoImagemAntiga);
                }
            }

        } else {
            echo "<script>alert('Erro ao mover o arquivo.'); window.location='../cms/gestaoresgates.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Insira apenas arquivos PNG.'); window.location='../cms/gestaoresgates.php';</script>";
        exit();
    }
} else {
    $varResgateImgNova = $varResgateImgAntiga;
}

$query = "UPDATE resgate SET 
            nome = '$varNomeResgate',
            descricao = '$varDescricaoResgate',
            endereco = '$varEnderecoResgate',
            resgate_status = '$varStatus',
            foto = '$varResgateImgNova'
          WHERE id = '$idResgate'";

mysqli_query($conexao, $query);

if (mysqli_affected_rows($conexao) > 0) {
    echo "<script>alert('Resgate atualizado com sucesso!'); window.location='../cms/gestaoResgates.php';</script>";
} else {
    echo "<script>alert('Erro ao atualizar o resgate.'); window.location='../cms/gestaoResgates.php';</script>";
}

mysqli_close($conexao);
?>
