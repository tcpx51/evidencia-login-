<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>

<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($usuario); ?>!</h1>
    <p>Has iniciado sesión exitosamente.</p>
    <form method="POST" action="logout.php">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>

</html>