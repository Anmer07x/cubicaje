<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo;?></h4>

            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/productos" class="btn
                                  btn-warning">Mercancia</a>
                </p>
                <div>

                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Vol.m3</th>
                                    <th>Peso/total</th>
                                    <th>inventariable</th>
                                    <th>Reingresar</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($datos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['codigo']; ?></td>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><?php echo $dato['cantidad']; ?></td>
                                    <td><?php echo $dato['peso_total']; ?></td>
                                    <td><?php echo $dato['vol_m']; ?></td>
                                    <td><?php echo $dato['inventariable']; ?></td>

                                    <td><a href="<?php echo base_url(). '/productos/reingresar/'. $dato
                                                ['id']; ?>"><i class="fas fa-arrow-alt-circle-up"></i></a></td>


                                </tr>

                                <?php }?>
                            </tbody>
                        </table>
                    </div>

                </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reingresar registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Desea reingresar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
                    <a class="btn btn-danger btn-ok">Si</a>
                </div>
            </div>
        </div>
    </div>