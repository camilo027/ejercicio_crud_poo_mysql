<?php

require_once ('Connect.php');
 $email =$_POST['email'];
 $password= $_POST['password'];
 $Nombre=$_POST['Nombre'];


//if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['Nombre']) && !empty($_POST['Nombre'])){
    $conn = new Connect();
    $connect = $conn->init();
    //$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO user (email, password, Nombre) VALUES (:email,:password,:Nombre)";
    $query = $connect->prepare($sql);
    //$query -> bindParam(":email",$_POST['email']);
    //$query -> bindParam(":password",$_POST['password']);
    //$query -> bindParam(":Nombre",$_POST['Nombre']);
    $query -> bindParam(":email",$email);
    $query -> bindParam(":password",$password);
    $query -> bindParam(":Nombre",$Nombre);
    $query -> execute();
   // print("<script> alert('Regisytro guardado con exito');</script>");
   //echo "registro añadido correctamente ";
//} else{

//}

//if($query -> execute()){
//    echo "datos guardados";
//} else{
//    echo "no se guardaron los datos";
//}

echo'<script type="text/javascript">
alert("El  registro fue añadido de forma exitosa");
window.location.href="iniciosql.php";
</script>';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<h1><center>registro añadido correctamente</center></h1>
<br>
<br>
<!--<a href="iniciosql.php" class="btn btn-secondary ml-2">volver</a>-->
</body>
</html>