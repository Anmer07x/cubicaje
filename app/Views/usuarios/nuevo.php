<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <?php if(isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/usuarios/insertar" autocomplete="off">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Usuario</label>
                            <input class="form-control" id="usuario" name="usuario" type="email"
                                value="<?php echo set_value('usuario') ?>" autofocus required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text"
                                value="<?php echo set_value('nombre') ?>" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Contraseña</label>
                            <input class="form-control" id="password" name="password" type="password"
                                value="<?php echo set_value('password') ?>"  required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Repite contraseña</label>
                            <input class="form-control" id="repassword" name="repassword" type="password"
                                value="<?php echo set_value('repassword') ?>" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Caja</label>
                            <select class="form-control" id="id_caj" name="id_caj" required>
                                <option value="">Seleccionar caja</option>
                                <?php foreach ($caj as $caj) {?>
                                <option value="<?php echo $caj['id']; ?>"><?php echo $caj['nombre']; ?>
                                </option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Rol</label>
                            <select class="form-control" id="id_rol" name="id_rol" required>
                                <option value="">Seleccionar rol</option>
                                <?php foreach ($roles as $rol) {?>
                                <option value="<?php echo $rol['id']; ?>"><?php echo $rol['nombre']; ?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>

                <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-warning">Regresar</a>
                
                <button  type="submit" class="btn btn-dark">Guardar</button>


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