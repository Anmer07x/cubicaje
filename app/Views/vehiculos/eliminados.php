<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo;?></h4>

            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/vehiculos" class="btn
                                  btn-warning">Regresar</a>
                </p>
                <div>

                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Vehiculos</th>
                                    <th>Maximo</th>
                                    <th>Tipo</th>
                                    <th>Empresa</th>
                                    <th>Clasificacion</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($datos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['vehiculos']; ?></td>
                                    <td><?php echo $dato['maximo']; ?></td>
                                    <td><?php echo $dato['tipo_vehiculos']; ?></td>
                                    <td><?php echo $dato['empresa']; ?></td>
                                    <td><?php echo $dato['clasificacion']; ?></td>

                                    <td><a href="<?php echo base_url(). '/vehiculos/reingresar/'. $dato
                                                ['id']; ?>"><i class="fas fa-arrow-alt-circle-up"></i></a></td>
                                </tr>

                                <?php }?>
                            </tbody>
                        </table>
                    </div>

                </div>
    </main>