<?php
session_start();

$productos = array(
    1 => array("nombre" => "Hamburguesa", "precio" => 50),
    2 => array("nombre" => "Hot Dog", "precio" => 35),
    3 => array("nombre" => "Papas Fritas", "precio" => 40),
    4 => array("nombre" => "Coca Cola", "precio" => 25),
    5 => array("nombre" => "Sprite", "precio" => 23),
    6 => array("nombre" => "Fanta", "precio" => 23),
    7 => array("nombre" => "Cubeta de pollo 8pz", "precio" => 150),
    8 => array("nombre" => "Cubeta de pollo 12pz", "precio" => 200),
    9 => array("nombre" => "Cubeta de pollo 18pz", "precio" => 300),
    10 => array("nombre" => "Pizza de queso", "precio" => 99),
    11 => array("nombre" => "Pizza de peperoni", "precio" => 150),
    12 => array("nombre" => "Pizza de chorizo", "precio" => 150)
);

// Eliminar producto del carrito si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['remove_id'])) {
        $remove_id = $_POST['remove_id'];
        if (($key = array_search($remove_id, $_SESSION['cart'])) !== false) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindexar el array
        }
    }
    
    // Agregar comentario al producto si se envía el formulario
    if (isset($_POST['comment_item_id']) && isset($_POST['comment_text'])) {
        $item_id = $_POST['comment_item_id'];
        $comment = $_POST['comment_text'];
        $_SESSION['comments'][$item_id] = $comment;
    }
}

// Verificar si hay productos en el carrito
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Aquí puedes procesar los productos del carrito
    $cart_items = $_SESSION['cart'];
} else {
    // Si no hay productos en el carrito, puedes mostrar un mensaje o redirigir al usuario
    header("Location: Menus/MenuMcDonals.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery App Carrito</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="Menu.html">Delivery App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Menu.html">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Acerca de</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contactos</a>
                </li>
            </ul>
            <a class="btn btn-outline-light my-2 my-sm-0" href="login.html">Inicio de sesión</a>
        </div>
    </nav>
  
    <div class="container mt-5">
        <div class="row justify-content-end mb-3">
            <div class="col-md-auto">
                <a href="Menus/MenuMcDonals.php" class="btn btn-dark">Regresar</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <h3>Productos en el carrito:</h3>
                <ul class="list-group">
                    <?php foreach ($cart_items as $index => $item): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo $productos[$item]["nombre"]; ?> <!-- Nombre del producto -->
                            <span class="badge badge-info ml-3">Precio: $<?php echo number_format($productos[$item]["precio"], 2); ?></span> <!-- Precio del producto -->
                            <?php if (isset($_SESSION['comments'][$item])): ?>
                                <span class="badge badge-info ml-3">Comentario: <?php echo htmlspecialchars($_SESSION['comments'][$item]); ?></span>
                            <?php endif; ?>
                            <div>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" data-item="<?php echo $item; ?>">Eliminar</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#commentModal" data-item="<?php echo $item; ?>">Agregar comentario</button>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="btn-group-vertical">
                    <div class="mt-3">
                        <!-- Botón para proceder al pago o finalizar la compra -->
                        <button class="btn btn-light">Total: $280</button> <!-- Puedes calcular el total aquí -->
                    </div>
                    <div class="mt-3">
                        <a href="CarritoFinal.html" class="btn btn-primary">Aceptar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar comentarios -->
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="CarritoRestaurant.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="commentModalLabel">Agregar comentario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="comment_item_id" id="commentItemId">
                        <div class="form-group">
                            <label for="commentText">Comentario</label>
                            <textarea class="form-control" id="commentText" name="comment_text" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar comentario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para confirmar la eliminación -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="CarritoRestaurant.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que deseas eliminar este producto del carrito?
                        <input type="hidden" name="remove_id" id="deleteItemId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Pasar el ID del producto al modal de comentarios
        $('#commentModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que abrió el modal
            var itemId = button.data('item'); // Extraer la información del atributo data-item
            var modal = $(this);
            modal.find('.modal-body #commentItemId').val(itemId);
        });

        // Pasar el ID del producto al modal de confirmación de eliminación
        $('#confirmDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que abrió el modal
            var itemId = button.data('item'); // Extraer la información del atributo data-item
            var modal = $(this);
            modal.find('.modal-body #deleteItemId').val(itemId);
        });
    </script>
</body>
</html>

