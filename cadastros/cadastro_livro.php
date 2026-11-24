<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro</title>
    <link rel="icon" href="../imgs/Ellipse%203.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
    header("Location: ../processos/login.php");
    exit();
}
include '../php/includes/conexao.php';
    try {
        $conn = conectar();
        $sql = "SELECT idAutor, nome_autor FROM Autor ORDER BY nome_autor ASC";
        $result = $conn->query($sql);
        $autor = [];
        while ($linha = $result->fetch_assoc()) {
            $autor [] = $linha;
        }
        $sql = "SELECT idGenero, nome_genero FROM Genero ORDER BY nome_genero ASC";
        $result = $conn->query($sql);
        $genero = [];
        while ($linha = $result->fetch_assoc()) {
            $genero [] = $linha;
        }
        $sql = "SELECT idEditora, nome_editora FROM Editora ORDER BY nome_editora ASC";
        $result = $conn->query($sql);
        $editora = [];
        while ($linha = $result->fetch_assoc()) {
            $editora [] = $linha;
        }
        $sql = "SELECT idTradutor, nome_tradutor FROM Tradutor ORDER BY nome_tradutor ASC";
        $result = $conn->query($sql);
        $tradutor = [];
        while ($linha = $result->fetch_assoc()) {
            $tradutor [] = $linha;
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
            <a href="https://www.mg.gov.br/instituicao_unidade/escola-estadual-maria-luiza-miranda-bastos"
                target="_blank" rel="noopener noreferrer">SOBRE</a>
            <a href="cadastro_livro.php">CADASTROS</a>
            <a href="../processos/emprestimo_livro.php">EMPRÉSTIMOS</a>
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
            <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank"><img src="../imgs/instagram%20(1).png"
                    alt="Instagram" class="header-insta"></a>
        </div>
    </header>

    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="sidebar-item">BEM VINDO (A) <?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : ''; ?>!</div>
            <a href="cadastro_livro.php" class="sidebar-item active">CADASTRAR LIVRO</a>
            <a href="cadastro_eletronicos.php" class="sidebar-item">CADASTRAR ITENS ELETRÔNICOS E KITS</a>
            <a href="cadastro_autor.php" class="sidebar-item">CADASTRAR AUTOR</a>
            <a href="cadastro_genero.php" class="sidebar-item">CADASTRAR GÊNERO</a>
            <a href="cadastro_editora.php" class="sidebar-item">CADASTRAR EDITORA</a>
            <a href="cadastro_tradutor.php" class="sidebar-item">CADASTRAR TRADUTOR</a>
            <a href="cadastro_categoria.php" class="sidebar-item">CADASTRAR CATEGORIA</a>
            <a href="cadastro_bibliotecaria.php" class="sidebar-item">CADASTRAR BIBLIOTECÁRIA</a>
        </aside>

        <main class="admin-content">
            <h2 class="page-title" style="margin-bottom: 20px;">Cadastro de Livro</h2>

            <form action="../php/cadastros/cadastrar_livro.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="tabela" name="tabela" value="Livros">
                <div class="grid-row-3">
                    <div>
                        <label class="cad-label" for="numero">Número</label>
                        <input type="text" id="numero" name="numero" class="cad-input" required>
                    </div>
                    <div>
                        <label class="cad-label" for="titulo">Título</label>
                        <input type="text" id="titulo" name="titulo" class="cad-input" required>
                    </div>
                    <div>
                        <label class="cad-label" for="input_autor">Autor(es)</label>
                        <div class="field-tags-wrapper">
                            <div id="tags-autor" class="tags-container-inline"></div>
                            <input type="text" id="input_autor" class="cad-input input-inline" list="autor-list" aria-required="true" autocomplete="off">
                        </div>
                        <datalist id="autor-list">
                            <option value="">Selecione um autor</option>
                            <?php foreach ($autor as $aut): ?>
                                <option data-id="<?= $aut['idAutor'] ?>" value="<?= $aut['nome_autor'] ?>"></option>
                            <?php endforeach; ?>
                        </datalist>
                    </div>
                </div>

                <div class="grid-row-3-alt">
                    <div>
                        <label class="cad-label" for="input_tradutor">Tradutor(es)</label>
                        <div class="field-tags-wrapper">
                            <div id="tags-tradutor" class="tags-container-inline"></div>
                            <input type="text" id="input_tradutor" class="cad-input input-inline"list="tradutor-list" autocomplete="off">
                        </div>
                        <datalist id="tradutor-list">
                            <option value="">Selecione um tradutor</option>
                            <?php foreach ($tradutor as $trd): ?>
                                <option data-id="<?= $trd['idTradutor'] ?>" value="<?= $trd['nome_tradutor'] ?>"></option>
                            <?php endforeach; ?>
                        </datalist>
                    </div>
                    <div>
                        <label class="cad-label" for="input_genero">Gêneros</label>
                        <div class="field-tags-wrapper">
                            <div id="tags-genero" class="tags-container-inline"></div>
                            <input type="text" id="input_genero" class="cad-input input-inline" list="genero-list" aria-required="true" autocomplete="off">
                        </div>
                        <datalist id="genero-list">
                            <option value="">Selecione um gênero</option>
                            <?php foreach ($genero as $gen): ?>
                                <option data-id="<?= $gen['idGenero'] ?>" value="<?= $gen['nome_genero'] ?>"></option>
                            <?php endforeach; ?>
                        </datalist>
                    </div>
                    <div>
                        <label class="cad-label" for="edicao">Nº Edição</label>
                        <input type="number" id="edicao" name="edicao" class="cad-input" required>
                    </div>
                </div>

                <div class="grid-row-5">
                    <div>
                        <label class="cad-label" for="input_editora">Editora</label>
                        <input type="text" id="input_editora" class="cad-input" list="editora-list" required>
                        <input type="hidden" id="idEditora" name="idEditora">
                        <datalist id="editora-list">
                            <option value="">Selecione uma editora</option>
                            <?php foreach ($editora as $edit): ?>
                                <option data-id="<?= $edit['idEditora'] ?>" value="<?= $edit['nome_editora'] ?>"></option>
                            <?php endforeach; ?>
                        </datalist>
                    </div>
                    <div>
                        <label class="cad-label" for="idUf">UF</label>
                        <select class="cad-input" id="idUf" name="idUF" required>
                            <option value=""></option>
                            <option value="25">SP</option>
                            <option value="19">RJ</option>
                            <option value="1">AC</option>
                            <option value="2">AL</option>
                            <option value="3">AP</option>
                            <option value="4">AM</option>
                            <option value="5">BA</option>
                            <option value="6">CE</option>
                            <option value="7">DF</option>
                            <option value="8">ES</option>
                            <option value="9">GO</option>
                            <option value="10">MA</option>
                            <option value="11">MT</option>
                            <option value="12">MS</option>
                            <option value="13">MG</option>
                            <option value="14">PA</option>
                            <option value="15">PB</option>
                            <option value="16">PR</option>
                            <option value="17">PE</option>
                            <option value="18">PI</option>
                            <option value="20">RN</option>
                            <option value="21">RS</option>
                            <option value="22">RO</option>
                            <option value="23">RR</option>
                            <option value="24">SC</option>
                            <option value="26">SE</option>
                            <option value="27">TO</option>
                        </select>
                    </div>
                    <div>
                        <label class="cad-label" for="ano">Ano</label>
                        <input type="number" id="ano" name="ano" class="cad-input" required>
                    </div>
                    <div>
                        <label class="cad-label" for="numero_paginas">Nº Páginas</label>
                        <input type="number" id="numero_paginas" name="numero_paginas" class="cad-input" required>
                    </div>
                    <div>
                        <label class="cad-label" for="quantidade">Quantidade</label>
                        <input type="number" id="quantidade" name="quantidade" class="cad-input" required>
                    </div>
                </div>

                <div style="margin-bottom: 12px;">
                    <label class="cad-label" for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" class="cad-textarea" required></textarea>
                </div>

                <div class="capa-section">
                    <div>
                        <label class="cad-label">Capa</label>
                        <div class="cover-placeholder">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <span>Aguardando imagem...</span>
                            <img id="capa-preview" class="cover-preview" alt="Pré-visualização da capa do livro" hidden>
                        </div>
                    </div>

                    <div style="flex: 1; margin-top: 20px;">
                        <label class="btn-upload" for="capa_imagem">Carregar imagem</label>
                        <input type="file" id="capa_imagem" name="capa_imagem" accept="image/*" onchange="previewImagem(event)" hidden>
                        <div style="margin-top: 10px; max-width: 250px;">
                            <label class="cad-label" for="capa_url">Inserir URL</label>
                            <input type="text" id="capa_url" name="capa_url" class="cad-input" placeholder="https://exemplo.com" onchange="">
                        </div>
                    </div>

                    <div style="width: 150px;">
                        <label class="cad-label" for="status">Status</label>
                        <select class="cad-input" id="status" name="status" required>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="cad-buttons">
                    <button type="reset" class="btn-cancel">Cancelar</button>
                    <button type="submit" class="btn-submit">Cadastrar</button>
                </div>
            </form>
        </main>
    </div>

    <footer>
        <div class="footer-content-wrapper">
            <h4>Escola Estadual Maria Luiza Miranda Bastos</h4>
            <div class="footer-links">
                <a href="../index.php">INÍCIO</a>
                <a href="https://www.mg.gov.br/instituicao_unidade/escola-estadual-maria-luiza-miranda-bastos"
                    target="_blank" rel="noopener noreferrer">SOBRE A ESCOLA</a>
            </div>
            <div class="footer-info">
                Rua São José do Jacuri, 60 - Planalto - Belo Horizonte - MG | CEP 31720-370 | (31) 3443 7477<br>
                ©2026 E.E. MLMB. Todos os direitos reservados.
            </div>
        </div>
        <div class="footer-social">
            <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank" rel="noopener noreferrer"><img
                        src="../imgs/instagram%20(1).png" alt="Instagram"></a>
            <a href="https://www.facebook.com/pages/Escola-Estadual-Maria-Luiza-Miranda-Bastos/196619360362700"
                target="_blank" rel="noopener noreferrer"><img src="../imgs/facebook.png" alt="Facebook"></a>
            <a href="https://api.whatsapp.com/send?phone=553134437477" target="_blank" rel="noopener noreferrer"><img
                        src="../imgs/whastapp.png" alt="WhatsApp"></a>
        </div>
    </footer>
    <script>
    function sincronizarDatalist(inputId, hiddenId, datalistId) {
        const input = document.getElementById(inputId);
        const hidden = document.getElementById(hiddenId);
        const datalist = document.getElementById(datalistId);

        input.addEventListener('input', function() {
            const opcaoSelecionada = Array.from(datalist.options).find(opt => opt.value === this.value);
            hidden.value = opcaoSelecionada ? opcaoSelecionada.dataset.id : '';
        });
    }

    sincronizarDatalist('input_editora', 'idEditora', 'editora-list');


    function sincronizarMultiplasSelecoes(inputId, datalistId, containerId, fieldName, obrigatorio = false) {
        const input = document.getElementById(inputId);
        const datalist = document.getElementById(datalistId);
        const container = document.getElementById(containerId);

        function atualizarValidacao() {
            const textoDigitado = input.value.trim();
            const opcaoValida = Array.from(datalist.options)
                .some(opcao => opcao.dataset.id && opcao.value === textoDigitado);
            const possuiSelecao = container.querySelector('input[type="hidden"]') !== null;

            if (textoDigitado && !opcaoValida) {
                input.setCustomValidity('Selecione uma opção disponível na lista.');
            } else if (obrigatorio && !possuiSelecao) {
                input.setCustomValidity('Selecione pelo menos uma opção.');
            } else {
                input.setCustomValidity('');
            }
        }

        input.addEventListener('input', function () {
            const opcaoSelecionada = Array.from(datalist.options)
                .find(opcao => opcao.dataset.id && opcao.value === this.value.trim());

            if (opcaoSelecionada) {
                const id = opcaoSelecionada.dataset.id;
                const nome = opcaoSelecionada.value;
                const jaSelecionada = Array.from(container.querySelectorAll('input[type="hidden"]'))
                    .some(campo => campo.value === id);

                this.value = '';

                if (!jaSelecionada) {
                    const tag = document.createElement('span');
                    tag.className = 'tag-item';
                    tag.appendChild(document.createTextNode(nome));

                    const remover = document.createElement('button');
                    remover.type = 'button';
                    remover.className = 'btn-remove-tag';
                    remover.setAttribute('aria-label', `Remover ${nome}`);
                    remover.textContent = '\u00d7';
                    remover.addEventListener('click', function () {
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

    // Inicializa o gerenciador para cada campo
    sincronizarMultiplasSelecoes('input_autor', 'autor-list', 'tags-autor', 'idAutor', true);
    sincronizarMultiplasSelecoes('input_tradutor', 'tradutor-list', 'tags-tradutor', 'idTradutor');
    sincronizarMultiplasSelecoes('input_genero', 'genero-list', 'tags-genero', 'idGenero', true);

    document.querySelector('form').addEventListener('reset', function () {
        document.querySelectorAll('.tags-container-inline').forEach(container => {
            container.replaceChildren();
        });
        window.setTimeout(function () {
            ['input_autor', 'input_tradutor', 'input_genero'].forEach(inputId => {
                document.getElementById(inputId).dispatchEvent(new Event('input', { bubbles: true }));
            });
        }, 0);
    });

    let capaPreviewUrl = null;

    function previewImagem(event) {
        const input = event.target;
        const file = input.files[0];

        if (!file) {
            return;
        }
        if (!file.type.startsWith('image/')) {
            input.setCustomValidity('Selecione um arquivo de imagem.');
            input.reportValidity();
            input.value = '';
            return;
        }

        document.getElementById('capa_url').value = '';

        input.setCustomValidity('');
        if (capaPreviewUrl) {
            URL.revokeObjectURL(capaPreviewUrl);
        }
        capaPreviewUrl = URL.createObjectURL(file);

        document.getElementById('capa-preview').src = capaPreviewUrl;
        document.getElementById('capa-preview').hidden = false;
        document.querySelector('.cover-placeholder').classList.add('has-preview');
        document.querySelector('.cover-placeholder svg').hidden = true;
        document.querySelector('.cover-placeholder span').hidden = true;
    }

    document.querySelector('.admin-content form').addEventListener('reset', function() {
        const preview = document.getElementById('capa-preview');
        const input = document.getElementById('capa_imagem');

        if (capaPreviewUrl) {
            URL.revokeObjectURL(capaPreviewUrl);
            capaPreviewUrl = null;
        }
        preview.removeAttribute('src');
        preview.hidden = true;
        document.querySelector('.cover-placeholder').classList.remove('has-preview');
        document.querySelector('.cover-placeholder svg').hidden = false;
        document.querySelector('.cover-placeholder span').hidden = false;
        input.setCustomValidity('');
    });

    document.getElementById('capa_url').addEventListener('input', function() {
        const url = this.value.trim();
        const preview = document.getElementById('capa-preview');
        const inputFile = document.getElementById('capa_imagem');

        if (url) {
            // Limpa o input de arquivo
            inputFile.value = '';
            
            if (capaPreviewUrl) {
                URL.revokeObjectURL(capaPreviewUrl);
                capaPreviewUrl = null;
            }
            preview.src = url;
            preview.hidden = false;
            document.querySelector('.cover-placeholder').classList.add('has-preview');
            document.querySelector('.cover-placeholder svg').hidden = true;
            document.querySelector('.cover-placeholder span').hidden = true;
            inputFile.setCustomValidity('');
        } else {
            preview.removeAttribute('src');
            preview.hidden = true;
            document.querySelector('.cover-placeholder').classList.remove('has-preview');
            document.querySelector('.cover-placeholder svg').hidden = false;
            document.querySelector('.cover-placeholder span').hidden = false;
        }
    });


    </script>

</body>

</html>