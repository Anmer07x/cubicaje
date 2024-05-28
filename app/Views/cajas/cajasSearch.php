<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Códigos QR</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/merca.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
</head>

<body>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <?php if (session('message')): ?>
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
                                            <input type="text" name="search" autocomplete="off" class="form-control"
                                                placeholder="Buscar...">
                                            <button type="submit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="column">
                                <div class="table-container">
                                    <div class="table-responsive">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
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
                                                    <th>QR</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($cajas as $caja) { ?>
                                                    <tr>
                                                        <td><?php echo $caja['codigo_cajas']; ?></td>
                                                        <td><?php echo $caja['tipo']; ?></td>
                                                        <td><?php echo $caja['cantidad']; ?></td>
                                                        <td><?php echo $caja['capacidad']; ?></td>
                                                        <td><?php echo $caja['alto']; ?></td>
                                                        <td><?php echo $caja['largo']; ?></td>
                                                        <td><?php echo $caja['ancho']; ?></td>
                                                        <td><?php echo $caja['piezas_caja']; ?></td>
                                                        <td><?php echo $caja['peso_piezas_kg']; ?></td>
                                                        <td><img src="<?php echo base_url() . '/images/cajas/' . $caja['id'] . '.jpg'; ?>"
                                                                width="100" /></td>
                                                        <td><canvas class="qr-canvas"
                                                                id="qr-<?php echo $caja['id']; ?>"></canvas></td>
                                                        <td>
                                                            <a href="<?php echo base_url() . '/cajas/editar/' . $caja['id']; ?>"
                                                                class="btn btn-warning">
                                                                <i class="fa-solid fa-pen-to-square"></i> Editar
                                                            </a>
                                                        </td>
                                                        <td><a href="#"
                                                                data-href="<?php echo base_url() . '/cajas/eliminar/' . $caja['id']; ?>"
                                                                class="btn btn-dark eliminarProducto" data-bs-toggle="modal"
                                                                data-bs-target="#modal-confirma" data-bs-placement="top"
                                                                title="Eliminar Registro"><i
                                                                    class="fas fa-trash-can">Eliminar</i></a></td>
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
                        <button type="button" class="no" data-bs-dismiss="modal">No</button>
                        <a class="si">Si</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="help-box">
            <a href="https://www.uniclaretiana.edu.co/#atencion">
                <i class="fas fa-question-circle"></i> Ayuda
            </a>
        </div>

        <!-- Scripts necesarios -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Inicializa el modal una sola vez
                var modalConfirma = new bootstrap.Modal(document.getElementById('modal-confirma'));

                // Función para manejar la eliminación del producto
                function eliminarProducto(url) {
                    // Redirige a la URL de eliminación
                    window.location.href = url;
                }

                // Cuando se hace clic en un enlace para eliminar un producto
                document.querySelectorAll('.eliminarProducto').forEach(item => {
                    item.addEventListener('click', function (event) {
                        event.preventDefault(); // Evita la acción por defecto del enlace
                        var url = this.getAttribute('data-href'); // Obtiene la URL de eliminación

                        // Establece la URL de eliminación en el botón 'Sí'
                        var btnOk = document.querySelector('.si');
                        btnOk.setAttribute('href', url);

                        // Abre el modal de confirmación
                        modalConfirma.show();
                    });
                });

                // Generación de códigos QR
                document.querySelectorAll('.qr-canvas').forEach(function (elemento) {
                    var id = elemento.id.split('-')[1];
                    var caja = <?php echo json_encode($cajas); ?>.find(d => d.id == id);
                    var qrData = `Código: ${caja.codigo_cajas} \nTipo: ${caja.tipo} \nCantidad: ${caja.cantidad} \nAlto: ${caja.alto} \nLargo: ${caja.largo} \nAncho: ${caja.ancho}`;

                    new QRious({
                        element: elemento,
                        value: qrData,
                        size: 100,
                        backgroundAlpha: 0,
                        foreground: "#000000",
                        level: "L"
                    });
                });
            });
        </script>
    </div>

</body>

</html>