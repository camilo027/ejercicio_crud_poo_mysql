<?php
require_once ('Connect.php');


 //$email =$_POST['email'];
 //$password= $_POST['password'];
 //$Nombre=$_POST['Nombre'];

if(isset($_POST['actualizar'])){
  $email=trim($_POST['email1']);
  $password=trim($_POST['password1']);
  $Nombre=trim($_POST['Nombre1']);
  $id=trim($_POST['id']);

  $conn = new Connect();
  $connect = $conn->init();
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //$sql = "UPDATE user SET email=:email1, password=:password1, Nombre=:Nombre1 WHERE id=:id";
  $query = $connect->prepare("UPDATE user set email='" . $_POST['email1'] . "', password='" . $_POST['password1']. "', Nombre='" . $_POST['Nombre1']. "' where id=" . $_GET["id"]);
  $query->bindParam(':email1',$email);
  $query->bindParam(':password1',$password);
  $query->bindParam(':Nombre1',$Nombre);
  $query->bindParam(':id',$id);
  $query->execute();
 


  if($query->rowCount() > 0)
  {
  $count = $query -> rowCount();

  echo "<div class='content alert alert-primary' >
  Gracias: $count registro el  ha sido actualizado </div>";

// header("Location:http://localhost/ejercicio_crud_poo_mysql/index.php?msg=$msg");
   
//echo'<script type="text/javascript">
//alert("El  registro fue editado de forma exitosa");
//window.location.href="index.php";
//</script>';




  }else{
   echo "<div class='content alert alert-danger'> No se pudo actualizar el registro </div>";
   print_r($query->errorInfo()); 
   }



 
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    
</body>
</html>