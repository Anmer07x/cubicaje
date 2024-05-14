<link rel="stylesheet" href="<?php echo base_url(); ?>/css/edit.css">
<div class="container-inputs">
    <div class="block">
        <h2 class="mt-4"><?php echo $titulo; ?></h2>
        <?php \Config\Services::validation()->listErrors(); ?>

        <form method="POST" action="<?php echo base_url(); ?>/productos/actualizar" autocomplete="off">
        <input type="hidden" id="id" class="content-center " name="id" value="<?php echo $producto['id']; ?>" />
        <?php csrf_field(); ?>

            <div class="column">
               
                <div class="input-group">
                    <label>Código</label>
                    <input class="form-control" id="codigo" name="codigo" type="text" value="<?php  echo $producto['codigo']; ?>" autofocus required />
                                                                                               
                </div>
                <div class="input-group">
                    <label>Nombre</label>
                    <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $producto['nombre']; ?>" required />
                </div>
                <div class="input-group">
                    <label></i> Tipo</label>
                    <input class="form-control" id="tipo" name="tipo" type="text" value="<?php echo $producto['tipo']; ?>" required />
                </div>

                <div class="input-group">
                    <label>Caja</label>
                    <select class="form-control" id="id_caja" name="id_caja" required>
                        <option value="">Seleccionar caja</option>
                        <?php foreach ($cajas as $caja) { ?>
                            <option value="<?php echo $caja['id']; ?>" <?php if ($caja['id'] == $producto['id_caja']) {
                                                                            echo 'selected';
                                                                        } ?>>
                                <?php echo $caja['tipo']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group">
                    <label>Vehículo</label>
                    <select class="form-control" id="id_vehiculo" name="id_vehiculo" required>
                        <option value="">Seleccionar Vehículo</option>
                        <?php foreach ($vehiculos as $vehiculo) { ?>
                            <option value="<?php echo $vehiculo['id']; ?>" <?php if ($vehiculo['id'] == $producto['id_vehiculo']) {
                                                                                echo 'selected';
                                                                            } ?>>
                                <?php echo $vehiculo['vehiculos']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group">
                    <label>Cantidad</label>
                    <input class="form-control" id="cantidad" name="cantidad" type="number" value="<?php echo $producto['cantidad']; ?>" required />
                </div>

                <div class="input-group">
                    <label></i> Vol.m3</label>
                    <input class="form-control" id="vol_m" name="vol_m" type="number" value="<?php echo $producto['vol_m']; ?>" required />
                </div>

                <div class="input-group">
                    <label>Peso/total</label>
                    <input class="form-control" id="peso_total" name="peso_total" type="number" value="<?php echo $producto['peso_total']; ?>" required />
                </div>

                <div class="input-group">
                    <label>Es inventariable</label>
                    <select id="inventariable" name="inventariable" class="form-control">
                        <option value="1" <?php if ($producto['inventariable'] == 1) {
                                                echo 'selected';
                                            } ?>>Si</option>
                        <option value="0" <?php if ($producto['inventariable'] == 0) {
                                                echo 'selected';
                                            } ?>>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <a href="<?php echo base_url(); ?>/productos" class="btn btn-warning">Regresar</a>
                    <button data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" title="Guardar Registro" type="submit" class="btn btn-dark">Guardar</button>
                </div>
            </div>
        </form>
    </div>


    <div class="blocked">
        <h2>Imagen cajas</h2>
        <div class="columna">
            <div class="image-container" onclick="document.getElementById('img_producto').click()">
                <img src="<?php echo base_url() . '/images/productos/' . $producto['id'] . '.jpg'; ?>" alt="Imagen del producto" class="img-responsive" width="200" />
                <div class="overlay">Click para cambiar imagen</div>
            </div>
            <input type="file" id="img_producto" name="img_producto" accept="image/*" style="display:none;" onchange="loadFile(event)" />
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