<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
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
        <form action="" method="post">
            <input type="text" id="username" name="username" placeholder="Numero de documento" style="margin-bottom: 15px;"> <br>
            <input type="submit" value="Verificar" style="margin-bottom: 15px;">
            <a href="login.php" class="cancel-link">
            <input type="button" value="Cancelar" style="margin-bottom: 15px;">
        </a>
        </form>
    </div>
    <div class="help-box">
    <a href="#">
        <i class="fas fa-question-circle"></i> Ayuda
    </a>
</div>
</body>
</html>
