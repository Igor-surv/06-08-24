<?php 
    require_once("config.php");

    if (isset($_GET['cadastrar'])) {
        $nome = $_GET['nome'];
        $cpf = $_GET['cpf'];
        $email = $_GET['email'];
        $telefone = $_GET['telefone'];
        $senha = $_GET['senha'];

        $sql = "INSERT INTO admin  (nome, cpf, email, telefone, senha) VALUES ('$nome', '$cpf', '$email', '$telefone', '$senha')" ; 
        $enviar = mysqli_query($conn, $comando);

        if ($enviar){
            header("location: admin.php ");
        }
        else{
            echo "Erro ao cadastrar";
        }
    }

?>