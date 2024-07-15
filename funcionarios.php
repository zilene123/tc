<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionarios</title>
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

</style>
<body>
<header>
        <div class="cabecalho">
            <h1>Salão de Beleza</h1>
            <input type="checkbox" id="overlay-input">
            <label for="overlay-input" id="overlay-button"><span></span><span></span><span></span></label>
            <nav>
            <ul>
                    <li><a href="login_fun.php">Funcionario</a></li>
                    <li><a href="funcionarios.php">Contas</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="overlay">
                <ul>
                    <li><a href="login_fun.php">Funcionario</a></li>
                    <li><a href="funcionarios.php">Contas</a></li>
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
</body>
</html>
<?php

include_once('config.php');

$query = "SELECT * FROM funcionarios";

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
                border-radius: 4px;
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
                
        </style>";
    
    echo "<br><h2 style='background-color: #fff; padding: 10px; color: #228B22;'>Funcionarios</h2><br>";
    
    echo "<table class='styled-table'>";
    echo "<thead><tr><th>ID</th><th>Nome</th><th>Ações</th></tr></thead>";
    echo "<tbody>";
    $count = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $count++;
        $color_class = $count % 2 == 0 ? 'even-row' : 'odd-row';
        echo "<tr class='$color_class'>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['Nome']."</td>";
        echo "<td><a class='edit-btn' href='fun.php?id=".$row['id']."'>Excluir</a>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    
    echo "<br><a class='return-btn' href='login_fun.php'>Voltar</a>";
    
    echo "</div>";
    
} else {
    echo "<p>Nenhum agendamento encontrado.</p>";
}
mysqli_close($conexao);
?>
