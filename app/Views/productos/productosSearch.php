
<link rel="stylesheet" href="<?php echo base_url(); ?>/css/merca.css">
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div>
                <div>
                    <div class="container-inputs">
                        <div class="block">
                            <h2>MERCANCIA</h2>
                            <div class="search">
                                <form method="get" action="<?= base_url('productos/buscar') ?>">
                                    <div class="row-search">
                                        <input type="text" name="search" class="form-control" autocomplete="off" placeholder="Buscar...">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                        <a href="<?php echo base_url(); ?>/productos/nuevo" class="btn
                                          btn-warning">+</a>
                                    </div>
                                </form>
                            </div>
                          
                            <div class="column">
                                <div class="table-container">
                                    <div class="table-responsive">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Código</th>
                                                    <th>Nombre</th>
                                                    <th>Tipo</th>
                                                    <th>Cantidad</th>
                                                    <th>Vol.m3</th>
                                                    <th>Peso/total</th>
                                                    <th>Imagen</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php foreach ($productos as $producto) { ?>
                                                <tr>
                                                    <td><?php echo $producto['id']; ?></td>
                                                    <td><?php echo $producto['codigo']; ?></td>
                                                    <td><?php echo $producto['nombre']; ?></td>
                                                    <td><?php echo $producto['tipo']; ?></td>
                                                    <td><?php echo $producto['cantidad']; ?></td>
                                                    <td><?php echo $producto['vol_m']; ?></td>
                                                    <td><?php echo $producto['peso_total']; ?></td>

                                                    <td><img src="<?php echo base_url() . '/images/productos/' . $producto['id'] . '.jpg'; ?>" width="100" /></td>

                                                    <td><a href="<?php echo base_url() . '/productos/editar/' . $producto['id']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>

                                                    <td><a href="#" data-href="<?php echo base_url() . '/productos/eliminar/' . $producto['id']; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" title="Eliminar Registro" class="btn btn-dark"><i class="fa-solid fa-trash-can"></i></a> </td>
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
</div>