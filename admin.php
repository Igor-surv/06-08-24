<?php
   require_once 'config.php';


    $sql = "SELECT * FROM admin";
    $result = mysqli_query($conn, $sql);

    if (!$result){
        die("Erro ao executar a consulta: ". mysqli_error($conn));
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
    
    <div class="menu">
          <ul>
            <li><a href="home.php">Inicio</a></li>
            <li><a href="pedidos_pendentes.php">Pedidos</a></li>
            <li><a href="estoque.php">Estoque</a></li>
            <li><a href="financeiro.php">Financeiro</a></li>
            <li><a href="#">Relatorios</a></li>
            <li><a href="clientes.php">Clientes</a></li>
            <li><a href="admin.php">Administradores</a></li>
          </ul>
    </div>

    <div class="container">
        <h1>Administradores</h1>
        <table> 
        <button class="add"> <a href="cadastroAdm.html">Adicionar administrador</svg></a> </button>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Telefone</th>
                </tr>
                <tr>
                </tr>
            </thead>
            <tbody id="admin-list">
            <?php
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['cpf']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['telefone']."</td>";
            }
            mysqli_close($conn);
            ?>
            </tbody>
        </table>
    </div>
    
    <footer>
        <h6>© Site desenvolvido por InovaGest</h6>
    </footer>
</body>
</html>