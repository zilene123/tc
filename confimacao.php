<?php
include_once('config.php');

$erro = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize e validar os valores recebidos do formulário
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    $Email = mysqli_real_escape_string($conexao, $_POST['Email']);

    // Query para verificar se o ID e a senha correspondem a um registro no banco de dados
    $query = "SELECT * FROM cliente WHERE id = '$id' AND Email = '$Email'";
    
    $result = mysqli_query($conexao, $query);

    if(mysqli_num_rows($result) == 1) {
        // Se a senha e o ID correspondem, redireciona para a página de edição
        header("Location: nova_senha.php?id=$id");
        exit();
    } else {
        // Se a senha ou o ID estiverem incorretos, exibe uma mensagem de erro
        echo "<script>alert('ID ou senha do agendamento inválido');</script>";
        echo "<script>window.location = 'confirmacao.php';</script>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Email e ID</title>
</head>
<style>
   body {
            background-image: url('https://i0.wp.com/revistadecor.com.br/wp-content/uploads/2021/04/ALMA_36_R-scaled.jpg');
            background-size: cover;
            font-family: 'Great Vibes', cursive;
        }

        h2 {
            color: #fff;
            background-color:#228B22;
        }
        label{
            color:#fff;
        }
        input[type="text"],
        input[type="password"] {
            border-radius: 20px;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #228B22;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #005700;
        }

        /* Estilos adicionais para o link */
        a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            margin-top: 10px; /* Adiciona um espaço entre o botão e o link */
            display: inline-block; /* Para garantir que o link fique ao lado do botão */
        }
        a:hover {
            text-decoration: underline;
        }
</style>
<body>
    <center>
    <h2>Verificar ID e Email</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="Email">Email:</label><br>
        <input type="text" id="Email" name="Email"><br>
        <input type="submit" value="Confirmar">
    </form></center>
</body>
</html>
