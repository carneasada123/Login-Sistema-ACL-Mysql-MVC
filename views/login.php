<?php
// views/login.php
//session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form method="POST" action="index.php?action=login">
        <label for="email">Correo:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Clave:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
