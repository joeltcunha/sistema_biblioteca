<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
    header("Location: ../../processos/login.php");
    exit();
}
include("../includes/inserir.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = $_POST;

    if (isset($dados['itens_acompanham'])) {
        unset($dados['itens_acompanham']);
    }


    $tabela = $dados['tabela'];
    unset($dados['tabela']);

    
    $dados['createdAt'] = date('Y-m-d H:i:s');

    $colunas = array_keys($dados);
    $valores = array_values($dados);

    $resultado = funcao_insert($colunas, $valores, $tabela);
    if ($resultado !== false) {
        header("Location: ../../retornos/operacao_sucesso.php");
        exit();
    } else {
        http_response_code(500);
        exit("Erro ao cadastrar o material.");
    }
   
} else {
    http_response_code(405);
    exit("Método inválido.");
}
