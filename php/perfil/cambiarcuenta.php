<?php
session_start();
include "../conexiones/conexioncuenta.php";

require_once '../../mobiledetect-php/Mobile_Detect.php';
$detect = new Mobile_Detect;

$user = $_SESSION['Usuario'];
$_SESSION["Usuario"] = $user;

$micuenta = "SELECT * FROM cuentas WHERE Usuario = '$user'";
$resp = mysqli_query($conexion, $micuenta);
?>

<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../../css/fondopantalla-style.css">
    <style>
        body,
        html {
            height: 100%;
        }
    </style>
    <title>Cambiar de mi cuenta</title>
</head>

<body>
    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="mx-auto">
                <center>
                    <h1 class="displa-4">Cambiar de mi cuenta</h1>
                    <main>
                        <div class="container">
                            <form name="cambiarcuenta" id="cambiarcuenta" method="POST" onsubmit="return formula()" action="../cambiar/cambiarsing.php">
                                <div class="jumbotron" style="background-color:limegreen;">
                                    <div class="form-group">
                                        <?php
                                        if ($detect->isMobile()) {
                                            while ($buscar = mysqli_fetch_array($resp)) {
                                        ?>
                                                <table class="table table-sm table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Nombre:
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $buscar['Nombre']; ?>" maxlength="20">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Apellidos:
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $buscar['Apellidos']; ?>" maxlength="40">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Usuario:
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="user" id="user" value="<?php echo $buscar['Usuario']; ?>" maxlength="100">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Dirección:
                                                            </th>
                                                            <td>
                                                                <textarea class="form-control" name="dir" id="dir" cols="30" rows="1" maxlength="255"><?php echo $buscar['Direccion']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Comuna:
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="com" id="com" value="<?php echo $buscar['Comuna']; ?>" maxlength="100">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Estado Civil:
                                                            </th>
                                                            <td>
                                                                <select class="form-control" name="estcivil" id="estcivil">
                                                                    <?php
                                                                    $est = $buscar['Estado_Civil'];
                                                                    if ($est === "Soltero") {
                                                                    ?>
                                                                        <option value="Soltero">Soltero</option>
                                                                        <option value="Casado">Casado</option>
                                                                        <option value="Otro">Otro</option>
                                                                    <?php
                                                                    } elseif ($est === "Casado") {
                                                                    ?>
                                                                        <option value="Casado">Casado</option>
                                                                        <option value="Soltero">Soltero</option>
                                                                        <option value="Otro">Otro</option>
                                                                    <?php
                                                                    } elseif ($est === "Otro") {
                                                                    ?>
                                                                        <option value="Otro">Otro</option>
                                                                        <option value="Casado">Casado</option>
                                                                        <option value="Soltero">Soltero</option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Rut:
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="rut" id="rut" value="<?php echo $buscar['Rut']; ?>" maxlength="12">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Correo:
                                                            </th>
                                                            <td>
                                                                <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $buscar['Correo']; ?>" maxlength="255">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Dicapacidad:
                                                            </th>
                                                            <td>
                                                                <select class="form-control" name="discap" id="discap">
                                                                    <?php
                                                                    $dis = $buscar['Discapacidad'];
                                                                    if ($dis === "Si") {
                                                                    ?>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Otro">Otro</option>
                                                                    <?php
                                                                    } elseif ($dis === "No") {
                                                                    ?>
                                                                        <option value="No">No</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="Otro">Otro</option>
                                                                    <?php
                                                                    } elseif ($dis === "Otro") {
                                                                    ?>
                                                                        <option value="Otro">Otro</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Si">Si</option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php
                                            }
                                        } else {
                                            while ($buscar = mysqli_fetch_array($resp)) {
                                            ?>
                                                <table class="table table-sm table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Nombre:
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $buscar['Nombre']; ?>" maxlength="20">
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Apellidos:
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $buscar['Apellidos']; ?>" maxlength="40">
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Usuario:
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="user" id="user" value="<?php echo $buscar['Usuario']; ?>" maxlength="100">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Dirección:
                                                            </th>
                                                            <td>
                                                                <textarea class="form-control" name="dir" id="dir" cols="30" rows="1" maxlength="255"><?php echo $buscar['Direccion']; ?></textarea>
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Comuna:
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="com" id="com" value="<?php echo $buscar['Comuna']; ?>" maxlength="100">
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Estado Civil:
                                                            </th>
                                                            <td>
                                                                <select class="form-control" name="estcivil" id="estcivil">
                                                                    <?php
                                                                    $est = $buscar['Estado_Civil'];
                                                                    if ($est === "Soltero") {
                                                                    ?>
                                                                        <option value="Soltero">Soltero</option>
                                                                        <option value="Casado">Casado</option>
                                                                        <option value="Otro">Otro</option>
                                                                    <?php
                                                                    } elseif ($est === "Casado") {
                                                                    ?>
                                                                        <option value="Casado">Casado</option>
                                                                        <option value="Soltero">Soltero</option>
                                                                        <option value="Otro">Otro</option>
                                                                    <?php
                                                                    } elseif ($est === "Otro") {
                                                                    ?>
                                                                        <option value="Otro">Otro</option>
                                                                        <option value="Casado">Casado</option>
                                                                        <option value="Soltero">Soltero</option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Rut:
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="rut" id="rut" value="<?php echo $buscar['Rut']; ?>" maxlength="12">
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Correo:
                                                            </th>
                                                            <td>
                                                                <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $buscar['Correo']; ?>" maxlength="255">
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                Dicapacidad:
                                                            </th>
                                                            <td>
                                                                <select class="form-control" name="discap" id="discap">
                                                                    <?php
                                                                    $dis = $buscar['Discapacidad'];
                                                                    if ($dis === "Si") {
                                                                    ?>
                                                                        <option value="Si">Si</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Otro">Otro</option>
                                                                    <?php
                                                                    } elseif ($dis === "No") {
                                                                    ?>
                                                                        <option value="No">No</option>
                                                                        <option value="Si">Si</option>
                                                                        <option value="Otro">Otro</option>
                                                                    <?php
                                                                    } elseif ($dis === "Otro") {
                                                                    ?>
                                                                        <option value="Otro">Otro</option>
                                                                        <option value="No">No</option>
                                                                        <option value="Si">Si</option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="container">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="submit" class="btn btn-green" name="cambiar" id="cambiar" value="Cambiar">
                                                        <a href="perfil.php"><button type="button" class="btn btn-green">Cancelar</button></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </main>
                </center>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>

    <script type="text/javascript">
        function formula() {
            var nom = document.forms['cambiarcuenta']['nombre'].value;
            var apell = document.forms['cambiarcuenta']['apellidos'].value;
            var usuario = document.forms['cambiarcuenta']['user'].value;
            var dir = document.forms['cambiarcuenta']['dir'].value;
            var comun = document.forms['cambiarcuenta']['com'].value;
            var rut = document.forms['cambiarcuenta']['rut'].value;
            var mail = document.forms['cambiarcuenta']['correo'].value;

            if (nom == "" || nom == null) {
                alert("Introduzca su Nombre");
                return false;
            }

            if (apell == "" || apell == null) {
                alert("Introduzca su Apellidos");
                return false;
            }

            if (usuario == "" || usuario == null) {
                alert("Introduzca su Usuario");
                return false;
            }

            if (dir == "" || dir == null) {
                alert("Introduzca su Dirección");
                return false;
            }

            if (comun == "" || comun == null) {
                alert("Introduzca su Comuna");
                return false;
            }

            var cadenarut = rut.length;
            if (rut == "" || rut == null) {
                alert("Introduzca su RUT");
                return false;
            }

            if (cadenarut < 12) {
                alert("Se escribe por ejemplo: xx.xxx.xxx-x");
                return false;
            }

            if (mail == "" || mail == null) {
                alert("Introduzca su Correo");
                return false;
            }
        }
    </script>
</body>

</html>