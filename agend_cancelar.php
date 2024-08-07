<?php
// Inclui o arquivo de configuração que provavelmente contém a conexão com o banco de dados
include_once('config.php');

$erro = "";

// Verifica se o método da requisição é POST
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize e validar os valores recebidos do formulário
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

     // Monta a query SQL para verificar se o ID e a senha correspondem a um registro no banco de dados
    $query = "SELECT * FROM cliente WHERE id = '$id' AND Senha = '$senha'";
    
    $result = mysqli_query($conexao, $query);
    // Verifica se retornou exatamente um registro
    if(mysqli_num_rows($result) == 1) {
        // Se a senha e o ID correspondem, redireciona para a página de edição
        header("Location: excluir.php?id=$id");
        exit();
    } else {
        // Se a senha ou o ID estiverem incorretos, exibe uma mensagem de erro
        echo "<script>alert('ID ou senha do agendamento inválido');</script>";
        echo "<script>window.location = 'senha_edit.php';</script>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Senha e ID</title>
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff;
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
</style>
<body>
    <div class="box">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <fieldset>
    <legend><b>Confirmação de identidade</b></legend>
        <br>
        <div class="inputBox">
        <label for="id" class="labelInput">Id:</label><br>
        <input type="text" id="id" name="id" class="inputUser" required><br>
        
        <div class="inputBox">
        <label for="senha" class="labelInput">Senha:</label><br>
        <input type="password" id="senha" name="senha" class="inputUser" required><br>
        
        <a href="confimacao.php">Esqueceu a Senha?</a><br></br>
        <input type="submit"  id="submit" value="Confirmar">
        </fieldset>
    </form>
</body>
</html>
