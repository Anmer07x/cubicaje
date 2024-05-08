<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <?php if(isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
            <?php } ?>

            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>/cajas/insertar"
                autocomplete="off">
                <?php csrf_field(); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Codigo Cajas</label>
                            <input class="form-control" id="codigo_cajas" name="codigo_cajas" type="text"
                                value="<?php echo set_value('codigo_cajas') ?>" autofocus required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Tipo</label>
                            <input class="form-control" id="tipo" name="tipo" type="text"
                                value="<?php echo set_value('tipo') ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Mercancia</label>
                            <input class="form-control" id="mercancia" name="mercancia" type="text"
                                value="<?php echo set_value('mercancia') ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Cantidad</label>
                            <input class="form-control" id="cantidad" name="cantidad" type="number"
                                value="<?php echo set_value('cantidad') ?>" />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Capacidad</label>
                            <input class="form-control" id="capacidad" name="capacidad" type="number"
                                value="<?php echo set_value('capacidad') ?>" />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Alto/m</label>
                            <input class="form-control" id="alto" name="alto" type="number"
                                value="<?php echo set_value('alto') ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Largo/m</label>
                            <input class="form-control" id="largo" name="largo" type="number"
                                value="<?php echo set_value('largo') ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Ancho/m</label>
                            <input class="form-control" id="ancho" name="ancho" type="number"
                                value="<?php echo set_value('ancho') ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Cantidad elementos</label>
                            <input class="form-control" id="piezas_caja" name="piezas_caja" type="number"
                                value="<?php echo set_value('piezas_caja') ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Peso/Pieza/Kg</label>
                            <input class="form-control" id="peso_piezas_kg" name="peso_piezas_kg" type="number"
                                value="<?php echo set_value('peso_piezas_kg') ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Factor de riesgo</label>
                            <input class="form-control" id="factor_de_riesgo" name="factor_de_riesgo" type="number"
                                value="<?php echo set_value('factor_de_riesgo') ?>" />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label><i class="campo-obligatorio">*</i> Ruta de la imagen</label>
                            <input class="form-control" id="img_caja" name="img_caja" type="text"
                                value="<?php echo set_value('img_caja') ?>" />
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <br>
                                    <label>Imagen </label><br />

                                    <input type="file" id="img_caja" name="img_caja" accept="image/*" required />
                                    <p class="text-danger"> Cargar imagen en formato jpg de 150x150 pinceles</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="form-group">

                    <a href="<?php echo base_url(); ?>/cajas" class="btn btn-warning">Regresar</a>

                    <button data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" 
                     title="Guardar Registro"  type="submit" class="btn btn-dark" >Guardar</button>
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