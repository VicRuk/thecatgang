<?php
header('Content-Type: application/json');

try {
    include("../models/conexao.php");

    $data = json_decode(file_get_contents('php://input'), true);
    $busca = isset($data['busca']) ? $data['busca'] : '';

    $query = "SELECT * FROM gato";
    if (!empty($busca)) {
        $busca = mysqli_real_escape_string($conexao, $busca);
        $query .= " WHERE nome LIKE '%$busca%'";
    }
    $query .= " ORDER BY id DESC";

    // Executar a query
    $result = mysqli_query($conexao, $query);

    if ($result === false) {
        throw new Exception(mysqli_error($conexao));
    }

    $gatos = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $gatos[] = [
            'id' => $row['id'],
            'nome' => $row['nome'],
            'descricao' => $row['descricao'],
            'foto' => $row['foto'],
            'castrado' => $row['castrado'],
            'alocado_clinica' => $row['alocado_clinica'],
            'doacao' => $row['doacao']
        ];
    }

    echo json_encode([
        'success' => true,
        'gatos' => $gatos
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Erro ao buscar gatos: ' . $e->getMessage()
    ]);
} finally {
    if (isset($conexao)) {
        mysqli_close($conexao);
    }
}
?>