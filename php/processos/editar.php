<?php

include("../includes/inserir.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
        header("Location: ../../processos/login.php");
        exit();
    }
    
    $dados = $_POST;

    $tabela = $dados['tabela'];
    unset($dados['tabela']);
    $colunas = array_keys($dados);
    if (count($colunas) < 2) {
        http_response_code(400);
        exit("Dados insuficientes para edição.");
    }

    try{
        $conn = conectar();
        $sql = "UPDATE $tabela SET $colunas[1] = ? WHERE $colunas[0] = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $dados[$colunas[1]], $dados[$colunas[0]]);
        $stmt->execute();
        $resultado = $stmt->affected_rows > 0 ? true : false;
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        http_response_code(500);
        exit("Erro ao editar.");
    }
    if ($resultado !== false) {
        header("Location: ../../retornos/operacao_sucesso.php");
        exit();
    } else {
        http_response_code(500);
        exit("Erro ao editar.");
    }
   
} else {
    http_response_code(405);
    exit("Método inválido.");
}
