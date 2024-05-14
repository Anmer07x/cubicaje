<link rel="stylesheet" href="<?php echo base_url(); ?>/css/edit.css">
<div class="container-inputs">

    <div class="block">
        <h2 class="mt-4"><?php echo $titulo; ?></h2>

        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>/vehiculos/insertar" autocomplete="off">


            <div class="column">
                <div class="input-group">
                    <label><i class="campo-obligatorio"></i> Vehículos</label>
                    <input class="form-control" id="vehiculos" name="vehiculos" type="text" value="" autofocus required />
                </div>
                <div class="input-group">
                    <label><i class="campo-obligatorio"></i>Cantidad Máxima</label>
                    <input class="form-control" id="maximo" name="maximo" type="number" value="" required />
                </div>
                <div class="input-group">
                    <label><i class="campo-obligatorio"></i>Tipo</label>
                    <input class="form-control" id="tipo_vehiculos" name="tipo_vehiculos" type="text" value="" required />
                </div>
                <div class="input-group">
                    <label><i class="campo-obligatorio"></i> Empresa</label>
                    <input class="form-control" id="empresa" name="empresa" type="text" value="" required />
                </div>
                <div class="input-group">
                    <label><i class="campo-obligatorio"></i> Clasificación</label>
                    <input class="form-control" id="clasificacion" name="clasificacion" type="text" value="" required />
                </div>
                <div class="input-group">
                    <label><i class="campo-obligatorio"></i> Ruta de la imagen</label>
                    <input class="form-control" id="img_vehiculo" name="img_vehiculo" type="text" value="" />
                </div>



                <div class="form-group">

                    <a href="<?php echo base_url(); ?>/vehiculos" class="btn btn-warning">Regresar</a>
                    <button data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" title="Guardar Registro" type="submit" class="btn btn-dark">Guardar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="blocked">
        <h2>Imagen del vehiculo a agregar</h2>
        <div class="columna">
            <div class="image-container" onclick="document.getElementById('img_vehiculo').click()">
                <input type="file" id="img_vehiculo" name="img_vehiculo" accept="image/*" style="display:none;" onchange="loadFile(event)"  required />
                <i class="fas fa-cloud-upload-alt"></i>
                <p>Seleccionar imagen</p>
            </div>
        </div>
    </div>
</div>

<script>
    var loadFile = function(event) {
        var output = document.querySelector('.img-responsive');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src); // Libera memoria después de cargar la nueva imagen
        }
    };
</script>


<!-- Modal 
        <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¡Guardando registro!</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¡Se guardo exitoxamente!</p>
                </div>
                <div class="modal-footer">   
                </div>
            </div>
        </div>
    </div>-->