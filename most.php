<?php

include_once('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura as datas de início e fim do formulário
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    // Query SQL com filtro de datas
    $query = "SELECT * FROM cliente WHERE Status_Atendimento IS NULL AND Dia BETWEEN '$data_inicio' AND '$data_fim'";
} else {
    // Query SQL padrão sem filtro de datas
    $query = "SELECT * FROM cliente WHERE Status_Atendimento IS NULL";
}

$result = mysqli_query($conexao, $query);

$result = mysqli_query($conexao, $query);
if(mysqli_num_rows($result) > 0) {
    echo "<style>
            body {
                background-image: url('https://i0.wp.com/revistadecor.com.br/wp-content/uploads/2021/04/ALMA_36_R-scaled.jpg');
                background-size: cover;
                background-position: center;
                font-family: 'Great Vibes', cursive;
            }
            .h2{
                background-color: #008000;
            }
            .table-container {
                overflow-x: auto;
            }
            .styled-table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                border: 1px solid #ddd;
                border-radius: 10px; 
                overflow: hidden; 
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }
            .styled-table th,
            .styled-table td {
                padding: 12px 15px;
                text-align: left;
            }
            .styled-table th {
                background-color: #008000; 
                color: #fff; 
            }
            .styled-table tbody tr:nth-of-type(odd) {
                background-color: #3CB371; 
            }
            .styled-table tbody tr:nth-of-type(even) {
                background-color: #2E8B57; 
            }
            .styled-table tbody tr:hover {
                background-color: #7acba5; 
            }
            .styled-table tbody tr:last-of-type {
                border-bottom: none; 
            }
            .edit-btn,
            .delete-btn,
            .return-btn {
                padding: 6px 10px;
                margin-right: 5px;
                text-decoration: none;
                border-radius: 20px;
            }
            .edit-btn {
                background-color: #2E8B57; 
                color: #fff; 
            }
            .edit-btn:hover {
                background-color: #2E8B57;
            }
            .delete-btn {
                background-color: #dc3545; 
                color: #fff; 
            }
            .delete-btn:hover {
                background-color: #c82333; 
            }
            .return-btn {
                background-color:#2E8B57; 
                color: #fff; 
            }
            .return-btn:hover {
                background-color:#8FBC8F; 
            }
             .filter-form {
                background-color: #008000; /* Cor igual à do h2 */
                padding: 10px;
                border-radius: 0px;
                margin-bottom: 20px;
            }
            
        }   
        </style>";
        echo "<h2 style='background-color: #228B22; padding: 10px; color: #fff;'>Agendamentos</h2>";
        echo "<form action='".$_SERVER['PHP_SELF']."' method='post' class='filter-form'>";
        echo "<label for='data_inicio'>Data Inicial: </label>";
        echo "<input type='date' id='data_inicio' name='data_inicio'>";
        echo "<label for='data_fim'>  Data Final: </label>";
        echo "<input type='date' id='data_fim' name='data_fim'>";
        echo "<button type='submit' class='return-btn'>Filtrar</button>";
        echo "</form>";
    echo "<div class='box'>";
    echo "<div class='table-container'>";
    echo "<table class='styled-table'>";
    echo "<thead><tr><th>ID</th><th>Nome</th><th>Serviço</th><th>Dia</th><th>Horário</th><th>Ações</th></tr></thead>";
    echo "<tbody>";
    $count = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $count++;
        $color_class = $count % 2 == 0 ? 'even-row' : 'odd-row';
        echo "<tr class='$color_class'>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['Nome']."</td>";
        echo "<td>".$row['Servico']."</td>";
        echo "<td>".date('d/m/Y', strtotime($row['Dia']))."</td>";
        echo "<td>".$row['Horario']."</td>";
        echo "<td><a class='edit-btn' href='agend_edit.php?id=".$row['id']."'>Editar</a><a class='delete-btn' href='agend_cancelar.php?id=".$row['id']."'>Cancelar</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    
    echo "<a class='return-btn' href='index.php'>Voltar para o início</a>";
    echo "<a class='return-btn' href='agend.php'>Voltar, para agendar um novo horário</a>";
    echo "</div>";
    echo "</div>";
    
} else {
    echo "<p>Nenhum agendamento encontrado.</p>";
}
mysqli_close($conexao);
?>
