<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Empréstimo de Itens Eletrônicos e Kits</title>
  <link rel="icon" href="../imgs/Ellipse%203.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="body-processo">
<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
    header("Location: login.php");
    exit();
}
date_default_timezone_set('America/Sao_Paulo');
  include '../php/includes/conexao.php';
  try {
    $conn = conectar();
    $sql = "SELECT idCadastroFuncionarios, nome FROM CadastroFuncionarios WHERE idtipoUsuarios = 1 ORDER BY nome ASC";
    $result = $conn->query($sql);
    $professores = [];
    while ($linha = $result->fetch_assoc()) {
      $professores[] = $linha;
    }
    $sql = "SELECT idMaterial, nome AS nomeMaterial FROM Material ORDER BY nome ASC";
    $result = $conn->query($sql);
    $materiais = [];
    while ($linha = $result->fetch_assoc()) {
      $materiais[] = $linha;
    }
    $sql = "SELECT turma FROM Turmas";
    $result = $conn->query($sql);
    $turmas = [];
    while ($linha = $result->fetch_assoc()) {
      $turmas[] = $linha;
    }
    $sql = "SELECT idUsuario, nome FROM CadastroAlunos ORDER BY nome ASC";
    $result = $conn->query($sql);
    $alunos = [];
    while ($linha = $result->fetch_assoc()) {
      $alunos[] = $linha;
    }
    $conn->close();
  } catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
  }
?>
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
    <a href="emprestimo_eletronicos.php" class="sidebar-item active">EMPRÉSTIMO DE ITENS ELETRÔNICOS E KITS</a>
    <a href="devolucao.php" class="sidebar-item">DEVOLUÇÃO DE LIVRO</a>
    <a href="verificar_pendencias.php" class="sidebar-item">PENDÊNCIAS DE ALUNO</a>
  </aside>

  <main class="admin-content">
    <h2 class="page-title" style="margin-bottom: 25px;">Empréstimo e devolução de Itens Eletrônicos e Kits</h2>

    <form action="../php/processos/emprestar_material.php" method="POST" class="form-container-processo">
      <input type="hidden" id="tabela" name="tabela" value="emprestimoMaterial">
      <div class="form-inline-row">
        <label class="cad-label" for="input_material">Material</label>
        <div class="field-tags-wrapper" style="flex: 1;">
          <div id="tags-material" class="tags-container-inline"></div>
          <input type="text" id="input_material" class="cad-input input-inline" list="materiais-list" autocomplete="off" aria-required="true">
        </div>
        <datalist id="materiais-list">
          <option value="">Selecione um material</option>
          <?php foreach ($materiais as $material): ?>
            <option data-id="<?= $material['idMaterial'] ?>" value="<?= htmlspecialchars($material['nomeMaterial'], ENT_QUOTES, 'UTF-8') ?>"></option>
          <?php endforeach; ?>
        </datalist>
      </div>

      <div class="form-inline-row">
        <label class="cad-label">Professor</label>
        <input type="text" class="cad-input" id="professor" style="flex: 1;" list="professores-list" autocomplete="off" required>
        <input type="hidden" id="idCadastroFuncionarios" name="idCadastroFuncionarios">
        <datalist id="professores-list">
          <option value="">Selecione um professor</option>
          <?php foreach ($professores as $professor): ?>
            <option data-id="<?= $professor['idCadastroFuncionarios'] ?>" value="<?= htmlspecialchars($professor['nome'], ENT_QUOTES, 'UTF-8') ?>"></option>
          <?php endforeach; ?>
        </datalist>
      </div>

      <div class="form-inline-row">
        <label class="cad-label">Aluno</label>
        <input type="text" id="aluno" class="cad-input" style="flex: 1;" list="alunos-list" autocomplete="off">
        <datalist id="alunos-list">
          <?php foreach ($alunos as $aluno): ?>
            <option data-id="<?= $aluno['idUsuario'] ?>" value="<?= htmlspecialchars($aluno['nome']) ?>"></option>
          <?php endforeach; ?>
        </datalist>
        <input type="hidden" id="idUsuario" name="idUsuario">
        
        <label class="cad-label" style="margin-left: 10px;">Turma</label>
        <select class="cad-input" id="turma" name="turma" style="width: 90px;">
          <option value=""></option>
          <?php foreach ($turmas as $turma): ?>
            <option value="<?= $turma['turma'] ?>"><?= htmlspecialchars($turma['turma']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-inline-row">
        <label class="cad-label">Horário de Entrega</label>
        <input type="time" id="horario_emprestimo" name="horario_emprestimo" class="cad-input" style="width: 100px;" readonly value="<?= htmlspecialchars(date('H:i')) ?>">
        
        <label class="cad-label" style="margin-left: 10px;">Horário de Devolução</label>
        <input type="time" id="horario_devolucao" name="horario_devolucao" class="cad-input" style="width: 100px;" required>
      </div>
      <div class="action-buttons">
        <button type="button" class="btn-cancel">Cancelar</button>
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
  document.querySelector('.btn-cancel').addEventListener('click', function() {
    window.location.href = '../index.php';
  });

  function sincronizarDatalist(inputId, hiddenId, datalistId) {
    const input = document.getElementById(inputId);
    const hidden = document.getElementById(hiddenId);
    const datalist = document.getElementById(datalistId);

    input.addEventListener('input', function() {
      const option = Array.from(datalist.options)
        .find(item => item.dataset.id && item.value === this.value.trim());
      hidden.value = option ? option.dataset.id : '';
    });
  }

  function sincronizarMultiplasSelecoes(inputId, datalistId, containerId, fieldName) {
    const input = document.getElementById(inputId);
    const datalist = document.getElementById(datalistId);
    const container = document.getElementById(containerId);

    function atualizarValidacao() {
      const textoDigitado = input.value.trim();
      const opcaoValida = Array.from(datalist.options)
        .some(opcao => opcao.dataset.id && opcao.value === textoDigitado);
      const possuiSelecao = container.querySelector('input[type="hidden"]') !== null;

      if (textoDigitado && !opcaoValida) {
        input.setCustomValidity('Selecione um material disponível na lista.');
      } else if (!possuiSelecao) {
        input.setCustomValidity('Selecione pelo menos um material.');
      } else {
        input.setCustomValidity('');
      }
    }

    input.addEventListener('input', function() {
      const option = Array.from(datalist.options)
        .find(item => item.dataset.id && item.value === this.value.trim());

      if (option) {
        const id = option.dataset.id;
        const nome = option.value;
        const jaSelecionado = Array.from(container.querySelectorAll('input[type="hidden"]'))
          .some(campo => campo.value === id);

        this.value = '';

        if (!jaSelecionado) {
          const tag = document.createElement('span');
          tag.className = 'tag-item';
          tag.appendChild(document.createTextNode(nome));

          const remover = document.createElement('button');
          remover.type = 'button';
          remover.className = 'btn-remove-tag';
          remover.setAttribute('aria-label', `Remover ${nome}`);
          remover.textContent = '\u00d7';
          remover.addEventListener('click', function() {
            tag.remove();
            atualizarValidacao();
          });

          const campoOculto = document.createElement('input');
          campoOculto.type = 'hidden';
          campoOculto.name = `${fieldName}[]`;
          campoOculto.value = id;

          tag.append(remover, campoOculto);
          container.appendChild(tag);
        }
      }

      atualizarValidacao();
    });

    atualizarValidacao();
  }

  sincronizarDatalist('professor', 'idCadastroFuncionarios', 'professores-list');
  sincronizarDatalist('aluno', 'idUsuario', 'alunos-list');
  sincronizarMultiplasSelecoes('input_material', 'materiais-list', 'tags-material', 'idMaterial');

  document.getElementById('professor').addEventListener('change', function(event) {
    const inputProfessor = document.getElementById('professor');
    const textoDigitado = inputProfessor.value.trim();

    if (textoDigitado !== '' && !document.getElementById('idCadastroFuncionarios').value) {
      inputProfessor.setCustomValidity('Selecione um professor válido a partir da lista de sugestões.');
    } else {
      inputProfessor.setCustomValidity('');
    }
  });

  document.getElementById('professor').addEventListener('input', function() {
    this.setCustomValidity('');
  });

  document.getElementById('aluno').addEventListener('change', function() {
    const aluno = document.getElementById('idUsuario').value;
    const textoDigitado = this.value.trim();

    if (textoDigitado !== '' && !aluno) {
      this.setCustomValidity('Selecione um aluno válido a partir da lista de sugestões.');
      document.getElementById('turma').required = false;
    } else {
      this.setCustomValidity('');
      document.getElementById('turma').required = aluno !== '';
    }
  });
</script>

</body>
</html>