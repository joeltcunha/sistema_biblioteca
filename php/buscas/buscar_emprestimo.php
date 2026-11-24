<?php
header('Content-Type: application/json');

session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
    header("Location: ../../processos/login.php");
    exit();
}

include '../includes/conexao.php';

$numero = $_GET['numero'] ?? '';
$idUsuario = $_GET['idUsuario'] ?? '';

if (empty($numero) || empty($idUsuario)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Dados incompletos.']);
    exit;
}

try {
    $conn = conectar();
    
    $sql = "SELECT EL.idEmprestimoLivro 
            FROM emprestimoLivro EL
            JOIN Livros L ON EL.idLivro = L.idLivro
            WHERE L.numero = ? 
              AND EL.idUsuario = ? 
              AND EL.status_emprestimo != 'Devolvido'
            LIMIT 1";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $numero, $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($linha = $result->fetch_assoc()) {
        echo json_encode([
            'sucesso' => true,
            'idEmprestimoLivro' => $linha['idEmprestimoLivro']
        ]);
    } else {
        echo json_encode([
            'sucesso' => false,
            'mensagem' => 'Nenhum empréstimo ativo encontrado para este aluno e livro.'
        ]);
    }

    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro interno no servidor.']);
}