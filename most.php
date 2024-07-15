<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendados</title>
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

/* Estilos do overlay de menu */
#overlay-button {
    position: absolute;
    right: 2em;
    top: 2em;
    z-index: 1000;
    cursor: pointer;
}

#overlay-button span {
    display: block;
    width: 30px;
    height: 3px;
    background-color: #333;
    margin: 6px 0;
    transition: transform 0.3s ease;
}

#overlay-input {
    display: none;
}

#overlay-input:checked + #overlay-button span:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
}

#overlay-input:checked + #overlay-button span:nth-child(2) {
    opacity: 0;
}

#overlay-input:checked + #overlay-button span:nth-child(3) {
    transform: rotate(-45deg) translate(5px, -5px);
}

#overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    z-index: 999;
    display: flex;
    justify-content: center;
    align-items: center;
    transform: scale(0);
    transition: transform 0.3s ease;
}

#overlay.active {
    transform: scale(1);
}

#overlay ul {
    list-style-type: none;
    text-align: center;
}

#overlay ul li {
    margin-bottom: 20px;
}

#overlay ul li a {
    text-decoration: none;
    color: #fff;
    font-size: 2rem;
    transition: color 0.3s ease;
}

#overlay ul li a:hover {
    color: #228B22;
}

/* Estilos do cabeçalho */
header {
    background-color:#fff;
    color: #228B22;
    padding: 20px 0;
    position: relative;
    z-index: 1000;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.cabecalho {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
}

header h1 {
    font-size: 2rem;
    margin-left: 20px;

}

nav ul {
    display: flex;
    list-style-type: none;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #228B22;

    font-size: 1.4rem;
    transition: color 0.3s ease;
}

nav ul li a:hover {
    color: #228B22;
}

/* Estilos do formulário */
.box {
    color: white;
    position: absolute;
    top: 80%;
    left: 40%;
    transform: translate(-40%, -45%);
    background-color: rgba(0, 128, 0, 0.6);
    padding: 30px;
    border-radius: 15px;
    width: 80%;
}

.btn {
    background-color: #fff;
    color: #228B22;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    font-size: 1.4rem;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #fff;
}

.footer {
    background-color: #fff;
    color: #228B22;
    padding: 20px 0;
    text-align: center;
    position: relative;
    margin-top: 50px;
}

        fieldset {
            border: 3px solid Green;
            border-radius: 20px;
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
            left: 0px;

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
            transition: transform 0.3s ease; 
        }
        .password-toggle-icon:hover {
            transform: translateY(-50%) scale(1.2); 
        }
        /* Responsividade */
        @media (max-width: 768px) {
            .cabecalho {
                flex-direction: column;
                align-items: flex-start;
            }

            header h1 {
                margin-left: 0;
                margin-bottom: 10px;
            }

            nav {
                display: none;
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                background-color: #6c5ce7;
                padding: 20px 0;
                text-align: center;
            }

            nav.active {
                display: block;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 10px 0;
            }

            #overlay-button {
                display: block;
            }
        }
</style>
<body>
<header>
        <div class="cabecalho">
            <h1>Salão de Beleza</h1>
            <input type="checkbox" id="overlay-input">
            <label for="overlay-input" id="overlay-button"><span></span><span></span><span></span></label>
            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="agend.php">Agendar</a></li>
                    <li><a href="catalogo.php">Catálogo</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="overlay">
        <ul>
            <li><a href="index.php">Início</a></li>
            <li><a href="agend.php">Agendar</a></li>
            <li><a href="catalogo.php">Catálogo</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const overlayInput = document.getElementById('overlay-input');
        const overlayButton = document.getElementById('overlay-button');
        const overlay = document.getElementById('overlay');

        overlayButton.addEventListener('click', function() {
            overlayInput.checked = !overlayInput.checked; // Alterna o estado do input checkbox
            overlay.classList.toggle('active'); // Adiciona ou remove a classe 'active' do overlay
        });
    });
</script>



    <br>
</body>
</html>

<?php
include_once('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura as datas de início e fim do formulário
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    // Query SQL com filtro de datas
    $query = "SELECT * FROM cliente WHERE status_atendimento_id IS NULL AND Dia BETWEEN '$data_inicio' AND '$data_fim'";
} else {
    // Query SQL padrão sem filtro de datas
    $query = "SELECT * FROM cliente WHERE status_atendimento_id IS NULL";
}

$result = mysqli_query($conexao, $query);

$result = mysqli_query($conexao, $query);
if(mysqli_num_rows($result) > 0) {
    echo "<style>
            body {
                background-size: cover;
                background-position: center;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
                border-radius: 10px; 
            }
            .styled-table th,
            .styled-table td {
                padding: 12px 15px;
                text-align: left; //alinhado para a esquerda
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
            .delete-btn {
                background-color: #dc3545; 
                color: #fff; 
            }
            
            .return-btn {
                background-color:#2E8B57; 
                color: #fff; 
            }
            .return-btn:hover {
                background-color:#8FBC8F; 
            }
             .filter-form {
                padding: 10px;
                border-radius: 0px;
                margin-bottom: 20px;
            }
                
        }   
        </style>";
        echo "<h2 style='padding: 10px; color: #228B22'>Agendamentos</h2>";
        echo "<form action='".$_SERVER['PHP_SELF']."' method='post' class='filter-form'>";
        echo "<label for='data_inicio' style='color: #228B22;'>Data Inicial: </label>";
        echo "<input type='date' id='data_inicio' name='data_inicio'>";
        echo "<label for='data_fim' style='color: #228B22;'>  Data Final: </label>";
        echo "<input type='date' id='data_fim' name='data_fim'>";

        echo "<button type='submit' class='return-btn'>Filtrar</button>";
        echo "</form>";
    echo "<div class='table-container'>";
    echo "<table class='styled-table'>";
    echo "<thead><tr><th>Id</th><th>Nome</th><th>Serviço</th><th>Dia</th><th>Horário</th><th>Ações</th></tr></thead>";
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
