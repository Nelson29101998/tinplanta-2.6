<?php
session_start();
include "../conexiones/conexioncuenta.php";
$user = $_SESSION['Usuario'];
$_SESSION["Usuario"] = $user;

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$usuario = $_POST['user'];
$direccion = $_POST['dir'];
$comuna = $_POST['com'];
$estadocivil = $_POST['estcivil'];
$rut = $_POST['rut'];
$correo = $_POST['correo'];
$discapacidad = $_POST['discap'];

$cambiarcuenta = "UPDATE cuentas set 
Nombre = '$nombre', Apellidos = '$apellidos', Usuario = '$usuario',
Direccion = '$direccion', Comuna = '$comuna', Estado_Civil = '$estadocivil',
Rut = '$rut', Correo = '$correo', Discapacidad = '$discapacidad'
WHERE Usuario = '$user'";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <title>Exito Cambiar de tu cuenta</title>
</head>

<body>
    <center>
        <?php
        if ($conexion->query($cambiarcuenta) === TRUE) {
        ?>
        <h1>Has cambiar tu cuenta con exito</h1>
        <a href="../perfil/perfil.php"><button type="button" class="btn btn-green">Volver</button></a>
        <?php
        } else {
        ?>
        <h1>No pudo cambiar paraece que algo cayo mal</h1>
        <a href="../perfil/perfil.php"><button type="button" class="btn btn-green">Volver</button></a>
        <?php
        }
        ?>
    </center>
</body>

</html>