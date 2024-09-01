<?php
// index.php
session_start();
require_once 'controllers/AuthController.php';
require_once 'db.php';

$controller = new AuthController($pdo);

$action = $_GET['action'] ?? '';

if ($action == 'login') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $error = $controller->login($email, $password);
        if ($error) {
            include 'views/login.php';
        }
    }
} elseif ($action == 'dashboard') {
    include 'views/dashboard.php';
} elseif ($action == 'logout') {
    session_destroy();
    header('Location: index.php');
    exit();
} else {
    include 'views/login.php';
}
