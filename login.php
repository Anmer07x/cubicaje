<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="img/pila-de-cubos.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <div class="initials">SCU</div>
            <div class="bar"></div>
            <img src="img/logoU.png" alt="Logo">
        </div>
    </div>
    <div class="body-background"></div>
    <div class="container">
        <img class="logo" src="img/logoU.png" alt="Uniclaretiana logo">
        <form id="loginForm" method="post">
            <input type="text" id="username" name="username" placeholder="Correo:" style="margin-bottom: 15px;" required> <br>
            <input type="password" id="password" name="password" placeholder="Contraseña:" style="margin-bottom: 15px;" required><br>
            <input type="submit" value="Iniciar Sesión" style="margin-bottom: 15px;">
        </form>
        <div class="forgot-password-link" style="margin-top: 15px;">
            ¿Olvidaste tu contraseña? <a href="reestablecer.php">Recuperar contraseña</a>
        </div>
    </div>
    <div class="help-box">
        <a href="#">
            <i class="fas fa-question-circle"></i> Ayuda
        </a>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
