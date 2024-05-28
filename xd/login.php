<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Delivery App</title>
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
            background-color: #007bff;
            color: #fff;
            border-bottom: none;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .valido {
            border-color: #28a745;
        }
        .novalido {
            border-color: #dc3545;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
    </div>
</nav>

<!-- Login Form -->
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Inicio de Sesión</h2>
        </div>
        <div class="card-body">
            <?php
            // Procesamiento del formulario
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $password = $_POST['pwd'];

                // Aquí puedes añadir la lógica para verificar las credenciales, por ejemplo, con una base de datos
                // Este es un ejemplo básico sin base de datos para ilustrar el proceso

                $validEmail = "user@example.com";
                $validPassword = "password";

                if ($email === $validEmail && $password === $validPassword) {
                    // Inicio de sesión exitoso
                    echo "<div class='alert alert-success'>Inicio de sesión exitoso. Bienvenido, $email!</div>";
                    // Redirigir al usuario a otra página, por ejemplo, al menú
                    header('Location: Menus/Menu.php');
                } else {
                    // Credenciales inválidas
                    echo "<div class='alert alert-danger'>Correo electrónico o contraseña incorrectos.</div>";
                }
            }
            ?>
            <form action="login.php" method="POST" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="txtEmail" name="email" placeholder="Ingrese su correo electrónico" required>
                    <div class="invalid-feedback">Por favor ingrese un correo electrónico válido.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input type="password" class="form-control" id="txtPassword" name="pwd" placeholder="Ingrese su contraseña" required>
                    <div class="invalid-feedback">Por favor ingrese su contraseña.</div>
                </div>
                <button type="button" class="btn btn-secondary" id="btnMostrarOcultar">Ver</button>
                <button type="submit" class="btn btn-block btn-custom" id="btnAceptar">Iniciar Sesión</button>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="#" class="text-secondary">¿Olvidó su contraseña?</a>
            <a href="Registro.html" class="text-secondary">Registrate</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/login.js"></script>