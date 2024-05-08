<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4">Clientes</h4>

            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/clientes/nuevo" class="btn
                                  btn-warning">Agregar</a>
                </p>
                <div>

                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>telefono</th>
                                    <th>correo</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($datos as $dato) {?>

                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><?php echo $dato['direccion']; ?></td>
                                    <td><?php echo $dato['telefono']; ?></td>
                                    <td><?php echo $dato['correo']; ?></td>

                                    <td><a href="<?php echo base_url(). '/clientes/editar/'. $dato['id']; ?>"
                                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>

                                    <td><a href="#" data-href="<?php echo base_url() . '/clientes/eliminar/' . $dato['id']; ?>"
                                     data-bs-toggle="modal" data-bs-target="#modal-confirma" data-bs-placement="top" 
                                     title="Eliminar Registro" class="btn btn-dark"><i class="fa-solid fa-trash-can"></i></a> </td>
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