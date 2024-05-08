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
            
        <h2>Consulta de Mercancías</h2>
        <form method="POST" action="<?php echo base_url(); ?>/sugerencias/guarda" autocomplete="off">
            
            <div class="column">
                <div class="input-group">
                    <label for="codigo">Código:</label>
                    <div class="input-container">
                        <input class="form-control" id="codigo" name="codigo" type="text" placeholder="Escribe el código y presiona Enter" onkeyup="buscarProducto(event, this, this.value)" autofocus />
                        <label for="codigo" id="resultado_error" style="color: red"> </label>
                    </div>
                </div>
                <div class="input-group">
                    <label>Nombre del producto:</label>
                    <div class="input-container">
                        <input class="form-control" id="nombre" name="nombre" type="text" disabled />
                    </div>
                </div>
                <div class="input-group">
                    <label>Tipo:</label>
                    <div class="input-container">
                        <input class="form-control" id="tipo" name="tipo" type="text" disabled />
                    </div>
                </div>
                <div class="input-group">
                    <label>Cantidad:</label>
                    <div class="input-container">
                        <input class="form-control" id="cantidad" name="cantidad" type="text" disabled />
                    </div>
                </div>
                <div class="input-group">
                    <label>Peso total:</label>
                    <div class="input-container">
                        <input class="form-control" id="peso_total" name="peso_total" type="text" disabled />
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

function buscarProducto(e, tagCodigo, codigo) {
    var enterkey = 13;

    if (codigo != '') {
        if (e.which == enterkey) {
            $.ajax({
                url: '<?php echo base_url(); ?>/productos/buscarPorCodigo/' + codigo,
                dataType: 'json',
                success: function(resultado) {
                    if (resultado == 0) {
                        $(tagCodigo).val('');
                    } else {
                        $(tagCodigo).removeClass('has-error');
                        $('#resultado_error').html(resultado.error);

                        console.log(resultado.datos);
                        if (resultado.existe) {
                            $('#id_producto').html(resultado.datos.id);
                            $('#nombre').val(resultado.datos.nombre);
                            $('#tipo').val(resultado.datos.tipo);
                            $('#cantidad').val(resultado.datos.cantidad);
                            $('#peso_total').val(resultado.datos.peso_total);
                            $('#img_productos').attr("src", resultado.datos.img_productos);


                        } else {
                            $('#id_producto').html('');
                            $('#nombre').val('');
                            $('#tipo').val('');
                            $('#cantidad').val('');
                            $('#peso_total').val('');
                            $('#img_productos').val('');

                        }
                    }
                }

            });
        }
    }
}
</script>
<script src="<?php echo base_url(); ?>/js/jquery-3.5.1.min.js"></script>
    <script src="../../js/principal.js"></script>



</body>

</html>