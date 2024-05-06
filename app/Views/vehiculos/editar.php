<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <form method="POST" action="<?php echo base_url(); ?>/vehiculos/actualizar" autocomplete="off">
                <input type="hidden" value="<?php echo $datos['id']; ?> " name="id" />

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label></i> Vehículos</label>
                            <input class="form-control" id="vehiculos" name="vehiculos" type="text"
                                value="<?php echo $datos ['vehiculos']; ?>" autofocus required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label></i>Cantidad Máxima</label>
                            <input class="form-control" id="maximo" name="maximo" type="number"
                                value="<?php echo $datos ['maximo']; ?>"  required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Tipo</label>
                            <input class="form-control" id="tipo_vehiculos" name="tipo_vehiculos" type="text" value="<?php echo $datos ['tipo_vehiculos']; ?>"
                                required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Empresa</label>
                            <input class="form-control" id="empresa" name="empresa" type="text"
                                value="<?php echo $datos ['empresa']; ?>"  required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Clasificación</label>
                            <input class="form-control" id="clasificacion" name="clasificacion" type="text"
                                value="<?php echo $datos ['clasificacion']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Ruta de la imagen</label>
                            <input class="form-control" id="img_vehiculos" name="img_vehiculos" type="text"
                                value="<?php echo $datos ['img_vehiculos']; ?>"  />
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <br>
                                    <label>Imagen </label><br />

                                    <img src="<?php echo base_url() . '/images/vehiculos/'.$datos['id'].'.jpg'; ?>"
                                        class="img-responsive" width="200" />

                                    <input type="file" id="img_vehiculo" name="img_vehiculo" accept="image/*" />
                                    <p class="text-danger"> Cargar imagen en formato jpg de 150x150 pinceles</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <a href="<?php echo base_url(); ?>/vehiculos" class="btn btn-warning">Regresar</a>
                            
                            <button data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" 
                            title="Guardar Registro"  type="submit" class="btn btn-dark">Guardar</button>
                        </div>
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
                    <p>¡Se actualizo exitoxamente!</p>
                </div>
                <div class="modal-footer">   
                </div>
            </div>
        </div>
    </div>-->