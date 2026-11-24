<?php
header('Content-Type: application/json');
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
    header("Location: ../../processos/login.php");
    exit();
}
include '../includes/conexao.php';

$idLivro = $_GET['id'] ?? '';

if (empty($idLivro)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Número não informado.']);
    exit();
}

try {
    $conn = conectar();
    $sql = "SELECT titulo FROM Livros WHERE numero = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idLivro);
    $stmt->execute();
    $result = $stmt->get_result();
    $livro = $result->fetch_assoc();
    if($livro){
        echo json_encode([
            'sucesso' => true,
            'titulo'  => $livro['titulo']
        ]);
        exit();
    } else {
        echo json_encode([
            'sucesso'  => false,
            'mensagem' => 'Livro não encontrado.'
        ]);
        exit();
    }

    $stmt->close();
    $conn->close();
    exit();
} catch (Exception $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro:' . $e->getMessage()]);
    exit();
}