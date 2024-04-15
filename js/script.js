// Captura el formulario
var form = document.getElementById("loginForm");

// Agrega un evento de clic al formulario
form.addEventListener("submit", function(event) {
    // Previene el envío del formulario
    event.preventDefault();
    // Redirecciona al usuario a index.php
    window.location.href = "index.php";
});

// Script para manejar el despliegue del submenu y el colapso del menú
const menuWithSubmenu = document.querySelector('.with-submenu');
const submenu = document.querySelector('.submenu');
const arrowIcon = document.querySelector('.arrow-icon');
const collapseBtn = document.querySelector('.collapse-btn');
const profileName = document.querySelector('.profile-name');

menuWithSubmenu.addEventListener('click', () => {
    submenu.classList.toggle('show');
    arrowIcon.classList.toggle('fa-chevron-right');
    arrowIcon.classList.toggle('fa-chevron-left');
    collapseBtn.innerHTML = arrowIcon.classList.contains('fa-chevron-left') ? '<i class="fas fa-chevron-right"></i>' : '<i class="fas fa-chevron-left"></i>';
    profileName.classList.toggle('hidden'); // Oculta el nombre cuando el menú se recoja
});
// Funciones para cambiar entre modo claro y oscuro
function toggleLightMode() {
    document.body.classList.remove('dark-mode');
}

function toggleDarkMode() {
    document.body.classList.add('dark-mode');
}

// Función para retraer o expandir el menú
function toggleMenu() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('collapsed');
    arrowIcon.classList.toggle('fa-chevron-right');
    arrowIcon.classList.toggle('fa-chevron-left');
    collapseBtn.innerHTML = arrowIcon.classList.contains('fa-chevron-left') ? '<i class="fas fa-chevron-right"></i>' : '<i class="fas fa-chevron-left"></i>';
    profileName.classList.toggle('hidden'); // Oculta el nombre cuando el menú se recoja
}
