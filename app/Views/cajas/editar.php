<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <?php if(isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
            <?php } ?>

            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>/cajas/actualizar"
                autocomplete="off">
                <input type="hidden" value="<?php echo $datos['id']; ?> " name="id" />

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label></i> Codigo Cajas</label>
                            <input class="form-control" id="codigo_cajas" name="codigo_cajas" type="text"
                                value="<?php echo $datos ['codigo_cajas']; ?>" autofocus required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label></i> Tipo</label>
                            <input class="form-control" id="tipo" name="tipo" type="text"
                                value="<?php echo $datos ['tipo']; ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label></i> Mercancia</label>
                            <input class="form-control" id="mercancia" name="mercancia" type="text"
                                value="<?php echo $datos ['mercancia']; ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label></i> Cantidad</label>
                            <input class="form-control" id="cantidad" name="cantidad" type="number"
                                value="<?php echo $datos ['cantidad']; ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label></i> Capacidad</label>
                            <input class="form-control" id="capacidad" name="capacidad" type="number"
                                value="<?php echo $datos ['capacidad']; ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label></i> Alto/m</label>
                            <input class="form-control" id="alto" name="alto" type="number"
                                value="<?php echo $datos ['alto']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Largo/m</label>
                            <input class="form-control" id="largo" name="largo" type="number"
                                value="<?php echo $datos ['largo']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Ancho/m</label>
                            <input class="form-control" id="ancho" name="ancho" type="number"
                                value="<?php echo $datos ['ancho']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Cantidad elementos</label>
                            <input class="form-control" id="piezas_caja" name="piezas_caja" type="number"
                                value="<?php echo $datos ['piezas_caja']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Peso/pieza/kg</label>
                            <input class="form-control" id="peso_piezas_kg" name="peso_piezas_kg" type="number"
                                value="<?php echo $datos ['peso_piezas_kg']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Factor de riesgo</label>
                            <input class="form-control" id="factor_de_riesgo" name="factor_de_riesgo" type="number"
                                value="<?php echo $datos ['factor_de_riesgo']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Ruta de la imagen</label>
                            <input class="form-control" id="img_caja" name="img_caja" type="text"
                                value="<?php echo $datos ['img_caja']; ?>" required />
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <br>
                                    <label>Imagen </label><br />

                                    <img src="<?php echo base_url() . '/images/cajas/'.$datos['id'].'.jpg'; ?>"
                                        class="img-responsive" width="200" />

                                    <input type="file" id="img_caja" name="img_caja" accept="image/*" />
                                    <p class="text-danger"> Cargar imagen en formato jpg de 150x150 pinceles</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">

                        <a href="<?php echo base_url(); ?>/cajas" class="btn btn-warning">Regresar</a>

                        <button data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" 
                         title="Guardar Registro"  type="submit" class="btn btn-dark">Guardar</button>

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