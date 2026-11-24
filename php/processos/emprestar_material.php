<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
    header("Location: ../../processos/login.php");
    exit();
}

include("../includes/inserir.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = $_POST;


    $tabela = $dados['tabela'];
    unset($dados['tabela']);




    $dados['createdAt'] = date('Y-m-d H:i:s');
    $dados['horario_emprestimo'] = date('H:i');
    $dados['idCadastroBibliotecarias'] = $_SESSION['idBibliotecaria'];

    $materiais = (array) ($dados['idMaterial'] ?? []);
    unset($dados['idMaterial']);

    if (($dados['idUsuario'] ?? '') === '') {
        unset($dados['idUsuario']);
    }

    $colunas = array_keys($dados);
    $valores = array_values($dados);

    

    $idEmprestimo = funcao_insert($colunas, $valores, $tabela);

    if ($idEmprestimo === false) {
        http_response_code(500);
        exit("Erro ao realizar empréstimo.");
    }

    foreach ($materiais as $material) {
        funcao_insert(['idMaterial', 'idEmprestimoMaterial'], [$material, $idEmprestimo], 'Material_has_EmprestimoMaterial');
    }

    header("Location: ../../retornos/operacao_sucesso.php");
    exit();

} else {
    http_response_code(405);
    exit("Método inválido.");
}
