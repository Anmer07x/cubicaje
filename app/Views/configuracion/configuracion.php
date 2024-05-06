<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <?php if(isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
            <?php } ?>

            <form method="POST" enctype="multipart/form-data"
                action="<?php echo base_url(); ?>/configuracion/actualizar" autocomplete="off">
                <?php csrf_field(); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Nombre de la empresa </label>
                            <input class="form-control" id="cubicaje_nombre" name="cubicaje_nombre" type="text"
                                value="<?php echo $nombre['valor']; ?>" disabled />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>RFC </label>
                            <input class="form-control" id="cubicaje_rfc" name="cubicaje_rfc" type="text"
                                value="<?php echo $rfc['valor']; ?>" disabled />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Telefono de la empresa </label>
                            <input class="form-control" id="cubicaje_telefono" name="cubicaje_telefono" type="text"
                                value="<?php echo $telefono['valor']; ?>" disabled />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Correo de la empresa </label>
                            <input class="form-control" id="cubicaje_email" name="cubicaje_correo" type="text"
                                value="<?php echo $email['valor']; ?>" disabled />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label> Direccion de la empresa </label>
                            <textarea class="form-control" id="cubicaje_direccion" name="cubicaje_direccion"
                                disabled><?php echo $direccion['valor']; ?></textarea>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Leyenda del ticket </label>
                            <textarea class="form-control" id="ticket_leyenda" name="ticket_leyenda"
                                disabled><?php echo $leyenda['valor']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="card-body p-5 text-center">
                            <label>Logotipo </label><br />
                            <img src="<?php echo base_url() . '/images/logotipo.png' ?>" class="img-responsive"
                                type="center" width="200" />

                            <!-- <input type="file" id="cubicaje_logo" name="cubicaje_logo" accept="image/png" /> 

                            <p class="text-danger"> Cargar imagen en formato png de 150x150 pinceles</p> -->
                        </div>
                    </div>
                </div>

                <!--<a href="<?php echo base_url(); ?>/configuracion" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button> -->

            </form>

        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                    <a class="btn btn-danger btn-ok">Si</a>
                </div>
            </div>
        </div>
    </div>