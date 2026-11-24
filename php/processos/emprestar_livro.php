<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
    header("Location: ../../processos/login.php");
    exit();
}

include("../includes/inserir.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = $_POST;


    $camposObrigatorios = ['idUsuario', 'numero', 'turma', 'tabela'];
    $erros = [];

    foreach ($camposObrigatorios as $campo) {
        if (!isset($dados[$campo]) || trim($dados[$campo]) === '') {
            $erros[] = "O campo '$campo' é obrigatório.";
        }
    }

    if (!empty($erros)) {
        http_response_code(400);
        foreach ($erros as $erro) {
            echo $erro . "\n";
        }
        exit;
    }

    $tabela = $dados['tabela'];
    unset($dados['tabela']);

    $dados['idCadastroBibliotecarias'] = $_SESSION['idBibliotecaria'];

    $tabelasPermitidas = [
        'emprestimoLivro' => [
            'data_emprestimo',
            'data_devolucao_prevista',
            'status_emprestimo',
            'createdAt',
            'idCadastroBibliotecarias',
            'idUsuario',
            'idLivro',
        ],
    ];

    if (!isset($tabelasPermitidas[$tabela])) {
        http_response_code(400);
        exit('Tabela não permitida.');
    }

    
    $dados['numero'] = trim($dados['numero']);
    $dados['idUsuario'] = filter_var(
        $dados['idUsuario'] ?? null,
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1]]
    );

    if ($dados['idUsuario'] === false) {
        http_response_code(400);
        exit('Selecione um aluno válido.');
    }

    try{
        $coon = conectar();
        $sql = "SELECT idLivro FROM Livros WHERE numero = ?";
        $stmt = $coon->prepare($sql);
        $stmt->bind_param("s", $dados['numero']);
        $stmt->execute();
        $result = $stmt->get_result();
        $livro = $result->fetch_assoc();
        if (!$livro) {
            http_response_code(400);
            exit('Livro não encontrado. Confira o número informado.');
        }
        $dados['idLivro'] = (int)$livro['idLivro'];
        $stmt->close();
        $coon->close();
    } catch (Exception $e) {
        exit("Erro: " . $e->getMessage());
    }

    unset($dados['numero']);

    try {
        $conn = conectar();
        $sql = "SELECT idUsuario FROM CadastroAlunos WHERE idUsuario = ? AND idTurmas = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $dados['idUsuario'], $dados['turma']);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result->fetch_assoc()) {
            http_response_code(400);
            exit('Aluno não encontrado. Confira o aluno e turma selecionados.');
        }
        unset($dados['turma']);
        $sql = "SELECT idLivro FROM Livros WHERE idLivro = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $dados['idLivro']);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result->fetch_assoc()) {
            http_response_code(400);
            exit('Livro não encontrado. Confira o livro selecionado.');
        }
        $sql = "SELECT idCadastroBibliotecarias FROM CadastroBibliotecarias WHERE idCadastroBibliotecarias = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $dados['idCadastroBibliotecarias']);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result->fetch_assoc()) {
            http_response_code(400);
            exit('Bibliotecária não encontrada. Confira a bibliotecária selecionada.');
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        exit("Erro: " . $e->getMessage());
    }


    $dados['createdAt'] = date('Y-m-d H:i:s');
    $dados['data_emprestimo'] = date('Y-m-d');
    $dados['data_devolucao_prevista'] = date('Y-m-d', strtotime('+7 days'));
    $dados['status_emprestimo'] = 'Ativo';

    // Remove entradas com valor vazio para evitar erro de Chave Estrangeira com string ""
    foreach ($dados as $chave => $valor) {
        if ($valor === '' || $valor === null) {
            unset($dados[$chave]);
        }
    }


    $colunas = array_keys($dados);
    $valores = array_values($dados);

    foreach ($colunas as $coluna) {
    if (!in_array($coluna, $tabelasPermitidas[$tabela], true)) {
        http_response_code(400);
        exit('Coluna não permitida.');
    }
}

    $resultado = funcao_insert($colunas, $valores, $tabela);

    if ($resultado !== false) {
        header("Location: ../../retornos/operacao_sucesso.php");
        exit();
    } else {
        http_response_code(500);
        exit("Erro ao efetuar o empréstimo.");
    }
} else {
    http_response_code(405);
    exit("Método inválido.");
}
