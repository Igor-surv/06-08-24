<?php
if(!empty($_GET['id']))
    {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM pedidos WHERE id=$id";

        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM pedidos WHERE id=$id";
            $resultDelete = $conn->query($sqlDelete);
        }
        
    }
    header('Location: pedidos_pendentes.php');
   
?>