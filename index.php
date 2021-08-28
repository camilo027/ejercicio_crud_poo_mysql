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
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 100px;
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
                        <h2 class="pull-left">Listado de Usuarios</h2>
                        <a href="usuarionuevo.php" class="btn btn-success pull-right"><i class="fa fa-user-plus"></i>Nuevo Usuario</a>
                    </div>




<?php
			
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
                echo "<th>Accion</th>";
                echo "<th>Id</th>";
                echo "<th>Email</th>";
                echo "<th>Password</th>";
                echo "<th>Nombre</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
              $query = $connect->prepare("SELECT * FROM user");
             
              $query->execute();
               // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
               while($row = $query->fetch(PDO::FETCH_OBJ)){
             //  echo "id: " . $row->id . "<br>";
             //  echo "email: " . $row->email . "<br>";
             //  echo "password: " . $row->password . "<br>";
             //  echo "Nombre: " . $row->Nombre . "<br>";
             echo "<tr>";
             echo "<td>";
               // echo '<a href="read.php?id='. $row->id .'" class="mr-3" title="Ver perfil" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                echo '<a href="pruebaupdate.php?id='. $row->id .'" class="mr-3" title="Actualizar perfil" data-toggle="tooltip"><span class="fa fa-pencil-square"></span></a>';
                echo '<a href="delete.php?id='. $row->id .'" title="Borrar perfil" data-toggle="tooltip"><span class="fa fa-user-times"></span></a>';
             echo "<td>" . $row->id . "</td>";
             echo "<td>" . $row->email . "</td>";
             echo "<td>" . $row->password . "</td>";
             echo "<td>" . $row->Nombre . "</td>";
            echo "</td>";
            echo "</tr>";
            
              

            }
            
            echo "</table>";



?>
           </div>
       </div>        
   </div>
</div>




    
</body>
</html>