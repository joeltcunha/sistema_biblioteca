<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
    header("Location: ../../processos/login.php");
    exit();
}

include '../includes/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = $_POST;


    $tabela = $dados['tabela'];
    unset($dados['tabela']);


    $dados['updatedAt'] = date('Y-m-d H:i:s');
    $dados['status_emprestimo'] = 'Devolvido';
    $dados['data_devolucao_real'] = date('Y-m-d');
    $dados['idCadastroBibliotecarias'] = $_SESSION['idBibliotecaria'];


    try{
        $conn = conectar();
        $sql = "UPDATE $tabela SET data_devolucao_real = ?, status_emprestimo = ?, updatedAt = ?, idCadastroBibliotecarias = ? WHERE idEmprestimoLivro = ? AND NOT status_emprestimo = 'Devolvido'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssi",
            $dados['data_devolucao_real'],
            $dados['status_emprestimo'],
            $dados['updatedAt'],
            $dados['idCadastroBibliotecarias'],
            $dados['idEmprestimoLivro']
        );
        $stmt->execute();
        $resultado = $stmt->affected_rows > 0 ? 'sucesso' : 'falhou';
        $stmt->close();
        $conn->close();
        header('Location: ../../processos/devolucao.php?devolucao=' . $resultado);
        exit;
    }catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }

    

} else {
    http_response_code(405);
    exit("Método inválido.");
}
