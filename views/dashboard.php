<?php
// views/dashboard.php
//session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']['nombre']); ?></h1>
    <p>Rol: <?php echo htmlspecialchars($_SESSION['user']['rol']); ?></p>
    <p>Permiso: <?php echo htmlspecialchars($_SESSION['user']['permiso']); ?></p>
    <a href="index.php?action=logout">Cerrar sesión</a>
</body>
</html>
