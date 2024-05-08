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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/images/pila-de-cubos.png">
  <link href="<?php echo base_url(); ?>/css/index.css" rel="stylesheet" />
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
  </main>


  <script>
    const menuWithSubmenu = document.querySelector(".with-submenu");
    const submenu = document.querySelector(".submenu");
    const arrowIcon = document.querySelector(".arrow-icon");
    const profileName = document.querySelector(".profile-name");
    const collapseBtn = document.querySelector(".collapse-btn");

    menuWithSubmenu.addEventListener("click", (event) => {
      // Evita que el evento de clic se propague a elementos superiores
      event.stopPropagation();

      submenu.classList.toggle("show");
      arrowIcon.classList.toggle("fa-chevron-down");
      arrowIcon.classList.toggle("fa-chevron-up");
    });

    collapseBtn.addEventListener("click", (event) => {
      // Evita que el evento de clic se propague a elementos superiores
      event.stopPropagation();
    });

    function toggleMenu() {
      const sidebar = document.querySelector(".sidebar");
      sidebar.classList.toggle("collapsed");
      arrowIcon.classList.toggle("fa-chevron-right");
      arrowIcon.classList.toggle("fa-chevron-left");
      toggleCollapseBtnIcon();
      adjustCardPosition();
    }

    function toggleCollapseBtnIcon() {
      const isMenuCollapsed = document
        .querySelector(".sidebar")
        .classList.contains("collapsed");
      collapseBtn.innerHTML = isMenuCollapsed
        ? '<i class="fas fa-chevron-right"></i>'
        : '<i class="fas fa-chevron-left"></i>';
    }

    /* card collapsed */
    let originalCardMarginLeft;
    let originalCardMarginRight;

    function adjustCardPosition() {
      const sidebar = document.querySelector(".sidebar");
      const containerCard = document.querySelector(".card-container");
      const cards = document.querySelectorAll(".card-container .card");
      const ban = document.querySelector(".banner");

      if (sidebar.classList.contains("collapsed")) {
        // Si el menú está colapsado
        originalCardMarginLeft = containerCard.style.marginLeft; // Almacenar la posición original
        containerCard.style.marginLeft = "-380px"; // Ajusta el margen izquierdo para ocupar el espacio del menú colapsado
        cards.forEach((card) => {
          card.style.width = "310px"; // Ajusta el ancho de las tarjetas si es necesario
          card.style.marginLeft = "160px"; // Ajusta el ancho de la posicion de las tarjetas
        });
        ban.style.width = "100%";
        ban.style.marginLeft = "10px";
      } else {
        // Si el menú no está colapsado
        if (originalCardMarginLeft) {
          containerCard.style.marginLeft = originalCardMarginLeft; // Restablece la posición original
          containerCard.style.marginRight = originalCardMarginRight; // Restablece la posición original
        }
        containerCard.style.marginLeft = "0px";
        cards.forEach((card) => {
          card.style.width = ""; // Restablece el ancho de las tarjetas a su valor por defecto
          card.style.marginLeft = "0px";
        });
        ban.style.width = "70%";
        ban.style.marginLeft = "230px";
      }
    }
    /* */
    document.addEventListener("DOMContentLoaded", function () {
      toggleLightMode(); // Por defecto, carga el modo claro
      const darkModeButton = document.querySelector(".dark-mode");
      darkModeButton.addEventListener("click", toggleDarkMode); // Agrega el evento click para alternar al modo oscuro
    });
    /* */
    const cards = document.querySelectorAll(".card");
    const hoverSound = document.getElementById("hover-sound");

    cards.forEach((card) => {
      card.addEventListener("mouseenter", () => {
        hoverSound.currentTime = 0; // Reinicia el sonido si ya está reproduciéndose
        hoverSound.play();
      });
    });
    /*funcion original de modo claro */
    // function toggleLightMode() {
    //   document.body.style.backgroundColor = "#f0f0f0";
    //   document.querySelector(".light-mode").classList.add("seleccionado");
    //   document.querySelector(".dark-mode").classList.remove("seleccionado");
    //   document.querySelector(".sidebar").style.backgroundColor = "#fff";
    //   document
    //     .querySelectorAll(
    //       ".profile p, .menu-item, .submenu-item, .footer-line, .card-container"
    //     )
    //     .forEach((element) => {
    //       element.style.color = "#333";
    //     });
    //   document.querySelectorAll(".search, .submenu").forEach((element) => {
    //     element.style.backgroundColor = "#f3f3f3";
    //   });
    //   document.querySelector(".banner").style.backgroundColor = "white";
    //   document.querySelector(".banner-content").style.color = "#000";
    //   document
    //     .querySelectorAll(".card-container .card, .card p")
    //     .forEach((card) => {
    //       card.style.backgroundColor = "#fff";
    //       card.style.color = "#333";
    //     });
    //   document.querySelector(".help-box").style.backgroundColor = "#f0f0f0";
    //   document.querySelector(".help-box a").style.color = "#000";
    //   document.querySelector(".footer-line").style.backgroundColor = "#333";
    // }

    /*Funcion modificada del modo claro */
    function toggleLightMode() {
      document.body.style.backgroundColor = "#f0f0f0";
      document.querySelector(".light-mode").classList.add("seleccionado");
      document.querySelector(".dark-mode").classList.remove("seleccionado");

      const sidebar = document.querySelector(".sidebar");
      if (sidebar) {
        sidebar.style.backgroundColor = "#fff";
      }

      const banner = document.querySelector(".banner");
      if (banner) {
        banner.style.backgroundColor = "white";
        banner.style.color = "black";
      }

      const helpBox = document.querySelector(".help-box");
      if (helpBox) {
        helpBox.style.backgroundColor = "#f0f0f0";
        const helpBoxLink = helpBox.querySelector("a");
        if (helpBoxLink) {
          helpBoxLink.style.color = "#000";
        }
      }

      const footerLine = document.querySelector(".footer-line");
      if (footerLine) {
        footerLine.style.backgroundColor = "#333";
      }

      const elementsToColor = document.querySelectorAll(
        ".profile p, .menu-item, .submenu-item, .footer-line,  .search, .submenu"
      );
      elementsToColor.forEach((element) => {
        element.style.color = "#333";
        // element.style.backgroundColor = "#f3f3f3";
      });

      document.querySelector(".submenu").style.backgroundColor = "#f3f3f3";
      document.querySelector(".search").style.backgroundColor = "#fff";

      const cards = document.querySelectorAll(".card-cotainer .card");
      cards.forEach((card) => {
        card.style.backgroundColor = "#fff";
        card.style.color = "#333";
      });

      const table = document.querySelectorAll(".container-inputs, .block");
      table.forEach((s) => {
        s.style.backgroundColor = "white";
        s.style.color = "black";
      });
      const inputs = document.querySelectorAll(".container-inputs input");
      inputs.forEach((input) => {
        input.style.backgroundColor = "white"; // Cambia el color de fondo del input a gris
        input.style.color = "black"; // Cambia el color del texto del input a blanco
        input.setAttribute("placeholderStyle", "color: gray"); // Establece el color del placeholder
      });

      document.querySelector(".banner-content").style.color = "#000";
    }

    function toggleLogoutMenu() {
      const logoutMenu = document.getElementById("logoutMenu");
      logoutMenu.classList.toggle("hidden");
    }

    function logout() {
      window.location.href = "../index.php";
    }
    /*funcion original del modo oscuro */
    // function toggleDarkMode() {
    //   document.body.style.backgroundColor = "black";
    //   document.querySelector(".dark-mode").classList.add("seleccionado");
    //   document.querySelector(".light-mode").classList.remove("seleccionado");
    //   document.querySelector(".sidebar").style.backgroundColor = "#333";
    //   document
    //     .querySelectorAll(
    //       ".profile p, .menu-item, .submenu-item, .footer-line, .card-container"
    //     )
    //     .forEach((element) => {
    //       element.style.color = "#fff";
    //     });
    //   document.querySelectorAll(".search, .submenu").forEach((element) => {
    //     element.style.backgroundColor = "#444";
    //   });
    //   document.querySelector(".banner").style.backgroundColor = "#222";
    //   document.querySelector(".banner-content").style.color = "#fff";
    //   document
    //     .querySelectorAll(".card-container .card, .card p")
    //     .forEach((card) => {
    //       card.style.backgroundColor = "#333";
    //       card.style.color = "#fff";
    //     });
    //   document.querySelector(".help-box").style.backgroundColor = "#222";
    //   document.querySelector(".help-box a").style.color = "black";
    //   document.querySelector(".footer-line").style.backgroundColor = "#fff";
    // }

    /*funcion copia del modo oscuro modificada */
    function toggleDarkMode() {
      document.body.style.backgroundColor = "black";
      document.querySelector(".dark-mode").classList.add("seleccionado");
      document.querySelector(".light-mode").classList.remove("seleccionado");

      const sidebar = document.querySelector(".sidebar");
      if (sidebar) {
        sidebar.style.backgroundColor = "#333";
      }

      const banner = document.querySelector(".banner");
      if (banner) {
        banner.style.backgroundColor = "#222";
        banner.style.color = "white";
      }

      const helpBox = document.querySelector(".help-box");
      if (helpBox) {
        helpBox.style.backgroundColor = "#222";
        const helpBoxLink = helpBox.querySelector("a");
        if (helpBoxLink) {
          helpBoxLink.style.color = "black";
        }
      }

      const footerLine = document.querySelector(".footer-line");
      if (footerLine) {
        footerLine.style.backgroundColor = "#fff";
      }

      const elementsToColor = document.querySelectorAll(
        ".profile p, .menu-item, .submenu-item, .footer-line"
      );
      elementsToColor.forEach((element) => {
        element.style.color = "#fff";
        // element.style.backgroundColor = "#444";
      });
      document.querySelector(".submenu").style.backgroundColor = "#272727";
      document.querySelector(".search").style.backgroundColor = "#333";

      // const cards = document.querySelectorAll(".dark-mode .card-container, .card");
      // cards.forEach((card) => {
      //   card.style.backgroundColor = "#333";
      //   card.style.color = "#fff";
      // });

      const table = document.querySelectorAll(".container-inputs, .block");
      table.forEach((s) => {
        s.style.backgroundColor = "#333";
        s.style.color = "white";
      });
      const inputs = document.querySelectorAll(".container-inputs input");
      inputs.forEach((input) => {
        input.style.backgroundColor = "gray"; // Cambia el color de fondo del input a gris
        input.style.color = "white"; // Cambia el color del texto del input a blanco
        input.setAttribute("placeholderStyle", "color: white"); // Establece el color del placeholder
      });

      document.querySelector(".banner-content").style.color = "#fff";
    }
    function ajustarAnchoTitulo() {
      var menu = document.querySelector(".sidebar");
      var titulo = document.getElementById("titulo");

      // if (menu.classList.contains("collapsed")) {
      //   titulo.style.width = "calc(100% - 60px)"; // Ajusta el ancho del título cuando el menú está colapsado
      // } else {
      //   titulo.style.width = "calc(100% - 50px)"; // Ajusta el ancho del título cuando el menú está abierto
      // }
      const menuCollapsed = menu.classList.contains("collapsed");
      titulo.style.width = `calc(100% - ${menuCollapsed ? 60 : 50}px)`;
    }

    // Llama a la función para ajustar el ancho del título al cargar la página
    ajustarAnchoTitulo();

    // Llama a la función para ajustar el ancho del título cuando se hace clic en el botón de colapsar el menú
    document
      .querySelector(".collapse-btn")
      .addEventListener("click", ajustarAnchoTitulo);

    // Llama a la función para ajustar el ancho del título cuando cambia la clase del menú (cuando se colapsa o se expande)
    document
      .querySelector(".sidebar")
      .addEventListener("transitionend", ajustarAnchoTitulo);

    // Función para ajustar el margen izquierdo de la tabla cuando el menú se expanda o se colapse
    // Función para ajustar el margen de la tabla dependiendo del estado del menú (abierto o colapsado)
    function adjustTableMargin() {
      const sidebar = document.querySelector(".sidebar");
      const table = document.getElementById("datatablesSimple");
      const collapsed = sidebar.classList.contains("collapsed");

      if (collapsed) {
        // Si el menú está colapsado, ajusta el margen izquierdo de la tabla para centrarla
        table.style.marginLeft = "880px";
      } else {
        // Si el menú está abierto, ajusta el margen izquierdo de la tabla para dejar espacio al menú
        table.style.marginLeft = "320px"; // Ajusta este valor según sea necesario para adaptarse al ancho del menú
      }
    }

    // Llama a la función para ajustar el margen de la tabla cuando la página se carga y cuando el menú se expande o colapsa
    window.onload = adjustTableMargin;




  </script>
</body>

</html>