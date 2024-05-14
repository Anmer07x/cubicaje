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

    <title>Reestablecer</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/images/pila-de-cubos.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body class="bg-light">


    <div class="header">
        <div class="logo-container">
            <div class="initials">SCU</div>
            <div class="bar"></div>
            <img src="<?php echo base_url(); ?>/images/logoU.png" alt="Logo">
        </div>
    </div>
    <div class="body-background"></div>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form method="POST" class="containerRegister" action="<?php echo base_url(); ?>/usuarios/recovery">

                            <img class="logoLogin" src="<?php echo base_url(); ?>/images/logoU.png" alt="">
                            <input class="input" type="email" id="usuario" name="usuario" placeholder="Ingresa tu correo..." required>
                            <button class="buttonSubmit" type="submi">Verificar</button>
                            <button type="button" class="buttonCancel" onclick="window.location.href='<?php echo base_url(); ?>'">Cancelar</button>


                            </br>



                            <hr class="my-4">

                    </div>
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
                </div>

            </div>



</body>


</html>