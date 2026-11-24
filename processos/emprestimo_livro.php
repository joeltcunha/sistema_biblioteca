<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Empréstimo de Livro</title>
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
    $sql = "SELECT idTurmas, turma FROM Turmas";
    $result = $conn->query($sql);
    $turmas = [];
    while ($linha = $result->fetch_assoc()) {
        $turmas [] = $linha;
    }
    $sql = "SELECT idUsuario, nome FROM CadastroAlunos ORDER BY nome ASC";
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
<body class="body-processo">

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
    <a href="emprestimo_livro.php" class="sidebar-item active">EMPRÉSTIMO DE LIVRO</a>
    <a href="emprestimo_eletronicos.php" class="sidebar-item">EMPRÉSTIMO DE ITENS ELETRÔNICOS E KITS</a>
    <a href="devolucao.php" class="sidebar-item">DEVOLUÇÃO DE LIVRO</a>
    <a href="verificar_pendencias.php" class="sidebar-item">PENDÊNCIAS DE ALUNO</a>
  </aside>

  <main class="admin-content">
    <h2 class="page-title" style="margin-bottom: 25px;">Empréstimo de Livro</h2>

    <form action="../php/processos/emprestar_livro.php" method="POST" class="form-container-processo">

      <input type="hidden" id="tabela" name="tabela" value="emprestimoLivro">

      <div class="form-inline-row">
        <label class="cad-label">Nº</label>
        <input type="text" class="cad-input" id="numero" name="numero" style="width: 80px;" required>
        
        <label class="cad-label" style="margin-left: 10px;">Livro</label>
        <input type="text" class="cad-input" id="titulo" style="flex: 1;width: 100%" readonly>
      </div>

      <div class="form-inline-row">
        <label class="cad-label">Aluno</label>
        <input type="text" id="aluno" class="cad-input" style="flex: 1;" list="alunos-list" required>
        <datalist id="alunos-list">
          <?php foreach ($alunos as $aluno): ?>
            <option data-id="<?= $aluno['idUsuario'] ?>" value="<?= $aluno['nome'] ?>"></option>
          <?php endforeach; ?>
        </datalist>

        <input type="hidden" id="idUsuario" name="idUsuario">

        <label class="cad-label">Turma</label>
        <select class="cad-input" id="turma" name="turma" style="width: 90px;" required>
            <option value=""></option>
            <?php foreach ($turmas as $turma): ?>
                <option value="<?= $turma['idTurmas'] ?>"><?= $turma['turma'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>

      <div class="form-inline-row">
        <label class="cad-label" style="margin-left: 5px;">Data empréstimo</label>
        <input type="date" id="data_emprestimo" class="cad-input" <?= 'value="' . htmlspecialchars(date('Y-m-d')) . '"'; ?> readonly>
      </div>

      <div class="form-inline-row">
        <label class="cad-label" style="margin-left: 5px;">Data máxima para Devolução</label>
        <input type="date" id="data_devolucao_prevista" class="cad-input" <?= 'value="' . htmlspecialchars(date('Y-m-d', strtotime('+7 days'))) . '"'; ?> readonly>
      </div>

      <div class="action-buttons">
        <button type="button" id="btn-cancel" class="btn-cancel">Cancelar</button>
        <button type="submit" class="btn-submit">Salvar</button>
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
<script>
  document.getElementById('btn-cancel').addEventListener('click', function() {
    window.location.href = '../index.php';
  });
  document.getElementById('aluno').addEventListener('input', function(event) {
    const inputAluno = event.target;
    const selectedOption = Array.from(document.getElementById('alunos-list').options).find(option => option.value === inputAluno.value);
    const idUsuarioInput = document.getElementById('idUsuario');

    if (selectedOption) {
        idUsuarioInput.value = selectedOption.dataset.id;
    } else {
        idUsuarioInput.value = '';
    }
  });

  document.getElementById('numero').addEventListener('change', function() {
    const numero = this.value.trim();
    const inputTitulo = document.getElementById('titulo');
    console.log(numero);

      if (!numero) {
        inputTitulo.value = '';
        return;
    }
      fetch(`../php/buscas/buscar_livro.php?id=${encodeURIComponent(numero)}`)
        .then(response => response.json())
        .then(data => {
            if (data.sucesso) {
                inputTitulo.value = data.titulo;
            } else {
                inputTitulo.value = '';
                alert(data.mensagem);
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
            inputTitulo.value = 'erro';
        });
  });

  document.querySelector('.form-container-processo').addEventListener('submit', function(event) {
    const idUsuario = document.getElementById('idUsuario').value;
    if (!idUsuario) {
        event.preventDefault();
        alert('Selecione um aluno válido a partir da lista de sugestões.');
    }
});
  

</script>

</body>
</html>
