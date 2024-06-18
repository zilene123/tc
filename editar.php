<?php
include_once('config.php');

// Verifica se o ID do agendamento foi fornecido via GET
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Verifica se o formulário de edição foi enviado
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize e validar os valores recebidos do formulário
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $servico = mysqli_real_escape_string($conexao, $_POST['servico']);
        $dia = mysqli_real_escape_string($conexao, $_POST['dia']);
        $horario = mysqli_real_escape_string($conexao, $_POST['horario']);

        // Query para verificar se há algum agendamento no mesmo serviço, dia e horário, excluindo o agendamento atual
        $query_check = "SELECT * FROM cliente WHERE Servico = '$servico' AND Dia = '$dia' AND Horario = '$horario' AND id != $id";
        $result_check = mysqli_query($conexao, $query_check);

        if(mysqli_num_rows($result_check) > 0) {
            echo "<script>alert('Este horário já está ocupado para o serviço selecionado. Por favor, escolha outro horário.');</script>";
        } else {
            // Query para atualizar os dados no banco de dados
            $query_update = "UPDATE cliente SET Nome = '$nome', Servico = '$servico', Dia = '$dia', Horario = '$horario' WHERE id = $id";

            // Executa a consulta de atualização
            $result_update = mysqli_query($conexao, $query_update);

            // Verifica se a atualização foi bem-sucedida
            if($result_update) {
                // Redireciona para o arquivo most.php após a edição
                header("Location: most.php");
                exit();
            } else {
                echo "<script>alert('Erro ao atualizar o agendamento');</script>";
            }
        }
    }

    // Obtém os detalhes do agendamento atual para exibição no formulário de edição
    $query_select = "SELECT * FROM cliente WHERE id = $id";
    $result_select = mysqli_query($conexao, $query_select);

    if(mysqli_num_rows($result_select) == 1) {
        $row = mysqli_fetch_assoc($result_select);
        $nome = $row['Nome'];
        $servico = $row['Servico'];
        $dia = $row['Dia'];
        $horario = $row['Horario'];
    } else {
        echo "<script>alert('ID de agendamento inválido');</script>";
        echo "<script>window.location = 'senha_edit.php';</script>"; // Redireciona para a página de edição se o ID de agendamento for inválido
    }
} else {
    echo "<script>alert('ID de agendamento inválido');</script>";
    echo "<script>window.location = 'senha_edit.php';</script>"; // Redireciona para a página de edição se o ID de agendamento não for fornecido
}

mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
</head>
<style>
    * {
            margin: 0%;
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
            margin: 10px auto;
            padding: 0 20px;
        }
        header {
            background-color:#228B22;
            color: #fff;
            padding: 20px 10px;
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
            margin-right: 0px;
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
            top: 40%;
            left: 40%; /* espaço lateral */
            transform: translate(-45%, -45%);
            background-color: rgba(0, 128, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 80%;
        }

        fieldset {
            border: 3px solid Green;
            border-radius: 10px;
            padding: 10px;
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
<body>
<div class="box">
    <fieldset>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="post">
    <fieldset>
    <legend><b>Editar informações do agendamento</b></legend><br>
    
        <div class="inputBox">
        <label for="nome" class="labelInput">Nome:</label><br>
        <input type="text" id="nome" name="nome" class="inputUser" value="<?php echo $nome; ?>"><br>
        </div>

        <div class="inputBox"> 
        <label for="servico" class="labelInput">Serviço:</label><br>
        <select id="servico" name="servico">
            <option value="Barbeiro" <?php if($servico == 'Barbeiro') echo 'selected'; ?>>Barbeiro</option>
            <option value="Cabeleireiro" <?php if($servico == 'Cabeleireiro') echo 'selected'; ?>>Cabeleireiro</option>
            <option value="Manicure" <?php if($servico == 'Manicure') echo 'selected'; ?>>Manicure</option>
            <option value="Spa" <?php if($servico == 'Spa') echo 'selected'; ?>>Spa</option>
        </select><br>
        </div>
        <div class="inputBox">
        <label for="dia" class="labelInput">Dia:</label><br>
        <input type="date" id="dia" name="dia" class="inputUser" value="<?php echo $dia; ?>"><br>
        </div>
        <div class="inputBox">
        <label for="Horario" class="labelInput">Horário:</label><br>
        <input type="time" id="Horario" name="horario" class="inputUser" value="<?php echo $horario; ?>"><br><br>
        </div>
        <input type="submit" id="submit" value="Salvar ">
    
    </fieldset>
    </form>
</body>
</html
