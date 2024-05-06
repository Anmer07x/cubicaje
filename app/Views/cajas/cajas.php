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
                                <label>
                                    <input type="text" placeholder="Buscar...">
                                    <i class="fas fa-search"></i>
                                </label>

                                <p>
                                    <a href="<?php echo base_url(); ?>/productos/nuevo" class="btn
                                  btn-warning">+</a>

                                </p>
                            </div>
                            <div class="column">
                                <div class="table-container">
                                    <div class="table-responsive">
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
                                                <?php foreach ($datos as $dato) { ?>

                                                    <tr>
                                                        <td><?php echo $dato['id']; ?></td>
                                                        <td><?php echo $dato['codigo_cajas']; ?></td>
                                                        <td><?php echo $dato['tipo']; ?></td>
                                                        <td><?php echo $dato['cantidad']; ?></td>
                                                        <td><?php echo $dato['capacidad']; ?></td>
                                                        <td><?php echo $dato['alto']; ?></td>
                                                        <td><?php echo $dato['largo']; ?></td>
                                                        <td><?php echo $dato['ancho']; ?></td>
                                                        <td><?php echo $dato['piezas_caja']; ?></td>
                                                        <td><?php echo $dato['peso_piezas_kg']; ?></td>

                                                        <td><img src="<?php echo base_url() . '/images/cajas/' . $dato['id'] . '.jpg'; ?>" width="100" /></td>

                                                        <td><a href="<?php echo base_url() . '/cajas/editar/' . $dato['id']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        </td>

                                                        <td><a href="#" data-href="<?php echo base_url() . '/cajas/eliminar/' . $dato['id']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" title="Eliminar Registro" class="btn btn-dark"><i class="fas fa-trash-can"></i></a> </td>
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