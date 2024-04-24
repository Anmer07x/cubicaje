<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubicaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/calcu.css">
    <link rel="icon" type="image/x-icon" href="../img/pila-de-cubos.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="body-background"></div>
    <div class="sidebar">
        <div class="profile">
            <img src="../img/profile.jpg" alt="Profile Image">
            <div class="profile-info">
                <p class="profile-name">Don Blader</p>
                <div class="collapse-btn" onclick="toggleMenu()">
                    <i class="fas fa-chevron-left"></i>
                </div>
            </div>
        </div>

        <div class="search">
            <label>
                <input type="text" placeholder="Buscar...">
                <i class="fas fa-search"></i>
            </label>
        </div>
        <div class="menu-item"> <a href="principal.php"><i class="fas fa-home"></i><span>Inicio</span></a></div>
        <div class="menu-item"> <a href="productos.php"><i class="fas fa-box"></i><span>Mercancias</span></a></div>
        <div class="menu-item"><a href="cajas.php"><i class="fas fa-box-open"></i><span>Cajas</span></a></div>
        <div class="menu-item"><a href="vehiculos.php"><i class="fas fa-truck"></i><span>Vehiculos</span></a></div>
        <div class="menu-item with-submenu"><i class="fas fa-cogs"></i><span>Sugerencias</span> <i class="arrow-icon fas fa-chevron-down"></i></div>
        <div class="submenu">
            <div class="submenu-item"><a href="./sugerencias/nuevo.php"><i class="fas fa-search"></i><span>Consultar Mercancias</span></a></div>
            <div class="submenu-item"><a href="./sugerencias/sugerencia.php"><i class="fas fa-search"></i><span>Consultar Cajas</span></a></div>
            <div class="submenu-item"><a href="./sugerencias/eliminados.php"><i class="fas fa-search"></i><span>Consultar Vehiculos</span></a></div>
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
        <div class="centrado">
            <button class="cerrar-sesion" onclick="logout()">
                <span>Cerrar Sesión</span>
                <i class="fas fa-sign-out-alt"></i> <!-- Icono de cerrar sesión -->
            </button>
        </div>
    </div>
    <div class="container-inputs">
        <div class="block">
            <h2>Datos de la caja</h2>
            <div class="column">
                <div class="input-group">
                    <label for="codigo">Código:</label>
                    <input type="text" id="codigo" name="codigo">
                </div>
                <div class="input-group">
                    <label for="tipo-caja">Tipo de caja:</label>
                    <input type="text" id="tipo-caja" name="tipo-caja">
                </div>
                <div class="input-group">
                    <label for="mercancia">Mercancía:</label>
                    <input type="text" id="mercancia" name="mercancia">
                </div>
                <div class="input-group">
                    <label for="capacidad">Capacidad de la caja:</label>
                    <input type="text" id="capacidad" name="capacidad">
                </div>
                <div class="input-group">
                    <label for="alto">Alto/m:</label>
                    <input type="text" id="alto" name="alto">
                </div>
                <div class="input-group">
                    <label for="largo">Largo/m:</label>
                    <input type="text" id="largo" name="largo">
                </div>
                <div class="input-group">
                    <label for="ancho">Ancho/m:</label>
                    <input type="text" id="ancho" name="ancho">
                </div>
                <div class="input-group">
                    <label for="cantidad-elementos">Cantidad de elementos:</label>
                    <input type="text" id="cantidad-elementos" name="cantidad-elementos">
                </div>
                <div class="input-group">
                    <label for="cantidad-cajas">Cantidad de cajas:</label>
                    <input type="text" id="cantidad-cajas" name="cantidad-cajas">
                </div>
                <div class="input-group">
                    <label for="peso-caja">Peso de caja en kg:</label>
                    <input type="text" id="peso-caja" name="peso-caja">
                </div>
                <div class="input-group">
                    <label for="factor-riesgo">Factor de riesgo:</label>
                    <input type="text" id="factor-riesgo" name="factor-riesgo">
                </div>
            </div>
        </div>

        <div class="block">
            <h2>Datos del vehículo</h2>
            <div class="column">
                <div class="input-group">
                    <label for="volumen">Volumen/m3:</label>
                    <input type="text" id="volumen" name="volumen">
                </div>
                <div class="input-group">
                    <label for="peso-total">Peso total/kg:</label>
                    <input type="text" id="peso-total" name="peso-total">
                </div>
                <div class="input-group">
                    <label for="vehiculo">Vehículo:</label>
                    <input type="text" id="vehiculo" name="vehiculo">
                </div>
                <div class="input-group">
                    <label for="tipo-vehiculo">Tipo de vehículo:</label>
                    <input type="text" id="tipo-vehiculo" name="tipo-vehiculo">
                </div>
                <div class="input-group">
                    <label for="empresa">Empresa:</label>
                    <input type="text" id="empresa" name="empresa">
                </div>
                <div class="input-group">
                    <label for="clasificacion">Clasificación:</label>
                    <input type="text" id="clasificacion" name="clasificacion">
                </div>
            </div>
        </div>

        <button class="btn-calcular" type="button" id="calcular">Calcular</button>
    </div>

    <div class="help-box">
        <a href="https://www.uniclaretiana.edu.co/#atencion">
            <i class="fas fa-question-circle"></i> Ayuda
        </a>
    </div>


    <script src="../js/principal.js"></script>
</body>

</html>