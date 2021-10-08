<?php
include("conexao.php");

include("operacoes.php");
$sql = "SELECT * FROM clientes WHERE business_id = '$_SESSION[idUser]'";
$query = mysqli_query($con, $sql);

//Pegar os credores
$sql_cred = "SELECT * FROM credores WHERE business_id = '$_SESSION[idUser]'";
$query_cred = mysqli_query($con, $sql_cred);
?>

<html>
  <head>
    <title>Credores</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    
    <style>

      .g-4 { margin-top: 75px; margin-left: 6px;}
      .p-3 {margin-top: 10px;}

.mlh-clientes {width: 400px; height: auto; background-color: white; margin-left: 20px; border-radius: 4px;}
@media only screen and (max-width: 800px){
    .mlh-clientes { margin-left: 0px;;}

} 
.h4 {padding: 4px; width: 100%; }

.prod-bx-est {width: 800px; height: auto; background-color: white; margin-top: 25px; margin-left: 20px; border-radius: 4px;}
@media only screen and (max-width: 800px){
    .prod-bx-est {width: 340px; margin-left: -10px;;}

} 
.dropdown-btn {background-color: white; border:none;}
.dropdown-btn:hover {
  color: #f1f1f1;
}


.dropdown-container {
  display: none;
  background-color: #ccc;
  padding-left: 8px;
}

*{ margin: 0; padding: 0;}

#nav {margin: 0; padding: 0; }
#nav li {list-style: none; background: #F0F0F0; width: 250 px; outline: none;}
#nav li a, #nav li label {display: block; font-weight: bold; padding: 8px; ; text-decoration: none;  color: #555; cursor: pointer;}
#nav li a:hover, #nav li label:hover { background: white;}
#nav li ul, #nav li input{display: none;}

#nav li input:checked + ul{
   display: block; cursor:pointer;
}
label.list-group-item { font-size: 15px;}

.form {
  width: 330px;
  height: auto;
  background-color: white;
  border-radius: 5px;
}
.form { padding: 20px; }
.alinhar {display: flex;}
.tab{width: 700px; margin-left: 40px; background-color: white; padding: 14px;}
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Codersbite</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-boxes"></i> Produtos</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Movimento de Caixa</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-file-invoice me-2"></i>Contas</a>
                <a href="clientes.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Clientes</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-truck-loading"></i> Estoque</a>
                <a href="credores.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-file-invoice-dollar"></i> Credores</a>
                        
  	


                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>John Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-4 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $count_produtos; ?></h3>
                                <p class="fs-5">Número de Produtos</p>
                            </div>
                            <i class="fas fa-boxes fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo number_format($total_prod['totalP'], 2, ',', '.'); ?></h3>
                                <p class="fs-5">Valor total em produtos</p>
                            </div>
                            <i class="fas fa-money-bill-wave fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $count_prod_bx_est; ?></h3>
                                <p class="fs-5">Produtos em baixo estoque</p>
                            </div>
                            <i class="fas fa-box fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                     
                     </div>
                  <div class="alinhar">
                        <div class="form">
                          <form method="POST" action="processadores/credores_c.php">
                    <div lass="row">
                      <h4 class="h4">Novo valor</h4>
                          <div class="col-md-10">
  <label for="formGroupExampleInput" class="form-label">Cliente:</label>
  <select class="form-control col-md-3" name="nome">
    <option value="0">Selecione...</option>
  <?php while ($row = mysqli_fetch_assoc($query)) { ?>
       <option value="<?php echo $row['nome'];?>"><?php echo $row['nome'];?></option>
       <?php } ?>
  </select>
</div>
<br/>
<div class="col-md-10">
  <label for="formGroupExampleInput2" class="form-label">Não cliente:</label>
  <input type="text" class="form-control col-md-8" name="nao-cli" placeholder="Nome">
</div>
<div class="col-md-10">
  <label for="formGroupExampleInput2" class="form-label">Valor R$:</label>
  <input type="text" class="form-control col-md-8" name="valor" placeholder="">
</div>
<br/>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
                          </form>
  </div>
  </div>
  <div class="tab">
    <h4 class="h4">Credores</h4>
  <table class="table table-bordered" style="background-color: white;">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Preço R$</th>
      <th scope="col">Categoria</th>
      <th scope="col">Estoque</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row_cred = mysqli_fetch_assoc($query_cred)) { ?>
    <tr>
      <td><?php echo $row_cred['nome'];?></td>
      <td><?php echo $row_cred['contato'];?></td>
      <td><?php echo $row_cred['valor'];?></td>
      <?php } ?>
    </tr>
  </tbody>
</table>
  </div>
                        </div>
                  </div>   
                     

                
    <!-- /#page-content-wrapper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

        
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
    </script>

    

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>