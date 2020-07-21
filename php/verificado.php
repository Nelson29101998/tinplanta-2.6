<?php
session_start();
include("conexiones/conexioncuenta.php");
if (isset($_GET['user'])) {
    $usuario = $_GET['user'];
    $_SESSION["Usuario"] = $usuario;
    $verif = "UPDATE cuentas SET Verificado = 'Si' WHERE Usuario = '$usuario'";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mdbootstrap/css/mdb.min.css">
    <title>Verificado</title>
</head>

<body>
    <center>
        <?php
        if ($conexion->query($verif) === TRUE) {
        ?>
            <h1>Has cambiar tu verificado con exito</h1>
            <a href="cerrar.php"><button type="button" class="btn btn-primary">Volver</button></a>
        <?php
        } else {
        ?>
            <h1>No pudo cambiar verificado paraece que algo cayo mal</h1>
            <a href="cerrar.php"><button type="button" class="btn btn-primary">Volver</button></a>
        <?php
        }
        ?>
    </center>
</body>

</html>