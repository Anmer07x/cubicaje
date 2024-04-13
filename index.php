<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubicaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="icon" type="image/x-icon" href="img/pila-de-cubos.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="body-background"></div>
<div class="sidebar">
    <div class="profile">
        <img src="./img/fuclafondo.png" alt="Profile Image">
        <p><span>Don Blader</span></p>
    </div>
    <div class="search">
        <label>
            <input type="text" placeholder="Buscar...">
            <i class="fas fa-search"></i>
        </label>
    </div>
    <div class="menu-item"><i class="fas fa-box"></i><span>Mercancias</span></div>
    <div class="menu-item"><i class="fas fa-box-open"></i><span>Cajas</span></div>
    <div class="menu-item"><i class="fas fa-truck"></i><span>Vehiculos</span></div>
    <div class="menu-item with-submenu"><i class="fas fa-cogs"></i><span>Funcionalidades</span> <i class="arrow-icon fas fa-chevron-down"></i></div>
    <div class="submenu">
        <div class="submenu-item">Opción 1</div>
        <div class="submenu-item">Opción 2</div>
        <div class="submenu-item">Opción 3</div>
    </div>
    <div class="menu-item"><i class="fas fa-calculator"></i><span>Calcular Cubicaje</span></div>
    <div class="theme-buttons">
        <button onclick="toggleLightMode()"><i class="fas fa-sun"></i> <span>Modo Claro</span></button>
        <button onclick="toggleDarkMode()"><i class="fas fa-moon"></i> <span>Modo Oscuro</span></button>
    </div>
    <div class="collapse-btn" onclick="toggleMenu()">
        <i class="fas fa-chevron-left"></i>
    </div>
</div>



<div class="help-box">
        <a href="#">
            <i class="fas fa-question-circle"></i> Ayuda
        </a>
    </div>

    <script src="./js/script.js"></script>

<script>
    // Script para manejar el despliegue del submenu
    const menuWithSubmenu = document.querySelector('.with-submenu');
    const submenu = document.querySelector('.submenu');
    const arrowIcon = document.querySelector('.arrow-icon');
    const collapseBtn = document.querySelector('.collapse-btn');

    menuWithSubmenu.addEventListener('click', () => {
        submenu.classList.toggle('show');
        arrowIcon.classList.toggle('fa-chevron-right');
        arrowIcon.classList.toggle('fa-chevron-left');
        collapseBtn.innerHTML = arrowIcon.classList.contains('fa-chevron-left') ? '<i class="fas fa-chevron-right"></i>' : '<i class="fas fa-chevron-left"></i>';
    });

    // Funciones para cambiar entre modo claro y oscuro
    function toggleLightMode() {
        document.body.style.backgroundColor = '#f0f0f0'; // Cambia el color de fondo del cuerpo
        document.querySelector('.sidebar').style.backgroundColor = '#fff'; // Cambia el color de fondo del menú
        document.querySelectorAll('.profile p, .menu-item, .submenu-item').forEach(element => {
            element.style.color = '#333'; // Cambia el color del texto de varios elementos
        });
        document.querySelectorAll('.search, .submenu').forEach(element => {
            element.style.backgroundColor = '#f3f3f3'; // Cambia el color de fondo de varios elementos
        });
    }

    function toggleDarkMode() {
        document.body.style.backgroundColor = '#222'; // Cambia el color de fondo del cuerpo
        document.querySelector('.sidebar').style.backgroundColor = '#333'; // Cambia el color de fondo del menú
        document.querySelectorAll('.profile p, .menu-item, .submenu-item').forEach(element => {
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
        arrowIcon.classList.toggle('fa-chevron-right');
        arrowIcon.classList.toggle('fa-chevron-left');
        collapseBtn.innerHTML = arrowIcon.classList.contains('fa-chevron-left') ? '<i class="fas fa-chevron-right"></i>' : '<i class="fas fa-chevron-left"></i>';
    }
</script>

</body>
</html>
