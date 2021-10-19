<?php

class Conexion{
    
    public static function getConection(){
        include("configuracion.php");
        $con = new mysqli($server,$user,$pass,$bd);
        if(mysqli_connect_errno()){
            echo "No conectado", mysqli_connect_error();
            $con = "No conectado";
            exit();
        }
        else{
            echo "Conectado";
            $con = new PDO('mysql:host=localhost; dbname=dblogin', 'root', '');
        }
        return $con;
    }
    
}

?>