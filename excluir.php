<?php
include_once('config.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM cliente WHERE id=$id";
    mysqli_query($conexao, $query);

    // Redirecionamento após a exclusão do agendamento
    header("Location: most.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h2>Excluir Agendamento</h2>
    <p>Tem certeza de que deseja excluir este agendamento?</p>
    <a href="excluir.php?id=<?php echo $_GET['id']; ?>">Sim</a>
    <a href="most.php">Não</a>
</body>
</html>
