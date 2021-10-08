<?php
include("conexao.php");
$data = date('Y/m/d');
$_SESSION['idUser'] = '1';

//OPerações de contagem de registros da tabela

//Conta o número de vendas do dia
$sql_vendas = "SELECT * FROM operacoes WHERE business_id = '$_SESSION[idUser]' AND data = '$data'";
$query_vendas = mysqli_query($con, $sql_vendas);
$count_vendas = mysqli_num_rows($query_vendas);

//Conta o número de produtos do negócio
$sql_produtos = "SELECT * FROM produtos WHERE business_id = '$_SESSION[idUser]'";
$query_produtos = mysqli_query($con, $sql_produtos);
$count_produtos = mysqli_num_rows($query_produtos);


//Conta o número de clientes ativos
$sql_clientes = "SELECT * FROM clientes WHERE business_id = '$_SESSION[idUser]' AND status = '1'";
$query_clientes = mysqli_query($con, $sql_clientes);
$count_cliente = mysqli_num_rows($query_clientes);


//Conta o número de clientes não ativos
$sql_desclientes = "SELECT * FROM clientes WHERE business_id = '$_SESSION[idUser]' AND status = '0'";
$query_desclientes = mysqli_query($con, $sql_desclientes);
$count_descliente = mysqli_num_rows($query_desclientes);

//Soma o valor das entradas do dia
$sql_retirada = "SELECT SUM(valor) AS totalR FROM retiradas WHERE business_id = '$_SESSION[idUser]' AND data = '$data'";
$query_retirada = mysqli_query($con, $sql_retirada);
$retirada = mysqli_fetch_assoc($query_retirada);


//Soma o valor das entradas do dia
$sql_suprimento = "SELECT SUM(valor) AS totalS FROM suprimento WHERE business_id = '$_SESSION[idUser]' AND data = '$data'";
$query_suprimento = mysqli_query($con, $sql_suprimento);
$suprimento = mysqli_fetch_assoc($query_suprimento);

//Soma o valor total dos creedores
$sql_val_cred = "SELECT SUM(valor) AS total FROM `credores` WHERE business_id='$_SESSION[idUser]'";
$query_val_cred = mysqli_query($con, $sql_val_cred);
$total_cred = mysqli_fetch_assoc($query_val_cred);


//Conta o número de produtos do negócio
$sql_cred = "SELECT * FROM credores WHERE business_id = '$_SESSION[idUser]'";
$query_cred = mysqli_query($con, $sql_cred);
$count_cred = mysqli_num_rows($query_cred);

//Pegar os credores
$sql_contas = "SELECT * FROM contas WHERE business_id = '$_SESSION[idUser]' AND status = '0'";
$query_contas = mysqli_query($con, $sql_contas);


//Pegar a quantidade ínima de estoque do produto
$sql_min_stock = "SELECT * FROM produtos WHERE business_id = '$_SESSION[idUser]'";
$query_min_stock = mysqli_query($con, $sql_min_stock);
$row_min_stock = mysqli_fetch_assoc($query_min_stock);
//Pegar Produtos em baixo estoque
$sql_estoque = "SELECT * FROM produtos WHERE qty_estoque <= min_qty_estoque AND business_id = '$_SESSION[idUser]'";
$query_stock_minimo = mysqli_query($con, $sql_estoque);


//Somar o valor total em produtos
//Soma o valor total dos creedores
$sql_val_prod = "SELECT SUM(preco) AS totalP FROM `produtos` WHERE business_id='$_SESSION[idUser]'";
$query_val_prod = mysqli_query($con, $sql_val_prod);
$total_prod = mysqli_fetch_assoc($query_val_prod);


//Conta o número de clientes ativos
$sql_count_bx_est = "SELECT * FROM produtos WHERE business_id = '$_SESSION[idUser]' AND qty_estoque <= min_qty_estoque";
$query_count_bx_est = mysqli_query($con, $sql_count_bx_est);
$count_prod_bx_est = mysqli_num_rows($query_count_bx_est);
