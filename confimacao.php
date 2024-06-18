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
        echo "<script>window.location = 'confimacao.php';</script>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de identificação</title>
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
</style>
<body>
<div class="box">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <fieldset>
    <legend><b>Confirmação de identificação</b></legend><br>
    <div class="inputBox">
                <input type="text" name="id" id="id" class="inputUser" required>
                <label for="id" class="labelInput">Id</label>
               </div>
    <div class="inputBox">
                <input type="email" name="Email" id="Email" class="inputUser" required>
                <label for="Email" class="labelInput">Email</label>
               </div>
        <input type="submit" id="submit" value="Confirmar">
        <fieldset>
    </form>
</body>
</html>
