<link rel="stylesheet" href="<?php echo base_url(); ?>/css/merca.css">
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <?php if (session('message')) : ?>
                <h4><?= session('message') ?></h4>
            <?php endif ?>



            <div>


                <div>
                    <div class="container-inputs">
                        <div class="block">
                            <h2>Cajas</h2>
                            <div class="search">
                                <form method="get" action="<?= base_url('cajas/buscarInput') ?>">
                                    <div class="row-search">
                                        <input type="text" name="search" class="form-control" autocomplete="off" placeholder="Buscar...">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            </div>
                            <div class="column">
                                <div class="table-container">
                                <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                <th>Id</th>
                                                    <th>Código Cajas</th>
                                                    <th>Tipo</th>
                                                    <th>Cantidad</th>
                                                    <th>Capacidad</th>
                                                    <th>Alto</th>
                                                    <th>Largo</th>
                                                    <th>Ancho</th>
                                                    <th>Cantidad elementos</th>
                                                    <th>Peso/Piezas/kg</th>
                                                    <th>Imagen</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php foreach ($cajas as $caja) { ?>
                                                <tr>
                                                    <td><?php echo $caja['id']; ?></td>
                                                    <td><?php echo $caja['codigo_cajas']; ?></td>
                                                    <td><?php echo $caja['tipo']; ?></td>
                                                    <td><?php echo $caja['cantidad']; ?></td>
                                                    <td><?php echo $caja['capacidad']; ?></td>
                                                    <td><?php echo $caja['alto']; ?></td>
                                                    <td><?php echo $caja['largo']; ?></td>
                                                    <td><?php echo $caja['ancho']; ?></td>
                                                    <td><?php echo $caja['piezas_caja']; ?></td>
                                                    <td><?php echo $caja['peso_piezas_kg']; ?></td>
                                                    <td><img src="<?php echo base_url() . '/images/cajas/' . $caja['id'] . '.jpg'; ?>" width="100" /></td>

                                                    <td><a href="<?php echo base_url() . '/cajas/editar/' . $caja['id']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>

                                                    <td><a href="#" data-href="<?php echo base_url() . '/cajas/eliminar/' . $caja['id']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" title="Eliminar Registro" class="btn btn-dark"><i class="fa-solid fa-trash-can"></i></a> </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="help-box">
        <a href="https://www.uniclaretiana.edu.co/#atencion">
            <i class="fas fa-question-circle"></i> Ayuda
        </a>
    </div>