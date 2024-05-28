<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Delivery App</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 400px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #28a745; /* Cambiado el color */
            color: #fff;
            border-bottom: none;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .btn-custom {
            background-color: #28a745; /* Cambiado el color */
            border-color: #28a745; /* Cambiado el color */
        }
        .btn-custom:hover {
            background-color: #218838; /* Cambiado el color */
            border-color: #218838; /* Cambiado el color */
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">Delivery App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Acerca de</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contactos</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Registration Form -->
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Registro</h2>
        </div>
        <div class="card-body">
        <?php
// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "nombre_de_tu_base_de_datos";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $nombre = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];

    // Verificar si las contraseñas coinciden
    if ($password !== $password_repeat) {
        die("Las contraseñas no coinciden");
    }

    // Hashear la contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password_hash')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="fname">Nombre Completo:</label>
                    <input type="text" class="form-control" id="fname" name="firstname" placeholder="Nombre.." required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico.." required>
                </div>
                <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="Contraseña.." required>
                </div>
                <div class="form-group">
                    <label for="pwd-repeat">Repetir Contraseña:</label>
                    <input type="password" class="form-control" id="pwd-repeat" name="password-repeat" placeholder="Repetir Contraseña.." required>
                </div>
                <button type="submit" class="btn btn-block btn-custom">Registrar</button>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="#" class="text-secondary">¿Olvidó su contraseña?</a>
            <a href="login.php" class="text-secondary">Iniciar Sesión</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>