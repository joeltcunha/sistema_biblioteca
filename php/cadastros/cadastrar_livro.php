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

    if(isset($_FILES['capa_imagem']) && $_FILES['capa_imagem']['error'] === UPLOAD_ERR_OK){
        $nomeOriginal = $_FILES['capa_imagem']['name'];
        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
        
        $extesoesPermitidas = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array($extensao, $extesoesPermitidas)) {
            $pastaDestino = "../../php/uploads/";
            if (!is_dir($pastaDestino)) {
                mkdir($pastaDestino, 0755, true);
            }
            
            // Cria um nome único usando md5 + timestamp para evitar duplicidade
            $novoNome = md5(uniqid(rand(), true)) . "php." . $extensao;
            $caminhoCompleto = $pastaDestino . $novoNome;

            if (move_uploaded_file($_FILES['capa_imagem']['tmp_name'], $caminhoCompleto)) {
                $dados['capa_url'] = $caminhoCompleto;
            } else {
                http_response_code(500);
                exit("Erro ao mover o arquivo para o destino.");
            }
        } else {
            http_response_code(400);
            exit("Extensão de arquivo não permitida. Apenas jpg, jpeg, png e webp são aceitos.");
        }
    } elseif (!empty($dados['capa_url'])) {
        // Mantém o valor de $dados['capa_url'] informado pelo usuário
    } else {
        $dados['capa_url'] = null;
    }
    

    $autores = (array) $dados['idAutor'];
    $generos = (array) $dados['idGenero'];
    if(isset($dados['idTradutor'])){
        $tradutores = (array) $dados['idTradutor'];
        unset($dados['idTradutor']);
    }
    unset($dados['idAutor']);
    unset($dados['idGenero']);

    $dados['createdAt'] = date('Y-m-d H:i:s');
    $colunas = array_keys($dados);
    $valores = array_values($dados);

    $idLivro = funcao_insert($colunas, $valores, $tabela);
    if ($idLivro === false) {
        http_response_code(500);
        exit("Erro ao inserir o livro.");
    }

    // Inserir autores,gêneros e tradutores nas tabelas de relacionamento
    foreach ($autores as $autor) {
        funcao_insert(['idAutor', 'idLivro'], [$autor, $idLivro], 'Autor_has_Livros');
    }
    foreach ($generos as $genero) {
        funcao_insert(['idGenero', 'idLivro'], [$genero, $idLivro], 'Genero_has_Livros');
    }
    if(!empty($tradutores)){
        foreach ($tradutores as $tradutor) {
            funcao_insert(['idTradutor', 'idLivro'], [$tradutor, $idLivro], 'Tradutor_has_Livros');
        }
    }
    
    header("Location: ../../retornos/operacao_sucesso.php");
    exit();

} else {
    http_response_code(405);
    exit("Método inválido.");
}
