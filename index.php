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
        <div class="col-md-2">
            <a href="processos/login.php">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </a>
            <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank"><img src="imgs/instagram (1).png" alt="Instagram" class="header-insta"></a>
        </div>
    </div>
</div>
<hr class="my-0">
<div class="container-fluid nav-menu">
    <nav class="navbar navbar-expand-lg ">
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