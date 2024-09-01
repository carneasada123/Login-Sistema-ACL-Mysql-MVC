<?php
// models/User.php
require_once 'db.php';

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserByEmailAndPassword($email, $password)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM Usuarios WHERE email = :email AND password = :password');
        $stmt->execute(['email' => $email, 'password' => $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRoleAndPermission($userId)
    {
        $stmt = $this->pdo->prepare(
            'SELECT r.nombre_rol, p.descripcion
            FROM Usuarios_roles ur
            JOIN Roles r ON ur.id_rol = r.id_rol
            JOIN Roles_Permisos rp ON r.id_rol = rp.id_rol
            JOIN Permisos p ON rp.id_permiso = p.id_permiso
            WHERE ur.id_user = :userId'
        );
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
