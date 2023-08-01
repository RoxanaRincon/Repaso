<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    <div class="box" >
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
                <input type="submit" value="INGRESAR">
                <input type="button" value="REGISTRAR">
            </div>
        </form>
    </div>

    <div class="boxRegistro" style="display: none;">
        <span class="liner"></span>
        <form >
            <h2>REGISTRARME</h2>
            <div class="inputBox">
                <span>Nombre:</span>
                <input id="nomUsuario" type="text" required="required">
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <input id="email" type="email" required="required">
            </div>
            <div class="inputBox">
                <span>Contraseña:</span>
                <input id="password" type="password" required="required">
            </div>
            <div class="buttons">
                <input type="button" value="REGISTRARME">
            </div>
        </form>
    </div>

    <div class="imagen">
        <img src="../img/papas.png">
    </div>
    
</body>
</html>