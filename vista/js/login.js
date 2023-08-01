$(function() { 

    $("#registro").on("click", function() {
        alert("Si sirve")
        $("#boxIngreso").hide()
        $("#boxRegistro").fadeIn(1000);
    })

})
$(document).ready(function() {
    
    $("#formLogin").submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            url: "../../controlador/usuarioControlador.php", 
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                
                if (response === "ok") {
                    // Redireccionar a la página de inicio o al dashboard
                    window.location.href = "../../vista/usuario.php"; // Reemplaza "ruta/a/dashboard.php" por la URL real de tu dashboard
                } else {
                    alert("Usuario o contraseña incorrectos");
                }
            },
            error: function() {
                alert("Error al procesar la solicitud");
            }
        });
    });
});
