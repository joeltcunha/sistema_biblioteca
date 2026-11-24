<?php
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

    if($dados['aceitou_notificacoes'] != 1){
        $dados['aceitou_notificacoes'] = 0;
    }

    if($dados['aceitou_novidades'] != 1){
        $dados['aceitou_novidades'] = 0;
    }

    if($dados['idtipoUsuarios'] == 0){
        unset($dados['idtipoUsuarios']);

        $colunas = array_keys($dados);
        $valores = array_values($dados);
        $tabela = "CadastroAlunos";
        $resultado = funcao_insert($colunas, $valores, $tabela);

    } else {
        unset($dados['idTurmas']);
        $colunas = array_keys($dados);
        $valores = array_values($dados);
        $tabela = "CadastroFuncionarios";
        $resultado = funcao_insert($colunas, $valores, $tabela);

    }

    if ($resultado !== false) {
        header("Location: ../../retornos/cadastro_sucesso.php");
        exit();
    } else {
        http_response_code(500);
        exit("Erro ao cadastrar usuário.");
    }

} else {
    http_response_code(405);
    exit('Método inválido.');
}