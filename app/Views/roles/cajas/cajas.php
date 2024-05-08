<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo;?></h4>

            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/cajas/nuevo" class="btn
                                  btn-info">Agregar</a>

                </p>

                <div>

                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Codigo Cajas</th>
                                    <th>Tipo</th>
                                    <th>Alto</th>
                                    <th>Largo</th>
                                    <th>Ancho</th>
                                    <th>Piezas/Caja</th>
                                    <th>Peso/Piezas/kg</th>
                                    <th>Imagen</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($datos as $dato) {?>

                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['codigo_cajas']; ?></td>
                                    <td><?php echo $dato['tipo']; ?></td>
                                    <td><?php echo $dato['alto']; ?></td>
                                    <td><?php echo $dato['largo']; ?></td>
                                    <td><?php echo $dato['ancho']; ?></td>
                                    <td><?php echo $dato['piezas_caja']; ?></td>
                                    <td><?php echo $dato['peso_piezas_kg']; ?></td>

                                    <td><img src="<?php echo base_url() . '/images/cajas/'.$dato['id'].'.jpg'; ?>"
                                            width="100" /></td>

                                    <td><a href="<?php echo base_url(). '/cajas/editar/'. $dato['id']; ?>"
                                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </td>

                                    <td><a href="<?php echo base_url(). '/cajas/eliminar/'. $dato
                                    ['id']; ?>" data-toggle="modal" data-target="#modalconfirma" data-placement="top"
                                            title="Eliminar registro" class="btn btn-danger"><i
                                                class="fa-solid fa-trash-can"></i></a></td>
                                </tr>

                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="modalconfirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
                    <a class="btn btn-danger btn-ok">Si</a>
                </div>
            </div>
        </div>
    </div>