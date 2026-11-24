<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categoria</title>
    <link rel="icon" href="../imgs/Ellipse%203.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
    header("Location: ../processos/login.php");
    exit();
}
include '../php/includes/conexao.php';
    try {
        $conn = conectar();
        $sql = "SELECT idCategoria, nome_categoria FROM Categoria ORDER BY nome_categoria ASC";
        $result = $conn->query($sql);
        $categorias = [];
        while ($linha = $result->fetch_assoc()) {
            $categorias [] = $linha;
        }
        $conn->close();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
?>
<body class="body-cadastro">

<header>
    <div class="header-left">
        <img src="../imgs/Ellipse%203.png" alt="Logo EEMLMB" class="logo">
        <h1>EEMLMB</h1>
    </div>
    <nav>
        <a href="../index.php">INÍCIO</a>
        <a href="https://www.mg.gov.br/instituicao_unidade/escola-estadual-maria-luiza-miranda-bastos" target="_blank" rel="noopener noreferrer">SOBRE</a>
        <a href="cadastro_livro.php">CADASTROS</a>
        <a href="../processos/emprestimo_livro.php">EMPRÉSTIMOS</a>
    </nav>
    <div class="header-right">
        <div class="user-icon">
            <a href="../php/processos/logout.php" title="Sair" aria-label="Sair" onclick="return confirm('Deseja realmente sair?')">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
            </a>
        </div>
        <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank"><img src="../imgs/instagram%20(1).png" alt="Instagram" class="header-insta"></a>
    </div>
</header>

<div class="admin-layout">
    <aside class="admin-sidebar">
        <div class="sidebar-item">BEM VINDO (A) <?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : ''; ?>!</div>
        <a href="cadastro_livro.php" class="sidebar-item">CADASTRAR LIVRO</a>
        <a href="cadastro_eletronicos.php" class="sidebar-item">CADASTRAR ITENS ELETRÔNICOS E KITS</a>
        <a href="cadastro_autor.php" class="sidebar-item">CADASTRAR AUTOR</a>
        <a href="cadastro_genero.php" class="sidebar-item">CADASTRAR GÊNERO</a>
        <a href="cadastro_editora.php" class="sidebar-item">CADASTRAR EDITORA</a>
        <a href="cadastro_tradutor.php" class="sidebar-item">CADASTRAR TRADUTOR</a>
        <a href="cadastro_categoria.php" class="sidebar-item active">CADASTRAR CATEGORIA</a>
        <a href="cadastro_bibliotecaria.php" class="sidebar-item">CADASTRAR BIBLIOTECÁRIA</a>
    </aside>

    <main class="admin-content">
        
        <form action="../php/cadastros/cadastrar.php" method="POST" id="form-cadastro" class="form-container">

            <input type="hidden" id="tabela" name="tabela" value="Categoria">

            <h2 class="page-title" style="margin-bottom: 25px; text-align: left;">Cadastro de Categorias</h2>

            <div class="cad-form-group">
                <label class="cad-label" for="nome">Nome</label>
                <input type="text" id="nome" name="nome_categoria" class="cad-input" required>
            </div>

            <div class="cad-buttons">
                <button type="reset" class="btn-cancel">Cancelar</button>
                <button type="button" id="btn-edit" class="btn-edit">Editar</button>
                <button type="submit" class="btn-submit">Cadastrar</button>
            </div>
        </form>

        <form action="../php/processos/editar.php" method="POST" id="form-edicao" class="form-container" hidden style="display: none;">

            <input type="hidden" id="tabela" name="tabela" value="Categoria">

            <h2 class="page-title" style="margin-bottom: 25px; text-align: left;">Edição de Categorias</h2>

            <div class="cad-form-group">
                <label class="cad-label" for="categoria">Selecione a categoria</label>
                <input list="categoria-list" id="categoria" class="cad-input" required>
                <datalist id="categoria-list">
                            <option value="">Selecione uma categoria</option>
                            <?php foreach ($categorias as $cat): ?>
                                <option data-id="<?= $cat['idCategoria'] ?>" value="<?= $cat['nome_categoria'] ?>"></option>
                            <?php endforeach; ?>
                </datalist>
            </div>
            <div class="cad-form-group">
                <input type="hidden" id="idCategoria" name="idCategoria">
                <label class="cad-label" for="nome">Novo nome</label>
                <input type="text" id="nome" name="nome_categoria" class="cad-input">
            </div>

            <div class="cad-buttons">
                <button type="reset" id="btn-voltar" class="btn-blue">Voltar</button>
                <button type="submit" id="btn-deletar" formaction="../php/processos/deletar.php" class="btn-cancel">Deletar</button>
                <button type="submit" class="btn-submit">Editar</button>
            </div>
        </form>

    </main>
</div>

<footer>
    <div class="footer-content-wrapper">
        <h4>Escola Estadual Maria Luiza Miranda Bastos</h4>
        <div class="footer-links">
            <a href="../index.php">INÍCIO</a>
            <a href="https://www.mg.gov.br/instituicao_unidade/escola-estadual-maria-luiza-miranda-bastos" target="_blank" rel="noopener noreferrer">SOBRE A ESCOLA</a>
        </div>
        <div class="footer-info">
            Rua São José do Jacuri, 60 - Planalto - Belo Horizonte - MG | CEP 31720-370 | (31) 3443 7477<br>
            ©2026 E.E. MLMB. Todos os direitos reservados.
        </div>
    </div>
    <div class="footer-social">
        <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank" rel="noopener noreferrer"><img src="../imgs/instagram%20(1).png" alt="Instagram"></a>
        <a href="https://www.facebook.com/pages/Escola-Estadual-Maria-Luiza-Miranda-Bastos/196619360362700" target="_blank" rel="noopener noreferrer"><img src="../imgs/facebook.png" alt="Facebook"></a>
        <a href="https://api.whatsapp.com/send?phone=553134437477" target="_blank" rel="noopener noreferrer"><img src="../imgs/whastapp.png" alt="WhatsApp"></a>
    </div>
</footer>

<script src="../js/script.js"></script>
<script>
    sincronizarDatalist('categoria', 'idCategoria', 'categoria-list');
    validarDatalist('categoria', 'categoria-list');
</script>

</body>
</html>