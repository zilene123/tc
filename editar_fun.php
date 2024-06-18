<?php
include_once('config.php');

$erro = "";

// Verifica se o ID do agendamento foi passado via GET
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conexao, $_GET['id']);

    // Verifica se o formulário de edição foi submetido
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize e validar os valores recebidos do formulário
        $novo_valor = mysqli_real_escape_string($conexao, $_POST['novo_valor']);
        $nova_descricao = mysqli_real_escape_string($conexao, $_POST['nova_descricao']);
        $novo_status = mysqli_real_escape_string($conexao, $_POST['novo_status']);

        // Query para atualizar os campos no banco de dados
        $query = "UPDATE cliente SET Valor='$novo_valor', Descricao='$nova_descricao', Status_Atendimento='$novo_status' WHERE id=$id";
        $resultado = mysqli_query($conexao, $query);

        if($resultado) {
            // Redireciona de volta para a página de agendamentos após a edição
            header("Location: most_fun.php");
            exit();
        } else {
            // Se houver algum erro na consulta SQL, exibe uma mensagem de erro
            $erro = "Erro ao atualizar os dados. Por favor, tente novamente.";
        }
    }

    // Query para obter os dados do agendamento com base no ID fornecido
    $query_select = "SELECT Nome, Servico, Dia, Horario, Valor, Descricao, Status_Atendimento FROM cliente WHERE id = $id";
    $resultado_select = mysqli_query($conexao, $query_select);

    if(mysqli_num_rows($resultado_select) == 1) {
        $dados_agendamento = mysqli_fetch_assoc($resultado_select);
    } else {
        // Se não houver nenhum agendamento com o ID fornecido, redireciona de volta para a página de agendamentos
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
} else {
    // Se nenhum ID de agendamento foi fornecido via GET, redireciona de volta para a página de agendamentos
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <style>
        * {
            margin: 1px;
            padding: 0%;
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
            padding-top: 0px;
            padding-bottom: 0; 
        }
        header {
            background-color:#228B22;
            color: #fff;
            padding: 0px 0px;
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
            top: 50%;
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
            padding: 10px;
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
<div class="box">
    <!-- Seu formulário de edição aqui -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>" method="post">
        <fieldset>
        <legend><b>Alterações</b></legend>
        <br>
        <div class="inputBox">
        <label for="novo_valor">Novo Valor:</label>
        <input type="text" id="novo_valor" name="novo_valor" value="<?php echo $dados_agendamento['Valor']; ?>">
        </div>
        <label for="nova_descricao">Nova Descrição:</label>
        <input type="text" id="nova_descricao" name="nova_descricao" value="<?php echo $dados_agendamento['Descricao']; ?>">
        <label for="novo_status">Novo Status de Atendimento:</label>
        <select id="novo_status" name="novo_status">
            <option value="Atendido" <?php echo ($dados_agendamento['Status_Atendimento'] == 'Atendido') ? 'selected' : ''; ?>>Atendido</option>
            <option value="Cliente Ausente" <?php echo ($dados_agendamento['Status_Atendimento'] == 'Cliente Ausente') ? 'selected' : ''; ?>>Cliente Ausente</option>
        </select>
        <input type="submit" name="submit" id="submit" value="Salvar Alterações">
    </form>
</body>
</html>
