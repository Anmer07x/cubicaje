// Captura el formulario
var form = document.getElementById("loginForm");

// Agrega un evento de clic al formulario
form.addEventListener("submit", function(event) {
    // Previene el envío del formulario
    event.preventDefault();
    // Redirecciona al usuario a index.php
    window.location.href = "index.php";
});
function togglePasswordVisibility() {
    var passwordField = document.getElementById("passwordField");
    var icon = document.querySelector(".toggle-password i");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}