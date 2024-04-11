// Captura el formulario
var form = document.getElementById("loginForm");

// Agrega un evento de clic al formulario
form.addEventListener("submit", function(event) {
    // Previene el envío del formulario
    event.preventDefault();
    // Redirecciona al usuario a index.php
    window.location.href = "index.php";
});
