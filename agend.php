<?php
// Verificar se o formulário foi enviado
if(isset($_POST['submit'])) {
    // Incluir o arquivo de configuração do banco de dados
    include_once('config.php');

    // Obter os dados do formulário
    $Nome = $_POST['Nome'];
    $Telefone = $_POST['Telefone'];
    $Servico = $_POST['Servico'];
    $Dia = $_POST['Dia'];
    $Horario = $_POST['Horario'];

    // Verificar se já existe um agendamento para o mesmo serviço e horário
    $check_query = "SELECT * FROM cliente WHERE Servico='$Servico' AND Dia='$Dia' AND Horario='$Horario'";
    $check_result = mysqli_query($conexao, $check_query);

    if(mysqli_num_rows($check_result) > 0) {
        // Se já existir um agendamento, exibir uma mensagem de erro
        echo "<script>alert('Este horário já está agendado para o serviço selecionado. Por favor, escolha outro horário.');</script>";
    } else {
        // Se não houver conflito de horário, inserir o novo agendamento
        $insert_query = "INSERT INTO cliente(Nome, Telefone, Servico, Dia, Horario) VALUES ('$Nome', '$Telefone', '$Servico', '$Dia', '$Horario')";
        if(mysqli_query($conexao, $insert_query)) {
            // Redirecionar após o envio bem-sucedido do formulário
            echo "<script>window.location.href = 'most.php';</script>";
        } else {
            // Se houver algum erro durante a inserção, exibir uma mensagem de erro
            echo "<script>alert('Ocorreu um erro ao agendar o horário. Por favor, tente novamente.');</script>";
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
            background-size: cover; /* Ajusta a imagem para cobrir todo o fundo */
            background-position: center; /* Centraliza a imagem */
            background-repeat: no-repeat; /* Evita que a imagem se repita */
            padding-top: 0; /* Adicionando espaço acima do cabeçalho */
            padding-bottom: 20px; /* Adicionando espaço abaixo do conteúdo */
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
            background-color: #004d00; /* Tonalidade mais escura de verde ao passar o mouse */
        }
        /* Inicio da tabela */
        .box {
            color: white;
            position: absolute;
            top: 60%;
            left: 40%;
            transform: translate(-45%, -45%);
            background-color: rgba(0, 128, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 60%;
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
                    <li><a href="catalago.php">Catálogo</a></li>
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
                    <input type="text" name="Nome" id="Nome" class="inputUser" required>
                    <label for="Nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="Tel" name="Telefone" id="Telefone" class="inputUser" required>
                    <label for="Telefone" class="labelInput">Telefone</label>
                </div>
                <br>

                <label for="Servico">Serviços:</label>
                <select id="Servico" name="Servico" required>
                    <option value="">Escolha o serviço</option>
                    <option value="Barbeiro">Barbeiro</option>
                    <option value="Cabeleireiro">Cabeleireiro</option>
                    <option value="Manicure">Manicure</option>
                    <option value="Spa">Spa</option>
                </select>
                <br></br>
                <label for="Dia">Dia:</label>
                <input type="date" id="Dia" name="Dia" required>
                <br><br></br>
                <label for="Horario">Horário:</label>
                <input type="time" id="Horario" name="Horario" required>
                <br></br>
                <input type="submit" name="submit" id="submit">
                <a href="most.php" class="btn">Ver horários agendados...</a>
            </fieldset>
        </form>
    </div>
</body>
</html>