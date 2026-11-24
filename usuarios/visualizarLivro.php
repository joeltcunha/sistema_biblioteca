<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <link rel="icon" href="../imgs/Ellipse%203.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login']) {
        $login = true;
        if (isset($_SESSION['aluno']) && $_SESSION['aluno']) {
            $idUsuario = $_SESSION['idUsuario'];
        } elseif (isset($_SESSION['funcionario']) && $_SESSION['funcionario']) {
            $idUsuario = $_SESSION['idFuncionario'];
        } elseif (isset($_SESSION['bibliotecaria']) && $_SESSION['bibliotecaria']) {
            $idUsuario = $_SESSION['idBibliotecaria'];
        } else {
            $login = false;
        }
    } else {
        $login = false;
    }

    include '../php/includes/conexao.php';
    try {
        if (!isset($_GET['idLivro'])) {
            die("ID do livro não fornecido.");
        }

        $idLivro = $_GET['idLivro'];

        $conn = conectar();
        $sql = "SELECT 
                    L.*,
                    E.nome_editora,
                    UF.uf
                FROM Livros L
                LEFT JOIN Editora E ON L.idEditora = E.idEditora
                LEFT JOIN UF ON L.idUF = UF.idUF
                WHERE L.idLivro = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idLivro);
        $stmt->execute();
        $result = $stmt->get_result();
        $livro = $result->fetch_assoc();
        if (!$livro) {
            throw new Exception("Livro não encontrado.");
        }

        $sql = "SELECT nome_autor FROM Autor WHERE idAutor IN (SELECT idAutor FROM Autor_has_Livros WHERE idLivro = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idLivro);
        $stmt->execute();
        $result = $stmt->get_result();
        $autores = [];
        while ($linha = $result->fetch_assoc()) {
            $autores [] = $linha;
        }

        $sql = "SELECT nome_genero FROM Genero WHERE idGenero IN (SELECT idGenero FROM Genero_has_Livros WHERE idLivro = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idLivro);
        $stmt->execute();
        $result = $stmt->get_result();
        $generos = [];
        while ($linha = $result->fetch_assoc()) {
            $generos [] = $linha;
        }

        $sql ="SELECT nome_tradutor FROM Tradutor WHERE idTradutor IN (SELECT idTradutor FROM Tradutor_has_Livros WHERE idLivro = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idLivro);
        $stmt->execute();
        $result = $stmt->get_result();
        $tradutores = [];
        while ($linha = $result->fetch_assoc()) {
            $tradutores [] = $linha;
        }
        if (empty($tradutores)) {
            $tradutor = false;
        } else {
            $tradutor = true;
        }

        $sql = "SELECT COUNT(idEmprestimoLivro) FROM emprestimoLivro WHERE idLivro = ? AND data_devolucao_real IS NULL";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idLivro);
        $stmt->execute();
        $result = $stmt->get_result();
        $quantidade_emprestimos = $result->fetch_assoc()['COUNT(idEmprestimoLivro)'];
        if($quantidade_emprestimos != null){
            $quantidade_disponivel = $livro['quantidade'] - $quantidade_emprestimos;
        } else {
            $quantidade_disponivel = $livro['quantidade'];
        }
        $livro['quantidade_disponivel'] = $quantidade_disponivel;

        if($livro['quantidade_disponivel'] <= 0) {
            $sql = "SELECT MIN(data_devolucao_prevista) AS data_disponivel FROM emprestimoLivro WHERE idLivro = ? AND data_devolucao_real IS NULL";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $idLivro);
            $stmt->execute();
            $result = $stmt->get_result();
            $livro['data_disponivel'] = $result->fetch_assoc()['data_disponivel'];
            $livro['data_disponivel'] = new DateTime($livro['data_disponivel']);
            $livro['data_disponivel'] = $livro['data_disponivel']->format('d/m/Y');
        }

        $sql = "SELECT H.nota_avaliacao, H.avaliacao, COALESCE(AL.nome, F.nome, B.nome_bibliotecaria) AS nome_usuario
                FROM Historico_Usuario_Livros H
                LEFT JOIN CadastroAlunos AL ON H.idUsuario = AL.idUsuario
                LEFT JOIN CadastroFuncionarios F ON H.idCadastroFuncionarios = F.idCadastroFuncionarios
                LEFT JOIN CadastroBibliotecarias B ON H.idCadastroBibliotecarias = B.idCadastroBibliotecarias
                WHERE idLivro = ? AND nota_avaliacao IS NOT NULL";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idLivro);
        $stmt->execute();
        $result = $stmt->get_result();
        $avaliacoes = [];
        while ($linha = $result->fetch_assoc()) {
            $avaliacoes [] = $linha;
        }
        
        $conn->close();
        $stmt->close();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
?>
<body>

<header>
    <div class="header-left">
        <img src="../imgs/Ellipse%203.png" alt="Logo Escola Estadual Maria Luiza Miranda Bastos" class="logo">
        <h1>EEMLMB</h1>
    </div>
    <nav>
        <a href="../index.php">INÍCIO</a>
        <a href="minha_estante.php">MINHA ESTANTE</a>
        <a href="historico.php">HISTÓRICO</a>
        <a href="https://www.mg.gov.br/instituicao_unidade/escola-estadual-maria-luiza-miranda-bastos" target="_blank" rel="noopener noreferrer">SOBRE</a>
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
        <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank" rel="noopener noreferrer">
            <img src="../imgs/instagram%20(1).png" alt="Instagram da Escola" class="header-insta">
        </a>
    </div>
</header>

<main>
    <h2 class="page-title">Livro para Reserva</h2>

    <div class="book-section">
        <div class="book-cover">
            <img src="<?= $livro['capa_url'] ?>" alt="Capa do Livro">
        </div>

        <div class="book-details">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" class="mock-input" value="<?= $livro['titulo'] ?>" readonly>
            </div>

            <div class="form-group">
                <label for="autor">Autor(es)</label>
                <input type="text" id="autor" class="mock-input" value="<?= implode(', ', array_column($autores, 'nome_autor')) ?>" readonly>
            </div>

            <div class="form-group" id="tradutores-group">
                <label for="tradutores">Tradutores</label>
                <input type="text" id="tradutores" class="mock-input" value="<?= $tradutor ? implode(', ', array_column($tradutores, 'nome_tradutor')) : '' ?>" readonly>
            </div>

            <div class="form-row">
                <div class="form-group" style="flex: 2;">
                    <label for="generos">Gêneros</label>
                    <input type="text" id="generos" class="mock-input" value="<?= implode(', ', array_column($generos, 'nome_genero')) ?>" readonly>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label for="edicao">N° Edição</label>
                    <input type="text" id="edicao" class="mock-input" value="<?= $livro['edicao'] ?>" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" style="flex: 3;">
                    <label for="editora">Editora</label>
                    <input type="text" id="editora" class="mock-input" value="<?= $livro['nome_editora'] ?? '' ?>" readonly>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label for="uf">UF</label>
                    <input type="text" id="uf" class="mock-input" value="<?= $livro['uf'] ?? '' ?>" readonly>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label for="ano">Ano</label>
                    <input type="text" id="ano" class="mock-input" value="<?= $livro['ano'] ?? '' ?>" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="disponibilidade">Data Disponível</label>
                    <?php if($livro['status'] == 1): ?>
                    <input type="text" id="disponibilidade" class="mock-input" value="<?= $livro['data_disponivel'] ?? 'Hoje' ?>" readonly>
                    <?php else: ?>
                    <input type="text" id="disponibilidade" class="mock-input" value="Livro Inativo" readonly>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="paginas">N° Páginas</label>
                    <input type="text" id="paginas" class="mock-input" value="<?= $livro['numero_paginas'] ?? '' ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="quant_disp">Livros Livres</label>
                    <input type="text" id="quant_disp" class="mock-input" value="<?= $livro['quantidade_disponivel'] ?? '0' ?>" readonly>
                </div>
            </div>
        </div>
    </div>

    <div class="descricao-section">
        <label for="descricao">Descrição</label>
        <textarea id="descricao" class="mock-textarea" readonly><?= $livro['descricao'] ?? '' ?></textarea>
    </div>

    <div class="action-buttons">
        <button type="button" id="btnVoltar" class="btn btn-sair">Voltar</button>
        <?php if($livro['status'] == 1): ?>
        <button type="button" id="btnReservar" class="btn btn-reservar">Reservar</button>
        <?php else: ?>
        <button type="button" id="btnInativo" class="btn btn-reservar" style="background-color: #ccc; cursor: not-allowed;" disabled>Livro Inativo</button>
        <?php endif; ?>
    </div>

    <section class="reviews-container">
        <div class="reviews-header">
            <h3>Avaliações do Livro</h3>
            <button type="button" class="btn btn-avaliar" id="btnToggleAvaliar">★ Avaliar Livro</button>
        </div>

        <form action="../php/processos/avaliar_livro.php" method="POST" id="formAvaliacao" class="add-review-form">
            <h4>Escreva sua avaliação</h4>
            <div class="form-group">
                <label>Sua nota:</label>
                <div class="star-rating-input" id="starRating">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
            </div>
            <div class="form-group">
                <label for="novoComentario">Comentário:</label>
                <textarea name="avaliacao"id="novoComentario" class="mock-textarea" style="background-color: white; border: 1px solid #CCC;" placeholder="O que você achou desta leitura?" required></textarea>
            </div>
            <input type="hidden" name="tabela" value="Historico_Usuario_Livros">
            <input type="hidden" name="idLivro" value="<?= $livro['idLivro'] ?>">
            <input type="hidden" name="nota_avaliacao" id="nota" value="5">
            <div style="display: flex; gap: 10px; justify-content: flex-end;">
                <button type="button" class="btn" style="background-color: #DDD; font-size: 16px;" id="btnCancelarAvaliar">Cancelar</button>
                <button type="submit" class="btn btn-blue" style="font-size: 16px;">Enviar Avaliação</button>
            </div>
        </form>

        <div class="reviews-list" id="reviewsList">
            <?php foreach ($avaliacoes as $avaliacao): ?>
                <div class="review-card">
                    <div class="reviewer-avatar">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="review-content">
                        <div class="review-meta">
                            <h4><?= htmlspecialchars($avaliacao['nome_usuario']) ?></h4>
                            <div class="stars"><?= str_repeat('★', $avaliacao['nota_avaliacao']) . str_repeat('☆', 5 - $avaliacao['nota_avaliacao']) ?></div>
                        </div>
                        <p class="review-text"><?= htmlspecialchars($avaliacao['avaliacao']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (empty($avaliacoes)): ?>
                <p class="no-reviews">Nenhuma avaliação encontrada para este livro.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<!-- Rodapé -->
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
        <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank" rel="noopener noreferrer" title="Instagram da Escola">
            <img src="../imgs/instagram%20(1).png" alt="Instagram">
        </a>
        <a href="https://www.facebook.com/pages/Escola-Estadual-Maria-Luiza-Miranda-Bastos/196619360362700" target="_blank" rel="noopener noreferrer" title="Facebook da Escola">
            <img src="../imgs/facebook.png" alt="Facebook">
        </a>
        <a href="https://api.whatsapp.com/send?phone=553134437477" target="_blank" rel="noopener noreferrer" title="WhatsApp da Escola">
            <img src="../imgs/whastapp.png" alt="WhatsApp">
        </a>
    </div>
</footer>

<script>

    const tradutores = document.getElementById('tradutores-group');
    if (!<?= json_encode($tradutor) ?>) {
        tradutores.style.display = 'none';
    }

    document.getElementById('btnVoltar').addEventListener('click', function() {
        window.location.href = '../processos/index.php';
    });

    const btnReservar = document.getElementById('btnReservar').addEventListener('click', function() {
        if(<?= json_encode($login) ?>) {
            //window.location.href = '../processos/emprestimo_livro.php';
        } else {
            const confirmar = confirm('Você precisa estar logado para reservar um livro. Deseja fazer login agora?');
            if (confirmar) {
                window.location.href = '../processos/login.php';
            }
        }
    });

    const notaInput = document.getElementById('nota');
    const btnToggleAvaliar = document.getElementById('btnToggleAvaliar');
    const btnCancelarAvaliar = document.getElementById('btnCancelarAvaliar');
    const formAvaliacao = document.getElementById('formAvaliacao');
    const starRating = document.getElementById('starRating');
    const stars = starRating.querySelectorAll('.star');
    let currentRating = 5;

    btnToggleAvaliar.addEventListener('click', () => {
        formAvaliacao.classList.toggle('active');
    });

    btnCancelarAvaliar.addEventListener('click', () => {
        formAvaliacao.classList.remove('active');
    });

    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            currentRating = index + 1;
            notaInput.value = String(currentRating);
            updateStarsDisplay(currentRating);
        });
    });

    function updateStarsDisplay(rating) {
        stars.forEach((star, index) => {
            star.style.color = index < rating ? '#FDD835' : '#D9D9D9';
        });
    }

    updateStarsDisplay(currentRating);

</script>
</body>
</html>