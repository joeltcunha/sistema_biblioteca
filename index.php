<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Bilbioteca - E.E. Maria Luiza Miranda Bastos</title>
<!--    Style   -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php

include("php/includes/conexao.php");
try {
    $conn = conectar();
    $sql = "SELECT * FROM Livros";
    $result = $conn->query($sql);
    $livros = [];
    while ($linha = $result->fetch_assoc()) {
        $livros [] = $linha;
    }
    $conn->close();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<div class="container-fluid py-3 header-logo">
    <div class="row">
        <div class="col-md-1">
            <img src="imgs/Ellipse 3.png" alt="Logo EEMLMB" class="logo">
        </div>
        <div class="col-md-9">
            <h3>Sistema de Biblioteca</h3>
            <h2>E.E. Maria Luiza Miranda Bastos</h2>
        </div>
        <div class="col-md-2 align-content-center">
            <a href="processos/login.php" class="p-2">
                    <svg width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>
            <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank" class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                </svg>
            </a>
        </div>
    </div>
</div>
<hr class="my-0">
<div class="container-fluid nav-menu">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">INÍCIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="https://www.mg.gov.br/instituicao_unidade/escola-estadual-maria-luiza-miranda-bastos">SOBRE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#novidades">NOVIDADES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#top10">TOP 10</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#eventos">EVENTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#categorias">CATEGORIAS</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex" role="search">
                <input class="form-control p-2 me-1" type="search" placeholder="Título, autor ou editora" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
        </div>
    </nav>
</div>
<!--<header>-->
<!--    <div class="container p-2 w-100">-->
<!--        <div class="row-col-12">-->
<!--            <div class="col-3">-->
<!--                <img src="imgs/Ellipse 3.png" alt="Logo EEMLMB" class="logo">-->
<!--            </div>-->
<!--            <div class="col-9">-->
<!--                <h1>E.E. MLMB</h1>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="header-left">-->
<!---->
<!---->
<!---->
<!--    </div>-->
<!--    <div class="container-fluid">-->
<!--        <div class="row-col-12">-->
<!--            <div class="col-12">-->
<!--                <nav>-->
<!--                    <a href="index.php">INÍCIO</a>-->
<!--                    <a href="https://www.mg.gov.br/instituicao_unidade/escola-estadual-maria-luiza-miranda-bastos" target="_blank" rel="noopener noreferrer">SOBRE</a>-->
<!--                    <a href="#novidades">NOVIDADES</a>-->
<!--                    <a href="#top10">TOP 10</a>-->
<!--                    <a href="#eventos">EVENTOS</a>-->
<!--                    <a href="#categorias">CATEGORIAS</a>-->
<!--                </nav>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--  <div class="header-right">-->
<!--    <div class="user-icon">-->
<!--        <a href="processos/login.php">-->
<!--          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>-->
<!--        </a>-->
<!--    </div>-->
<!--    <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank"><img src="imgs/instagram (1).png" alt="Instagram" class="header-insta"></a>-->
<!--  </div>-->
<!--</header>-->

<main>
  <h2 class="page-title mb-3">Início</h2>

  <!-- Barra de Pesquisa -->
  <div class="search-section">
    <label>Buscar por: </label>
    <input type="text" class="search-input rounded-3" placeholder="título, autor ou editora">
    <button class="btn-blue">Pesquisar</button>
  </div>

  <!-- SEÇÃO 1: NOVIDADES -->
  <section id="novidades">
    <h3 class="section-subtitle">Novidades</h3>
    <div class="books-grid">
      <!-- Card 1 -->
      <div class="book-card">
        <div class="book-card-title">Capitães da Areia</div>
        <img src="imgs/capitaes_da_areia.jpg" alt="Capitães de Areia" class="book-card-cover" width="">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-cyan">Quero pegar</a>
      </div>

      <!-- Card 2 -->
      <div class="book-card">
        <div class="book-card-title">Sobrevivendo ao Racismo</div>
        <img src="imgs/sovrevivendo_ao_racismo.jpg" alt="Sobrevivendo ao Racismo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-cyan">Quero pegar</a>
      </div>

      <!-- Card 3 -->
      <div class="book-card">
        <div class="book-card-title">Ideias para Adiar o Fim do Mundo</div>
        <img src="imgs/ideias_para_adiar_o_fim_do_mundo.jpg" alt="Ideias para Adiar o Fim do Mundo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-cyan">Quero pegar</a>
      </div>

      <!-- Card 4 -->
      <div class="book-card">
        <div class="book-card-title">Vidas Secas</div>
        <img src="imgs/vidas_secas.jpg" alt="Vidas Secas" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-cyan">Quero pegar</a>
      </div>

      <!-- Card 5 -->
      <div class="book-card">
        <div class="book-card-title">A Hora da Estrela</div>
        <img src="imgs/a_hora_da_estrela.jpg" alt="A Hora da Estrela" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-cyan">Quero pegar</a>
      </div>
    </div>
  </section>

  <!-- SEÇÃO 2: TOP 10 LIVROS ALUGADOS -->
  <section id="top10">
    <h3 class="section-subtitle">Top 10 livros alugados</h3>
    <div class="books-grid">
      <!-- Card 1 -->
      <div class="book-card">
        <div class="book-card-title">Quarto de Despejo</div>
        <img src="imgs/quarto_de_despejo.jpg" alt="Quarto de Despejo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-purple-card">Quero pegar</a>
      </div>

      <!-- Card 2 -->
      <div class="book-card">
        <div class="book-card-title">Sentimento do Mundo</div>
        <img src="imgs/sentimento_do_mundo.jpg" alt="Sentimento do Mundo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-purple-card">Quero pegar</a>
      </div>

      <!-- Card 3 -->
      <div class="book-card">
        <div class="book-card-title">Senhora</div>
        <img src="imgs/senhora.jpg" alt="Senhora" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-purple-card">Quero pegar</a>
      </div>

      <!-- Card 4 -->
      <div class="book-card">
        <div class="book-card-title">Dom Casmurro</div>
        <img src="imgs/dom_casmurro.jpg" alt="Dom Casmurro" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-purple-card">Quero pegar</a>
      </div>

      <!-- Card 5 -->
      <div class="book-card">
        <div class="book-card-title">O Cortiço</div>
        <img src="imgs/o_cortico.jpg" alt="O Cortiço" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-purple-card">Quero pegar</a>
      </div>
    </div>
  </section>

  <!-- SEÇÃO 3: EVENTOS -->
  <section id="eventos">
    <h3 class="section-subtitle">Eventos</h3>
    <div class="events-grid">
      <!-- Evento 1 -->
      <div class="event-card">
        <div class="event-title">Exposição "Agripa Vasconcelos - 130 anos: entre sagas e memórias"</div>
        <div class="event-body">
          <img src="imgs/exposicao_agripa_vasconcelos.jpg" alt="Exposição Agripa Vasconcelos" class="event-img">
          <div class="event-info">
            <p>A mostra apresenta aspectos da vida e da obra de Agripa Vasconcelos, reunindo memórias, narrativas e parte de sua produção literária que marcou gerações.</p>
            <p><strong>Data Inicial:</strong> 09/04/26</p>
            <p><strong>Data Final:</strong> 30/06/26</p>
            <p><strong>Horário:</strong> 08:00 - 17:00</p>
            <p><strong>Valor:</strong> Gratuito</p>
            <p><strong>Local:</strong> Praça da Liberdade, 21 - Savassi (2º andar)</p>
          </div>
        </div>
        <button type="button" class="btn-event-blue">Ingresso</button>
      </div>

      <!-- Evento 2 -->
      <div class="event-card">
        <div class="event-title">17ª Noite Mineira de Museus e Bibliotecas</div>
        <div class="event-body">
          <img src="imgs/noite_mineira_de_museus.jpg" alt="Noite Mineira de Museus" class="event-img">
          <div class="event-info">
            <p>O evento promete reunir editores, livreiros, autores consagrados e novos talentos em uma programação que inclui lançamentos, debates e palestras, fortalecendo o diálogo entre leitores e criadores.</p>
            <p><strong>Data Inicial:</strong> 18/06/26</p>
            <p><strong>Data Final:</strong> 18/06/26</p>
            <p><strong>Horário:</strong> 19:00</p>
            <p><strong>Valor:</strong> Gratuito</p>
            <p><strong>Local:</strong> Praça da Liberdade, 21, Setor de Obras Raras e Coleções Especiais.</p>
          </div>
        </div>
        <button type="button" class="btn-event-blue">Ingresso</button>
      </div>

      <!-- Evento 3 -->
      <div class="event-card">
        <div class="event-title">Feira Mineira do Livro</div>
        <div class="event-body">
          <img src="imgs/feira_mineira_do_livro.jpg" alt="Feira Mineira do Livro" class="event-img">
          <div class="event-info">
            <p>O evento promete reunir editores, livreiros, autores consagrados e novos talentos em uma programação que inclui lançamentos, debates e palestras, fortalecendo o diálogo entre leitores e criadores.</p>
            <p><strong>Data Inicial:</strong> 17/09/25</p>
            <p><strong>Data Final:</strong> 19/09/25</p>
            <p><strong>Horário:</strong> 09:00 - 22:00</p>
            <p><strong>Valor:</strong> Gratuito</p>
            <p><strong>Local:</strong> Praça da Liberdade, 21, Belo Horizonte - MG</p>
          </div>
        </div>
        <button type="button" class="btn-event-blue">Ingresso</button>
      </div>
    </div>
  </section>

  <!-- SEÇÃO 4: CATEGORIAS E FILTROS -->
  <section id="categorias">
    <select class="genre-select">
      <option>Selecione o Gênero</option>
      <option>Fantasia</option>
      <option>Suspense</option>
      <option>Terror</option>
      <option>Finanças</option>
      <option>Autoajuda</option>
    </select>

    <!-- Grid inicial sob o selector -->
    <div class="books-grid">
      <div class="book-card">
        <div class="book-card-title">A Hora da Estrela</div>
        <img src="imgs/a_hora_da_estrela.jpg" alt="A Hora da Estrela" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">O Cortiço</div>
        <img src="imgs/o_cortico.jpg" alt="O Cortiço" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Quarto de Despejo</div>
        <img src="imgs/quarto_de_despejo.jpg" alt="Quarto de Despejo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Vidas Secas</div>
        <img src="imgs/vidas_secas.jpg" alt="Vidas Secas" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Dom Casmurro</div>
        <img src="imgs/dom_casmurro.jpg" alt="Dom Casmurro" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>
    </div>

    <!-- FANTASIA -->
    <h3 class="section-subtitle">Fantasia</h3>
    <div class="books-grid">
      <div class="book-card">
        <div class="book-card-title">Capitães de Areia</div>
        <img src="imgs/capitaes_da_areia.jpg" alt="Capitães de Areia" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Sobrevivendo ao Racismo</div>
        <img src="imgs/sovrevivendo_ao_racismo.jpg" alt="Sobrevivendo ao Racismo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Ideias para Adiar o Fim do Mundo</div>
        <img src="imgs/ideias_para_adiar_o_fim_do_mundo.jpg" alt="Ideias para Adiar o Fim do Mundo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Vidas Secas</div>
        <img src="imgs/vidas_secas.jpg" alt="Vidas Secas" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">A Hora da Estrela</div>
        <img src="imgs/a_hora_da_estrela.jpg" alt="A Hora da Estrela" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>
    </div>

    <!-- SUSPENSE -->
    <h3 class="section-subtitle">Suspense</h3>
    <div class="books-grid">
      <div class="book-card">
        <div class="book-card-title">Quarto de Despejo</div>
        <img src="imgs/quarto_de_despejo.jpg" alt="Quarto de Despejo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Sentimento do Mundo</div>
        <img src="imgs/sentimento_do_mundo.jpg" alt="Sentimento do Mundo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Senhora</div>
        <img src="imgs/senhora.jpg" alt="Senhora" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Dom Casmurro</div>
        <img src="imgs/dom_casmurro.jpg" alt="Dom Casmurro" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">O Cortiço</div>
        <img src="imgs/o_cortico.jpg" alt="O Cortiço" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>
    </div>

    <!-- TERROR -->
    <h3 class="section-subtitle">Terror</h3>
    <div class="books-grid">
      <div class="book-card">
        <div class="book-card-title">Capitães de Areia</div>
        <img src="imgs/capitaes_da_areia.jpg" alt="Capitães de Areia" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Sobrevivendo ao Racismo</div>
        <img src="imgs/sovrevivendo_ao_racismo.jpg" alt="Sobrevivendo ao Racismo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Ideias para Adiar o Fim do Mundo</div>
        <img src="imgs/ideias_para_adiar_o_fim_do_mundo.jpg" alt="Ideias para Adiar o Fim do Mundo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Vidas Secas</div>
        <img src="imgs/vidas_secas.jpg" alt="Vidas Secas" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">A Hora da Estrela</div>
        <img src="imgs/a_hora_da_estrela.jpg" alt="A Hora da Estrela" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>
    </div>

    <!-- FINANÇAS -->
    <h3 class="section-subtitle">Finanças</h3>
    <div class="books-grid">
      <div class="book-card">
        <div class="book-card-title">Quarto de Despejo</div>
        <img src="imgs/quarto_de_despejo.jpg" alt="Quarto de Despejo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Sentimento do Mundo</div>
        <img src="imgs/sentimento_do_mundo.jpg" alt="Sentimento do Mundo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Senhora</div>
        <img src="imgs/senhora.jpg" alt="Senhora" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Dom Casmurro</div>
        <img src="imgs/dom_casmurro.jpg" alt="Dom Casmurro" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">O Cortiço</div>
        <img src="imgs/o_cortico.jpg" alt="O Cortiço" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>
    </div>

    <!-- AUTOAJUDA -->
    <h3 class="section-subtitle">Autoajuda</h3>
    <div class="books-grid">
      <div class="book-card">
        <div class="book-card-title">Capitães de Areia</div>
        <img src="imgs/capitaes_da_areia.jpg" alt="Capitães de Areia" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Sobrevivendo ao Racismo</div>
        <img src="imgs/sovrevivendo_ao_racismo.jpg" alt="Sobrevivendo ao Racismo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Ideias para Adiar o Fim do Mundo</div>
        <img src="imgs/ideias_para_adiar_o_fim_do_mundo.jpg" alt="Ideias para Adiar o Fim do Mundo" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">Vidas Secas</div>
        <img src="imgs/vidas_secas.jpg" alt="Vidas Secas" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>

      <div class="book-card">
        <div class="book-card-title">A Hora da Estrela</div>
        <img src="imgs/a_hora_da_estrela.jpg" alt="A Hora da Estrela" class="book-card-cover">
        <div class="book-card-details">
          <p class="desc">Descrição: Capitães da Areia, de Jorge Amado, retrata o cotidiano de meninos de rua em Salvador. Unidos pela sobrevivência, eles praticam furtos, enfrentam preconceitos e buscam liberdade em uma sociedade desigual.</p>
          <p><strong>Autor:</strong> Jorge Amado</p>
          <p><strong>Gênero:</strong> Romance</p>
          <a href="usuarios/visualizarLivro.php" class="read-more">Leia mais...</a>
        </div>
        <a href="usuarios/visualizarLivro.php" class="btn-reservar-card">Quero pegar</a>
      </div>
    </div>
  </section>
</main>

<footer>
  <div class="footer-content-wrapper">
    <h4>Escola Estadual Maria Luiza Miranda Bastos</h4>
    <div class="footer-links">
      <a href="index.php">INÍCIO</a>
      <a href="https://www.mg.gov.br/instituicao_unidade/escola-estadual-maria-luiza-miranda-bastos" target="_blank" rel="noopener noreferrer">SOBRE A ESCOLA</a>
    </div>
    <div class="footer-info">
      Rua São José do Jacuri, 60 - Planalto - Belo Horizonte - MG | CEP 31720-370 | (31) 3443 7477<br>
      ©2026 E.E. MLMB. Todos os direitos reservados.
    </div>
  </div>
  <div class="footer-social">
    <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank" rel="noopener noreferrer"><img src="imgs/instagram (1).png" alt="Instagram"></a>
    <a href="https://www.facebook.com/pages/Escola-Estadual-Maria-Luiza-Miranda-Bastos/196619360362700" target="_blank" rel="noopener noreferrer"><img src="imgs/facebook.png" alt="Facebook"></a>
    <a href="https://api.whatsapp.com/send?phone=553134437477" target="_blank" rel="noopener noreferrer"><img src="imgs/whastapp.png" alt="WhatsApp"></a>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/js/bootstrap.bundle.min.js" integrity="sha384-WyOxWvTyr1QaMPfiPJSv76iReVthorl5uWlFtZPyK0IEB0hGzo9y5Bp9mYanr8Bu" crossorigin="anonymous"></script>
</body>
</html>