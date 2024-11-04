<?php
header('Content-Type: application/json');
include("../models/conexao.php");

try {
    $idGato = $_POST["id"];
    $varNomeGato = mysqli_real_escape_string($conexao, $_POST["nomeGato"]);
    $varDescricaoGato = mysqli_real_escape_string($conexao, $_POST["descricaoGato"]);
    $varCastrado = mysqli_real_escape_string($conexao, $_POST["castrado"]);
    $varAlocado = mysqli_real_escape_string($conexao, $_POST["alocado_clinica"]);
    $varDoado = mysqli_real_escape_string($conexao, $_POST["doacao"]);

    $diretorio = "../files/images/gatos";
    $arquivos = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

    // Get current image
    $query = "SELECT foto FROM gato WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($stmt, "i", $idGato);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $gato = mysqli_fetch_array($result);
    $varGatoImgAntiga = $gato['foto'];
    
    $varGatoImgNova = $varGatoImgAntiga;

    if ($arquivos && $arquivos['error'] == UPLOAD_ERR_OK) {
        $temp = $arquivos['tmp_name'];
        $extensao = strtolower(pathinfo($arquivos['name'], PATHINFO_EXTENSION));

        if ($extensao != 'png') {
            throw new Exception('Apenas arquivos PNG são permitidos.');
        }

        $varGatoImgRandom = md5(uniqid()) . "." . $extensao;
        $destino = $diretorio . "/" . $varGatoImgRandom;

        if (!move_uploaded_file($temp, $destino)) {
            throw new Exception('Erro ao fazer upload da imagem.');
        }

        $varGatoImgNova = $varGatoImgRandom;

        if (!empty($varGatoImgAntiga)) {
            $caminhoImagemAntiga = $diretorio . "/" . $varGatoImgAntiga;
            if (file_exists($caminhoImagemAntiga)) {
                unlink($caminhoImagemAntiga);
            }
        }
    }

    $query = "UPDATE gato SET 
                nome = ?,
                descricao = ?,
                foto = ?,
                castrado = ?,
                alocado_clinica = ?,
                doacao = ?
              WHERE id = ?";
              
    $stmt = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($stmt, "sssiiis", 
        $varNomeGato,
        $varDescricaoGato,
        $varGatoImgNova,
        $varCastrado,
        $varAlocado,
        $varDoado,
        $idGato
    );
    
    mysqli_stmt_execute($stmt);

    if (mysqli_affected_rows($conexao) >= 0) {
        echo json_encode(['success' => true, 'message' => 'Gato atualizado com sucesso!']);
    } else {
        throw new Exception('Erro ao atualizar o gato no banco de dados.');
    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
} finally {
    mysqli_close($conexao);
}