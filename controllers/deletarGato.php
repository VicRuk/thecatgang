<?php
header('Content-Type: application/json');
include("../models/conexao.php");

try {
    $diretorio = "../files/images/gatos";
    $idb = $_GET["idb"];

    $query = "SELECT foto FROM gato WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($stmt, "i", $idb);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($exibe = mysqli_fetch_assoc($result)) {
        $arquivo = $exibe['foto'];
        if (!empty($arquivo)) {
            $destino = $diretorio . "/" . $arquivo;
            if (file_exists($destino)) {
                if (!unlink($destino)) {
                    throw new Exception('Erro ao excluir a imagem do gato.');
                }
            }
        }
    }

    $query = "DELETE FROM gato WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($stmt, "i", $idb);
    mysqli_stmt_execute($stmt);

    if (mysqli_affected_rows($conexao) > 0) {
        echo json_encode(['success' => true, 'message' => 'Gato excluído com sucesso!']);
    } else {
        throw new Exception('Gato não encontrado ou já foi excluído.');
    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
} finally {
    mysqli_close($conexao);
}