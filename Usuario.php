<?php
// session_start();
require_once ('Connect.php');

class Usuario
{
    protected $connect;
    private $id;
    public $email;
    public $password;

    public function __construct()
    {
        session_start();
       
    }

    public function registro($id, $email, $password)
    {
        $this->nombre = $id;
        $this->ciudad = $email;
        $this->ciudad = $password;
    }

    public function validar($email,$password)
    {
        $conn = new Connect();
        $connect = $conn->init();
        $query = $connect->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
        $query->bindParam(":email", $email);
        $query->bindParam(":password", $password);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            $_SESSION['email'] = $usuario["email"];
            $_SESSION['Nombre'] = $usuario["Nombre"];
            header("location:http://localhost/ejercicio_crud_poo_mysql/iniciosql.php");
        } else {
            $msg = "Email o contraseña ingresados no validos";
            $aPahtOrigin = explode('?', $_SERVER['HTTP_REFERER']);
            $pahtOrigin = $aPahtOrigin[0];
            header("Location: $pahtOrigin?msg=$msg");
        }
    }

    function cerrarsesion()
    {
        //unset($_SESSION['email']);
        //unset($_SESSION['password']);
        //unset($_SESSION['Nombre']);
        //session_destroy();
        //echo "se eliminan todas las variables de sesión y se destruye la sesión";
        session_unset();
        session_destroy();
        header("location:http://localhost/ejercicio_crud_poo_mysql/loginsql.php");
    }
}
