<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubicaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/merca.css">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/images/pila-de-cubos.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container-inputs">
        <div class="block">
            <h2>Vehiculos</h2>
            <div class="search">
                <form method="get" action="<?= base_url('vehiculos/buscarInput') ?>">
                    <div class="row-search">
                        <input type="text" name="search" class="form-control" autocomplete="off"
                            placeholder="Buscar...">
                        <button type="submit"><i class="fas fa-search"></i></button>
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
                                    <th>Vehículos</th>
                                    <th>Cantidad Máxima</th>
                                    <th>Tipo</th>
                                    <th>Empresa</th>
                                    <th>Clasificación</th>
                                    <th>Imagen</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($datos as $dato) { ?>

                                    <tr>
                                        <td><?php echo $dato['id']; ?></td>
                                        <td><?php echo $dato['vehiculos']; ?></td>
                                        <td><?php echo $dato['maximo']; ?></td>
                                        <td><?php echo $dato['tipo_vehiculos']; ?></td>
                                        <td><?php echo $dato['empresa']; ?></td>
                                        <td><?php echo $dato['clasificacion']; ?></td>

                                        <td><img src="<?php echo base_url() . '/images/vehiculos/' . $dato['id'] . '.jpg'; ?>"
                                                width="100" /></td>

                                        <td><a href="<?php echo base_url() . '/vehiculos/editar/' . $dato['id']; ?>"
                                                class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a></td>

                                        <td><a href="#"
                                                data-href="<?php echo base_url() . '/vehiculos/eliminar/' . $dato['id']; ?>"
                                                data-bs-toggle="modal" data-bs-target="#modal-confirma"
                                                data-bs-placement="top" title="Eliminar Registro" class="btn btn-dark"><i
                                                    class="fas fa-trash-can"></i></a> </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


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





    <script src="js/principal.js"></script>

    <div class="help-box">
        <a href="https://www.uniclaretiana.edu.co/#atencion">
            <i class="fas fa-question-circle"></i> Ayuda
        </a>
    </div>
</body>

</html>