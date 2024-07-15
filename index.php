<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salão de Beleza</title>
    <link rel="stylesheet" href="styl.css">

    <style>
        /* Reset CSS básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        /* Estilos do overlay de menu */
        #overlay-button {
            position: absolute;
            right: 2em;
            top: 2em;
            z-index: 1000;
            cursor: pointer;
        }

        #overlay-button span {
            display: block;
            width: 30px;
            height: 3px;
            background-color: #333;
            margin: 6px 0;
            transition: transform 0.3s ease;
        }

        #overlay-input {
            display: none;
        }

        #overlay-input:checked + #overlay-button span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        #overlay-input:checked + #overlay-button span:nth-child(2) {
            opacity: 0;
        }

        #overlay-input:checked + #overlay-button span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 999;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: scale(0);
            transition: transform 0.3s ease;
        }

        #overlay.active {
            transform: scale(1);
        }

        #overlay ul {
            list-style-type: none;
            text-align: center;
        }

        #overlay ul li {
            margin-bottom: 20px;
        }

        #overlay ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 2rem;
            transition: color 0.3s ease;
        }

        #overlay ul li a:hover {
            color: #228B22;
        }

        /* Estilos do cabeçalho */
        header {
            background-color:#fff;
            color: #228B22;
            padding: 20px 0;
            position: relative;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .cabecalho {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        header h1 {
            font-size: 2rem;
            margin-left: 20px;

        }

        nav ul {
            display: flex;
            list-style-type: none;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #228B22;

            font-size: 1.4rem;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #228B22;
        }

        /* Seção de banner */
        #banner {
            background-image: url('https://img.freepik.com/fotos-premium/fundo-interior-na-moda-sala-de-estar-decoracao-de-salao-verde-luxo-elegante-luz-de-parede-generative-ai_163305-173132.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 200px 200px;
            margin-top: 0px;
        }

        #banner h2 {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #fff;
            color: #228B22;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 1.4rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #fff;
        }

        /* Estilos do rodapé */
        footer {
            background-color: #fff;
            color: #228B22;
            padding: 20px 0;
            text-align: center;
            position: relative;
            margin-top: 50px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .cabecalho {
                flex-direction: column;
                align-items: flex-start;
            }

            header h1 {
                margin-left: 0;
                margin-bottom: 10px;
            }

            nav {
                display: none;
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                background-color: #6c5ce7;
                padding: 20px 0;
                text-align: center;
            }

            nav.active {
                display: block;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 10px 0;
            }

            #overlay-button {
                display: block;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="cabecalho">
            <h1>Salão de Beleza</h1>
            <input type="checkbox" id="overlay-input">
            <label for="overlay-input" id="overlay-button"><span></span><span></span><span></span></label>
            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="agend.php">Agendar</a></li>
                    <li><a href="catalogo.php">Catálogo</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="overlay">
        <ul>
            <li><a href="index.php">Início</a></li>
            <li><a href="agend.php">Agendar</a></li>
            <li><a href="catalogo.php">Catálogo</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
    </div>

    <section id="banner">
        <div class="cabeçario">
            <h2>Bem-vindo ao nosso Salão de Beleza</h2>
            <a href="agend.php" class="btn">Agendar um horário</a>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>Nossa localização: Rua São Paulo</p>
            <p>Bela Parnamirim - Parnamirim</p>
            <p>Telefone: 84 9195-2610</p>
        </div>
    </footer>

    <script>
        // JavaScript para alternar o menu responsivo
        document.querySelector('#overlay-button').addEventListener('click', function () {
            document.querySelector('#overlay').classList.toggle('active');
        });
    </script>
</body>
</html>
