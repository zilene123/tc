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
                header("Location: senha_edit.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Senha</title>
</head>
<style>
   body {
        background-image: url('https://i0.wp.com/revistadecor.com.br/wp-content/uploads/2021/04/ALMA_36_R-scaled.jpg');
        background-size: cover;
        font-family: 'Great Vibes', cursive;
        color: #fff;
    }

    h2 {
        color: #fff;
        background-color:Green;
        padding: 10px;
        border-radius: 10px;
    }

    label {
        color: #fff;
        padding: 10px;
    }

    fieldset {
        border: 30px solid Green;
        border-radius: 10px;
        padding: 20px;
        background-color:#5dd55d;
    }

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
</style>
<body>
    <center> 
    <fieldset>
        <h2>Editar Senha</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="post">
            <div class="inputBox">
                <input type="password" name="novaSenha" id="novaSenha" class="inputUser" required>
                <label for="novaSenha" class="labelInput">Nova Senha</label>
            </div>
            <div class="inputBox">
                <input type="password" name="confirmarSenha" id="confirmarSenha" class="inputUser" required>
                <label for="confirmarSenha" class="labelInput">Confirmar Senha</label>
            </div>
            <input type="submit" value="Salvar">
        </form>
    </fieldset>
    </center>
</body>
</html>
