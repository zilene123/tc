<?php
if(isset($_POST['submit'])) {
    include_once('config.php');
    
    $cpf = $_POST['cpf'];
    $senha = $_POST['Senha'];

    $sql = "SELECT * FROM funcionario WHERE Cpf = '$cpf' AND Senha = '$senha'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        // Redireciona para a página most_fun.php
        header("Location: most_fun.php");
        exit();
    } else {
        // Se não houver funcionário correspondente, exibe uma mensagem de erro e redireciona de volta para a página de login
        echo "CPF ou senha incorretos!";
        header("Refresh: 3; login_fun.php"); // Redireciona de volta para a página de login após 3 segundos
        exit();
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
     * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        }

        body {
            font-family: 'Great Vibes', cursive;
            background-color: #228B22;
            background-image: url('https://i0.wp.com/revistadecor.com.br/wp-content/uploads/2021/04/ALMA_36_R-scaled.jpg');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;
            padding-top: 0;
            padding-bottom: 20px; 
        }
        .cabeçario {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        header {
            background-color:#228B22;
            color: #fff;
            padding: 20px 0px;
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

        h2 {
            margin: 20px 0; 
            color: #ffffff;
            text-align: center; 
        }
        .box {
            color: white;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-45%, -45%);
            background-color: rgba(0, 128, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 60%;
        }

        fieldset {
        margin: 10px;
        border: 3px solid Green;
        border-radius: 10px;
        padding: 0px;
       }

        legend {
            border: 1px solid Green;
            padding: 10px;
            text-align: center;
            background-color: Green;
            border-radius: 8px;
            color: white;
        }

        .inputBox {
            position: relative;
            margin-bottom: 20px;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            padding: 5px;
            letter-spacing: 2px;
        }

        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
            color: white;
        }
        /* o detalhe das letras subirem no  formulario*/
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput {
            top: -20px;
            font-size: 12px;
            color: while;
        }
        #submit {
            background-image: linear-gradient(to right, rgb(0, 80, 0), rgb(0, 128, 0));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            margin-top: 20px;
        }

        #submit:hover {
            background-image: linear-gradient(to right, rgb(0, 60, 0), rgb(0, 100, 0));
        }
        .btn {
            display: inline-block;
            background-image: linear-gradient(to right, rgb(0, 80, 0), rgb(0, 128, 0));
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            text-decoration: none;
            margin-top: 20px;
            display: block;
            text-align: center;
        }

        .btn:hover {
            background-image: linear-gradient(to right, rgb(0, 60, 0), rgb(0, 100, 0));
        }
        .password-toggle-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .password-toggle-icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            width: 20px; 
            height: 20px; 
            fill: #fff; 
            transition: transform 0.3s ease; 
        }
        .password-toggle-icon:hover {
            transform: translateY(-50%) scale(1.2); 
        }
    @media only screen and (max-width: 600px) {
        .box {
            width: 80%;
            left: 50%;
            transform: translateX(-50%);
        }
    }

</style>
<body>
   <div class="container">
    <header>
        <div class="cabeçario">
            <h1>Salão de Beleza</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="agend.php">Agendar</a></li>
                    <li><a href="catalago.php">Catálogo</a></li>
                    <li><a href="login_fun.php">Funcionario</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="box">
        <form action="agend.php" method="post">
            <fieldset>
                <legend><b>Login</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">Cpf</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="Senha" id="Senha" class="inputUser" required>
                    <label for="Senha" class="labelInput">Senha</label>
                    
                    <img src="https://cdn-icons-png.flaticon.com/512/13/13523.png" class="password-toggle-icon" onclick="togglePasswordVisibility()" alt="Mostrar Senha">
                </div>
                <script>
                    function togglePasswordVisibility() {
                        var passwordInput = document.getElementById("Senha");
                        var passwordIcon = document.querySelector(".password-toggle-icon");

                        if (passwordInput.type === "password") {
                            passwordInput.type = "text";
                            passwordIcon.src = "https://cdn-icons-png.flaticon.com/512/125/125771.png"; // Altere o ícone para "olho fechado"
                        } else {
                            passwordInput.type = "password";
                            passwordIcon.src = "https://cdn-icons-png.flaticon.com/512/13/13523.png"; // Altere o ícone para "olho aberto"
                        }
                    }
                </script>
                <br>
                <input type="submit" name="submit" id="submit">
                <a href="most.php" class="btn">Cadastrar</a>
            </fieldset>
        </form>
    </div>


</body>
</html>
