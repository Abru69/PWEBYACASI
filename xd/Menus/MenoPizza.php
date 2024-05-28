<?php
session_start();

// Definir el array de productos con identificadores únicos
$productos = array(
    array("id" => "10", "nombre" => "Pizza de queso", "imagen" => "../IMG/Pizza 2.jpg", "descripcion" => ""),
    array("id" => "11", "nombre" => "Pizza de peperoni", "imagen" => "../IMG/Pizza 1.jpg", "descripcion" => ""),
    array("id" => "12", "nombre" => "Pizza de chorizo con peperoni", "imagen" => "../IMG/Pizza 3.jpg", "descripcion" => ""),
    array("id" => "4", "nombre" => "Coca Cola", "imagen" => "../IMG/Coca.jpg", "descripcion" => ""),
    array("id" => "5", "nombre" => "Sprite", "imagen" => "../IMG/Sprite.jpg", "descripcion" => ""),
    array("id" => "6", "nombre" => "Fanta", "imagen" => "../IMG/Fanta.jpg", "descripcion" => "")
);

// Verificar si se ha enviado un formulario para agregar un producto al carrito
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"])) {
    // Obtener el ID del producto enviado
    $product_id = $_POST["product_id"];
    
    // Agregar el producto al carrito
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $_SESSION['cart'][] = $product_id;
    
    // Redirigir al usuario a la página del carrito o mostrar un mensaje de confirmación
    header("Location: ../CarritoRestaurant.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery App </title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="Menu.php">Delivery App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="Menu.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Acerca de</a>
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
            <?php
            // Mostrar los productos
            foreach ($productos as $producto) {
            ?>
                <div class="col">
                    <div class="card" style="width: 16rem;">
                        <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" width="100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                            <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                            <!-- Formulario para agregar productos al carrito -->
                            <form method="post">
                                <input type="hidden" name="product_id" value="<?php echo $producto['id']; ?>">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <?php require("../Pie.php"); ?>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>