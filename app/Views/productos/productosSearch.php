<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Códigos de Barras</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/merca.css">
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div>
                    <div>
                        <div class="container-inputs">
                            <div class="block">
                                <h2>MERCANCIA</h2>
                                <div class="search">
                                    <form method="get" action="<?= base_url('productos/buscarInput') ?>">
                                        <div class="row-search">
                                            <input type="text" name="search" autocomplete="off" class="form-control"
                                                placeholder="Buscar...">
                                            <button type="submit"><i class="fas fa-search"></i></button>
                                            <a href="<?php echo base_url(); ?>/productos/nuevo"
                                                class="btn btn-warning">+</a>
                                        </div>
                                    </form>
                                </div>

                                <div class="column">
                                    <div class="table-container">
                                        <div class="table-responsive">
                                            <table id="datatablesSimple">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nombre</th>
                                                        <th>Tipo</th>
                                                        <th>Cantidad</th>
                                                        <th>Vol.m3</th>
                                                        <th>Peso/total</th>
                                                        <th>Imagen</th>
                                                        <th>Código de Barras</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Aquí se generarán las filas de la tabla dinámicamente -->
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
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var productos = <?php echo json_encode($productos); ?>; // Asigna tus productos PHP aquí
                    var tableBody = document.querySelector('#datatablesSimple tbody');

                    productos.forEach(function (producto) {
                        var row = document.createElement('tr');
                        row.innerHTML = `
                        <td>${producto.codigo}</td>
                        <td>${producto.nombre}</td>
                        <td>${producto.tipo}</td>
                        <td>${producto.cantidad}</td>
                        <td>${producto.vol_m}</td>
                        <td>${producto.peso_total}</td>
                        <td><img src="<?php echo base_url(); ?>/images/productos/${producto.id}.jpg" width="80" /></td>
                        <td><svg id="barcode-${producto.id}"></svg></td>
                        <td><a href="<?php echo base_url(); ?>/productos/editar/${producto.id}" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i> Editar</a></td>
                        <td><a href="#" data-href="<?php echo base_url(); ?>/productos/eliminar/${producto.id}" class="btn btn-dark eliminarProducto"
                            data-bs-toggle="modal" data-bs-target="#modal-confirma"><i class="fa-solid fa-trash-can"></i> Eliminar</a></td>
                    `;
                        tableBody.appendChild(row);

                        JsBarcode(`#barcode-${producto.id}`, producto.codigo, {
                            format: "CODE128",
                            lineColor: "#000000",
                            width: 1.2,
                            height: 25,
                            displayValue: true,
                            text: `${producto.codigo}`,
                            fontSize: 12
                        });
                    });

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

                            // Guardar la URL de eliminación en el botón "Sí"
                            var confirmButton = document.querySelector('#confirmarEliminacion');
                            confirmButton.setAttribute('data-url', url);

                            // Mostrar el modal de confirmación
                            var modal = new bootstrap.Modal(document.getElementById('modal-confirma'));
                            modal.show();
                        });
                    });

                    // Manejar el clic en el botón "Sí" del modal de confirmación
                    document.querySelector('#confirmarEliminacion').addEventListener('click', function () {
                        var url = this.getAttribute('data-url');
                        eliminarProducto(url);
                    });
                });
            </script>
        </main>
        <!-- Modal -->
        <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Desea eliminar este registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" id="confirmarEliminacion">Sí</button>
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

</body>

</html>