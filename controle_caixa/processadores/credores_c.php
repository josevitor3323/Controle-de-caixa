<?php
    include("../conexao.php");
     $id = filter_input(INPUT_GET, "id",  FILTER_SANITIZE_NUMBER_INT);
$nome=$_POST['nome'];
$nao_cli = $_POST['nao-cli'];
$valor =str_replace(',','.',str_replace('.','', $_POST['valor']));

if ($nome=='0') {
    $sql = "INSERT INTO credores (nome, valor, business_id) VALUES ('$nao_cli', '$valor', '1')";
    $res = mysqli_query($con, $sql);
    if ($res) {
        header("Location: ../credores.php");
    } else {
        var_dump($con);
        echo "<br/>";
        var_dump($res);
    }
} else {
    //Pegar o valor qe o cliente está devendo para fazer a Atualização do valor 
    $buscar = "SELECT valor FROM credores WHERE nome = '$nome'";
    $query_buscar_valor = mysqli_query($con, $buscar);
    $row_buscar_valor = mysqli_fetch_assoc($query_buscar_valor);
    $valor_total = $row_buscar_valor['valor'] + $valor;

    $sql_nao = "UPDATE credores SET valor='$valor_total' WHERE nome = '$nome'";
    $res_nao = mysqli_query($con, $sql_nao);
    if ($res_nao) {
        header("Location: ../credores.php");
    } else {
        var_dump($con);
        echo "<br/>";
        var_dump($res);
    }
}