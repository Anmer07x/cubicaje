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
                            <label></i> Código Cajas</label>
                            <input class="form-control" id="codigo_cajas" name="codigo_cajas" type="text"
                                value="<?php echo $datos ['codigo_cajas']; ?>" autofocus required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label></i> Tipo</label>
                            <input class="form-control" id="tipo" name="tipo" type="text"
                                value="<?php echo $datos ['tipo']; ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label></i> Alto</label>
                            <input class="form-control" id="alto" name="alto" type="text"
                                value="<?php echo $datos ['alto']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Largo</label>
                            <input class="form-control" id="largo" name="largo" type="text"
                                value="<?php echo $datos ['largo']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Ancho</label>
                            <input class="form-control" id="ancho" name="ancho" type="text"
                                value="<?php echo $datos ['ancho']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Piezas/Caja</label>
                            <input class="form-control" id="piezas_caja" name="piezas_caja" type="text"
                                value="<?php echo $datos ['piezas_caja']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label></i> Peso/pieza/kg</label>
                            <input class="form-control" id="peso_piezas_kg" name="peso_piezas_kg" type="text"
                                value="<?php echo $datos ['peso_piezas_kg']; ?>" required />
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-6">
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

                        <a href="<?php echo base_url(); ?>/cajas" class="btn btn-primary">Regresar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
            </form>

            <div>
    </main>