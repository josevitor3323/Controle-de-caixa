<?php
    include("../conexao.php");
$nome=$_POST['nome'];
$tel = $_POST['tel'];
$cpf = $_POST['cpf'];

    $sql = "INSERT INTO clientes (nome, telefone, cpf) VALUES ('$nome', '$tel', '$cpf')";
    $res = mysqli_query($con, $sql);
    if ($res) {
        header("Location: ../clientes.php");
    } else {
        var_dump($con);
        echo "<br/>";
        var_dump($res);
    }