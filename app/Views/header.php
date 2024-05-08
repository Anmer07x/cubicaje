<?php
$user_session = session();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistema de Cubicaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url(); ?>/images/pila-de-cubos.png" />
    <link href="<?php echo base_url(); ?>/css/index.css" rel="stylesheet" />

</head>


<body class="sb-nav-fixed">
    <div class="sidebar">
        <div class="profile">
            <img src="<?php echo base_url(); ?>/images/profile.jpg" alt="Profile Image">
            <div class="profile-info">
                <p class="profile-name"><?php echo $user_session->nombre; ?></p>
                <div class="collapse-btn" onclick="toggleMenu()">
                    <i class="fas fa-chevron-left"></i>
                </div>
            </div>
        </div>
        <div class="menu-item"><a class="nav-link" href="<?php echo base_url();?>/inicio"><i class="fas fa-home"></i><span>Inicio</span></a></div>
        <div class="menu-item"><a class="nav-link" href="<?php echo base_url();?>/productos"><i class="fas fa-box-open"></i><span>Mercancias</span></a></div>
        <div class="menu-item"><a class="nav-link" href="<?php echo base_url();?>/cajas"><i class="fas fa-box-open"></i><span>Cajas</span></a></div>
        <div class="menu-item"><a class="nav-link" href="<?php echo base_url();?>/vehiculos"><i class="fas fa-truck-moving"></i></i><span>Vehiculos</span></a></div>
        <div class="menu-item with-submenu"><i class="fas fa-cogs"></i><span>Sugerencias</span> <i class="arrow-icon fas fa-chevron-down"></i></div>
        <div class="submenu">
            <div class="submenu-item"><a href="<?php echo base_url();?>/sugerencias/nuevo"><i class="fas fa-search"></i><span>Consultar Mercancias</span></a></div>
            <div class="submenu-item"><a href="<?php echo base_url();?>/sugerencias"><i class="fas fa-search"></i><span>Consultar Cajas</span></a></div>
            <div class="submenu-item"><a href="./sugerencias/eliminados.php"><i class="fas fa-search"></i><span>Consultar Vehiculos</span></a></div>
        </div>
        <div class="menu-item"> <a class="nav-link" href="<?php echo base_url(); ?>/calcular"><i class="fas fa-calculator"></i><span>Calcular
                    Cubicaje</span></a></div>
        <div class="menu-item"><i class="fas fa-search"></i><span>Acerca De</span></div>
        <div class="theme-buttons">
            <button class="light-mode" active onclick="toggleLightMode()"><i class="fas fa-sun"></i> <span>Modo
                    Claro</span></button>
            <button class="dark-mode" onclick="toggleDarkMode()"><i class="fas fa-moon"></i> <span>Modo
                    Oscuro</span></button>
        </div>
        <div class="centrado">
            <button class="cerrar-sesion" onclick="logout()">
                <span>Cerrar Sesión</span>
                <i class="fas fa-sign-out-alt"></i> <!-- Icono de cerrar sesión -->
            </button>
        </div>
    </div>

    
 