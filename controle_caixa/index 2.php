<?php
include("conexao.php");
?>

<html>
    <head>
        <title>Controle de caixa</title>
        <meta charset="utf-8">
        <style>
            body {
                background-color: #f1ecec;
            }
            .page {
                width: 300px;
                height: 500px;
                background-color: white;
                margin-left: 500px;
            }
           .alinhar {
               display: flex;
               width: 300px;
               flex-wrap: wrap;
               height: 300px;
               margin-left: 470px;
               margin-top: 200px;
               background-color: white;
           }
           .locais {
            margin-left: 15px;
            width: 130px;
            height: 100px;
            border-radius: 8px;
           }
           .locais:hover {
               background-color: rgb(158, 226, 243);
           }
           .locais a{
               text-decoration: none;;
               padding: 30px;
               color: black;
           }
           h1 {
               width: 100%;
               margin-left: 5px;
               border-bottom: solid 2px #DCDCDC;
           }
          
        </style>
    </head>
    <body>
    
        <div class="alinhar">
            <h1><b><font face="helvetica">Selecione</font></b></h1>
            <div class="locais"><br/><br/><a href="contas_pagar.php">Contas</a></div>
            <div class="locais"><br/><br/><a href="retiradas.php">Retiradas e &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Suprimento</a></div>
            <div class="locais"><br/><br/><a href="clientes.php">Clientes</a></div>
            <div class="locais"><br/><br/><a href="credores.php">Credores</a></div>
        </div>
    
    </body>
</html>