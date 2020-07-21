<?php
session_start();
include "../conexiones/conexioncuenta.php";

$usuario = $_POST['user'];
$contrasena = $_POST['pass'];

$contrasenahash = password_hash($contrasena, PASSWORD_DEFAULT);

$sql = "SELECT * FROM cuentas WHERE Usuario = '$usuario'";
$permisosql = mysqli_query($conexion, $sql);
$encotntrar = mysqli_fetch_array($permisosql, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <title>Equivocado</title>
</head>

<body>
    <?php
    if (isset($encotntrar["Usuario"])) {
        if ($encotntrar["Verificado"] === "Si") {
            if (password_verify($contrasena, $encotntrar['Contrasena1'])) {
                $_SESSION["Usuario"] = $encotntrar['Usuario'];

                header("Location: ../../index.php");
            } else {
                echo "<center>
            <h1 class='display-4'>Contraseña estan incorrecto!!</h1>
            <a href='../../html/iniciasesion.html'><button type='button' class='btn btn-primary'>Volver</button></a>
            </center>";
            }
        } else {
            echo "<center>
        <h1 class='display-4'>Tu cuenta no esta verificado</h1>
        <a href='../../html/iniciasesion.html'><button type='button' class='btn btn-primary'>Volver</button></a>
        </center>";
        }
    } else {
        echo "<center>
        <h1 class='display-4'>Correo estan incorrecto o no esta registrado!!</h1>
        <a href='../../html/iniciasesion.html'><button type='button' class='btn btn-primary'>Volver</button></a>
        </center>";
    }
    ?>
</body>

</html>