<?php
require_once ('Connect.php');


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

 // echo "<div class='content alert alert-primary' >
 // Gracias: $count registro ha sido actualizado </div>";

// header("Location:http://localhost/ejercicio_crud_poo_mysql/index.php?msg=$msg");
   
echo'<script type="text/javascript">
alert("El  registro fue editado de forma exitosa");
window.location.href="iniciosql.php";
</script>';


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
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 150px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Actualizacion de Usuario</h2>
                        <br><br>
                        <p>Please edit the input values and submit to update the employee record.</p>
                        
                    </div>




<?php
			//incluimos el fichero de conexion
			include_once('Connect.php');

            $conn = new Connect();
            $connect = $conn->init();
           /// $query = $connect->prepare("SELECT * FROM user");
			//$query->execute();
           // while ($row = $query->fetch()){
                //echo "id: {$row["id"]} <br>";
                //echo "email: {$row["email"]} <br>";
                //echo "password: {$row["password"]} <br>";
                //echo "Nombre: {$row["Nombre"]} <br><br>";
                echo '<table class="table table-bordered table-striped">';
                echo "<thead>";
                echo "<tr>";
              //  echo "<th>Accion</th>";
                echo "<th>Id</th>";
                echo "<th>Email</th>";
                echo "<th>Password</th>";
                echo "<th>Nombre</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
         //   }
              $query = $connect->prepare("SELECT * FROM user WHERE id=" . $_GET["id"]);
              // Ejecutamos
              $query->execute();
               // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
               while($row = $query->fetch(PDO::FETCH_OBJ)){
             //  echo "id: " . $row->id . "<br>";
             //  echo "email: " . $row->email . "<br>";
             //  echo "password: " . $row->password . "<br>";
             //  echo "Nombre: " . $row->Nombre . "<br>";
             //echo "<tr>";
            // echo "<td>";
               // echo '<a href="read.php?id='. $row->id .'" class="mr-3" title="Ver perfil" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
               // echo '<a href="pruebaupdate.php?id='. $row->id .'" class="mr-3" title="Actualizar perfil" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
               //echo '<a href="delete.php?id='. $row->id .'" title="Borrar perfil" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
             echo "<tr>";
             echo "<td>" . $row->id . "</td>";
             echo "<td>" . $row->email . "</td>";
             echo "<td>" . $row->password . "</td>";
             echo "<td>" . $row->Nombre . "</td>";
            echo "</td>";
            echo "</tr>";
            
              
            echo "<form action='' method='post'>
							<table>
								<tr>
									<td>id:</td>
									<td><input type='text' id='id' name='id' value='". $row->id ."' readonly/></td>
								</tr>
								<tr>
									<td>email:</td>
									<td><input type='text' id='email' name='email1' value='". $row->email ."'/></td>
								</tr>
								<tr>
									<td>password:</td>
									<td><input type='text' id='password' name='password1' value='". $row->password ."'/></td>
								</tr>
								<tr>
									<td>Nombre:</td>
									<td><input type='text' id='Nombre' name='Nombre1' value='". $row->Nombre ."'/></td>
								</tr>
								
								<tr align='center'>
								
                                    <td colspan='2'><button name='actualizar'  type='submit' class='btn btn-success' value='Submit'>Success</button></td>
                                    <td colspan='2'><a href='iniciosql.php' class='btn btn-secondary ml-2'>Cancel</a></td>
								</tr>
							</table>
						</form>";








            }
            

           
        echo"</table>";


           
?>
           </div>
       </div>        
   </div>
</div>



    
</body>
</html>

