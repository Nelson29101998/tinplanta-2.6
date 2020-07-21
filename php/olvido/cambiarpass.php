<?php 
session_start();
include "../conexiones/conexioncuenta.php";
$m = $_SESSION['Correo'];
$_SESSION['Correo'] = $m;

$p1 = $_POST['pass1'];
$p2 = $_POST['pass2'];

$p1hash = password_hash($p1, PASSWORD_DEFAULT);
$p2hash = password_hash($p2, PASSWORD_DEFAULT);

$cambiarcontrasena = "UPDATE cuentas set Contrasena1 ='$p1hash', Contrasena2 ='$p2hash' WHERE Correo ='$m'";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <title>Exito</title>
</head>

<body>
    <center>
        <?php
        if ($conexion->query($cambiarcontrasena) === TRUE) {
        ?>
        <h1>Has cambiar tu contraseña con exito</h1>
        <a href="../cerrar.php"><button type="button" class="btn btn-primary">Volver</button></a>
        <?php
        } else {
        ?>
        <h1>No pudo cambiar contraseña paraece que algo cayo mal</h1>
        <a href="../cerrar.php"><button type="button" class="btn btn-primary">Volver</button></a>
        <?php
        }
        ?>
    </center>
</body>

</html>