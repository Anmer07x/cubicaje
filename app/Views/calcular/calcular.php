<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubicaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>/css/calcu.css" rel="stylesheet" />
    <link rel="icon" href="<?php echo base_url(); ?> public/images/pila-de-cubos.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container-inputs">
        <div class="block">
            <h2>Datos de la caja</h2>
            <div class="column">
                <div class="input-group">
                    <label for="codigo">Código:</label>
                    <input class="form-control" id="codigo_cajas" name="codigo_cajas" type="number"
                        placeholder="Escribe el codigo y enter" onkeyup="buscarProducto(event, this, this.value)"
                        autofocus />

                    <label for="codigo_cajas" id="resultado_error" style="color: red">
                </div>
                <div class="input-group">
                    <label for="tipo-caja">Tipo de caja:</label>
                    <input class="form-control" id="tipo" name="tipo" type="text" value="" oninput="treal()" disabled />
                </div>
                <div class="input-group">
                    <label for="mercancia">Mercancía:</label>
                    <input class="form-control" id="mercancia" name="mercancia" type="text" value="" oninput="treal()"
                        disabled />
                </div>
                <div class="input-group">
                    <label for="capacidad">Capacidad de la caja:</label>
                    <input class="form-control" id="capacidad" name="capacidad" type="number" value="" oninput="treal()"
                        disabled />
                </div>
                <div class="input-group">
                    <label for="alto">Alto/m:</label>
                    <input class="form-control" id="alto" name="alto" type="number" value="" sted="0.001"
                        oninput="treal()()" disabled />
                </div>
                <div class="input-group">
                    <label for="largo">Largo/m:</label>
                    <input class="form-control" id="largo" name="largo" type="number" sted="0.001" value=""
                        oninput="treal()()" disabled />
                </div>
                <div class="input-group">
                    <label for="ancho">Ancho/m:</label>
                    <input class="form-control" id="ancho" name="ancho" type="number" sted="0.001" value=""
                        oninput="treal()" disabled />
                </div>
                <div class="input-group">
                    <label for="cantidad-elementos">Cantidad de elementos:</label>
                    <input class="form-control" id="piezas_caja" name="piezas_caja" sted="0.001" type="number" value=""
                        oninput="treal()" disabled />
                </div>
                <div class="input-group">
                    <label for="cantidad-cajas">Cantidad de cajas:</label>
                    <input class="form-control" id="cantidad" name="cantidad" type="number" value="" oninput="treal()"
                        disabled />
                </div>
                <div class="input-group">
                    <label for="peso-caja">Peso de caja en kg:</label>
                    <input class="form-control" id="peso_piezas_kg" name="peso_piezas_kg" sted="0.001" type="number"
                        value="" oninput="treal()" disabled />
                </div>
                <div class="input-group">
                    <label for="factor-riesgo">Factor de riesgo:</label>
                    <input class="form-control" id="factor_de_riesgo" name="factor_de_riesgo" sted="0.001" type="number"
                        value="" oninput="treal()" disabled />
                </div>
            </div>
        </div>

        <div class="block">
            <h2>Datos del vehículo</h2>
            <div class="column">
                <div class="input-group">
                    <label for="volumen">Volumen/m3:</label>
                    <input class="form-control" id="num_vol" name="num_vol" type="number" sted="0.001" value=""
                        oninput="treal()" disabled />
                </div>
                <div class="input-group">
                    <label for="peso-total">Peso total/kg:</label>
                    <input class="form-control" id="peso_total" name="peso_total" sted="0.001" type="number" value=""
                        oninput="treal()" disabled />
                </div>
                <div class="input-group">
                    <label for="vehiculo">Vehículo:</label>
                    <input class="form-control" id="vehiculos" name="vehiculos" sted="0.001" type="tex" value=""
                        oninput="treal()" disabled />

                </div>
                <div class="input-group">
                    <label for="tipo-vehiculo">Tipo de vehículo:</label>
                    <input class="form-control" id="tipo_vehiculos" name="tipo_vehiculos" type="text" value=""
                        oninput="treal()" disabled />
                </div>
                <div class="input-group">
                    <label for="empresa">Empresa:</label>
                    <input class="form-control" id="empresa" name="empresa" type="text" disabled />
                </div>
                <div class="input-group">
                    <label for="clasificacion">Clasificación:</label>
                    <input class="form-control" id="clasificacion" name="clasificacion" type="text" disabled />
                </div>
                <div class="input-group">
                    <label for="Vehicle">Vehículo:</label>
                    <img class="image" id="img_vehiculos" alt="Vehiculo">
                </div>
            </div>

            <button class="btn-calcular" type="button" id="calcular" onclick="treal()">Calcular</button>
        </div>
        <script src="<?php echo base_url(); ?>/js/jquery-3.5.1.min.js"></script>

        <script src="<?php echo base_url(); ?>../js/principal.js"></script>
</body>

<script>
    
    var images = $(".image");

    $(images).on("error", function (event) {
        $(event.target).css("display", "none");
    });

    $(document).ready(function () {

    });

    function buscarProducto(e, tagCodigo, codigo_cajas) {
        var enterkey = 13;

        if (codigo_cajas != '') {
            if (e.which == enterkey) {
                $.ajax({
                    url: '<?php echo base_url(); ?>/cajas/buscarPorCodigo/' +
                        codigo_cajas,
                    dataType: 'json',
                    success: function (resultado) {
                        if (resultado == 0) {
                            $(tagCodigo).val('');
                        } else {
                            $("#maximo").removeClass('has-error');
                            $('#resultado_error').html(resultado.error);
                            console.log(resultado.datos);
                            if (resultado.existe) {
                                $('#id_caja').html(resultado.datos.id);
                                $('#img_caja').attr("src", resultado.datos.img_caja);
                                $('#tipo').val(resultado.datos.tipo);
                                $('#mercancia').val(resultado.datos.mercancia);
                                $('#cantidad').val(resultado.datos.cantidad);
                                $('#capacidad').val(resultado.datos.capacidad);
                                $('#alto').val(resultado.datos.alto);
                                $('#largo').val(resultado.datos.largo);
                                $('#ancho').val(resultado.datos.ancho);
                                $('#piezas_caja').val(resultado.datos.piezas_caja);
                                $('#peso_piezas_kg').val(resultado.datos.peso_piezas_kg);
                                $('#factor_de_riesgo').val(resultado.datos.factor_de_riesgo);

                            } else {
                                $('#id_caja').html('');
                                $('#img_caja').val('');
                                $('#tipo').val('');
                                $('#mercancia').val('');
                                $('#cantidad').val('');
                                $('#capacidad').val('');
                                $('#alto').val('');
                                $('#largo').val('');
                                $('#ancho').val('');
                                $('#piezas_caja').val('');
                                $('#peso_piezas_kg').val('');
                                $('#factor_de_riesgo').val('');

                            }
                        }
                    }

                });
            }
        }
    }

    function buscarVehiculo(e, tagmaximo, id) {
        var enterkey = 13;

        if (id != '') {
            if (e.which == enterkey) {
                $.ajax({
                    url: '<?php echo base_url(); ?>/vehiculos/buscarPorMaximo/' + id,
                    dataType: 'json',
                    success: function (resultado) {
                        if (resultado == 0) {
                            $(tagmaximo).val('');
                        } else {
                            $(tagmaximo).removeClass('has-error');
                            $('#resultado_erro').html(resultado.error);
                            console.log(resultado.datos);
                            if (resultado.existe) {
                                $('#id').html(resultado.datos.vol);
                                $('#vehiculos').val(resultado.datos.vehiculos);
                                $('#img_vehiculos').attr("src", resultado.datos.img_vehiculos);
                                $('#maximo').val(resultado.datos.maximo);
                                $('#tipo_vehiculos').val(resultado.datos.tipo_vehiculos);
                                $('#empresa').val(resultado.datos.empresa);
                                $('#clasificacion').val(resultado.datos.clasificacion);

                            } else {
                                $('#id').html('');
                                $('#vehiculos').val('');
                                $('#img_vehiculos').val('');
                                $('#maximo').val('');
                                $('#tipo_vehiculos').val('');
                                $('#empresa').val('');
                                $('#clasificacion').val('');

                            }
                        }
                    }

                });
            }
        }
    }

    let boton = document.getElementById("calcular");
    let respuesta = document.getElementById("respuesta");

    function treal(e) {
        try {
            var cantidad_elementos =
                parseFloat(document.getElementById("piezas_caja").value) || 0,
                capasidadd = parseFloat(document.getElementById("capacidad").value) || 0,
                cantidadd = parseFloat(document.getElementById("cantidad").value) || 0;

            document.getElementById("cantidad").value = cantidad_elementos / capasidadd;
        } catch (e) { }

        try {
            var altoo = parseFloat(document.getElementById("alto").value) || 0,
                largoo = parseFloat(document.getElementById("largo").value) || 0,
                anchoo = parseFloat(document.getElementById("ancho").value) || 0,
                factor =
                    parseFloat(document.getElementById("factor_de_riesgo").value) || 0,
                cantidadd = parseFloat(document.getElementById("cantidad").value) || 0;
            //Math.ceil sirve para redondear el valor
            document.getElementById("num_vol").value =
                (altoo / 100) *
                (largoo / 100) *
                (anchoo / 100) *
                (1 + factor / 100) *
                cantidadd;

            $.ajax({
                url: "<?php echo base_url(); ?>/vehiculos/buscarPorMaximo/" +
                    document.getElementById("num_vol").value,
                dataType: "json",
                success: function (resultado) {
                    if (resultado == 0) {
                        document.getElementById("maximo").value = "";
                    } else {
                        $(e).removeClass("has-error");
                        $("#resultado_erro").html(resultado.error);
                        console.log(resultado.datos);
                        if (resultado.existe) {
                            $("#id").html(resultado.datos.vol);
                            $("#vehiculos").val(resultado.datos.vehiculos);
                            $("#img_vehiculos").attr("src", resultado.datos.img_vehiculos);
                            $("#maximo").val(resultado.datos.maximo);
                            $("#tipo_vehiculos").val(resultado.datos.tipo_vehiculos);
                            $("#empresa").val(resultado.datos.empresa);
                            $("#clasificacion").val(resultado.datos.clasificacion);
                        } else {
                            $("#id").html("");
                            $("#vehiculos").val("");
                            $("#img_vehiculos").val("");
                            $("#maximo").val("");
                            $("#tipo_vehiculos").val("");
                            $("#empresa").val("");
                            $("#clasificacion").val("");
                        }
                    }
                },
            });
        } catch (e) {
            console.log(e);
        }

        try {
            var cantidad_elementos =
                parseFloat(document.getElementById("piezas_caja").value) || 0,
                pesoo = parseFloat(document.getElementById("peso_piezas_kg").value) || 0,
                cantidadd = parseFloat(document.getElementById("cantidad").value) || 0;

            document.getElementById("peso_total").value =
                cantidad_elementos * pesoo * cantidadd;
        } catch (e) { }

    }
</script>