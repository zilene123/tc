<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salão de Beleza</title>
    <link rel="stylesheet" href="styl.css">
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    body {
        font-family: 'Great Vibes', cursive;
        background-color: #228B22;
    }

    .cabeçario {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    header {
        background-color:#228B22;
        color: #fff;
        padding: 20px 0;
    }

    header h1 {
        margin: 0;
        font-size: 24px;
    }

    nav ul {
        list-style-type: none;
    }

    nav ul li {
        display: inline;
        margin-right: 20px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
    }

    nav ul li a:hover {
        background-color: #004d00;
    }
    nav ul li a:hover {
        background-color: #004d00;
    }
    #banner {
        background-image: url('imagens/Espaço do galego.png');
        background-size: cover;
        color: #fff;
        padding: 100px 0;
        text-align: center;
    }

    #banner h2 {
        font-size: 36px;
        margin-bottom: 20px;
    }


    .btn {
        background-color: #228B22;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn:hover {
        background-color:#2E8B57;
    }

    #about {
        background-color: #fff;
        padding: 50px 0;
        text-align: center;
    }

    #about h2 {
        margin-bottom: 20px;
    }

    footer {
        background-color:#228B22;
        color: #fff;
        padding: 20px 0;
        text-align: center;
    }

</style>
<body>
    <header>
        <div class="cabeçario">
            <h1>Salão de Beleza</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="agend.php">Agendar</a></li>
                    <li><a href="catalago.php">Catálogo</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="banner">
        <div class="cabeçario">
            <h2>Bem-vindo ao nosso Salão de Beleza</h2>
            <p>Agende já o seu horário para os melhores serviços de beleza!</p>
            <br>
            <a href="agend.php" class="btn">Agendar agora</a>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <h2>Sobre nós</h2>
            <p>O espaço da beleza quer te proporcionar o melhor em tudo o que você possa imaginar, nosso maior dever é ver nossos clientes com o sorriso no rosto.</p>
            <p>Temos varios serviços! Para lhe atender, convido você a adentrar no site.</p>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>Nossa localização: Rua São Paulo</p>
            <p>Bela Parnamirim em Parnamirim</p>
            <p>Telefone:84 9195-2610</p>
        </div>
    </footer>
</body>
</html>
