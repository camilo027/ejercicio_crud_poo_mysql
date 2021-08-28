<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<form action="insertar.php" method="POST">
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Nuevo Usuario</h2>
                    <p>Complete este formulario y envíelo para agregar el registro de usuario a la base de datos.</p>
                    
                        <div class="form-group">
                        <label for="email">email</label>
                        <input name="email" type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                        <label for="password">password</label>
                        <input name="password" type="text" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input name="Nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre">
                        </div>
                        <input name="insertar" type="submit" class="btn btn-primary" value="Submit">
                        <a href="iniciosql.php" class="btn btn-secondary ml-2">Cancel</a>
                    
                </div>
            </div>        
        </div>
    </div>
</div>
</form>
</body>
</html>
