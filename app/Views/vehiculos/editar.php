<link rel="stylesheet" href="<?php echo base_url(); ?>/css/edit.css">
<div class="container-inputs">
    <div class="block">
        <h2 class="mt-4"><?php echo $titulo; ?></h2>

        <form method="POST" action="<?php echo base_url(); ?>/vehiculos/actualizar" autocomplete="off">
            <input type="hidden" value="<?php echo $datos['id']; ?> " name="id" />

            <div class="column">

                <div class="input-group">
                    <label></i> Vehículos</label>
                    <input class="form-control" id="vehiculos" name="vehiculos" type="text" value="<?php echo $datos['vehiculos']; ?>" autofocus required />
                </div>

                <div class="input-group">
                    <label></i>Cantidad Máxima</label>
                    <input class="form-control" id="maximo" name="maximo" type="number" value="<?php echo $datos['maximo']; ?>" required />
                </div>
                <div class="input-group">
                    <label></i>Tipo</label>
                    <input class="form-control" id="tipo_vehiculos" name="tipo_vehiculos" type="text" value="<?php echo $datos['tipo_vehiculos']; ?>" required />
                </div>
                <div class="input-group">
                    <label></i>Empresa</label>
                    <input class="form-control" id="empresa" name="empresa" type="text" value="<?php echo $datos['empresa']; ?>" required />
                </div>
                <div class="input-group">
                    <label></i>Clasificación</label>
                    <input class="form-control" id="clasificacion" name="clasificacion" type="text" value="<?php echo $datos['clasificacion']; ?>" required />
                </div>



                <div class="form-group">

                    <a href="<?php echo base_url(); ?>/vehiculos" class="btn btn-warning">Regresar</a>
                    <button data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" title="Guardar Registro" type="submit" class="btn btn-dark">Guardar</button>
                </div>


            </div>



        </form>

    </div>
    <div class="blocked">
        <h2>Imagen del vehículo</h2>
        <div class="columna">
            <div class="image-container" onclick="document.getElementById('img_vehiculo').click();">
                <img src="<?php echo base_url() . '/images/vehiculos/' . $datos['id'] . '.jpg'; ?>" alt="Imagen del Vehículo" class="img-responsive">
                <div class="overlay">Click para cambiar imagen</div>
            </div>
            <input type="file" id="img_vehiculo" name="img_vehiculo" accept="image/*" style="display:none;" onchange="loadFile(event)" />
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