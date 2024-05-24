<link href="<?php echo base_url(); ?>/css/consul.css" rel="stylesheet" />
<div class="container-inputs">
    <div class="block">
        <h2>Consulta de los Vehiculos</h2>
        <form method="POST" action="<?php echo base_url(); ?>/sugerencias/guarda" autocomplete="off">
            <div class="column">
                <div class="input-group">
                    <label> Codigo: </label>
                    <div class="input-container">
                        <input class="form-control" id="id_vehiculos" name="id_vehiculos" type="text" placeholder="Escribe el codigo y enter" onkeyup="buscarProducto(event, this, this.value)" autofocus />
                        <label for="id_vehiculos" id="resultado_error" style="color: red"> </label>
                    </div>
                </div>

                <div class="input-group">
                    <label>Vehículo</label>
                    <div class="input-container">
                        <input class="form-control" id="vehiculos" name="vehiculos" type="text" disabled />
                    </div>
                </div>

                <div class="input-group">
                    <label>Volumen</label>
                    <div class="input-container">
                        <input class="form-control" id="maximo" name="maximo" type="text" disabled />
                    </div>
                </div>

                <div class="input-group">
                    <label>Tipo</label>
                    <div class="input-container">
                        <input class="form-control" id="tipo_vehiculos" name="tipo_vehiculos" type="text" disabled />
                    </div>

                </div>
                <div class="input-group">
                    <label> Empresa</label>
                    <div class="input-container">
                        <input class="form-control" id="empresa" name="empresa" type="text" disabled />
                    </div>
                </div>
                <div class="input-group">
                    <label> Clasificación</label>
                    <div class="input-container">
                        <input class="form-control" id="clasificacion" name="clasificacion" type="text" disabled />
                    </div>
                </div>



            </div>

    </div>
    <!--<div class=" row">
                            <table id="tablaProductos" class="table table-hover table-striped table-sm
                    table-responsive tablaProductos" width="100%">
                                <thead class="thead-dark">
                                    <th>#</th>
                                    <th>id</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Peso Total</th>
                                    <th>Imagen</th>
                                    <th width="1%"></th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 offset-sm-6">
                                <label style="font-weight: bold; font-size: 30px; text-align: center;
                        ">Peso Total</label>
                                <input type="tex" id="peso_total" name="peso_total" size="7" readonly="true"
                                    value="0.00" style="font-weight: bold; font-size: 30px; text-align: center;" />
                                <button type="button" id="completa_sugerencia" class="btn btn-success">
                                    Completar Sugerencia</button>
                            </div>-->

    </form>

    <div class="help-box">
        <a href="https://www.uniclaretiana.edu.co/#atencion">
            <i class="fas fa-question-circle"></i> Ayuda
        </a>
    </div>

    <div>
      

        <script>
            $(document).ready(function() {

            });

            function buscarProducto(e, tagid, id_vehiculos) {
                var enterkey = 13;

                if (id_vehiculos != '') {
                    if (e.which == enterkey) {
                        $.ajax({
                            url: '<?php echo base_url(); ?>/vehiculos/buscarPorid/' + id_vehiculos,
                            dataType: 'json',
                            success: function(resultado) {
                                if (resultado == 0) {
                                    $(tagid).val('');
                                } else {
                                    $(tagid).removeClass('has-error');
                                    $('#resultado_error').html(resultado.error);

                                    console.log(resultado.datos);
                                    if (resultado.existe) {
                                        $('#id_vehiculos').html(resultado.datos.id);
                                        $('#vehiculos').val(resultado.datos.vehiculos);
                                        $('#img_vehiculos').attr("src", resultado.datos.img_vehiculos);
                                        $('#maximo').val(resultado.datos.maximo);
                                        $('#tipo_vehiculos').val(resultado.datos.tipo_vehiculos);
                                        $('#empresa').val(resultado.datos.empresa);
                                        $('#clasificacion').val(resultado.datos.clasificacion);

                                    } else {
                                        $('#id_vehiculos').html('');
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
        </script>
        <script src="<?php echo base_url(); ?>/js/jquery-3.5.1.min.js"></script>