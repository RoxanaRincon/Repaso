<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" href="css/main.css">
    <script src="./js/login.js"></script>
    <title>Iniciar Sesion</title>
</head>
<body>
    <div id="boxIngreso" class="box" >
        <span class="liner"></span>
        <form >
            <h2>INICIAR SESION</h2>
            <div class="inputBox">
                <span>Usuario:</span>
                <input id="email" type="email" required="required">
            </div>
            <div class="inputBox">
                <span>Contraseña:</span>
                <input id="password" type="password" required="required">
            </div>
            <div class="buttons">
                <input id="ingresar" type="submit" value="INGRESAR">
                <input id="registro" type="button" value="REGISTRAR">
            </div>
        </form>
    </div>

    <div id="boxRegistro" class="boxRegistro" style="display: none;">
        <span class="liner"></span>
        <form >
            <h2>REGISTRARME</h2>
            <div class="inputBox">
                <span>Nombre:</span>
                <input id="nomUsuario" type="text" required="required">
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <input id="emailRegistro" type="email" required="required">
            </div>
            <div class="inputBox">
                <span>Contraseña:</span>
                <input id="passwordRegistro" type="password" required="required">
            </div>
            <div class="buttons">
                <input id="registrar" type="button" value="REGISTRARME">
            </div>
        </form>
    </div>

    <div class="imagen">
        <img src="../img/papas.png">
    </div>
    
</body>
</html>