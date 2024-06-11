<?php
session_start();


if (!isset(
    $_SESSION['usuarios']
)) {
    $_SESSION['usuarios'] = [];
}

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        if (isset($_SESSION['usuarios'][$usuario]) && $_SESSION['usuarios'][$usuario] == $password) {
            $_SESSION['usuario'] = $usuario;
            header('Location: bienvenida.php');
            exit();
        } else {
            $mensaje = 'Usuario o contraseña incorrectos';
        }
    } elseif (isset($_POST['register'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        if (!isset($_SESSION['usuarios'][$usuario])) {
            $_SESSION['usuarios'][$usuario] = $password;
            $mensaje = 'Usuario registrado exitosamente';
        } else {
            $mensaje = 'El nombre de usuario ya existe';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login y Registro</title>
</head>

<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit" name="login">Iniciar sesión</button>
    </form>

    <h2>Registro</h2>
    <form method="POST" action="">
        <label for="nuevo_usuario">Usuario:</label>
        <input type="text" id="nuevo_usuario" name="usuario" required>
        <br>
        <label for="nuevo_password">Contraseña:</label>
        <input type="password" id="nuevo_password" name="password" required>
        <br>
        <button type="submit" name="register">Registrar</button>
    </form>

    <?php if ($mensaje) : ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
</body>

</html>