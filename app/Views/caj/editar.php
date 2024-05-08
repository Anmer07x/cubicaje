    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h4 class="mt-4"><?php echo $titulo; ?></h4>
                <?php \Config\Services::validation()->listErrors();?>

                <form method="POST" action="<?php echo base_url(); ?>/productos/actualizar" autocomplete="off">
                    <?php csrf_field(); ?>

                    <input type="hidden" id="id" name="id" value="<?php echo $producto['id']; ?>" />

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label>Codigo</label>
                                <input class="form-control" id="codigo" name="codigo" type="text" value="<?php
                             echo $producto['codigo']; ?>" autofocus required />
                            </div>

                            <div class="col-12 col-sm-6">
                                <label>Nombre</label>
                                <input class="form-control" id="nombre" name="nombre" type="text"
                                    value="<?php echo $producto['nombre']; ?>" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label>Caja</label>
                                <select class="form-control" id="id_caja" name="id_caja" required>
                                    <option value="">Seleccionar caja</option>
                                    <?php foreach ($cajas as $caja) {?>
                                    <option value="<?php echo $caja['id']; ?>"
                                        <?php if($caja['id'] == $producto['id_caja']){ echo 'selected';} ?>>
                                        <?php echo $caja['tipo']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label>Vehiculo</label>
                        <select class="form-control" id="id_vehiculo" name="id_vehiculo" required>
                            <option value="">Seleccionar vehiculo</option>
                            <?php foreach ($vehiculos as $vehiculo) {?>
                            <option value="<?php echo $vehiculo['id']; ?>"
                                <?php if($vehiculo['id']==$producto['id_vehiculo']){ echo 'selected' ;} ?>>
                                <?php echo $vehiculo['vehiculos']; ?>
                            </option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label>Cantidad</label>
                        <input class="form-control" id="cantidad" name="cantidad" type="text"
                            value="<?php echo $producto['cantidad']; ?>" required />
                    </div>

                    <div class="col-12 col-sm-6">
                        <label></i> Vol.m3</label>
                        <input class="form-control" id="vol_m" name="vol_m" type="text"
                            value="<?php echo $producto['vol_m']; ?>" required />
                    </div>

                    <div class="col-12 col-sm-6">
                        <label>Peso/total</label>
                        <input class="form-control" id="peso_total" name="peso_total" type="text"
                            value="<?php echo $producto['peso_total']; ?>" required />
                    </div>

                    <div class="col-12 col-sm-6">
                        <label>Es inventariable</label>
                        <select id="inventariable" name="inventariable" class="form-control">
                            <option value="1" <?php if($producto['inventariable']== 1){echo 'selected';} ?>>Si</option>
                            <option value="0" <?php if($producto['inventariable']== 0){echo 'selected';} ?>>No</option>
                        </select>
                    </div>


                    <div class="form-group">

                        <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary">Regresar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>


                </form>

                <div>
        </main>