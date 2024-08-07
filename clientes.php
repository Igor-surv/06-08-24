<?php
    require_once 'config.php';

    $sql = "SELECT * FROM clientes";
    $result = mysqli_query($conn, $sql);

    if (!$result){
        die("Erro ao executar a consulta: ". mysqli_error($conn));
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
    <link rel="stylesheet" type="text/css" href="clientes.css">

</head>
<body>

    <div class="menu">
            <ul>
                <li><a href="home.php">Inicio</a></li>
                <li><a href="pedidos_pendentes.php">Pedidos</a></li>
                <li><a href="estoque.php">Estoque</a></li>
                <li><a href="financeiro.php">Financeiro</a></li>
                <li><a href="relatorio.php">Relatorios</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="admin.php">Administradores</a></li>
            </ul>
        </div>

    <div class="container">
        <h1>Clientes</h1>
        <table>
            <button class="add"><a href="addCliente.html">Cadastrar cliente<a></button>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>CPF</th>
                    <th></th>
                    <tr>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['telefone']."</td>";
                echo "<td>".$row['endereco']."</td>";
                echo "<td>".$row['cpf']."</td>";
                echo "<td>
                <a class='btn btn-sm btn-primary' href='ediCli.php?id=$row[id]' title='Editar'>
                    <img src='https://cdn-icons-png.flaticon.com/512/1828/1828911.png' width='18px' height='18px'>
                </a>

                <a class='btn btn-sm btn-danger' href='delCli.php?id=$row[id]' title='Deletar'>
                    <img src='https://img.icons8.com/m_rounded/200/trash.png ' width='18px' height='18px'>
                </a>
                
                </td>";              
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