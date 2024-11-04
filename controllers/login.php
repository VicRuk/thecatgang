<?php
include("../models/conexao.php");
session_start();

header('Content-Type: application/json');

try {
    function sanitizarEntrada($conexao, $entrada) {
        return mysqli_real_escape_string($conexao, trim($entrada));
    }

    $email = sanitizarEntrada($conexao, $_POST["email"]);
    $senha = $_POST["senha"];
    $senhaMd5 = md5($senha);

    $query = "SELECT * FROM user WHERE email = ? AND senha = ?";
    $stmt = mysqli_prepare($conexao, $query);
    
    if ($stmt === false) {
        throw new Exception("Erro na preparação da query: " . mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmt, 'ss', $email, $senhaMd5);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($exibe = mysqli_fetch_array($resultado)) {
        $_SESSION['usuarioCodigo'] = $exibe['id'];
        $_SESSION['usuario'] = $exibe['nome'];
        $_SESSION['usuarioEmail'] = $exibe['email'];
        
        $response = [
            'success' => true,
            'redirectUrl' => $exibe['tipo'] === "Administrativo" && $exibe['user_status'] === "Em análise" 
                ? "../views/analise.php" 
                : "../cms/home.php"
        ];
        
        echo json_encode($response);
    } else {
        throw new Exception("Usuário não encontrado ou senha incorreta.");
    }

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);
?>