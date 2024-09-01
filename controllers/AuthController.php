<?php
// controllers/AuthController.php
require_once 'models/User.php';

class AuthController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function login($email, $password)
    {
        $user = $this->userModel->getUserByEmailAndPassword($email, $password);
        if ($user) {
            $roleAndPermission = $this->userModel->getRoleAndPermission($user['id_user']);
            $_SESSION['user'] = [
                'nombre' => $user['nombre'] . ' ' . $user['apellidos'],
                'rol' => $roleAndPermission['nombre_rol'],
                'permiso' => $roleAndPermission['descripcion']
            ];
            header('Location: index.php?action=dashboard');
            exit();
        } else {
            return 'Credenciales incorrectas';
        }
    }
}
