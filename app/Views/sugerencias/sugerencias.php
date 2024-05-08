<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubicaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <<link href="<?php echo base_url(); ?>/css/consul.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/images/pila-de-cubos.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <main>
        <div class="container-inputs">
            <div class="block">
                <h2>Consulta de Cajas</h2>
                <form method="POST" action="<?php echo base_url(); ?>/sugerencias/guarda" autocomplete="off">
                    <div class="column">
                        <div class="input-group">
                            <label for="codigo">Código</label>
                            <div class="input-container">
                                <input class="form-control" id="codigo_cajas" name="codigo_cajas" type="text" placeholder="Escribe el codigo y enter" onkeyup="buscarProducto(event, this, this.value)" autofocus />
                                <label for="codigo_cajas" id="resultado_error" style="color: red"> </label>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Tipo</label>
                            <div class="input-container">
                                <input class="form-control" id="tipo" name="tipo" type="text" disabled />
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Alto</label>
                            <div class="input-container">
                                <input class="form-control" id="alto" name="alto" type="text" disabled />
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Largo</label>
                            <div class="input-container">
                                <input class="form-control" id="largo" name="largo" type="text" disabled />
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Ancho</label>
                            <div class="input-container">
                                <input class="form-control" id="ancho" name="ancho" type="text" disabled />
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </form>

        <div class="help-box">
            <a href="https://www.uniclaretiana.edu.co/#atencion">
                <i class="fas fa-question-circle"></i> Ayuda
            </a>
        </div>

    </main>


    <script>
        $(document).ready(function() {

        });

        function buscarProducto(e, tagCodigo, codigo_cajas) {
            var enterkey = 13;

            if (codigo_cajas != '') {
                if (e.which == enterkey) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>/cajas/buscarPorCodigo/' + codigo_cajas,
                        dataType: 'json',
                        success: function(resultado) {
                            if (resultado == 0) {
                                $(tagCodigo).val('');
                            } else {
                                $(tagCodigo).removeClass('has-error');
                                $('#resultado_error').html(resultado.error);

                                console.log(resultado.datos);
                                if (resultado.existe) {
                                    $('#id_caja').html(resultado.datos.id);
                                    $('#tipo').val(resultado.datos.tipo);
                                    $('#alto').val(resultado.datos.alto);
                                    $('#largo').val(resultado.datos.largo);
                                    $('#ancho').val(resultado.datos.ancho);
                                    $('#img_caja').attr("src", resultado.datos.img_caja);

                                } else {
                                    $('#id_caja').html('');
                                    $('#tipo').val('');
                                    $('#alto').val('');
                                    $('#largo').val('');
                                    $('#ancho').val('');
                                    $('#img_caja').val('');

                                }
                            }
                        }

                    });
                }
            }
        }
    </script>
    <script src="<?php echo base_url(); ?>/js/jquery-3.5.1.min.js"></script>