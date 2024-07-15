<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
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
        h2 {
            margin: 20px 0; 
            color:  #228B22;
            text-align: center; 
        }

        .botao {
            background-color: #006400;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: block;
            width: 100%; 
            font-size: 16px;
            margin-bottom: 10px; 
            cursor: pointer;
            border-radius: 20px; 
            transition: background-color 0.3s;
        }

        .botao:hover {
            background-color: #004d00; 
        }

        .album {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); 
            grid-gap: 20px;
            padding: 20px 0;
        }
        .album-item {
        display: flex; 
        justify-content: center;
        }

        .album-item img {
            
            width: 80%;
            height: auto;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }

        .album-item:hover img {
            transform: scale(1.05);
        }

        .teste {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 50px;
        }

        .image {
            width: 80%;
            height: auto;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }
        .image:hover {
            transform: scale(1.05);
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const overlayInput = document.getElementById('overlay-input');
        const overlayButton = document.getElementById('overlay-button');
        const overlay = document.getElementById('overlay');

        overlayButton.addEventListener('click', function() {
            overlayInput.checked = !overlayInput.checked; // Alterna o estado do input checkbox
            overlay.classList.toggle('active'); // Adiciona ou remove a classe 'active' do overlay
        });
    });
</script>    <br>
        <h2>Catálogo</h2><br>
               
        <button class="botao" onclick="window.location.href='#Cabeleireiro'">Cabeleireiro</button>
        <button class="botao" onclick="window.location.href='#Barbeiro'">Barbeiro</button>
        <button class="botao" onclick="window.location.href='#Manicure'">Manicure</button>
        <button class="botao" onclick="window.location.href='#Spa'">Spa</button><br>
    
        <h2 id="Cabeleireiro">Cabeleireiro</h1><br>
        
    <div class="album">
    <div class="album-item">
            <img src="https://blog.meninashoes.com.br/wp-content/uploads/2023/10/cabelo-com-corte-chanel.jpg" alt="Foto 7">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://images.elle.com.br/2023/05/baby-mullet-@sophdelucca-620x775.jpeg" alt="Foto 1">
            
        </div>
        <div class="album-item">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEj3sCvhzDQm5Am9-uVRcwLpmkHNzFhwmyMh9jndBqK0gjOwpOJ7h8fN-y_7m5aw6zXJab87Actat9eCVBUF6xvVSRsRFmt21GKyUQyQavXiu1RyhLUQxXQSRcCskit3EbIrL1PAu83N3V9LAVtkzHi58YSt35y0P3M7EzqghPkm57F_fNzujAmzKPSM3iT2/s676/cortes%20de%20cabelo%20tend%C3%AAncia%206.jpg" alt="Foto 2">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://moda20.com.br/wp-content/uploads/2023/01/cropped-Patricinha-Esperta-1200-e1673213811296.jpeg" alt="Foto 3">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://boadicadebeleza.com.br/wp-content/uploads/2023/08/Corte-de-cabelo-em-camadas-2.jpeg" alt="Foto 4">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://makeup.com.br/wp-content/uploads/2023/04/cortes-de-cabelo-feminino-assimetrico.webp" alt="Foto 5">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://likemagazine.com.br/midias/2023/11/escuros-2.jpg" alt="Foto 9">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://portaledicase.com/wp-content/uploads/2023/08/33-1024x683.jpeg" alt="Foto 6">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://blog.meninashoes.com.br/wp-content/uploads/2023/10/mulher-com-cabelo-loiro-meu-e-raiz-natural-819x1024.jpg" alt="Foto 6">
            <div class="overlay"></div>
        </div>
        
        <div class="album-item">
            <img src="https://www.oibonita.com.br/wp-content/uploads/2021/07/cabelo-curto-preto-51.png" alt="Foto 8">
            <div class="overlay"></div>
        </div>
        
    </div>
    </div>

       <h2 id="Barbeiro">Barbeiro</h1>
        
    <div class="album">
        <div class="album-item">
            <img src="https://blog.newoldman.com.br/wp-content/uploads/2022/08/Corte-de-Cabelo-Masculino-Com-Franja-4.jpg" alt="Foto 1">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://i.pinimg.com/736x/77/5e/56/775e56178bd7b9b74d56eb0a3bcb648c.jpg" alt="Foto 2">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://salaovirtual.org/wp-content/uploads/2022/03/em-crespo.jpg" alt="Foto 3">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://salaovirtual.org/wp-content/uploads/2022/03/com-degrade-4.jpg" alt="Foto 4">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://i.pinimg.com/736x/95/12/e1/9512e1b9de115e18186999c222ce6408.jpg" alt="Foto 4">
            <div class="overlay"></div>
        </div>
    
    <div class="album-item">
            <img src="https://i1.wp.com/blog.beard.com.br/wp-content/uploads/2021/03/corte-cabelo-masculino-curtos-25.jpg" alt="Foto 5">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgq-OvNMCH-4QxKieN6whUylovtXwiweS4BEIrxqBTJZ8-1ry0XOGDevAdEmwzQ1n7NBoDeYILjE-iThUa3vtbITwk84glwHxSwq5YwA6mVOpr7EOc1ToNWHWhS_x4rt3U3ZNaILb5p_pk/s1600/cortes-de-cabelo-masculino-2020-franja+%25287%2529.jpg" alt="Foto 6">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://i.pinimg.com/564x/39/8d/1d/398d1d10ef9decb180c7d39cc724bce0.jpg" alt="Foto 7">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://salaovirtual.org/wp-content/uploads/2022/03/Barba-de-lenhador-curta-5.jpg" alt="Foto 8">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://i0.wp.com/gay.blog.br/wp-content/uploads/2018/03/unnamed-2.jpg" alt="Foto 9">
            <div class="overlay"></div>
        </div>
    </div>

    <h2 id="Manicure">Manicure</h1>
        
    <div class="album">
        <div class="album-item">
            <i1mg src="https://nati.com.br/wp-content/uploads/2022/08/Gold-and-milky-white-nails-compressed-1.jpg" alt="Foto 1">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhBp1aR83pDlXA8D_svx5exJ48fGgW0-fTSsxONwU-HuXs8vnzfZY4bBOFzEK4gsNJTRkUHtkNy63asQOAF0GzQMSKGtxcomLzIj-tdor1nRF3Dl2g4CXbcefoBcW2X82XQEeSE1hQPen8/s1600/4-unhas-decoradas-cores-escuras-inverno.jpg" alt="Foto 2">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://boadicadebeleza.com.br/wp-content/uploads/2023/08/unhas-em-gel-decoradas-2024-degrade.jpg" alt="Foto 3">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://www.dicasdemulher.com.br/wp-content/uploads/2023/08/unhas-decoradas-rosa-0-788x480.jpg" alt="Foto 4">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://p2.trrsf.com/image/fget/cf/1200/1600/middle/images.terra.com/2023/03/21/705936761-4332230-unhas-decoradas-com-marrom-reunimos-d-sitemap-3.png" alt="Foto 4">
            <div class="overlay"></div>
        </div>
        
        <div class="album-item">
            <img src="https://unhasdegarota.com.br/wp-content/uploads/2023/03/img_6306.jpg" alt="Foto 5">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://mundodasunhas.com/wp-content/uploads/2023/10/d426e046-3c7e-468c-91ff-db6a525f6d91.jpg" alt="Foto 6">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://www.almanaquedamulher.com/wp-content/uploads/2024/03/Unhas-elegantes-geometricas.jpg" alt="Foto 7">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://olook.com.br/wp-content/uploads/2019/07/O-Look-Unhas-Decoradas-10-5.jpg" alt="Foto 8">
            <div class="overlay"></div>
        </div>
        <div class="album-item">
            <img src="https://boadicadebeleza.com.br/wp-content/uploads/2023/04/Unhas-DECORADAS-com-PRETO.png" alt="Foto 9">
    </div>

    <div class="container">
       <h2 id="Spa">Spa</h2>
    <div class="teste">
       <img class="image" src="https://destravaideias.com.br/wp-content/uploads/2023/05/spa-dos-pes2.png" alt="Imagem 1">
    </div>
    </div>
</body>
</html>
