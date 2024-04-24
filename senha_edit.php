<?php

if(isset($_POST['submit'])) {
    
    include_once('config.php');

    $senha_digitada = $_POST['senha_digitada'];
    $nome_cliente = $_POST['Nome']; 

    $consulta_senha = "SELECT Senha FROM cliente WHERE Nome = '$nome_cliente'";
    $resultado_consulta = mysqli_query($conexao, $consulta_senha);

    if($resultado_consulta) {
        if(mysqli_num_rows($resultado_consulta) == 1) {
            $linha = mysqli_fetch_assoc($resultado_consulta);
            $senha_correta = $linha['Senha'];

            if($senha_digitada == $senha_correta) {

                header("Location: editar.php");
                exit();
            } else {
                
                echo "<script>alert('Senha incorreta. Por favor, tente novamente.');</script>";
            }
        } else {
            
            echo "<script>alert('Cliente não encontrado. Por favor, verifique o nome e tente novamente.');</script>";
        }
    } else {
        
        echo "<script>alert('Ocorreu um erro ao verificar a senha. Por favor, tente novamente.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verificação de Senha</title>
    <style>
    </style>
</head>
<body>
    <form action="senha_edit.php" method="post">
        <label for="Nome">Digite o seu nome:</label>
        <input type="text" name="Nome" id="Nome" required>
        <br>
        <label for="senha_digitada">Digite a senha:</label>
        <input type="password" name="senha_digitada" id="senha_digitada" required>
        <button type="submit" name="submit">Enviar</button>
    </form>
</body>
</html>
