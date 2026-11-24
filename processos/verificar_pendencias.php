<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificar Pendências</title>
  <link rel="icon" href="../imgs/Ellipse%203.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css">
</head>
<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
    header("Location: login.php");
    exit();
}
include '../php/includes/conexao.php';
    try {
        $conn = conectar();
        $sql = "SELECT nome FROM CadastroAlunos ORDER BY nome ASC";
        $result = $conn->query($sql);
        $alunos = [];
        while ($linha = $result->fetch_assoc()) {
            $alunos [] = $linha;
        }
        $conn->close();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
?>
<body>

<header>
  <div class="header-left">
    <img src="../imgs/Ellipse%203.png" alt="Logo EEMLMB" class="logo">
    <h1>EEMLMB</h1>
  </div>
  <nav>
    <a href="../index.php">INÍCIO</a>
    <a href="https://www.mg.gov.br/instituicao_unidade/escola-estadual-maria-luiza-miranda-bastos" target="_blank" rel="noopener noreferrer">SOBRE</a>
    <a href="../cadastros/cadastro_livro.php">CADASTROS</a>
    <a href="emprestimo_livro.php">EMPRÉSTIMOS</a>
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
    <a href="emprestimo_livro.php" class="sidebar-item">EMPRÉSTIMO DE LIVRO</a>
    <a href="emprestimo_eletronicos.php" class="sidebar-item">EMPRÉSTIMO DE ITENS ELETRÔNICOS E KITS</a>
    <a href="devolucao.php" class="sidebar-item">DEVOLUÇÃO DE LIVRO</a>
    <a href="verificar_pendencias.php" class="sidebar-item active">PENDÊNCIAS DE ALUNO</a>
  </aside>
  <main>
    <div class="cad-container" style="max-width: 550px">
      <h2 class="page-title" style="margin-bottom: 10px;">Verificar Pendências</h2>

      <!-- Campo de Busca -->
      <form class="search-section">
        <label for="busca-nome">Nome</label>
        <input type="text" id="nome" name="nome" class="search-pendencias" list="alunos-list" onfocus=this.value="" placeholder="Digite o nome do aluno" autocomplete="off" <?php if(isset($_GET['nome'])) echo 'value="' . htmlspecialchars($_GET['nome']) . '"'; ?>>
        <datalist id="alunos-list">
          <?php foreach ($alunos as $aluno): ?>
            <option value="<?= $aluno['nome'] ?>"><?= $aluno['nome'] ?></option>
          <?php endforeach; ?>
        </datalist>
        <button type="submit" class="btn-blue-action">Buscar</button>
        <?php
          if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nome']) && !empty($_GET['nome'])) {
              $nomeAluno = $_GET['nome'];
              try {
                  $conn = conectar();
                  $sql = "SELECT 
                    T.turma,
                    L.titulo
                  FROM emprestimoLivro EL
                  INNER JOIN CadastroAlunos A ON EL.idUsuario = A.idUsuario
                  INNER JOIN Turmas T ON A.idTurmas = T.idTurmas
                  INNER JOIN Livros L ON EL.idLivro = L.idLivro
                  WHERE EL.status_emprestimo IN ('Ativo', 'Atrasado')
                    AND A.nome = '$nomeAluno'";
                  $result = $conn->query($sql);
                  $dados = [];
                  while ($linha = $result->fetch_assoc()) {
                    $dados [] = $linha;
                    }
              } catch (Exception $e) {
                  echo "Erro: " . $e->getMessage();
              }
            }
        ?>
      </form>

      <!-- Tabela de Resultados -->
      <div class="table-box">
        <div class="table-header">
          <span>Turma</span>
          <span>Livro(s) pendentes</span>
        </div>
        <div class="table-body">
          <?php if (!empty($dados)): ?>
            <?php foreach ($dados as $dado): ?>
              <div class="table-row">
                <span><?= $dado['turma'] ?></span>
                <span><?= $dado['titulo'] ?></span>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="table-row">
              <span colspan="2">Nenhum resultado encontrado.</span>
            </div>
          <?php endif; ?>
          <!-- Exemplo de linha preenchida (pode ser gerada dinamicamente com JS no futuro) -->
          <!--
          <div class="table-row">
            <span>1001</span>
            <span>Capitães da Areia</span>
          </div>
          -->
        </div>
      </div>

      <!-- Botão Notificar -->
      <div class="action-row">
        <button type="button" class="btn-blue-action">Notificar aluno</button>
      </div>
    </div>
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