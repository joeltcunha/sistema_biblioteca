<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operação Efetuada com Sucesso</title>
    <link rel="icon" href="../imgs/Ellipse%203.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['bibliotecaria']) || !$_SESSION['bibliotecaria']) {
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
        <a href="https://www.mg.gov.br/instituicao_unidade/escola-estadual-maria-luiza-miranda-bastos" target="_blank" rel="noopener noreferrer">SOBRE</a>
        <a href="../cadastros/cadastro_livro.php">CADASTROS</a>
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
        <a href="https://www.instagram.com/eemarialuizaoficial/" target="_blank" rel="noopener noreferrer">
            <img src="../imgs/instagram%20(1).png" alt="Instagram da Escola" class="header-insta">
        </a>
    </div>
</header>
<div class="admin-layout">
    <aside class="admin-sidebar">
    <div class="sidebar-item">BEM VINDO (A) <?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : ''; ?>!</div>
        <a href="../processos/emprestimo_livro.php" class="sidebar-item">EMPRÉSTIMO DE LIVRO</a>
        <a href="../processos/emprestimo_eletronicos.php" class="sidebar-item">EMPRÉSTIMO DE ITENS ELETRÔNICOS E KITS</a>
        <a href="../processos/devolucao.php" class="sidebar-item">DEVOLUÇÃO DE LIVRO</a>
        <a href="../processos/verificar_pendencias.php" class="sidebar-item">PENDÊNCIAS DE ALUNO</a>
    </aside>

    <main class="admin-content">
        <div class="msg-container">
            <h2 class="page-title">Operação realizada com sucesso</h2>
            <p>A operação foi concluída com sucesso, clique em "Continuar" para prosseguir.</p>
            <div class="msg-action">
                <button type="button" class="btn-blue" onclick="window.location.href='../processos/emprestimo_livro.php'">Continuar</button>
            </div>
        </div>
    </main>
</div>
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