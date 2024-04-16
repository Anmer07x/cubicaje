
// Script para manejar el despliegue del submenu y el colapso del menú
// const menuWithSubmenu = document.querySelector('.with-submenu');
// const submenu = document.querySelector('.submenu');
// const arrowIcon = document.querySelector('.arrow-icon');
// const collapseBtn = document.querySelector('.collapse-btn');
// const profileName = document.querySelector('.profile-name');

// menuWithSubmenu.addEventListener('click', () => {
//     submenu.classList.toggle('show');
//     arrowIcon.classList.toggle('fa-chevron-down');
//     arrowIcon.classList.toggle('fa-chevron-up');
//     collapseBtn.innerHTML = arrowIcon.classList.contains('fa-chevron-up') ? '<i class="fas fa-chevron-down"></i>' : '<i class="fas fa-chevron-up"></i>';
//     profileName.classList.toggle('hidden'); // Oculta el nombre cuando el menú se recoja
// });
// // Funciones para cambiar entre modo claro y oscuro
// function toggleLightMode() {
//         document.body.style.backgroundColor = '#f0f0f0'; // Cambia el color de fondo del cuerpo
//         document.querySelector(".light-mode").classList.add("seleccionado");
//         document.querySelector(".dark-mode").classList.remove("seleccionado");
//         document.querySelector('.sidebar').style.backgroundColor = '#fff'; // Cambia el color de fondo del menú
//         document.querySelectorAll('.profile p, .menu-item, .submenu-item, .footer-line, .container').forEach(element => {
//             element.style.color = '#333'; // Cambia el color del texto de varios elementos
//         });
//         document.querySelectorAll('.search, .submenu').forEach(element => {
//             element.style.backgroundColor = '#f3f3f3'; // Cambia el color de fondo de varios elementos
//         });
//     }

//     function toggleDarkMode() {
//         document.body.style.backgroundColor = '#222'; // Cambia el color de fondo del cuerpo
//         document.querySelector(".dark-mode").classList.add("seleccionado");
//         document.querySelector(".light-mode").classList.remove("seleccionado");
//         document.querySelector('.sidebar').style.backgroundColor = '#333'; // Cambia el color de fondo del menú
//         document.querySelectorAll('.profile p, .menu-item, .submenu-item, .footer-line, .container-card').forEach(element => {
//             element.style.color = '#fff'; // Cambia el color del texto de varios elementos
//         });
//         document.querySelectorAll('.search, .submenu').forEach(element => {
//             element.style.backgroundColor = '#444'; // Cambia el color de fondo de varios elementos
//         });
//     }

// // Función para retraer o expandir el menú
// function toggleMenu() {
//     const sidebar = document.querySelector('.sidebar');
//     sidebar.classList.toggle('collapsed');

//     arrowIcon.classList.toggle('fa-arrow-right');
//     arrowIcon.classList.toggle('fa-arrow-left');
//     collapseBtn.innerHTML = arrowIcon.classList.contains('fa-arrow-left') ? '<i class="fas fa-arrow-right"></i>' : '<i class="fas fa-arrow-left"></i>';
//     profileName.classList.toggle('hidden');
// }

const menuWithSubmenu = document.querySelector('.with-submenu');
const submenu = document.querySelector('.submenu');
const arrowIcon = document.querySelector('.arrow-icon');
const profileName = document.querySelector('.profile-name');

menuWithSubmenu.addEventListener('click', (event) => {
    // Evita que el evento de clic se propague a elementos superiores
    event.stopPropagation();
    
    submenu.classList.toggle('show');
    arrowIcon.classList.toggle('fa-chevron-down');
    arrowIcon.classList.toggle('fa-chevron-up');
    profileName.classList.toggle('hidden'); // Oculta el nombre cuando el menú se recoja
});

// Manejar el clic en el botón de colapso del menú
collapseBtn.addEventListener('click', (event) => {
    // Evita que el evento de clic se propague a elementos superiores
    event.stopPropagation();
});

function toggleLightMode() {
    document.body.style.backgroundColor = '#f0f0f0'; // Cambia el color de fondo del cuerpo
    document.querySelector(".light-mode").classList.add("seleccionado");
    document.querySelector(".dark-mode").classList.remove("seleccionado");
    document.querySelector('.sidebar').style.backgroundColor = '#fff'; // Cambia el color de fondo del menú
    document.querySelectorAll('.profile p, .menu-item, .submenu-item, .footer-line, .container').forEach(element => {
        element.style.color = '#333'; // Cambia el color del texto de varios elementos
    });
    document.querySelectorAll('.search, .submenu').forEach(element => {
        element.style.backgroundColor = '#f3f3f3'; // Cambia el color de fondo de varios elementos
    });
}

function toggleDarkMode() {
    document.body.style.backgroundColor = '#222'; // Cambia el color de fondo del cuerpo
    document.querySelector(".dark-mode").classList.add("seleccionado");
    document.querySelector(".light-mode").classList.remove("seleccionado");
    document.querySelector('.sidebar').style.backgroundColor = '#333'; // Cambia el color de fondo del menú
    document.querySelectorAll('.profile p, .menu-item, .submenu-item, .footer-line, .container-card').forEach(element => {
        element.style.color = '#fff'; // Cambia el color del texto de varios elementos
    });
    document.querySelectorAll('.search, .submenu').forEach(element => {
        element.style.backgroundColor = '#444'; // Cambia el color de fondo de varios elementos
    });
}

// Función para retraer o expandir el menú
function toggleMenu() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('collapsed');

    // arrowIcon.classList.toggle('fa-arrow-right');
    // arrowIcon.classList.toggle('fa-arrow-left');
    // collapseBtn.innerHTML = arrowIcon.classList.contains('fa-arrow-left') ? '<i class="fas fa-arrow-right"></i>' : '<i class="fas fa-arrow-left"></i>';
    // profileName.classList.toggle('hidden');
    arrowIcon.classList.toggle('fbi-arrow-right');
    arrowIcon.classList.toggle('bi-arrow-left');
    collapseBtn.innerHTML = arrowIcon.classList.contains('bi-arrow-right') ? '<i class="bi-arrow-right"></i>' : '<i class="bi-arrow-left"></i>';
    profileName.classList.toggle('hidden');
}