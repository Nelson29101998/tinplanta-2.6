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

if (isset($_GET['numid'])) {
    $id = $_GET['numid'];
    $actualizar = "UPDATE plantas SET
Image = '$imagenes',     
Nombre = '$nomplant',
Tipo_planta = '$tipo',
Epocaano = '$epoca',
Detalle = '$detalle',
Duracion = '$duracion'
WHERE Id = '$id'
";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <title>Actualizar planta</title>
</head>

<body>
<center>
        <?php
        if ($conexionplanta->query($actualizar) === TRUE) {
        ?>
        <h1>Has cambiar tu planta con exito</h1>
        <a href="../perfil/perfil.php"><button type="button" class="btn btn-primary">Volver</button></a>
        <?php
        } else {
        ?>
        <h1>No pudo cambiar paraece que algo cayo mal</h1>
        <a href="../perfil/perfil.php"><button type="button" class="btn btn-primary">Volver</button></a>
        <?php
        }
        $conexionplanta->close();
        ?>
    </center>
</body>

</html>