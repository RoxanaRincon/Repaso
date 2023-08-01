<?php

class conexion {

    public static function conectar(){

        $host = 'localhost';
        $bdname = 'repaso';
        $username = 'root';
        $password = '';

        try{

            $bd = new PDO ("mysql:host=$host;bdname=$bdname", $username, $password);

            $bd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $bd ->exec("SET NAMES utf8");


        }catch(PDOException $error){
            $bd = $error;

            die("Error al conectar la base de datos: " . $error->getMessage());
        }
        return $bd;
    }
    
}