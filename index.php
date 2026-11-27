<?php

include("php/includes/conexao.php");
try {
    $conn = conectar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include "php/includes/head.php"; ?>
    <title>Sistema Bilbioteca - E.E. Maria Luiza Miranda Bastos</title>
</head>
<body>
<?php include "php/includes/header_inicial.php"?>

<main>
<!--    CARROSSEL-->
    <div id="carouselAutoplaying" class="carousel slide mt-1 carousel-dark" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imgs/library_05.jpg" class="d-block img-fluid rounded mx-auto w-100 h-50" alt="..." >
            </div>
            <div class="carousel-item">
                <img src="imgs/library_06.jpg" class="d-block img-fluid rounded mx-auto w-100" alt="..." >
            </div>
            <div class="carousel-item">
                <img src="imgs/library_07.jpg" class="d-block img-fluid rounded mx-auto w-100" alt="..." >
            </div>
            <div class="carousel-item">
                <img src="imgs/library_04.jpg" class="d-block img-fluid rounded mx-auto w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

  <!-- SEÇÃO 1: NOVIDADES -->
    <section id="novidades" class="novidades">
        <h3 class="section-subtitle">Novidades</h3>
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-5 g-3">
    <?php

    $sql = "select AL.idAutor, AL.idLivro, L.idLivro, L.titulo, A.nomeAutor, ED.nome_editora, L.capa_url
            from autor_has_livros AL
            inner join livros L on AL.idLivro = L.idLivro
            inner join autor A on AL.idAutor = A.idAutor
            inner join editora ED on ED.idEditora = L.idEditora
            where L.status = '2' limit 10;";


    $result = $conn->query($sql);
    $livros = [];
    if ($result->num_rows > 0) {
        while ($linha = $result->fetch_assoc()) {
            $livros [] = $linha;

            ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?php echo $linha['capa_url'] ?>" class="card-img-top img-fluid m-auto py-2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $linha['titulo'] ?></h5>
                        <p class="card-text novidades_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus ullamcorper tortor, sed dictum diam feugiat at. Morbi dapibus vel quam et maximus. Vivamus ut justo eget turpis tempor tristique. </p>
                        <p class="novidades_p"><strong>Autor: </strong><?php echo $linha['nomeAutor'] ?></p>
                        <p class="novidades_p"><strong>Gênero: </strong>Romance</p>
                        <p class="novidades_p"><strong>Id Livro: </strong><?php echo $linha['idLivro'] ?></p>
                    </div>
                    <div class="card-footer footer-card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item footer-card">
                                <a href="usuarios/visualizarLivro.php" class="btn w-100 m-0 p-1" role="button" data-bs-toggle="button" aria-pressed="true"><p>Leia mais...</p></a>
                            </li>
                            <li class="list-group-item footer-card">
                                <a href="usuarios/visualizarLivro.php/" class="btn w-100 m-auto p-1"><p>Quero reservar</p></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

<?php
        }
    }
    $conn->close();
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
    ?>
          </div>
      </div>
  </section>

  <!-- SEÇÃO 2: TOP 10 LIVROS ALUGADOS -->
  <section id="top10">
    <h3 class="section-subtitle">Top 10 livros alugados</h3>
      <div class="container-fluid">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-5 g-3">
              <div class="col">
                  <div class="card">
                      <img src="imgs/quarto_de_despejo.jpg" class="card-img-top img-fluid m-auto" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Quarto de despejo</h5>
                          <p class="card-text novidades_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus ullamcorper tortor, sed dictum diam feugiat at. Morbi dapibus vel quam et maximus. Vivamus ut justo eget turpis tempor tristique. </p>
                          <p class="novidades_p"><strong>Autor: </strong>Carolina Maria de Jesus</p>
                          <p class="novidades_p"><strong>Gênero: </strong>Romance</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item bg-warning-subtle">
                              <a href="usuarios/visualizarLivro.php/" class="btn w-100 m-auto"><p>Quero reservar</p></a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                      <img src="imgs/dom_casmurro.jpg" class="card-img-top img-fluid m-auto" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Dom Casmurro</h5>
                          <p class="card-text novidades_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus ullamcorper tortor, sed dictum diam feugiat at. Morbi dapibus vel quam et maximus. Vivamus ut justo eget turpis tempor tristique. </p>
                          <p class="novidades_p"><strong>Autor: </strong>Machado de Assis</p>
                          <p class="novidades_p"><strong>Gênero: </strong>Romance</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item bg-warning-subtle">
                              <a href="usuarios/visualizarLivro.php/" class="btn w-100 m-auto"><p>Quero reservar</p></a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                      <img src="imgs/asMelhoresHistoriasDeMitologia.jpg" class="card-img-top img-fluid m-auto" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">As melhores histórias de mitologia</h5>
                          <p class="card-text novidades_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus ullamcorper tortor, sed dictum diam feugiat at. Morbi dapibus vel quam et maximus. Vivamus ut justo eget turpis tempor tristique. </p>
                          <p class="novidades_p"><strong>Autor: </strong>A.S. Francini</p>
                          <p class="novidades_p"><strong>Gênero: </strong>Mitologia</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item bg-warning-subtle">
                              <a href="usuarios/visualizarLivro.php/" class="btn w-100 m-auto"><p>Quero reservar</p></a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                      <img src="imgs/fabulasEParabolasAprendendoComAVida.jpg" class="card-img-top img-fluid m-auto" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Fábulas e parábolas - Aprendendo com a vida</h5>
                          <p class="card-text novidades_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus ullamcorper tortor, sed dictum diam feugiat at. Morbi dapibus vel quam et maximus. Vivamus ut justo eget turpis tempor tristique. </p>
                          <p class="novidades_p"><strong>Autor: </strong>Adailton Altoé</p>
                          <p class="novidades_p"><strong>Gênero: </strong>Mitologia</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item bg-warning-subtle">
                              <a href="usuarios/visualizarLivro.php/" class="btn w-100 m-auto"><p>Quero reservar</p></a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                      <img src="imgs/manonLescaut.jpg" class="card-img-top img-fluid m-auto" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Manon Lescaut</h5>
                          <p class="card-text novidades_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus ullamcorper tortor, sed dictum diam feugiat at. Morbi dapibus vel quam et maximus. Vivamus ut justo eget turpis tempor tristique. </p>
                          <p class="novidades_p"><strong>Autor: </strong>Abade Prevost</p>
                          <p class="novidades_p"><strong>Gênero: </strong>Romance</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item bg-warning-subtle">
                              <a href="usuarios/visualizarLivro.php/" class="btn w-100 m-auto"><p>Quero reservar</p></a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                      <img src="imgs/o_sobrevivente_quer_morrer_no_final.jpg" class="card-img-top img-fluid m-auto" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">O sobrevivente quer morrer no final</h5>
                          <p class="card-text novidades_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus ullamcorper tortor, sed dictum diam feugiat at. Morbi dapibus vel quam et maximus. Vivamus ut justo eget turpis tempor tristique. </p>
                          <p class="novidades_p"><strong>Autor: </strong>Adam Silveira</p>
                          <p class="novidades_p"><strong>Gênero: </strong>Romance</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item bg-warning-subtle">
                              <a href="usuarios/visualizarLivro.php/" class="btn w-100 m-auto"><p>Quero reservar</p></a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                      <img src="imgs/pelos_caminhos_de_minha_vida.jpg" class="card-img-top img-fluid m-auto" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Pelos caminhos da minha vida</h5>
                          <p class="card-text novidades_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus ullamcorper tortor, sed dictum diam feugiat at. Morbi dapibus vel quam et maximus. Vivamus ut justo eget turpis tempor tristique. </p>
                          <p class="novidades_p"><strong>Autor: </strong>A.J. Cronin</p>
                          <p class="novidades_p"><strong>Gênero: </strong>Biografia</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item bg-warning-subtle">
                              <a href="usuarios/visualizarLivro.php/" class="btn w-100 m-auto"><p>Quero reservar</p></a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                      <img src="imgs/sentimento_do_mundo.jpg" class="card-img-top img-fluid m-auto" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Sentimento do mundo</h5>
                          <p class="card-text novidades_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus ullamcorper tortor, sed dictum diam feugiat at. Morbi dapibus vel quam et maximus. Vivamus ut justo eget turpis tempor tristique. </p>
                          <p class="novidades_p"><strong>Autor: </strong>Carlos Drummond de Andrade</p>
                          <p class="novidades_p"><strong>Gênero: </strong>Romance</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item bg-warning-subtle">
                              <a href="usuarios/visualizarLivro.php/" class="btn w-100 m-auto"><p>Quero reservar</p></a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                      <img src="imgs/a_hora_da_estrela.jpg" class="card-img-top img-fluid m-auto" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">A hora da estrela</h5>
                          <p class="card-text novidades_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus ullamcorper tortor, sed dictum diam feugiat at. Morbi dapibus vel quam et maximus. Vivamus ut justo eget turpis tempor tristique. </p>
                          <p class="novidades_p"><strong>Autor: </strong>Clarice Lispector</p>
                          <p class="novidades_p"><strong>Gênero: </strong>Romance</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item bg-warning-subtle">
                              <a href="usuarios/visualizarLivro.php/" class="btn w-100 m-auto"><p>Quero reservar</p></a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col">
                  <div class="card">
                      <img src="imgs/o_cortico.jpg" class="card-img-top img-fluid m-auto" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">O cortiço</h5>
                          <p class="card-text novidades_p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus ullamcorper tortor, sed dictum diam feugiat at. Morbi dapibus vel quam et maximus. Vivamus ut justo eget turpis tempor tristique. </p>
                          <p class="novidades_p"><strong>Autor: </strong>Aluisio Azevedo</p>
                          <p class="novidades_p"><strong>Gênero: </strong>Romance</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item bg-warning-subtle">
                              <a href="usuarios/visualizarLivro.php/" class="btn w-100 m-auto"><p>Quero reservar</p></a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>

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
      <option value="1">Selecione o Gênero</option>
      <option value="2">Fantasia</option>
      <option value="3">Suspense</option>
      <option value="4">Terror</option>
      <option value="5">Finanças</option>
      <option value="6">Autoajuda</option>
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