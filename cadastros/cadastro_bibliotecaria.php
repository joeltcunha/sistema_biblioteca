<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Bibliotecária</title>
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
    $sql = "SELECT idTurmas, turma FROM Turmas";
    $result = $conn->query($sql);
    $turmas = [];
    while ($linha = $result->fetch_assoc()) {
        $turmas [] = $linha;
    }
    $sql = "SELECT idtipoUsuarios, tipo_usuario FROM tipoUsuarios";
    $result = $conn->query($sql);
    $tipos = [];
    while ($linha = $result->fetch_assoc()) {
        $tipos [] = $linha;
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
        <a href="cadastro_categoria.php" class="sidebar-item">CADASTRAR CATEGORIA</a>
        <a href="cadastro_bibliotecaria.php" class="sidebar-item active">CADASTRAR BIBLIOTECÁRIA</a>
    </aside>
    
    <main class="admin-content">
        <form action="../php/cadastros/cadastrar_bibliotecaria.php" method="POST" class="cad-container">
            
            <input type="hidden" id="tabela" name="tabela" value="CadastroBibliotecarias">

            <h2 class="page-title" style="margin-bottom: 10px;">Cadastro de Bibliotecária</h2>

            <div>
            <label class="cad-label" for="nome">Nome</label>
            <input type="text" id="nome" name="nome_bibliotecaria" class="cad-input" required>
            </div>

            <div>
            <label class="cad-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="cad-input" required>
            </div>


            <div class="form-row-2">
            <div>
                <label class="cad-label" for="senha_hash">Senha</label>
                <input type="password" id="senha_hash" name="senha_hash" class="cad-input" required>
            </div>
            <div>
                <label class="cad-label" for="confirmacao_senha">Confirmação de Senha</label>
                <input type="password" id="confirmacao_senha" name="confirmacao_senha" class="cad-input" required>
            </div>
            </div>

            <div class="cad-buttons">
            <button type="reset" class="btn-cancel">Cancelar</button>
            <button type="submit" class="btn-submit">Cadastrar</button>
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

</body>
</html>