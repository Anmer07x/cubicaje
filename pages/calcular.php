<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <div class="profile">
            <img src="../img/profile.jpg" alt="Profile Image" onclick="toggleLogoutMenu()">
            <div class="profile-info">
                <p class="profile-name">Don Blader</p>
                <div class="collapse-btn" onclick="toggleMenu()">
                    <i class="fas fa-chevron-left"></i>
                </div>
            </div>
            <!-- Menú de cierre de sesión -->
            <div class="logout-menu hidden" id="logoutMenu">
                <button onclick="logout()">Cerrar sesión</button>
            </div>
        </div>

        <div class="search">
            <label>
                <input type="text" placeholder="Buscar...">
                <i class="fas fa-search"></i>
            </label>
        </div>
        <div class="menu-item"> <a href="mercancias.php"><i class="fas fa-box"></i><span>Mercancias</span></a></div>
        <div class="menu-item"><a href="cajas.php"><i class="fas fa-box-open"></i><span>Cajas</span></a></div>
        <div class="menu-item"><a href="vehiculos.php"><i class="fas fa-truck"></i><span>Vehiculos</span></a></div>
        <div class="menu-item with-submenu"><i class="fas fa-cogs"></i><span>Sugerencias</span> <i
                class="arrow-icon fas fa-chevron-down"></i></div>
        <div class="submenu">
            <div class="submenu-item"><i class="fas fa-search"></i><span>Consultar Mercancias</span></div>
            <div class="submenu-item"><i class="fas fa-search"></i><span>Consultar Cajas</span></div>
            <div class="submenu-item"><i class="fas fa-search"></i><span>Consultar Vehiculos</span></div>
        </div>
        <div class="menu-item"><a href="calcular.php"><i class="fas fa-calculator"></i><span>Calcular
                    Cubicaje</span></a></div>
        <div class="menu-item"><i class="fas fa-search"></i><span>Acerca De</span></div>
        <div class="theme-buttons">
            <button class="light-mode" active onclick="toggleLightMode()"><i class="fas fa-sun"></i> <span>Modo
                    Claro</span></button>
            <button class="dark-mode" onclick="toggleDarkMode()"><i class="fas fa-moon"></i> <span>Modo
                    Oscuro</span></button>
        </div>

    </div>

    <div class="help-box">
        <a href="https://www.uniclaretiana.edu.co/#atencion">
            <i class="fas fa-question-circle"></i> Ayuda
        </a>
    </div>

</body>
<script src="../js/principal.js"></script>

</html>