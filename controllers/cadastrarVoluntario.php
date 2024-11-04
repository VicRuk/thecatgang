<?php
include("../models/conexao.php");

function sanitizarEntrada($entrada) {
    return htmlspecialchars(strip_tags(trim($entrada)));
}

function executarQuery($conexao, $query, $tipos, $parametros) {
    $stmt = mysqli_prepare($conexao, $query);
    
    if ($stmt === false) {
        echo json_encode([
            'success' => false,
            'message' => 'Erro na preparação da query'
        ]);
        exit;
    }

    mysqli_stmt_bind_param($stmt, $tipos, ...$parametros);
    $executado = mysqli_stmt_execute($stmt);
    
    if ($executado) {
        mysqli_stmt_close($stmt);
        header("location: ../views/analise.php");
        exit;
    } else {
        mysqli_stmt_close($stmt);
        echo json_encode([
            'success' => false,
            'message' => 'Erro ao cadastrar o Usuário'
        ]);
        exit;
    }
}

// Sanitiza os dados básicos
$nome = sanitizarEntrada($_POST["nome"]);
$email = sanitizarEntrada($_POST["email"]);
$dataNascimento = sanitizarEntrada($_POST["data_nascimento"]);
$cpf = sanitizarEntrada($_POST["cpf"]);
$insta = sanitizarEntrada($_POST["insta"]);
$celular = sanitizarEntrada($_POST["celular"]);
$tipo = sanitizarEntrada($_POST["tipo"]);

// Validações básicas
if (empty($nome) || empty($email) || empty($dataNascimento) || empty($cpf) || empty($celular)) {
    echo json_encode([
        'success' => false,
        'message' => 'Todos os campos obrigatórios devem ser preenchidos'
    ]);
    exit;
}

if ($tipo == "Administrativo") {
    $senha = sanitizarEntrada($_POST["senha"]);
    $senhamd5 = md5($senha);
    $estudante = sanitizarEntrada($_POST["estudante"]);
    $escolaridade = sanitizarEntrada($_POST["escolaridade"]);
    $curso_graduacao = sanitizarEntrada($_POST["curso_graduacao"]);
    $periodo_graduacao = sanitizarEntrada($_POST["periodo_graduacao"]);
    $area_atuacao = sanitizarEntrada($_POST["area_atuacao"]);
    $funcoes = isset($_POST["funcoes"]) ? implode(",", array_map('sanitizarEntrada', $_POST["funcoes"])) : '';
    $funcoes_interesse = sanitizarEntrada($_POST["funcoes_interesse"]);
    $razao = sanitizarEntrada($_POST["razao"]);
    $certificado = sanitizarEntrada($_POST["certificado"]);
    $disponibilidade = sanitizarEntrada($_POST["disponibilidade"]);
    $observacao = sanitizarEntrada($_POST["observacao"]);
    $amor = sanitizarEntrada($_POST["amor"]);
    $newsletter = sanitizarEntrada($_POST["newsletter"]);

    $query = "INSERT INTO user (nome, data_nascimento, email, celular, cpf, insta, senha, tipo, 
              estudante, escolaridade, curso_graduacao, periodo_graduacao, area_atuacao, funcoes, 
              funcoes_interesse, razao, certificado, disponibilidade, observacao, amor, newsletter) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
              
    executarQuery($conexao, $query, 'sssssssssssssssssssss', [
        $nome, $dataNascimento, $email, $celular, $cpf, $insta, $senhamd5, $tipo,
        $estudante, $escolaridade, $curso_graduacao, $periodo_graduacao, $area_atuacao,
        $funcoes, $funcoes_interesse, $razao, $certificado, $disponibilidade,
        $observacao, $amor, $newsletter
    ]);

} elseif ($tipo == "Lar Voluntário") {
    $mora_em = sanitizarEntrada($_POST["mora_em"]);
    $pets = sanitizarEntrada($_POST["pets"]);
    $pets_quais = sanitizarEntrada($_POST["pets_quais"]);
    $pets_vacinas = sanitizarEntrada($_POST["pets_vacinas"]);
    $pets_testados = sanitizarEntrada($_POST["pets_testados"]);
    $pets_castrados = sanitizarEntrada($_POST["pets_castrados"]);
    $bairro = sanitizarEntrada($_POST["bairro"]);
    $endereco = sanitizarEntrada($_POST["endereco"]);
    $newsletter = sanitizarEntrada($_POST["newsletter"]);

    $query = "INSERT INTO user (nome, data_nascimento, email, celular, cpf, insta, tipo, 
              mora_em, pets, pets_quais, pets_vacinas, pets_testados, pets_castrados, 
              bairro, endereco, newsletter) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
              
    executarQuery($conexao, $query, 'ssssssssssssssss', [
        $nome, $dataNascimento, $email, $celular, $cpf, $insta, $tipo,
        $mora_em, $pets, $pets_quais, $pets_vacinas, $pets_testados,
        $pets_castrados, $bairro, $endereco, $newsletter
    ]);

} elseif ($tipo == "Carona") {
    $estudante = sanitizarEntrada($_POST["estudante"]);
    $escolaridade = sanitizarEntrada($_POST["escolaridade"]);
    $curso_graduacao = sanitizarEntrada($_POST["curso_graduacao"]);
    $periodo_graduacao = sanitizarEntrada($_POST["periodo_graduacao"]);
    $area_atuacao = sanitizarEntrada($_POST["area_atuacao"]);
    $funcoes = isset($_POST["funcoes"]) ? implode(",", array_map('sanitizarEntrada', $_POST["funcoes"])) : '';
    $funcoes_interesse = sanitizarEntrada($_POST["funcoes_interesse"]);
    $carona_disponibilidade = sanitizarEntrada($_POST["carona_disponibilidade"]);
    $razao = sanitizarEntrada($_POST["razao"]);
    $certificado = sanitizarEntrada($_POST["certificado"]);
    $disponibilidade = sanitizarEntrada($_POST["disponibilidade"]);
    $observacao = sanitizarEntrada($_POST["observacao"]);
    $amor = sanitizarEntrada($_POST["amor"]);
    $newsletter = sanitizarEntrada($_POST["newsletter"]);

    $query = "INSERT INTO user (nome, data_nascimento, email, celular, cpf, insta, tipo, 
              estudante, escolaridade, curso_graduacao, periodo_graduacao, area_atuacao, 
              funcoes, funcoes_interesse, carona_disponibilidade, razao, certificado, 
              disponibilidade, observacao, amor, newsletter) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
              
    executarQuery($conexao, $query, 'sssssssssssssssssssss', [
        $nome, $dataNascimento, $email, $celular, $cpf, $insta, $tipo,
        $estudante, $escolaridade, $curso_graduacao, $periodo_graduacao,
        $area_atuacao, $funcoes, $funcoes_interesse, $carona_disponibilidade,
        $razao, $certificado, $disponibilidade, $observacao, $amor, $newsletter
    ]);
}
?>