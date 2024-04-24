<?php
// Verificar se o formulário foi enviado
if(isset($_POST['submit'])) {
    // Incluir o arquivo de configuração do banco de dados
    include_once('config.php');

    // Obter a senha do formulário
    $senha_digitada = $_POST['senha_digitada'];
    $nome_cliente = $_POST['Nome']; // Adicionei esta linha para obter o nome do cliente do formulário

    // Consultar o banco de dados para obter a senha correta com base no nome do cliente
    $consulta_senha = "SELECT Senha FROM cliente WHERE Nome = '$nome_cliente'";
    $resultado_consulta = mysqli_query($conexao, $consulta_senha);

    if($resultado_consulta) {
        if(mysqli_num_rows($resultado_consulta) == 1) {
            $linha = mysqli_fetch_assoc($resultado_consulta);
            $senha_correta = $linha['Senha'];

            // Verificar se a senha digitada está correta
            if($senha_digitada == $senha_correta) {
                // Senha correta, redirecionar para editar.php
                header("Location: editar.php");
                exit();
            } else {
                // Senha incorreta, exibir mensagem de erro
                echo "<script>alert('Senha incorreta. Por favor, tente novamente.');</script>";
            }
        } else {
            // Se o cliente não for encontrado, exibir mensagem de erro
            echo "<script>alert('Cliente não encontrado. Por favor, verifique o nome e tente novamente.');</script>";
        }
    } else {
        // Se houver algum erro durante a consulta, exibir mensagem de erro
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
        /* Estilos CSS podem ser adicionados aqui conforme necessário */
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
