<?php

class Connect{
    public function init(){
        $servername = "localhost";
        $username   = "root";
        $password   = "123456";
        $dbname     = "curso1";
        

        try {
           
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=3307", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           //echo "Connected successfully";

            return $conn;
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    public function insert(){
        $conn = new Connect();
        $connect = $conn->init();
        $query = $connect->prepare ('INSERT INTO user (id,email,password,Nombre) , 
        VALUES (:id,:email,:password,:Nombre)');
         $query -> bindParam(":email",$email);
         $query -> bindParam(":password",$password);
         $query -> bindParam(":Nombre",$Nombre);

         $id = 3;
         $email = 'laridicula@prueba';
         $password = 12345;
         $Nombre = 'laridicula';

         $query -> execute();
    }
}

?>