<?php

include '../includes/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $dados = $_POST;
    try {
        $conn = conectar();
        $sql = "SELECT idCadastroBibliotecarias, nome_bibliotecaria, senha_hash FROM CadastroBibliotecarias WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $dados['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $bibliotecaria = $result->fetch_assoc();
            if($bibliotecaria && password_verify($dados['senha'], $bibliotecaria['senha_hash'])) {
                $_SESSION = [];
                session_regenerate_id(true);
                $_SESSION['idBibliotecaria'] = $bibliotecaria['idCadastroBibliotecarias'];
                $_SESSION['nome'] = $bibliotecaria['nome_bibliotecaria'];
                $_SESSION['bibliotecaria'] = true;
                $_SESSION['login'] = true;
                header("Location: ../../processos/emprestimo_livro.php");
                exit();
            } else {
                echo "Email ou senha incorretos.";
            }
        }

        $sql = "SELECT idCadastroFuncionarios, nome, senha_hash FROM CadastroFuncionarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $dados['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $funcionario = $result->fetch_assoc();
            if($funcionario && password_verify($dados['senha'], $funcionario['senha_hash'])) {
                $_SESSION = [];
                session_regenerate_id(true);
                $_SESSION['idFuncionario'] = $funcionario['idCadastroFuncionarios'];
                $_SESSION['nome'] = $funcionario['nome'];
                $_SESSION['funcionario'] = true;
                $_SESSION['login'] = true;
                header("Location: ../../index.php");
                exit();
            } else {
                echo "Email ou senha incorretos.";
            }
        }

        $sql = "SELECT idUsuario, nome, senha_hash FROM CadastroAlunos WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $dados['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $aluno = $result->fetch_assoc();
            if($aluno && password_verify($dados['senha'], $aluno['senha_hash'])) {
                $_SESSION = [];
                session_regenerate_id(true);
                $_SESSION['idUsuario'] = $aluno['idUsuario'];
                $_SESSION['nome'] = $aluno['nome'];
                $_SESSION['aluno'] = true;
                $_SESSION['login'] = true;
                header("Location: ../../index.php");
                exit();
            } else {
                echo "Email ou senha incorretos.";
            }
        }

        $stmt->close();
        $conn->close();

        echo "Email ou senha incorretos.";
        header("Location: ../../processos/login.php");
        exit();

    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    http_response_code(405);
    exit("Método inválido.");
}
