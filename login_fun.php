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
<html lang="pt-br">
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

/* Estilos do formulário */
.box {
    color: white;
    position: absolute;
    top: 55%;
    left: 40%;
    transform: translate(-40%, -45%);
    background-color: rgba(0, 128, 0, 0.6);
    padding: 30px;
    border-radius: 15px;
    width: 80%;
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

.footer {
    background-color: #fff;
    color: #228B22;
    padding: 20px 0;
    text-align: center;
    position: relative;
    margin-top: 50px;
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
        <div class="cabecalho">
            <h1>Salão de Beleza</h1>
            <input type="checkbox" id="overlay-input">
            <label for="overlay-input" id="overlay-button"><span></span><span></span><span></span></label>
            <nav>
            <ul>
                    <li><a href="login_fun.php">Funcionario</a></li>
                    <li><a href="funcionarios.php">Contas</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="overlay">
                <ul>
                    <li><a href="login_fun.php">Funcionario</a></li>
                    <li><a href="funcionarios.php">Contas</a></li>
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
</script>


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
