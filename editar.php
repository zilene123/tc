<?php
include_once('config.php');
if(isset($_POST['submit'])) {

    $id = $_POST['id'];
    $Nome = $_POST['Nome'];
    $Telefone = $_POST['Telefone'];
    $Servico = $_POST['Servico'];
    $Dia = $_POST['Dia'];
    $Horario = $_POST['Horario'];

    $query = "UPDATE cliente SET Nome='$Nome', Telefone='$Telefone', Servico='$Servico', Dia='$Dia', Horario='$Horario' WHERE id=$id";
    
    mysqli_close($conexao);

    // Redirecionamento após a edição do agendamento
    header("Location: most.php");

}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conexao, "SELECT * FROM cliente WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-image: url('https://i0.wp.com/revistadecor.com.br/wp-content/uploads/2021/04/ALMA_36_R-scaled.jpg');
            background-size: cover;
            background-position: center;
        }
        h2{
            background-color:#228B22;
        }
        
    </style>
</head>
<body>
    <h2>Editar Agendamento</h2>
    <form action="editar.php" method="post">
    <fieldset>
                <legend><b>Fórmulário de agendamentos</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="Nome" id="Nome" class="inputUser" required>
                    <label for="Nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="Tel" name="Telefone" id="Telefone" class="inputUser" required>
                    <label for="Telefone" class="labelInput">Telefone</label>
                </div>
                <br>

                <label for="Servico">Serviços:</label>
                <select id="Servico" name="Servico" required>
                    <option value="">Escolha o serviço</option>
                    <option value="Barbeiro">Barbeiro</option>
                    <option value="Cabeleireiro">Cabeleireiro</option>
                    <option value="Manicure">Manicure</option>
                    <option value="Spa">Spa</option>
                </select>
                <br></br>
                <label for="Dia">Dia:</label>
                <input type="date" id="Dia" name="Dia" required>
                <br><br></br>
                <label for="Horario">Horário:</label>
                <input type="time" id="Horario" name="Horario" required>
                <br></br>
                <div class="inputBox">
                    <input type="password" name="Senha" id="Senha" class="inputUser" required>
                    <label for="Senha" class="labelInput">Senha</label>
                
                    
                    <img src="https://cdn-icons-png.flaticon.com/512/13/13523.png" class="password-toggle-icon" onclick="togglePasswordVisibility()" alt="Mostrar Senha">
                </div>
                <script>
                    function togglePasswordVisibility() {
                        var passwordInput = document.getElementById("Senha");
                        var passwordIcon = document.querySelector(".password-toggle-icon");

                        if (passwordInput.type === "password") {
                            passwordInput.type = "text";
                            passwordIcon.src = "https://cdn-icons-png.flaticon.com/512/125/125771.png"; //  "olho fechado"
                        } else {
                            passwordInput.type = "password";
                            passwordIcon.src = "https://cdn-icons-png.flaticon.com/512/13/13523.png"; // "olho aberto"
                        }
                    }
                </script>
                <br></br>
                <input type="submit" name="submit" id="submit">
                <a href="most.php" class="btn">Ver horários agendados...</a>
            </fieldset>
    </form>
    
</body>
</html>
