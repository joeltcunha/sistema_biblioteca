
<?php
include "../php/includes/head.php";
?>
<link rel="stylesheet" href="../css/style.css">

    <title>EEMLMB - Login</title>
</head>
<body class="body-cadastro">

<?php
include "../php/includes/header_inicial.php"
?>

<main>
    <form action="../php/processos/logar.php" method="POST" class="login-container">
        <h2 class="page-title" style="margin-bottom: 15px;">Login</h2>

        <div>
            <label class="cad-label">Email</label>
            <input type="email" class="cad-input" name="email" required>
        </div>

        <div>
            <label class="cad-label">Senha</label>
            <input type="password" class="cad-input" name="senha" required>
        </div>

        <div class="login-buttons">
            <a href="../cadastros/cadastro_usuario.php" class="btn-blue-action">Cadastre-se</a>
            <button type="submit" class="btn-blue-action">Entrar</button>
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

</body>
</html>