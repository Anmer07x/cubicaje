<?php
$user_session = session();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/images/pila-de-cubos.png">
  <link href="<?php echo base_url(); ?>/css/index.css" rel="stylesheet" />
  <script src=""></script>
</head>

<body>
  <div class="body-background"></div>
  <div id="layoutSidenav_content">
    <main>
      <div class="banner">
        <div class="banner-content">
          <h1>¡Bienvenido(a), <?php echo $user_session->nombre; ?> </h1>
          <p>Aquí en nuestra plataforma, te damos la bienvenida a un <br>
            espacio lleno de oportunidades para que des rienda suelta <br>
            a tu creatividad y talento. </p>
        </div>
        <img src="<?php echo base_url(); ?>/images/banner.png" alt="Banner Image">
      </div>
      <div class="card-container">
        <div class="card">
          <?php echo $total; ?> Total de Mercancias
          <i class="fa fa-shopping-basket fa-2x ml-auto"></i>
          <a class="card-footer text-white" href="<?php echo base_url() ?>/productos">Ver
            detalles
          </a>
        </div>
        <div class="card">
          <?php echo $totalcajas; ?> Total de Cajas
          <i class="fas fa-box-open fa-2x ml-auto"></i>
          <a class="card-footer text-white" href="<?php echo base_url() ?>/cajas">Ver detalles</a>
        </div>
        <div class="card">
          <?php echo $totalvehiculos; ?> Total de Vehículos
          <i class="fas fa-truck-moving fa-2x ml-auto"></i>
          <a class="card-footer text-white" href="<?php echo base_url() ?>/vehiculos">Ver detalles</a>
        </div>
      </div>
      <audio id="hover-sound">
        <source src="../sound/pick-92276.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
      </audio>

      <div class="help-box">
        <a href="https://www.uniclaretiana.edu.co/#atencion">
          <i class="fas fa-question-circle"></i> Ayuda
        </a>
      </div>
  </div>



</body>

</html>