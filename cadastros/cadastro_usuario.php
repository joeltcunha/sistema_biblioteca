<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="icon" href="../imgs/Ellipse%203.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css">
</head>

<?php
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
    <a href="../index.php#novidades">NOVIDADES</a>
    <a href="../index.php#top10">TOP 10</a>
    <a href="../index.php#eventos">EVENTOS</a>
    <a href="../usuarios/visualizarLivro.php">CATEGORIAS</a>
  </nav>
  <div class="header-right">
    <div class="user-icon">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
    </div>
    <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank"><img src="../imgs/instagram%20(1).png" alt="Instagram" class="header-insta"></a>
  </div>
</header>

<main>
  <form action="../php/cadastros/cadastrar_usuario.php" method="POST" class="cad-container">

    <h2 class="page-title" style="margin-bottom: 10px;">Cadastro de Usuário</h2>

    <div>
      <label class="cad-label" for="nome">Nome</label>
      <input type="text" id="nome" name="nome" class="cad-input" required>
    </div>

    <div>
      <label class="cad-label" for="email">Email</label>
      <input type="email" id="email" name="email" class="cad-input" required>
    </div>

    <div>
      <label class="cad-label" for="ra">Matrícula</label>
      <input type="text" id="ra" name="ra" class="cad-input" required>
    </div>

    <div>
      <label class="cad-label" for="telefone">Telefone</label>
      <input type="tel" id="telefone" name="telefone" class="cad-input" placeholder="(11) 92345-6789" pattern="\(\d{2}\) \d{5}-\d{4}" maxlength="15" inputmode="numeric" autocomplete="tel" required>
    </div>

    <div class="form-row-2">
      <div>
        <label class="cad-label" for="idtipoUsuarios">Tipo de Usuário</label>
        <select class="cad-input" id="idtipoUsuarios" name="idtipoUsuarios" required>
          <option value="">Selecione</option>
          <option value="0">Aluno</option>
          <?php foreach ($tipos as $tipo): ?>
              <option value="<?= $tipo['idtipoUsuarios'] ?>"><?= $tipo['tipo_usuario'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <label class="cad-label" for="idTurmas">Turma</label>
        <select class="cad-input" id="idTurmas" name="idTurmas" required>
          <option value="">Selecione a Turma</option>
          <?php foreach ($turmas as $turma): ?>
              <option value="<?= $turma['idTurmas'] ?>"><?= $turma['turma'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
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

    <div class="checkbox-card">
      <input type="checkbox" id="termos" name="aceitou_termo" value="1" required>
      <label for="termos">Sou responsável pelo livro ou periódico que pegar na biblioteca por empréstimo, cumprir os prazos estipulados para devolução, bem como aceitar todas as normas que regem as atividades da Biblioteca Escolar "André Carvalho".</label>
    </div>

    <div class="checkbox-card">
      <input type="checkbox" id="notif-espera" name="aceitou_notificacoes" value="1">
      <label for="notif-espera">Desejo receber notificações quando houver livros disponíveis na minha lista de espera e quando estiver próximo do prazo de devolução de um livro.</label>
    </div>

    <div class="checkbox-card">
      <input type="checkbox" id="notif-eventos" name="aceitou_novidades" value="1">
      <label for="notif-eventos">Desejo receber atualizações sobre novos livros e eventos da biblioteca.</label>
    </div>

    <div class="cad-buttons">
      <button type="reset" class="btn-cancel">Cancelar</button>
      <button type="submit" class="btn-submit">Cadastrar</button>
    </div>
  </form>
</main>

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
  const telefone = document.getElementById('telefone');

  telefone.addEventListener('input', function () {
    const digitosAntesDoCursor = this.value.slice(0, this.selectionStart).replace(/\D/g, '').length;
    const digitos = this.value.replace(/\D/g, '').slice(0, 11);
    let formatado = digitos;

    if (digitos.length > 2) {
      const ddd = digitos.slice(0, 2);
      const numero = digitos.slice(2);
      formatado = `(${ddd}) ${numero.slice(0, 5)}`;

      if (numero.length > 5) {
        formatado += `-${numero.slice(5)}`;
      }
    } else if (digitos.length > 0) {
      formatado = `(${digitos}`;
    }

    this.value = formatado;

    let posicaoCursor = 0;
    let digitosContados = 0;
    while (posicaoCursor < formatado.length && digitosContados < digitosAntesDoCursor) {
      if (/\d/.test(formatado[posicaoCursor])) {
        digitosContados++;
      }
      posicaoCursor++;
    }
    this.setSelectionRange(posicaoCursor, posicaoCursor);
  });

  document.getElementById('senha_hash').addEventListener('input', function() {
    const senha = this.value;
    const confirmacaoSenha = document.getElementById('confirmacao_senha').value;

    if (confirmacaoSenha && senha !== confirmacaoSenha) {
      document.getElementById('confirmacao_senha').setCustomValidity('As senhas não coincidem.');
    } else {
      document.getElementById('confirmacao_senha').setCustomValidity('');
    }
  });

  document.getElementById('idtipoUsuarios').addEventListener('change', function() {
    const tipoSelecionado = this.value;
    const turmaSelect = document.getElementById('idTurmas');

    if (tipoSelecionado === '0') { // Aluno
      turmaSelect.disabled = false;
      turmaSelect.required = true;
    } else {
      turmaSelect.disabled = true;
      turmaSelect.required = false;
      turmaSelect.value = '';
    }
  });
</script>

</body>
</html>