<?php
    require_once 'config.php';

    $sql = "SELECT * FROM itens ORDER BY codigo ASC";
    $result = mysqli_query($conn, $sql);

    if (!$result){
        die("Erro ao executar a consulta: ". mysqli_error($conn));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estoque.css">
    <title>Estoque</title>
</head>
<body>
    <aside>
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
    </aside>

    <h2>Gestão de itens no estoque</h2>
    <table>
    <button class="add"><a href="addEstoque.php">Adicionar Item</a></button>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Codigo</th>
                <th>Tipo</th>
                <th>Disponiveis</th>
                <th>Indisponiveis</th>
                <th>Quantidade total</th>

                <th></th>
            </tr>
            <tr>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['codigo']."</td>";
                echo "<td>".$row['tipo']."</td>";
                echo "<td>".$row['disponiveis']."</td>";
                echo "<td>".$row['indisponiveis']."</td>";
                echo "<td>".$row['quantidade']."</td>";
                echo "<td>
                 
                <a class='btn btn-sm btn-danger' href='editEstoque.php?nome=$row[nome]' title='Editar'>
                    <img src='https://cdn-icons-png.flaticon.com/512/1828/1828911.png' width='18px' height='18px'>
                </a>

                <a class='btn btn-sm btn-danger' href='deleteEstoque.php?nome=$row[nome]' title='Deletar'>
                    <img src='https://img.icons8.com/m_rounded/200/trash.png ' width='18px' height='18px'>
                </a>

            </td>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>