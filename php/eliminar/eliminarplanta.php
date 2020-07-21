<?php
session_start();
include "../conexiones/conexionplanta.php";
$user = $_SESSION['Usuario'];
$_SESSION["Usuario"] = $user;

if (isset($_GET['identidad'])) {
    $iden = $_GET['identidad'];
    $borrarplanta = "DELETE FROM plantas WHERE Id = '$iden'";
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
        <title>Se elimino</title>
    </head>

    <body>
        <center>
            <?php
            if ($conexionplanta->query($borrarplanta) === TRUE) {
                echo "<h1>Se eliminado de tu planta</h1>
                <a href='../perfil/perfil.php'><button type='button' class='btn btn-green'>Volver</button></a>";
            } else {
                echo "Error: " . $sql . $conexionplanta->error .
                    "<a href='../perfil/perfil.php'><button type='button' class='btn btn-green'>Volver</button></a>";
            }
            ?>
        </center>
    </body>

    </html>
<?php
    $conexionplanta->close();
}
?>