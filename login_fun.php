<?php
include_once('config.php');

$erro = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize e validar os valores recebidos do formulário
    $cpf = mysqli_real_escape_string($conexao, $_POST['Cpf']);
    $senha = mysqli_real_escape_string($conexao, $_POST['Senha']);

    // Query para verificar se o CPF e a senha correspondem a um registro no banco de dados
    $query = "SELECT * FROM funcionarios WHERE Cpf = '$cpf' AND Senha = '$senha'";
    
    $result = mysqli_query($conexao, $query);

    if(mysqli_num_rows($result) == 1) {
        // Se o CPF e a senha correspondem, redireciona para a página de funcionários
        header("Location: most_fun.php");
        exit();
    } else {
        // Se o CPF ou a senha estiverem incorretos, exibe uma mensagem de erro
        echo "<script>alert('CPF ou senha inválidos');</script>";
        echo "<script>window.location = 'login_fun.php';</script>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>* {
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

        .box {
            color: white;
            position: absolute;
            top: 50%;
            left: 40%;
            transform: translate(-40%, -45%);
            background-color: rgba(0, 128, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 80%;
            max-width: 300px; /* Ajuste o máximo de largura conforme necessário */
            margin: 50px auto; /* Centralize vertical e horizontalmente */
        }

        fieldset {
            border: 3px solid Green;
            border-radius: 20px;
            padding: 30px;
        }

        legend {
            border: 10px solid Green;
            padding: 0px;
            text-align: center;
            background-color: Green;
            border-radius: 8px;
            color: white;
        }
        /*letras do formulario*/
        .inputBox {
            position: relative;
            margin-bottom: 20px;
        }
        /*linha do formulario*/
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
        /*letras do formulario*/
        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
            color: white;
        }

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
</style>
<body>
    <header>
        <div class="cabeçario">
            <h1>Salão de Beleza</h1>
            <nav>
                <ul>
                    <li><a href="login_fun.php">Funcionario</a></li>
                    <li><a href="funcionarios.php">Contas</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="box">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <fieldset>
                <legend><b>Login</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="Cpf" id="Cpf" class="inputUser" required>
                    <label for="Cpf" class="labelInput">Cpf</label>
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

        <a href="senha_nova_fun.php">Esqueceu a Senha?</a><br></br>
        <a href="cadastro_fun.php" class="btn">Não possuo cadastro</a>
        
        <input type="submit" id="submit" value="Confirmar">
        </fieldset>
    </form>
</body>
</html>
