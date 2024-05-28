<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QuickEats - Pedido de Comida Rápida</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="css/index.css" rel="stylesheet">
  
</head>
<body>
  <?php require("MenuPublico.php");?>


<div class="container mt-5">
  <h2 class="text-center mb-4">Contamos con los siguientes servicios</h2>
  <div id="servicios-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="IMG/cesar.jpg" alt="LitleCesar"> </a>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="IMG/KFC.jpg" alt="KFC">
        </A>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="IMG/totino.png" alt="Totino's"> </A>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="IMG/DOMINOS_LOGO.png" alt="Dominos"> </a>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="IMG/King.png" alt="Pizza Hut"> </a>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="IMG/MAC.png" alt="Pizza Hut"> </a>
          </div>

    </div>
    <a class="carousel-control-prev" href="#servicios-carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#servicios-carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<?php require("Pie.php");?>



<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Script de JavaScript para el carrusel -->
<script src="js/index.js"></script>
</body>
</html>
