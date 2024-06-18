<?php
if(isset($_POST['submit'])) {
    include_once('config.php');

    $Nome = $_POST['Nome'];
    $Telefone = $_POST['Telefone'];
    $Servico = $_POST['Servico'];
    $Dia = $_POST['Dia'];
    $Horario = $_POST['Horario'];
    $Senha = $_POST['Senha'];
    $Email = $_POST['Email'];

    // Verifica se o dia selecionado é válido (apenas para o dia seguinte ou seguintes)
    $hoje = strtotime('today');
    $data_selecionada = strtotime($Dia);

    if ($data_selecionada < $hoje) {
        echo "<script>alert('Desculpe, só aceitamos agendamentos para o dia seguinte ou seguintes. Por favor, escolha outra data.');</script>";
    } else {
        // Verifica se o horário está dentro do intervalo permitido (das 8h às 18h)
        $horario_inicio = strtotime("08:00:00");
        $horario_fim = strtotime("18:00:00");
        $horario_agendado = strtotime($Horario);
        // Se não estiver dentro do horário
        if ($horario_agendado < $horario_inicio || $horario_agendado > $horario_fim) {
            echo "<script>alert('Desculpe, só aceitamos agendamentos entre 8h e 18h. Por favor, escolha outro horário.');</script>";
        } else {
            $check_query = "SELECT * FROM cliente WHERE Servico='$Servico' AND Dia='$Dia' AND Horario='$Horario'";
            $check_result = mysqli_query($conexao, $check_query);

            if(mysqli_num_rows($check_result) > 0) {
                echo "<script>alert('Este horário já está agendado para o serviço selecionado. Por favor, escolha outro horário.');</script>";
            } else {
                $insert_query = "INSERT INTO cliente(Nome, Telefone, Servico, Dia, Horario, Senha, Email) VALUES ('$Nome', '$Telefone', '$Servico', '$Dia', '$Horario', '$Senha', '$Email')";
                if(mysqli_query($conexao, $insert_query)) {
                    header("Location: most.php"); // Redireciona para most.php após o agendamento ser salvo no banco de dados
                    exit(); // Encerra o script para evitar execução adicional
                } else {
                    echo "<script>alert('Ocorreu um erro ao agendar o horário. Por favor, tente novamente.');</script>";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agendamento - Salão de Beleza</title>
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
        /* Inicio da tabela */
        .box {
            color: white;
            position: absolute;
            top: 85%;
            left: 40%;
            transform: translate(-45%, -45%);
            background-color: rgba(0, 128, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 80%;
        }

        fieldset {
            border: 3px solid Green;
            border-radius: 10px;
            padding: 20px;
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
        .green-text {
            color: green;
        }
    </style>
</head>
<body>
    <header>
        <div class="cabeçario">
            <h1>Salão de Beleza</h1>
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
    <div class="box">
        <form action="agend.php" method="post">
            <fieldset>
                <legend><b>Fórmulário de agendamentos</b></legend>
                <br>
                <div class="inputBox">
                <div class="inputBox">
            <input type="text" name="Nome" id="Nome" class="inputUser" required placeholder="Ex: Maria Silva">
            <label for="Nome" class="labelInput">Nome completo</label>
        </div>
        <br>
        <div class="inputBox">
            <input type="tel" name="Telefone" id="Telefone" class="inputUser" required placeholder="Ex: 84 987337267">
            <label for="Telefone" class="labelInput">Telefone</label>
        </div>
        <br>
        <div class="inputBox">
            <input type="email" name="Email" id="Email" class="inputUser" required placeholder="Ex: mariasilva@gmail.com">
            <label for="Email" class="labelInput">Email</label>
        </div>
        
        <label for="Servico">Serviços:</label>
        <select id="Servico" name="Servico" required>
            <option value="">Escolha o serviço</option>
            <option value="Barbeiro">Barbeiro</option>
            <option value="Cabeleireiro">Cabeleireiro</option>
            <option value="Manicure">Manicure</option>
            <option value="Spa">Spa</option>
        </select>
        <br><br>
        <label for="Dia">Dia:</label>
        <input type="date" id="Dia" name="Dia" required>
        <br><br>
        <label for="Horario">Horário:</label>
        <input type="time" id="Horario" name="Horario" required>
        <br><br>
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
                <h4>Essa senha é para futuras modificações suas como editar ou cancelar o agendamento.Então escolha uma senha que você irá lembrar com facilidade e segura também.</h4>
                <br></br>
                <input type="submit" name="submit" id="submit">
                <a href="most.php" class="btn">Ver horários agendados...</a>
            </fieldset>
        </form>
    </div>
</body>
</html>
