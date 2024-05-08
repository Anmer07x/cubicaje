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

    <title>Inicia sesión</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>/css/dataTable.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>/js/all.js"></script>
</head>

<body class="bg-light">
    <img src="/fondo.png" alt="" title="Claretiano">
    <?php print_r($user_session->nombre); ?>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">


                        <img src="<?php echo base_url() . '/images/logotipo.png' ?>" class="img-responsive"
                            type="center" width="200" />

                        </br></br>
                        <h3 class="mb-2">Recuperar contraseña</h3>

                        <form method="POST" action="<?php echo base_url(); ?>/usuarios/recovery">
                            <div class="form-outline mb-6">
                                <label class="control-label" for="usuario" >Correo</label>
                                <input type="email" id="usuario" name="usuario" class="form-control"
                                    placeholder="Ingresa tu correo..." required/>
                            </div>
                            </br>
                            <button class="btn btn-warning"  type="submi">Enviar</button>

                            <hr class="my-4">

                    </div>
                    <?php if(isset($validation)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $validation->listErrors(); ?>
                    </div>
                    <?php } ?>

                    <?php if(isset($error)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                    <?php } ?>
                    </form>
                </div>

            </div>

            <script src="<?php echo base_url(); ?>/js/bootstrap.bundle.min.js"></script>
            <script src="<?php echo base_url(); ?>/js/scripts.js"></script>
            <script src="<?php echo base_url(); ?>/js/simple-datatables@latest.js"></script>

</body>


</html>