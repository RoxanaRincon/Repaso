<?php

include_once "conexion.php";

class mdlUsuario{

    public static function mdlUsuario(){

        $listarUsuario="";

        try{
        $respuestaUsuario = conexion::conectar()->prepare("SELECT * FROM usuario");
        $respuestaUsuario -> execute();
        $listarUsuario = $respuestaUsuario ->fetchAll();
        $respuestaUsuario = null;

        }catch (Exception $error){
            $listarUsuario = $error;
        }
        return  $listarUsuario;
    } 

    public static function mdlGuardarUsuario($Correo, $Password, $tipoUsuario){

        $GuardarUsuario="";

        //cifrar antes de guardar en la base de datos
        $password_cifrado = password_hash($Password, PASSWORD_DEFAULT);

        try{
        $respuestaUsuario = conexion::conectar()->prepare("INSERT INTO usuario(Correo_electronico, contrasena, tipo_Usuario) VALUES (:Correo, :Password, :tipoUsuario)");
        $respuestaUsuario -> bindParam(":Correo", $Correo);
        $respuestaUsuario -> bindParam(":password",$password_cifrado);
        $respuestaUsuario -> bindParam(":TipoUsuario", $tipoUsuario);

            if ($respuestaUsuario->execute()) {
                $GuardarUsuario = "ok";
            } else {
                $GuardarUsuario = "Error al registrar el usuario";
            }
        
        }catch (Exception $error){
            $GuardarUsuario = $error;
        }
        return  $GuardarUsuario;
    } 

    public static function mdlUpdateUsuario($Correo, $Password, $tipoUsuario, $idUsuario){

        $ActualizarUsuario="";

        try{
        $respuestaUsuario = conexion::conectar()->prepare("UPDATE usuario SET Correo_electronico = :Correo, contrasena = :Password, tipo_Usuario = :tipoUsuario WHERE idUsuario = :id");
        $respuestaUsuario -> bindParam(":Correo", $Correo);
        $respuestaUsuario -> bindParam(":password",$password_cifrado);
        $respuestaUsuario -> bindParam(":TipoUsuario", $tipoUsuario);
        $respuestaUsuario -> bindParam(":id", $idUsuario);
        $respuestaUsuario->execute();

        $ActualizarUsuario = "ok";
           
        
        }catch (Exception $error){
            $ActualizarUsuario = $error;
        }
        return   $ActualizarUsuario;
    } 

    public static function mdlEliminarUsuario($idUsuario){

        $EliminarUsuario = "";

        try{
        $respuestaUsuario = conexion::conectar()->prepare("DELETE FROM usuario WHERE id_Usuario = :idUsuario");
        $respuestaUsuario -> bindParam(":idUsuario", $idUsuario);
        
            if ($respuestaUsuario->execute()) {
                $EliminarUsuario = "ok";
            } else {
                $EliminarUsuario = "Error al eliminar el usuario";
            }
           
        }catch (Exception $error){
            $EliminarUsuario = $error;
        }
        return   $EliminarUsuario;
    } 

    // Función para iniciar sesión
    public static function mdlIniciarSesion($correo, $password) {
        try {
            $consulta = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE correo_electronico = :correo");
            $consulta->bindParam(":correo", $correo);
            $consulta->execute();
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($password, $usuario['contrasena'])) {
                return $usuario;
            } else {
                return false;
            }
        } catch (Exception $error) {
            return false;
        }
    }
}