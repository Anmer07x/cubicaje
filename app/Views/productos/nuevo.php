<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <?php if(isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
            <?php } ?>

            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>/productos/insertar"
                autocomplete="off">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Código</label>
                            <input class="form-control" id="codigo" name="codigo" type="text" value="" autofocus
                                required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Tipo</label>
                            <input class="form-control" id="tipo" name="tipo" type="text" value="" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Caja</label>
                            <select class="form-control" id="id_caja" name="id_caja" required>
                                <option value="">Seleccionar caja</option>
                                <?php foreach ($cajas as $caja) {?>
                                <option value="<?php echo $caja['id']; ?>"><?php echo $caja['tipo']; ?>
                                </option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Vehículo</label>
                            <select class="form-control" id="id_vehiculo" name="id_vehiculo" required>
                                <option value="">Seleccionar Vehículo</option>
                                <?php foreach ($vehiculos as $vehiculo) {?>
                                <option value="<?php echo $vehiculo['id']; ?>"><?php echo $vehiculo['vehiculos']; ?>
                                </option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Cantidad</label>
                            <input class="form-control" id="cantidad" name="cantidad" type="number" value="" autofocus
                                required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label></i> Vol.m3</label>
                            <input class="form-control" id="vol_m" name="vol_m" type="number" value="" autofocus
                                required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Peso/total/kg</label>
                            <input class="form-control" id="peso_total" name="peso_total" type="number" value="" autofocus
                                required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Ruta de la imagen</label>
                            <input class="form-control" id="img_productos" name="img_productos" type="text" value="" autofocus
                                required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Es inventariable</label>
                            <select id="inventariable" name="inventariable" class="form-control">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <br>
                                <label>Imagen </label><br />

                                <input type="file" id="img_producto" name="img_producto" accept="image/*" required />
                                <p class="text-danger"> Cargar imagen en formato jpg de 150x150 pinceles</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <a href="<?php echo base_url(); ?>/productos" class="btn btn-warning">Regresar</a>
                    
                    <button data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" 
                     title="Guardando Registro"  type="submit" class="btn btn-dark">Guardar</button>

                </div>
                <br>
            </form>

            <div>
    </main>
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