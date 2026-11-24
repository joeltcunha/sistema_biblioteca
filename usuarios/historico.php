<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>
    <link rel="icon" href="../imgs/Ellipse%203.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    header("Location: ../../processos/login.php");
    exit();
}
?>
<header>
    <div class="header-left">
        <img src="../imgs/Ellipse%203.png" alt="Logo EEMLMB" class="logo">
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
        </div>
        <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank" rel="noopener noreferrer">
            <img src="../imgs/instagram%20(1).png" alt="Instagram" class="header-insta">
        </a>
    </div>
</header>

<main>
    <h2 class="page-title">Histórico</h2>

    <div class="filter-bar">
        <label for="data-inicial">Data inicial</label>
        <input type="text" id="data-inicial" class="filter-input" placeholder="dd/mm/aaaa">

        <label for="data-final">Data final</label>
        <input type="text" id="data-final" class="filter-input" placeholder="dd/mm/aaaa">

        <button type="button" class="btn-blue">Buscar</button>
        <button type="button" class="btn-blue">Limpar</button>
    </div>

    <h3 class="section-subtitle">Lidos</h3>
    <div class="books-grid">
        <div class="book-card">
            <h4 class="book-card-title">A Hora da Estrela</h4>
            <img src="../imgs/Rectangle%2017.png" alt="A Hora da Estrela" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Clarice Lispector</p>
                <p><strong>Gênero:</strong> Romance</p>
                <a href="visualizarLivro.php" class="read-more">Leia mais...</a>
            </div>
            <button type="button" class="btn-reservar-card" onclick="window.location.href='../retornos/reserva_sucesso.php'">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">O Cortiço</h4>
            <img src="../imgs/Rectangle%2017.png" alt="O Cortiço" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Aluísio Azevedo</p>
                <p><strong>Gênero:</strong> Romance</p>
                <a href="visualizarLivro.php" class="read-more">Leia mais...</a>
            </div>
            <button type="button" class="btn-reservar-card" onclick="window.location.href='../retornos/reserva_sucesso.php'">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Quarto de Despejo</h4>
            <img src="../imgs/Rectangle%2017.png" alt="Quarto de Despejo" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Carolina Maria de Jesus</p>
                <p><strong>Gênero:</strong> Romance</p>
                <a href="visualizarLivro.php" class="read-more">Leia mais...</a>
            </div>
            <button type="button" class="btn-reservar-card" onclick="window.location.href='../retornos/reserva_sucesso.php'">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Vidas Secas</h4>
            <img src="../imgs/Rectangle%2017.png" alt="Vidas Secas" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Graciliano Ramos</p>
                <p><strong>Gênero:</strong> Romance</p>
                <a href="visualizarLivro.php" class="read-more">Leia mais...</a>
            </div>
            <button type="button" class="btn-reservar-card" onclick="window.location.href='../retornos/reserva_sucesso.php'">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Dom Casmurro</h4>
            <img src="../imgs/Rectangle%2017.png" alt="Dom Casmurro" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Machado de Assis</p>
                <p><strong>Gênero:</strong> Romance</p>
                <a href="visualizarLivro.php" class="read-more">Leia mais...</a>
            </div>
            <button type="button" class="btn-reservar-card" onclick="window.location.href='../retornos/reserva_sucesso.php'">Reservar</button>
        </div>
    </div>

    <h3 class="section-subtitle">Pesquisados</h3>
    <div class="books-grid">
        <div class="book-card">
            <h4 class="book-card-title">Quarto de Despejo</h4>
            <img src="../imgs/Rectangle%2017.png" alt="Quarto de Despejo" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Jorge Amado</p>
                <p><strong>Gênero:</strong> Romance</p>
                <a href="visualizarLivro.php" class="read-more">Leia mais...</a>
            </div>
            <button type="button" class="btn-reservar-card" onclick="window.location.href='../retornos/reserva_sucesso.php'">Reservar</button>
        </div>
    </div>
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

</body>
</html>