<?php
include_once('config.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    $query_delete = "DELETE FROM funcionarios WHERE id = $id";

    $result_delete = mysqli_query($conexao, $query_delete);

    if($result_delete) {
        echo "<script>alert('Agendamento excluído com sucesso');</script>";
        echo "<script>window.location = 'funcionarios.php';</script>"; 
    } 
    else {
        echo "<script>alert('Erro ao excluir o agendamento');</script>";
        echo "<script>window.location = 'most.php';</script>"; 
    }
} 
else {
    echo "<script>alert('ID ou senha do agendamento inválido');</script>";
    echo "<script>window.location = 'most.php';</script>"; 
}

mysqli_close($conexao);
?>
