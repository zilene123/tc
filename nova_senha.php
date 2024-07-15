<?php
include_once('config.php');

// Verifica se o ID do agendamento foi fornecido via GET
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Verifica se o formulário de edição foi enviado
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize e validar os valores recebidos do formulário
        $novaSenha = mysqli_real_escape_string($conexao, $_POST['novaSenha']);
        $confirmarSenha = mysqli_real_escape_string($conexao, $_POST['confirmarSenha']);

        // Verifica se as senhas coincidem
        if($novaSenha === $confirmarSenha) {
            // Query para atualizar a senha no banco de dados
            $query_update = "UPDATE cliente SET Senha = '$novaSenha' WHERE id = $id";

            // Executa a consulta de atualização
            $result_update = mysqli_query($conexao, $query_update);

            // Verifica se a atualização foi bem-sucedida
            if($result_update) {
                // Redireciona para a página de sucesso após a edição
                header("Location: agend_edit.php");
                exit();
            } else {
                echo "<script>alert('Erro ao atualizar a senha');</script>";
            }
        } else {
            echo "<script>alert('As senhas não coincidem');</script>";
        }
    }
} else {
    echo "<script>window.location = 'senha_edit.php';</script>"; // Redireciona para a página de edição se o ID de agendamento não for fornecido
}

mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Senha</title>
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="post">
        <fieldset>    
        <legend><b>Nova senha</b></legend><br>
        <div class="inputBox">
                <input type="password" name="novaSenha" id="novaSenha" class="inputUser" required>
                <label for="novaSenha" class="labelInput">Nova Senha</label>
            </div>
            <div class="inputBox">
                <input type="password" name="confirmarSenha" id="confirmarSenha" class="inputUser" required>
                <label for="confirmarSenha" class="labelInput">Confirmar Senha</label>
            </div>
            <input type="submit" id="submit" value="Salvar">
        </form>
    </fieldset>
    
</body>
</html>
