<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
    header("Location: ../../processos/login.php");
    exit();
}

include("../includes/inserir.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = $_POST;
    
    if($dados['senha_hash'] !== $dados['confirmacao_senha']) {
        echo "As senhas não coincidem.";
        exit;
    }

    unset($dados['confirmacao_senha']);

    $dados['senha_hash'] = password_hash($dados['senha_hash'], PASSWORD_DEFAULT);
    $dados['createdAt'] = date('Y-m-d H:i:s');

    $tabela = $dados['tabela'];
    unset($dados['tabela']);
    
    $colunas = array_keys($dados);
    $valores = array_values($dados);
    $resultado = funcao_insert($colunas, $valores, $tabela);
    if ($resultado !== false) {
        header("Location: ../../retornos/operacao_sucesso.php");
        exit();
    } else {
        http_response_code(500);
        exit("Erro ao inserir a bibliotecária.");
    }

} else {
    http_response_code(405);
    exit("Método inválido.");
}