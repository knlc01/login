<?php

require_once("conexion.php");

class Validar{

    public function validarDatos(){
        try {
            $con = null;
            $sql = null;
            $resultado = null;
            $cantidad_resultado = null;

            // Recuperamos la conexión
            $con = conexion::getConection();

            // Validación de error
            if ($con == "ERROR") {
                header("location:ctrlSalir.php");
            }

            // Consulta
            $sql = "SELECT * FROM usuarios WHERE usuario = :USU AND pass = :PASS";

            $resultado = $con->prepare($sql);
            $resultado->execute(array(":USU"=>$_SESSION["usu"], ":PASS"=>$_SESSION["pass"]));

            $cantidad_resultado = $resultado->rowCount();

            if ($cantidad_resultado == 0) {

               header("location:controladores/ctrlSalir.php");

            } 

            
        } catch (Exception $e) {


        } finally {
            $con = null;
            $sql = null;
            $resultado = null;
            $cantidad_resultado = null;
        }

    }

}