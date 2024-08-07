<?php
    require_once 'config.php';


    $sql = "SELECT * FROM pedidos";
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
    <link rel="stylesheet" type="text/css" href="pendentes.css">
    <title>Pedidos</title>
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

    <h2>Lista de pedidos</h2>
    <table>
    <button class="add"> <a href="addPedido.php"> Adicionar Pedido </a> </button>
        <thead>
            <tr>
                <th>N°</th>
                <th>Item</th>
                <th>Quantidade</th>
                <th>ID do cliente</th>
                <th>Nome do cliente</th>
                <th>ID do administrador</th>
                <th>Detalhe do pedido</th>
                <th></th>
                <th>Status</th>
            </tr> 
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['item']."</td>";
                echo "<td>".$row['quantidade']."</td>";
                echo "<td>".$row['id_do_cliente']."</td>";
                echo "<td>".$row['nome_do_cliente']."</td>";
                echo "<td>".$row['id_do_admin']."</td>";
                echo "<td>".$row['detalhes']."</td>";
                echo "<td> 
                        <a class='btn btn-sm btn-primary' href='edit.php?id=$row[id]' title='Editar'>
                            <img src='https://cdn-icons-png.flaticon.com/512/1828/1828911.png' width='18px' height='18px'>
                        </a>
                        <a class='btn btn-sm btn-danger' href='delete.php?id=$row[id]' title='Deletar'>
                            <img src='https://img.icons8.com/m_rounded/200/trash.png ' width='18px' height='18px'>
                        </a>

                    </td>";
                echo "<td>".$row['status']."</td>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>    
    <footer>
        <h6>© Site desenvolvido por InovaGest</h6>
    </footer>
    
<script> 
    const tabela = document.querySelector('table');
    const linhas = tabela.querySelectorAll('tr');
    linhas.forEach((linha) => {
        const colunaStatus = linha.querySelector('td:nth-child(9)');
        if (colunaStatus.textContent === 'Concluido') {
            linha.classList.add('ativo');
        }
    });
</script>
</body>
</html>