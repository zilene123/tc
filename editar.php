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
   body {
            background-image: url('https://i0.wp.com/revistadecor.com.br/wp-content/uploads/2021/04/ALMA_36_R-scaled.jpg');
            background-size: cover;
            font-family: 'Great Vibes', cursive;
        }

        h2 {
            color: #fff;
            background-color:Green;
        }
        label{
            color:#fff;
            padding: 10px;
            
            
        }
        fieldset {
            border: 30px solid Green;
            border-radius: 10px;
            padding: 20px;
            background-color:#5dd55d;
            

        }
        input[type="text"],
        input[type="password"] {
            border-radius: 20px;
            padding: 10px;
            
            border-radius: 20px;
            margin-bottom: 10px;
            border: none;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #008000;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 20px;
            padding: 10px 30px;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #005700;
        }

        select {
            border-radius: 30px;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            font-size: 16px;
        }
</style>
<body>
    <center> 
    <fieldset>
    <h2>Editar Agendamento</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>"><br>
        <label for="servico">Serviço:</label><br>
        <select id="servico" name="servico">
            <option value="Barbeiro" <?php if($servico == 'Barbeiro') echo 'selected'; ?>>Barbeiro</option>
            <option value="Cabeleireiro" <?php if($servico == 'Cabeleireiro') echo 'selected'; ?>>Cabeleireiro</option>
            <option value="Manicure" <?php if($servico == 'Manicure') echo 'selected'; ?>>Manicure</option>
            <option value="Spa" <?php if($servico == 'Spa') echo 'selected'; ?>>Spa</option>
        </select><br>
        <label for="dia">Dia:</label><br>
        <input type="date" id="dia" name="dia" value="<?php echo $dia; ?>"><br>
        <label for="Horario">Horário:</label><br>
        <input type="time" id="Horario" name="horario" value="<?php echo $horario; ?>"><br><br>
        <input type="submit" value="Salvar ">
    </form>
    </fieldset>
    </center>
</body>
</html
