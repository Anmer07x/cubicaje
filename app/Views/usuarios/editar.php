    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h4 class="mt-4"><?php echo $titulo; ?></h4>
                <?php \Config\Services::validation()->listErrors();?>

                <form method="POST" action="<?php echo base_url(); ?>/usuarios/actualizar" autocomplete="off">
                    <?php csrf_field(); ?>

                    <input type="hidden" id="id" name="id" value="<?php echo $usuario['id']; ?>" />

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label>Usuario</label>
                                <input class="form-control" id="usuario" name="usuario" type="email" value="<?php
                             echo $usuario['usuario']; ?>" autofocus required />
                            </div>

                            <div class="col-12 col-sm-6">
                                <label>Nombre</label>
                                <input class="form-control" id="nombre" name="nombre" type="text"
                                    value="<?php echo $usuario['nombre']; ?>" required />
                            </div>
                        </div>
                    </div>

            </div>
    </div>

    <div class="form-group">

        <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-warning">Regresar</a>
        <button type="submit" class="btn btn-dark">Guardar</button>
    </div>


    </form>

    <div>
        </main>