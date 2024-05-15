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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Reestablecer</title>
    <link href="<?php echo base_url(); ?>/css/recovery.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/images/pila-de-cubos.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">



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
                <div class="" style="border-radius: 1rem;">
                    <div class="">
                        <form method="POST" class="containerRegister" action="<?php echo base_url(); ?>/usuarios/claveNueva" autocomplete="off">
                            <img class="logoLogin" src="<?php echo base_url(); ?>/images/logoU.png" alt="">
                            <input class="input" id="password" name="password" type="password" placeholder="Nueva contraseña" />
                            <input class="input" id="repassword" name="repassword" type="password" placeholder="Confirmar contraseña" />
                            <button type="button" class="buttonSubmit" onclick="guardarDatos()">Guardar</button>
                            <button class="buttonCancel" onclick="location.href='<?php echo base_url(); ?> /">Cancelar</button>
                        </form>
                        <div class="help-box">
                            <a href="https://www.uniclaretiana.edu.co/#atencion">
                                <i class="fas fa-question-circle"></i> Ayuda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Mensaje del Sistema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex flex-column align-items-center">
                    <i class="fas fa-check-circle icon-success"></i>
                    <div class="text-modal">Tu contraseña ha sido cambiada exitosamente.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        function guardarDatos() {
            var password = $('#password').val();
            var repassword = $('#repassword').val();
            if (password !== "" && password === repassword) {
                $.ajax({
                    url: '<?php echo base_url(); ?>/usuarios/claveNueva',
                    type: 'POST',
                    data: {
                        password: password,
                        repassword: repassword
                    },
                    success: function(response) {
                        $('#miModal').modal('show');
                        $('#miModal').on('hidden.bs.modal', function(e) {
                            window.location.href = '<?php echo base_url(); ?>';
                        });
                    },
                    error: function() {
                        alert('Hubo un error al guardar los datos');
                    }
                });
            } else {
                alert("Las contraseñas no coinciden o están vacías.");
            }
        }
    </script>







</body>

</html>