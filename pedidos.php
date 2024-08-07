<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="pedidos.css">
    <title>Registro de pedidos</title>
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

    <article>
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data"> <!--Encaminhar o formulário em partes-->
    
                <h2>Registrar novos pedidos</h2>
    
    
                <label for="item">*Item buscado:</label>
                <input type="text" id="item" name="item" required>
    
                    <br><br>
    
                <label for="quant">*Quantidade:</label>
                <input type="number" id="quant" name="quant" required> 

                    <br><br>

                <label for="id_item">*ID do item:</label>
                <input type="number" id="id_item" name="id_item" required>
                
                    <br><br>
    
                <label for="nome_cl">*Nome do cliente:</label>
                <input type="text" id="nome_cl" name="nome_cl" required>
    
                    <br><br>
    
                <label for="id_cl">*ID do cliente:</label>
                <input type="number" id="id_cl" name="id_cl" required>
    
                    <br><br>
    
                <label for="detalhe">Detalhe do pedido:</label>
                <input type="text" id="detalhe" name="detalhe">
                
                    <br><br>

                <button type="submit">Enviar item</button>
            </form>
        </div>
    </article>
        <footer>
            <h6>© Site desenvolvido por InovaGest</h6>
        </footer>
        
</body>
</html>