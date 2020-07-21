<?php
session_start();
include "php/conexiones/conexioncuenta.php";
if (isset($_SESSION['Usuario'])) {
    $user = $_SESSION['Usuario'];
    $_SESSION["Usuario"] = $user;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <title>Acerca de TinPlantas</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark green sticky-top">
        <a class="navbar-brand" href="http://drive.google.com/uc?id=1ESJ6kDwOXWsM89XMbyaMdVxcJlD9OG2f">
            <img src="http://drive.google.com/uc?id=16yHHkXWlqx5tzo21075pNeJpV1Xl1MIt" alt="logo" style="width: 20px;">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menus" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="menus">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php"><button type="button" class="btn btn-light-green" name="inicio" id="inicio"><i class="fas fa-home"></i> Inicio</button></a>
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
                    <li class="nav-item">
                        <button type="button" class="btn btn-light-green" name="perfil" id="perfil"><i class="fas fa-id-card"></i> Perfil</button>
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

    <center>
        <p>
            <h1 class="text-success">¡Bienvenido de Tinplanta!</h1>
            <br>
            <div class="container-fluid">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label class="text-justify">
                                    El medio ambiente, medioambiente o entorno natural abarca todos los seres vivos y no vivos que interaccionan naturalmente, lo que significa que en este caso no es artificial. El término se aplica con mayor frecuencia a la Tierra o algunas partes de la Tierra.
                                </label>

                                <label class="text-justify">
                                    La Conferencia sobre el Medio Ambiente Humano en Estocolmo de 1972 fue la primera a tratar el tema ambiental de manera amplia y global. Estaba implícita en las posiciones adoptadas la noción de que había un trade-off entre desarrollarse económicamente y preservar el medio ambiente. En consecuencia, en los países en desarrollo se planteaba, por un lado, la necesidad de seguir desarrollándose para lograr contener y revertir los daños ambientales asociados a la pobreza, y por otro, la necesidad de asistencia internacional para evitar los senderos contaminantes tomados por los países desarrollados y para asegurar que los países en desarrollo no sufriesen con las medidas ambientales de los demás.
                                </label>

                                <label class="text-justify">
                                    Las plantas son seres vivos que producen su propio alimento mediante el proceso de la fotosintesis. Ellas captan la energia de la luz del sol a traves de la clorofila y corvienten el dioxido de carbono y el agua en azucares que utilizan como fuente de energia.
                                </label>

                                <label class="text-justify">
                                    El ministerio del Medio Ambiente de Chile, es el órgano del Estado encargado de colaborar con el presidente de la República en el diseño y aplicación de políticas, planes y programas en materia ambiental, así como en la protección y conservación de la diversidad biológica y de los recursos naturales renovables e hídricos, promoviendo el desarrollo sustentable, la integridad de la política ambiental y su regulación normativa.
                                </label>

                                <div class="text-center">
                                    <img src="http://drive.google.com/uc?id=1xao-HR8db4_pbIBoPN1tqDhqafJkuJaM" class="img-thumbnail rounded" width="800">
                                </div>

                                <div class="text-center">
                                    <label class="font-weight-bold">Nelson Mouat Vergara</label>
                                </div>

                                <div class="text-center">
                                    <label class="font-weight-bold">nelsonmouatvergara@gmail.com</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </p>
    </center>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>

</html>