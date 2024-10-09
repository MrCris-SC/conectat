document.getElementById("registerForm").addEventListener("submit", function(event) {
    // Obtener los valores de los campos
    var nombre = document.getElementById("exampleFirstName").value.trim();
    var apellido = document.getElementById("exampleLastName").value.trim();
    var email = document.getElementById("exampleInputEmail").value.trim();
    var contrasenia = document.getElementById("exampleInputPassword").value.trim();
    var confirmarContrasenia = document.getElementById("exampleRepeatPassword").value.trim();
    
    // Inicializar un mensaje de error
    var errorMessage = "";

    // Verificar si los campos están vacíos
    if (nombre === "") {
        errorMessage = "Por favor, ingrese su nombre.";
    } else if (apellido === "") {
        errorMessage = "Por favor, ingrese su apellido.";
    } else if (email === "") {
        errorMessage = "Por favor, ingrese email.";
    } else if (contrasenia === "") { 
        errorMessage = "Por favor, ingrese contraseña."; 
    } else if (confirmarContrasenia === "") { 
        errorMessage = "Por favor, confirme su contraseña."; 
    } else if (contrasenia !== confirmarContrasenia) {
        errorMessage = "Las contraseñas no coinciden.";
    }

    // Mostrar el mensaje de error en el div
    var messageDiv = document.getElementById("message");
        // Limpiar cualquier mensaje anterior (ya sea de éxito o error)
        messageDiv.textContent = ""; // Limpiar el texto
        messageDiv.className = ""; // Limpiar las clases
        messageDiv.style.display = "none"; // Ocultar el div

    // Si hay un mensaje de error, mostrarlo y prevenir el envío del formulario
    if (errorMessage !== "") {
        event.preventDefault(); // Prevenir el envío del formulario
        messageDiv.textContent = errorMessage;
        messageDiv.className = "alert alert-danger"; // Clase para mensaje de error
        messageDiv.style.display = "block"; // Mostrar el mensaje
    } else {
        // Si no hay errores, puedes mostrar un mensaje de éxito si quieres
        var successMessage = "Formulario enviado con éxito!";
        messageDiv.textContent = successMessage;
        messageDiv.className = "alert alert-success"; // Clase para mensaje de éxito
        messageDiv.style.display = "block"; // Mostrar el mensaje
    }
    
});
