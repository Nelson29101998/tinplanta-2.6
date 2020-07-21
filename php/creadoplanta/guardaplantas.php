<?php
session_start();
include "../conexiones/conexionplanta.php";

$user = $_SESSION['Usuario'];
$_SESSION["Usuario"] = $user;


$imagenes = $_POST['imagen'];
$nomplant = $_POST['nomplanta'];
$tipo = $_POST['checkplanta'];
$epoca = $_POST['ano'];
$detalle = $_POST['detalle'];
$checkdura = $_POST['checkdura'];
if ($checkdura == "mes") {
    $duracion = $_POST['durames'];
} else if ($checkdura == "dia") {
    $duracion = $_POST['duradia'];
}

$hoy = date("Y-m-d");


$repota = "No";
$sql = "INSERT INTO plantas
(Image, Nombre, Tipo_planta, Epocaano, Autor, Detalle, Duracion, Fecha, Reporta) VALUE
('".$imagenes."', '".$nomplant."', '".$tipo."',
'".$epoca."', '".$user."', '".$detalle."',
'".$duracion."', '".$hoy."', '".$repota."')";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../../css/fondopantalla-style.css">

    <title>Guarda planta</title>
</head>

<body>
    <?php
    if ($conexionplanta->query($sql) === TRUE) {
        echo "<center><h1>Subio la foto con exito!!<h1><a href='../../index.php'><button type='button' class='btn btn-green'>Volver</button></a></center>";
    } else {
        echo "<h1>Error: " . $sql . $conexionplanta->error . "</h1>";
        echo "<center><h1>No pudo subir<h1><a href='../../index.php'><button type='button'>Volver</button></a></center>";
    }
    $conexionplanta->close();
    ?>
</body>

</html>