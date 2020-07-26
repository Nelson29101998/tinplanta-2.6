<?php
session_start();
include "php/conexiones/conexioncuenta.php";
include "php/conexiones/conexionplanta.php";

require_once 'mobiledetect-php/Mobile_Detect.php';
$detect = new Mobile_Detect;

if (isset($_SESSION['Usuario'])) {
  $user = $_SESSION['Usuario'];
  $_SESSION["Usuario"] = $user;
}

$sql = "SELECT * FROM plantas";
$res = mysqli_query($conexionplanta, $sql);
?>

<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/mdbootstrap/css/mdb.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="css/swiper/swiper.min.css">
  <script src="mobiledetect-js/mobile-detect.js"></script>

  <style>
    html,
    body {
      position: relative;
      height: 100%;
    }

    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    .swiper-container {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
  </style>

  <title>¡Bienvenido a TinPlantas!</title>
</head>

<body style="background-color: chartreuse;">
  <div class="container-fluid text-center bg-warning py-3">
    <img src="http://drive.google.com/uc?id=16yHHkXWlqx5tzo21075pNeJpV1Xl1MIt" class="animated fadeInDown delay-1s" alt="nomemp" id="nomemp" width="300">
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark green sticky-top">
    <a class="navbar-brand" href="image/logo/logotin.png">
      <img src="http://drive.google.com/uc?id=1ESJ6kDwOXWsM89XMbyaMdVxcJlD9OG2f" alt="logo" style="width: 20px;">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menus" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="menus">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="acercade.php"><button type="button" class="btn btn-light-green" name="acercade" id="acercade"><i class="fas fa-book"></i> Acerca de:</button></a>
        </li>
        <li class="nav-item">
          <button type="button" class="btn btn-light-green" name="fotos" id="fotos"><i class="fas fa-seedling"></i> Todas las fotos de las
            plantas</button>
        </li>
        <li>
          <a href="php/ayudar/ayuda.php"><button type="button" class="btn btn-light-green" name="ayuda" id="ayuda"><i class="fas fa-hands-helping"></i> Ayuda</button></a>
        </li>
        <?php
        if (isset($_SESSION['Usuario'])) {
        ?>
          <li>
            <a href="php/creadoplanta/crearplanta.php"><button type="button" class="btn btn-light-green" name="nuevaplanta" id="nuevaplanta"><i class="fas fa-leaf"></i> Crea una nueva planta</button></a>
          </li>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['Usuario'])) {
        ?>
          <li class="nav-item">
            <a href="php/perfil/perfil.php"><button type="button" class="btn btn-light-green" name="perfil" id="perfil"><i class="fas fa-id-card"></i> Perfil</button></a>
          </li>
        <?php
        }
        ?>

        <?php
        if (empty($_SESSION['Usuario'])) {
        ?>
          <li class="nav-item dropdown">
            <button type="button" class=" nav-link btn btn-light-green dropdown-toggle" id="cuentas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-portrait"></i> Cuentas<span class="caret"></span>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="html/iniciasesion.html"><i class="fas fa-sign-in-alt"></i> Inicia sesión</a>
              <a class="dropdown-item" href="html/nuevasesion.html"><i class="fas fa-user-circle"></i> Crea una nueva cuenta</a>
              <a class="dropdown-item" href="html/olvido.html"><i class="fas fa-key"></i> Olvidó su contraseña</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href=""><i class="fas fa-user-cog"></i> Administrador</a>
            </div>
          </li>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['Usuario'])) {
        ?>
          <li class="nav-item">
            <a href="php/cerrar.php"><button type="button" class="btn btn-light-green" name="cerrar" id="cerrar"><i class="fas fa-sign-out-alt"></i> Cerrar sesion</button></a>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </nav>

  <main>
    <p>
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php
          while ($planta = mysqli_fetch_array($res)) {
          ?>
            <div class="swiper-slide">
              <div class="container">
                <table class="table table-bordered" style="background-color: #fff;">
                  <tbody>
                    <tr>
                      <?php
                      if ($detect->isMobile()) {
                      ?>
                        <td class="text-center">
                        <?php
                      } else {
                        ?>
                        <td rowspan="7" class="text-center">
                        <?php
                      }
                      echo "<img src='" . $planta['Image'] . "' width='200'>"; ?>
                        </td>
                        <?php
                        if ($detect->isMobile()) {
                        ?>
                    </tr>
                    <tr>
                    <?php
                        }
                    ?>
                    <td>
                      Nombre de Planta: <?php echo $planta['Nombre']; ?>
                    </td>
                    </tr>
                    <tr>
                      <td>
                        Tipo de Planta: <?php echo $planta['Tipo_planta']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Época de siembra: <?php echo $planta['Epocaano']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Autor: <?php echo $planta['Autor']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label class="text-justify">Detalle: <?php echo $planta['Detalle']; ?></label>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Tiempo de cosecha: <?php echo $planta['Duracion']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Fecha de creación: <?php echo $planta['Fecha']; ?>
                      </td>
                    </tr>
                    <?php
                    if (isset($_SESSION['Usuario'])) {
                    ?>
                      <tr>
                        <td colspan="2">
                          <a><button type="button" class="btn btn-yellow"><i class="far fa-star"></i> Favorito</button></a>
                          <div class="dropdown">
                            <button type="button" class=" nav-link btn btn-light-green dropdown-toggle" id="reportes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Selecciona un problema para continuar<span class="caret"></span>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="">Desnudo</a>
                              <a class="dropdown-item" href="">Violencia</a>
                              <a class="dropdown-item" href="">Acoso</a>
                              <a class="dropdown-item" href="">Suicidio o autolesiones</a>
                              <a class="dropdown-item" href="">Spam</a>
                              <a class="dropdown-item" href="">Incitación al odio</a>
                              <a class="dropdown-item" href="">Terorismo</a>
                              <a class="dropdown-item" href="">Otro motivo</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </p>
  </main>

  <footer class="page-footer font-small greenland darken-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 py-4">
          <div class="mb-4 flex-center">
            <a href="https://www.youtube.com/channel/UCRbKYp_6ipLtMVYFrmeS5Sg?view_as=subscriber">
              <i class="fab fa-youtube fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
            </a>

            <a href="https://www.facebook.com/nelson.mouatvergara" class="fb-ic">
              <i class="fab fa-facebook fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
            </a>

            <a href="https://twitter.com/NelsonMouat" class="tw-ic">
              <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
            </a>

            <a href="https://www.linkedin.com/in/nelson-mouat-vergara-1a7a9a165" class="li-ic">
              <i class="fab fa-linkedin fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
            </a>

            <a href="https://www.instagram.com/tinmalulin_7w7" class="ins-ic">
              <i class="fab fa-instagram fa-lg white-text fa-2x"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-copyright text-center py-3">© 2020 TinPlanta:
      <a href=""> tinplanta.cl</a>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>

  <script src="js/swiper/swiper.min.js"></script>
  <script>
    var md = new MobileDetect(window.navigator.userAgent);

    if (md.mobile()) {
      var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    } else {
      var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    }
  </script>
</body>

</html>
