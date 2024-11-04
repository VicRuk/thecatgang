<?php
header('Content-Type: application/json');

try {
    include("../models/conexao.php");

    $response = [
        'success' => false,
        'message' => ''
    ];

    $varNomeGato = mysqli_real_escape_string($conexao, $_POST["nomeGato"]);
    $varDescricaoGato = mysqli_real_escape_string($conexao, $_POST["descricaoGato"]);
    $varCastrado = mysqli_real_escape_string($conexao, $_POST["castrado"]);
    $varAlocado = mysqli_real_escape_string($conexao, $_POST["alocado_clinica"]);
    $varDoado = mysqli_real_escape_string($conexao, $_POST["doacao"]);

    $diretorio = "../files/images/gatos";
    $varGatoImg = null;

    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == UPLOAD_ERR_OK) {
        $arquivo = $_FILES['arquivo'];
        $temp = $arquivo['tmp_name'];
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));

        if ($extensao !== 'png') {
            throw new Exception('Apenas arquivos PNG são permitidos.');
        }

        $varGatoImgRandom = md5(uniqid()) . ".png";
        $destino = $diretorio . "/" . $varGatoImgRandom;

        if (!move_uploaded_file($temp, $destino)) {
            throw new Exception('Erro ao fazer upload do arquivo.');
        }

        $varGatoImg = $varGatoImgRandom;
    }

    $query = "INSERT INTO gato (nome, descricao, foto, castrado, alocado_clinica, doacao) 
              VALUES (?, ?, ?, ?, ?, ?)";
              
    $stmt = mysqli_prepare($conexao, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssssss', 
            $varNomeGato, 
            $varDescricaoGato, 
            $varGatoImg,
            $varCastrado,
            $varAlocado,
            $varDoado
        );

        if (mysqli_stmt_execute($stmt)) {
            $response['success'] = true;
            $response['message'] = 'Gato cadastrado com sucesso!';
        } else {
            throw new Exception('Erro ao cadastrar o gato no banco de dados.');
        }
        
        mysqli_stmt_close($stmt);
    } else {
        throw new Exception('Erro ao preparar a query.');
    }

} catch (Exception $e) {
    $response['message'] = $e->getMessage();
} finally {
    if (isset($conexao)) {
        mysqli_close($conexao);
    }
    echo json_encode($response);
}
?>