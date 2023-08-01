<?php 

include_once "../modelo/usuarioModelo.php";

class ctrUsuario{

    public $idUsuario;
    public $Nombre;
    public $Correo;
    public $Password; // Nuevo campo para la contraseña

    public function ctrListarUsuario() {
        $respuestaUsuarioM = mdlUsuario::mdlListarUsuario();
        echo json_encode($respuestaUsuarioM);
    }

    public function ctrGuardarUsuario() {
        $respuestaUsuarioM = mdlUsuario::mdlGuardarUsuario($this->Nombre, $this->Correo, $this->Password);
        echo json_encode($respuestaUsuarioM);
    }

    public function ctrUpdateUsuario() {
        $respuestaUsuarioM = mdlUsuario::mdlUpdateUsuario($this->Nombre, $this->Correo, $this->Password, $this->idUsuario);
        echo json_encode($respuestaUsuarioM);
    }

    public function ctrEliminarUsuario() {
        $respuestaUsuarioM = mdlUsuario::mdlEliminarUsuario($this->idUsuario);
        echo json_encode($respuestaUsuarioM);
    }

    public function ctrIniciarSesion($correo, $password) {
        
        $usuario = MdlUsuario::mdlIniciarSesion($correo, $password);
       
        if ($usuario) {
            
            session_start(); //Guarda información del usuario en la sesión
            $_SESSION['loggedin'] = true; // Variable, indica que el usuario ha iniciado sesión
            $_SESSION['idUsuario'] = $usuario['id_usuario']; // Almacenar el ID del usuario en la sesión
            echo json_encode("ok");
            
        } else {
            echo json_encode("Usuario o contraseña incorrectos");
        }
    }


}

// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST["correo"], $_POST["password"])) {
    $objUsuario = new CtrUsuario();
    $objUsuario->ctrIniciarSesion($_POST["correo"], $_POST["password"]);
}


if(isset($_POST["listarDatosUsuario"]) && $_POST["listarDatosUsuario"] == "ok"){

    $objUsuario = new ctrUsuario();
    $objUsuario -> ctrListarUsuario();

}

if (isset($_POST["guardarCorreo"], $_POST["guardarPassword"], $_POST["guardarTipoUsuario"])) {
    $objUsuario = new ctrUsuario();
    $objUsuario->Correo = $_POST["guardarCorreo"];
    $objUsuario->Password = $_POST["guardarPassword"]; 
    $objUsuario->ctrGuardarUsuario();
}

if(isset($_POST["eliminarUsuario"])){
    $objUsuario = new ctrUsuario();
    $objUsuario -> idUsuario = $_POST["eliminarUsuario"];
    $objUsuario -> ctrEliminarUsuario();
}


if (isset($_POST["updateCorreo"], $_POST["updatePassword"], $_POST["updateIdUsuario"], $_POST["updateTipoUsuario"])) {
    $objPersonaje = new ctrUsuario();
    $objPersonaje->Correo = $_POST["updateCorreo"];
    $objPersonaje->idUsuario = $_POST["updateIdUsuario"];
    $objPersonaje->Password = $_POST["updatePassword"];
    $objPersonaje->ctrUpdateUsuario();
}
