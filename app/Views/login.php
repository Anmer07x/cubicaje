<?php

$user_session = session();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script src="https://www.google.com/recaptcha/api.js?render=6LczlnAmAAAAALCrLcGrX1VzVP81flV9W-h13lYA"></script>

    <script>
        $(document).ready(function() {
            $('#entrar').click(function() {
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LczlnAmAAAAALCrLcGrX1VzVP81flV9W-h13lYA', {
                        action: 'validarUsuario'
                    }).then(function(token) {
                        $('#form-login').prepend(
                            '<input type="hidden" name="token" value="' + token + '" >');
                        $('#form-login').prepend(
                            '<input type="hidden" name="action" value="validarUsuario" >');
                        $('#form-login').submit();
                    });
                });
            });
        });
    </script>
    <title>Login</title>
    <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/images/pila-de-cubos.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <div class="header">
        <div class="logo-container">
            <div class="initials">SCU</div>
            <div class="bar"></div>
            <img src="<?php echo base_url(); ?>/images/logoU.png" alt="Logo">
        </div>
    </div>
    <div class="body-background"></div>
    <form id="form-login" class="containerLogin" method="POST" action="<?php echo base_url(); ?>/usuarios/valida">
        <img class="logoLogin" src="<?php echo base_url(); ?>/images/logoU.png" alt="">
        <input type="text" id="usuario" name="usuario" class="input" placeholder="Correo electrónico:" required />

        <div class="password-container">
            <input type="password" id="passwordField" name="password" class="input" placeholder="Contraseña" required />

            <span class="toggle-password" onclick="togglePasswordVisibility()">
                <i class="fas fa-eye"></i>
            </span>
        </div>
        <div class="contenedor">
            <div class="izquierda">
                <input class="check" type="checkbox">Mantener sesión activa
            </div>
            <div class="derecha">
                <a href="recovery">¿Olvidaste tu contraseña?</a> <!-- Corregido -->
            </div>
        </div>
        <button class="buttonSubmit" id="entrar" type="submit"> Iniciar Sesion</button>


        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php } ?>
    </form>






    <div class="help-box">
        <a href="https://www.uniclaretiana.edu.co/#atencion">
            <i class="fas fa-question-circle"></i> Ayuda
        </a>
    </div>

    <script src="<?php echo base_url(); ?>/js/script.js"></script>
    <script src="<?php echo base_url(); ?>/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>/js/simple-datatables@latest.js"></script>




</body>

</html>