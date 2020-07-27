<?php
session_start();
include "../conexiones/conexioncuenta.php";
include "../conexiones/conexionplanta.php";

require_once '../../mobiledetect-php/Mobile_Detect.php';
$detect = new Mobile_Detect;

$user = $_SESSION['Usuario'];
$_SESSION["Usuario"] = $user;

$micuenta = "SELECT * FROM cuentas WHERE Usuario = '$user'";
$resp = mysqli_query($conexion, $micuenta);

$miplanta = "SELECT * FROM plantas WHERE Autor = '$user'";
$resplant = mysqli_query($conexionplanta, $miplanta);
?>

<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../css/fondopantalla-style.css">
    <style>
        body,
        html {
            height: 100%;
        }
    </style>
    <title>Mi Cuenta</title>
</head>

<body>
    <center>
        <h1 class="displa-4">Mi Cuenta</h1>
        <main>
            <div class="container">
                <?php
                if ($detect->isMobile()) {
                    while ($buscar = mysqli_fetch_array($resp)) {
                ?>
                        <table class="table table-sm table-bordered" style="background-color: #fff;">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        Nombre:
                                        <?php echo $buscar['Nombre']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        Apellidos:
                                        <?php echo $buscar['Apellidos']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-user"></i> Usuario:
                                        <?php echo $buscar['Usuario']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-home"></i> Dirección:
                                        <?php echo $buscar['Direccion']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        Comuna:
                                        <?php echo $buscar['Comuna']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-atlas"></i> Estado Civil:
                                        <?php echo $buscar['Estado_Civil']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-registered"></i> Rut:
                                        <?php echo $buscar['Rut']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-at"></i> Correo:
                                        <?php echo $buscar['Correo']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-universal-access"></i> Accesibilidad:
                                        <?php echo $buscar['Discapacidad']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php
                    }
                } else {
                    while ($buscar = mysqli_fetch_array($resp)) {
                    ?>
                        <table class="table table-sm table-bordered" style="background-color: #fff;">
                            <tbody>
                                <tr>
                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        Nombre:
                                    </th>
                                    <td>
                                        <?php echo $buscar['Nombre']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        Apellidos:
                                    </th>
                                    <td>
                                        <?php echo $buscar['Apellidos']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-user"></i> Usuario:
                                    </th>
                                    <td>
                                        <?php echo $buscar['Usuario']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-home"></i> Dirección:
                                    </th>
                                    <td>
                                        <?php echo $buscar['Direccion']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        Comuna:
                                    </th>
                                    <td>
                                        <?php echo $buscar['Comuna']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-atlas"></i> Estado Civil:
                                    </th>
                                    <td>
                                        <?php echo $buscar['Estado_Civil']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-registered"></i> Rut:
                                    </th>
                                    <td>
                                        <?php echo $buscar['Rut']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-at"></i> Correo:
                                    </th>
                                    <td>
                                        <?php echo $buscar['Correo']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-universal-access"></i> Accesibilidad:
                                    </th>
                                    <td>
                                        <?php echo $buscar['Discapacidad']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                <?php
                    }
                }
                ?>
                <h4>Tus plantas:</h4>
                <?php
                while ($planta = mysqli_fetch_array($resplant)) {
                    $ident = $planta['Id'];
                ?>
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
                                        <td rowspan="4" class="text-center">
                                        <?php
                                    }
                                    echo "<img src='" . $planta['Image'] . "' width='200'>";
                                        ?>
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
                                    <td colspan="2">
                                        <label class="text-justify">Detalle: <?php echo $planta['Detalle']; ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Tiempo de cosecha: <?php echo $planta['Duracion']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Fecha: <?php echo $planta['Fecha']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <?php echo "<a href='../editarplanta/cambiarplanta.php?num=$ident'><button type='button' class='btn btn-green'><i class='fas fa-edit'></i> Editar</button></a>"; ?>
                                        <?php echo "<a href='../eliminar/seguro.php?num=$ident'><button type='button' class='btn btn-red'><i class='fas fa-trash-alt'></i> Eliminar</button></a>"; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                ?>
                <div class="container">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="cambiarcuenta.php"><button type="button" class="btn btn-green"><i class="fas fa-edit"></i> Cambiar tu cuenta</button></a>
                                    <a href="../../index.php"><button type="button" class="btn btn-green">Volver</button></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </center>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>
</body>

</html>
