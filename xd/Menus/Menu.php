<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="../index.php">QuickEats</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="AcercaDe.php">Acerca de</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contactos</a>
        </li>
      </ul>
    </div>
      <a class="btn btn-outline-light my-2 my-sm-0" href="../CarritoRestaurant.php">
        <i class="material-icons">shopping_cart</i>
      </a>
    </nav>
    

    <br>
    <div class="container text-center">
        <div class="row align-items-start">
          <div class="col">
            <div class="card" style="width: 16rem;">
                <img src="../IMG/cesar.jpg" class="card-img-top" width="100">
                <div class="card-body">
                  <h5 class="card-title">Little Caesars</h5>
                  <p class="card-text">Pizza para todos</p>
                  <a href="MenoPizza.php" class="btn btn-primary">Entrar</a>
                  
                    </div>
                </div>
            </div>
          <div class="col">
            <div class="card" style="width: 16rem;">
                <img src="../IMG/MAC.png" class="card-img-top" width="100">
                <div class="card-body">
                  <h5 class="card-title">McDonalds</h5>
                  <p class="card-text">I´m love it</p>
                  <a href="MenuMcDonals.php" class="btn btn-primary">Entrar</a>
                </div>
              </div>
            </div>
          <div class="col">
            <div class="card" style="width: 16rem;">
                <img src="../IMG/Dominos.png" class="card-img-top" width="100">
                <div class="card-body">
                  <h5 class="card-title">Dominos</h5>
                  <p class="card-text">Pizza para todos</p>
                  <a href="MenoPizza.php" class="btn btn-primary">Entrar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>


      <div class="container text-center">
        <div class="row align-items-start">
          <div class="col">
            <div class="card" style="width: 16rem;">
                <img src="../IMG/KFC.jpg" class="card-img-top" width="100">
                <div class="card-body">
                  <h5 class="card-title">KFC</h5>
                  <p class="card-text">Pollo para toda la familia</p>
                  <a href="MenuKfc.php" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
          <div class="col">
            <div class="card" style="width: 16rem;">
                <img src="../IMG/King.png" class="card-img-top" width="100">
                <div class="card-body">
                  <h5 class="card-title">Burguer King</h5>
                  <p class="card-text">Hamburguesas</p>
                  <a href="MenuBK.php" class="btn btn-primary">Entrar</a>
                </div>
              </div>
            </div>
          <div class="col">
            <div class="card" style="width: 16rem;">
                <img src="../IMG/totino.png" class="card-img-top" width="100">
                <div class="card-body">
                  <h5 class="card-title">DiTotino</h5>
                  <p class="card-text">Pizza</p>
                  <a href="MenuDitotinos.php" class="btn btn-primary">Entrar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php require("../Pie.php"); ?>





    <!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>