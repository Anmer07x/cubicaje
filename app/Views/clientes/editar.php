    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h4 class="mt-4"><?php echo $titulo; ?></h4>

                <?php if(isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
                <?php } ?>

                <form method="POST" action="<?php echo base_url(); ?>/clientes/actualizar" autocomplete="off">
                    <?php csrf_field(); ?>

                    <input type="hidden" id="id" name="id" value="<?php echo $cliente['id']; ?>" />

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label>Nombre</label>
                                <input class="form-control" id="nombre" name="nombre" type="text"
                                    value="<?php echo $cliente['nombre']; ?>" autofocus required />
                            </div>

                            <div class="col-12 col-sm-6">
                                <label>Direccion</label>
                                <input class="form-control" id="direccion" name="direccion" type="text"
                                    value="<?php echo $cliente['direccion']; ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label>Telefono</label>
                                <input class="form-control" id="telefono" name="telefono" type="number"
                                    value="<?php echo $cliente['telefono']; ?>" />
                            </div>

                            <div class="col-12 col-sm-6">
                                <label></i>Correo</label>
                                <input class="form-control" id="correo" name="correo" type="email"
                                    value="<?php echo $cliente['correo']; ?>" />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">

                        <a href="<?php echo base_url(); ?>/clientes" class="btn btn-warning">Regresar</a>
                         <button data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" 
                         title="Guardar Registro"  type="submit" class="btn btn-dark">Guardar</button>
                    </div>


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