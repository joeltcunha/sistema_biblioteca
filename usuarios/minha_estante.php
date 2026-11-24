<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Estante</title>
    <link rel="icon" href="../imgs/Ellipse%203.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    header("Location: ../processos/login.php");
    exit();
}
?>
<!-- Cabeçalho -->
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
        <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank" rel="noopener noreferrer">
            <img src="../imgs/instagram%20(1).png" alt="Instagram da Escola" class="header-insta">
        </a>
    </div>
</header>

<!-- Conteúdo Principal -->
<main>
    <h2 class="page-title">Minha Estante</h2>

    <!-- Seção Favoritos -->
    <h3 class="section-subtitle">Favoritos</h3>
    <div class="books-grid">
        <div class="book-card">
            <h4 class="book-card-title">A Hora da Estrela</h4>
            <img src="https://m.media-amazon.com/images/I/81075O27V+L._AC_UF1000,1000_QL80_.jpg" alt="A Hora da Estrela" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Clarice Lispector</p>
                <p><strong>Gênero:</strong> Romance</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">O Cortiço</h4>
            <img src="https://m.media-amazon.com/images/I/71rJ-e3PISL._AC_UF1000,1000_QL80_.jpg" alt="O Cortiço" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Aluísio Azevedo</p>
                <p><strong>Gênero:</strong> Romance</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Quarto de Despejo</h4>
            <img src="https://m.media-amazon.com/images/I/81YtQn44qGL._AC_UF1000,1000_QL80_.jpg" alt="Quarto de Despejo" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Carolina Maria de Jesus</p>
                <p><strong>Gênero:</strong> Autobiografia</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Vidas Secas</h4>
            <img src="https://m.media-amazon.com/images/I/81j8VvD-t-L._AC_UF1000,1000_QL80_.jpg" alt="Vidas Secas" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Graciliano Ramos</p>
                <p><strong>Gênero:</strong> Romance</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Dom Casmurro</h4>
            <img src="https://m.media-amazon.com/images/I/815W606gWfL._AC_UF1000,1000_QL80_.jpg" alt="Dom Casmurro" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Machado de Assis</p>
                <p><strong>Gênero:</strong> Romance</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>
    </div>

    <!-- Seção Reservados -->
    <h3 class="section-subtitle">Reservados</h3>
    <div class="books-grid">
        <div class="book-card">
            <h4 class="book-card-title">Capitães da Areia</h4>
            <img src="../imgs/Rectangle%2017.png" alt="Capitães da Areia" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Jorge Amado</p>
                <p><strong>Gênero:</strong> Romance</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Sobrevivendo ao Racismo</h4>
            <img src="https://m.media-amazon.com/images/I/71WpBfZlufL._AC_UF1000,1000_QL80_.jpg" alt="Sobrevivendo ao Racismo" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Silvio Almeida</p>
                <p><strong>Gênero:</strong> Ensaios</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Ideias para Adiar o Fim do Mundo</h4>
            <img src="https://m.media-amazon.com/images/I/71N1429v+HL._AC_UF1000,1000_QL80_.jpg" alt="Ideias para Adiar o Fim do Mundo" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Ailton Krenak</p>
                <p><strong>Gênero:</strong> Ensaios</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Vidas Secas</h4>
            <img src="https://m.media-amazon.com/images/I/81j8VvD-t-L._AC_UF1000,1000_QL80_.jpg" alt="Vidas Secas" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Graciliano Ramos</p>
                <p><strong>Gênero:</strong> Romance</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">A Hora da Estrela</h4>
            <img src="https://m.media-amazon.com/images/I/81075O27V+L._AC_UF1000,1000_QL80_.jpg" alt="A Hora da Estrela" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Clarice Lispector</p>
                <p><strong>Gênero:</strong> Romance</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>
    </div>

    <!-- Seção Avaliados -->
    <h3 class="section-subtitle">Avaliados</h3>
    <div class="books-grid">
        <div class="book-card">
            <h4 class="book-card-title">Quarto de Despejo</h4>
            <img src="https://m.media-amazon.com/images/I/81YtQn44qGL._AC_UF1000,1000_QL80_.jpg" alt="Quarto de Despejo" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Carolina Maria de Jesus</p>
                <p><strong>Gênero:</strong> Autobiografia</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Sentimento do Mundo</h4>
            <img src="https://m.media-amazon.com/images/I/71u-pX9pA5L._AC_UF1000,1000_QL80_.jpg" alt="Sentimento do Mundo" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Carlos Drummond de Andrade</p>
                <p><strong>Gênero:</strong> Poesia</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Senhora</h4>
            <img src="https://m.media-amazon.com/images/I/81cO1U0r6GL._AC_UF1000,1000_QL80_.jpg" alt="Senhora" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> José de Alencar</p>
                <p><strong>Gênero:</strong> Romance</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">Dom Casmurro</h4>
            <img src="https://m.media-amazon.com/images/I/815W606gWfL._AC_UF1000,1000_QL80_.jpg" alt="Dom Casmurro" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Machado de Assis</p>
                <p><strong>Gênero:</strong> Romance</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>

        <div class="book-card">
            <h4 class="book-card-title">O Cortiço</h4>
            <img src="https://m.media-amazon.com/images/I/71rJ-e3PISL._AC_UF1000,1000_QL80_.jpg" alt="O Cortiço" class="book-card-cover">
            <div class="book-card-details">
                <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
                <p><strong>Autor:</strong> Aluísio Azevedo</p>
                <p><strong>Gênero:</strong> Romance</p>
                <p class="read-more">Leia mais...</p>
            </div>
            <button type="button" class="btn-reservar-card">Reservar</button>
        </div>
    </div>
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

</body>
</html>