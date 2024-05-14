<link rel="stylesheet" href="<?php echo base_url(); ?>/css/edit.css">
<div id="container-inputs">
    <div class="block">
        <h2 class="mt-4"><?php echo $titulo; ?></h2>
        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>

        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>/cajas/actualizar" autocomplete="off">
            <input type="hidden" value="<?php echo $datos['id']; ?> " name="id" />

            <div class="column">

                <div class="input-group">
                    <label></i> Código Cajas</label>
                    <input class="form-control" id="codigo_cajas" name="codigo_cajas" type="text" value="<?php echo $datos['codigo_cajas']; ?>" autofocus required />
                </div>

                <div class="input-group">
                    <label></i> Tipo</label>
                    <input class="form-control" id="tipo" name="tipo" type="text" value="<?php echo $datos['tipo']; ?>" required />
                </div>

                <div class="input-group">
                    <label></i> Alto</label>
                    <input class="form-control" id="alto" name="alto" type="text" value="<?php echo $datos['alto']; ?>" required />
                </div>
                <div class="input-group">
                    <label></i> Largo</label>
                    <input class="form-control" id="largo" name="largo" type="text" value="<?php echo $datos['largo']; ?>" required />
                </div>
                <div class="input-group">
                    <label></i> Ancho</label>
                    <input class="form-control" id="ancho" name="ancho" type="text" value="<?php echo $datos['ancho']; ?>" required />
                </div>
                <div class="input-group">
                    <label></i> Piezas/Caja</label>
                    <input class="form-control" id="piezas_caja" name="piezas_caja" type="text" value="<?php echo $datos['piezas_caja']; ?>" required />
                </div>
                <div class="input-group">
                    <label></i> Peso/pieza/kg</label>
                    <input class="form-control" id="peso_piezas_kg" name="peso_piezas_kg" type="text" value="<?php echo $datos['peso_piezas_kg']; ?>" required />
                </div>
            </div>

            <div class="form-group">

                <a href="<?php echo base_url(); ?>/cajas" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>

        <div class="blocked">
            <h2>Imagen caja </h2>
            <div class="columna">
                <div class="image-container" onclick="document.getElementById('img_caja').click()">
                    <img src="<?php echo base_url() . '/images/cajas/' . $datos['id'] . '.jpg'; ?>" class="img-responsive" width="200" />
                    <div class="overlay">Click para cambiar imagen</div>
                </div>
                <input type="file" id="img_caja" name="img_caja" accept="image/*" />
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