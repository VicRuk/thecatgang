<?php
include("../models/conexao.php");
session_start();

function sanitizarEntrada($conexao, $entrada) {
    return mysqli_real_escape_string($conexao, trim($entrada));
}

$email = sanitizarEntrada($conexao, $_POST["email"]);
$senha = $_POST["senha"];
$senhaMd5 = md5($senha);

$query = "SELECT * FROM user WHERE email = ? AND senha = ?";
$stmt = mysqli_prepare($conexao, $query);
if ($stmt === false) {
    die("Erro na preparação da query: " . mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, 'ss', $email, $senhaMd5);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if ($exibe = mysqli_fetch_array($resultado)) {
    $_SESSION['usuarioCodigo'] = $exibe['id'];
    $_SESSION['usuario'] = $exibe['nome'];
    $_SESSION['usuarioEmail'] = $exibe['email'];
    
    if ($exibe['tipo'] === "Administrativo" && $exibe['user_status'] === "Em análise") {
        header("Location: ../views/analise.php");
    } elseif ($exibe['tipo'] === "Administrativo" && $exibe['user_status'] === "Aprovado") {
        header("Location: ../cms/home.php");
    }
    exit();
} else {
    echo "Usuário não encontrado ou senha incorreta.";
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);
?>