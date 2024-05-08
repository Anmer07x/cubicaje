    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h4 class="mt-4"><?php echo $titulo; ?></h4>

                <?php if(isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
                <?php } ?>

                <form method="POST" action="<?php echo base_url(); ?>/usuarios/recuperar" autocomplete="off">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label>Contraseña</label>
                                <input class="form-control" id="password" name="password" type="password" />
                            </div>

                            <div class="col-12 col-sm-6">
                                <label>Confirmar contraseña</label>
                                <input class="form-control" id="repassword" name="repassword" type="password"
                                    required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-warning">Regresar</a>
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>

                    <?php if(isset($mensaje)) { ?>
                    <div class="alert alert-success">
                        <?php echo $mensaje; ?>
                    </div>
                    <?php } ?>

                </form>

                <div>
        </main>