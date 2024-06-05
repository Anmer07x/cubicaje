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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/loaders/OBJLoader.min.js"></script>
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
                        <a href="<?php echo base_url(); ?>/vehiculos/nuevo" class="btn btn-warning">+</a>
                    </div>
                </form>
            </div>
            <div class="column">
                <div class="table-container">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Vehículos</th>
                                    <th>Cantidad Máxima</th>
                                    <th>Tipo</th>
                                    <th>Empresa</th>
                                    <th>Clasificación</th>
                                    <th>Imagen</th>
                                    <th>Ver 3D</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos as $dato) { ?>
                                    <tr>
                                        <td><?php echo $dato['vehiculos']; ?></td>
                                        <td><?php echo $dato['maximo']; ?></td>
                                        <td><?php echo $dato['tipo_vehiculos']; ?></td>
                                        <td><?php echo $dato['empresa']; ?></td>
                                        <td><?php echo $dato['clasificacion']; ?></td>
                                        <td><img src="<?php echo base_url() . '/images/vehiculos/' . $dato['id'] . '.jpg'; ?>"
                                                width="100" /></td>
                                        <td><a href="#" data-toggle="modal" data-target="#modelModal"
                                                data-id="<?php echo $dato['id']; ?>" class="btn btn-dark view-3d">3D</a>
                                        </td>
                                        <td><a href="<?php echo base_url() . '/vehiculos/editar/' . $dato['id']; ?>"
                                                class="btn btn-warning"><i class="fa fa-pencil-square-o">Editar</i></a></td>
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
                    <button type="button" class="no" data-bs-dismiss="modal">No</button>
                    <a class="si">Si</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal 3D" id="modelModal" tabindex="-1" aria-labelledby="modelModalLabel" aria-hidden="true"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelModalLabel">Modelo 3D</h5>
                </div>
                <div class="modal-body">
                    <div id="threejs-container" style="width: 100%; height: 500px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Manejador para ver modelo 3D
            document.querySelectorAll('.view-3d').forEach(item => {
                item.addEventListener('click', function (event) {
                    var vehicleId = this.getAttribute('data-id');
                    var modal = new bootstrap.Modal(document.getElementById('modelModal'), {
                        backdrop: 'static',
                        keyboard: false
                    });
                    modal.show();

                    // Configurar Three.js cuando se muestre el modal
                    $('#modelModal').on('shown.bs.modal', function () {
                        // Escena, cámara y renderizador
                        const scene = new THREE.Scene();
                        const camera = new THREE.PerspectiveCamera(75, $('#threejs-container').width() / $('#threejs-container').height(), 0.1, 1000);
                        const renderer = new THREE.WebGLRenderer();
                        renderer.setSize($('#threejs-container').width(), $('#threejs-container').height());
                        renderer.setClearColor(0xCDCDCD, 1); // Establece el fondo blanco
                        document.getElementById('threejs-container').appendChild(renderer.domElement);

                        // Añadir luz
                        const hemiLight = new THREE.HemisphereLight(0xffffff, 0x444444, 1);
                        hemiLight.position.set(0, 200, 0);
                        scene.add(hemiLight);

                        const dirLight = new THREE.DirectionalLight(0xffffff, 1);
                        dirLight.position.set(0, 200, 100);
                        dirLight.castShadow = true;
                        scene.add(dirLight);

                        const ambientLight = new THREE.AmbientLight(0x404040, 0.5); // Luz ambiental para iluminación suave
                        scene.add(ambientLight);

                        // Cargar el archivo glTF
                        const loader = new THREE.GLTFLoader();
                        loader.load(
                            '<?php echo base_url(); ?>/3D/' + vehicleId + '.glb',
                            function (gltf) {
                                // Objeto cargado exitosamente, puedes agregarlo a la escena
                                const object = gltf.scene;
                                scene.add(object);
                            },
                            function (xhr) {
                                console.log((xhr.loaded / xhr.total * 100) + '% cargado');
                            },
                            function (error) {
                                console.error('Error al cargar el archivo glTF:', error);
                            }
                        );

                        // Posición de la cámara
                        camera.position.z = 2;
                        camera.position.y = 3;
                        camera.position.x = 7;

                        // Controles de órbita
                        const controls = new THREE.OrbitControls(camera, renderer.domElement);

                        // Función de animación
                        function animate() {
                            requestAnimationFrame(animate);
                            controls.update();
                            renderer.render(scene, camera);
                        }
                        animate();
                    });
                });
            });

            // Recargar la página al hacer clic en el botón cerrar
            document.querySelector('.btn-secondary').addEventListener('click', function () {
                location.reload();
            });
        });
    </script>

    <div class="help-box">
        <a href="https://www.uniclaretiana.edu.co/#atencion">
            <i class="fas fa-question-circle"></i> Ayuda
        </a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>