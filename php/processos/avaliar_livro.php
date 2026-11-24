<?php
include("../includes/inserir.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = $_POST;

    session_start();
    if(!isset($_SESSION['login']) || !$_SESSION['login']){
        header("Location: ../../processos/login.php");
        exit;
    } 
    
    if (!empty($_SESSION['aluno']) && isset($_SESSION['idUsuario'])) {
        $dados['idUsuario'] = (int) $_SESSION['idUsuario'];
    } elseif (!empty($_SESSION['funcionario']) && isset($_SESSION['idFuncionario'])) {
        $dados['idCadastroFuncionarios'] = (int) $_SESSION['idFuncionario'];
    } elseif (!empty($_SESSION['bibliotecaria']) && isset($_SESSION['idBibliotecaria'])) {
        $dados['idCadastroBibliotecarias'] = (int) $_SESSION['idBibliotecaria'];
    } else {
        http_response_code(403);
        exit("Erro ao avaliar.");
    }

    if($dados['nota_avaliacao'] < 1 || $dados['nota_avaliacao'] > 5) {
        http_response_code(400);
        exit("Nota inválida.");
    }

    $tabela = $dados['tabela'];
    unset($dados['tabela']);

    $dados['tipo_interacao'] = 'Avaliado';


    $colunas = array_keys($dados);
    $valores = array_values($dados);

    $resultado = funcao_insert($colunas, $valores, $tabela);
    if ($resultado !== false) {
        header("Location: ../../usuarios/visualizarLivro.php?idLivro=" . $dados['idLivro']);
        exit();
    } else {
        http_response_code(500);
        exit("Erro ao avaliar.");
    }
   
} else {
    http_response_code(405);
    exit("Método inválido.");
}
