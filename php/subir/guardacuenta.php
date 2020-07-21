<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

include "../conexiones/conexioncuenta.php";
include "../direcciones/url.php";

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$usuario = $_POST['user'];
$direccion = $_POST['dir'];
$comuna = $_POST['com'];
$estadocivil = $_POST['estcivil'];
$rut = $_POST['rut'];
$correo = $_POST['correo'];
$discapacidad = $_POST['disc'];
$verificado = "No";
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$pass1hash = password_hash($pass1, PASSWORD_DEFAULT);
$pass2hash = password_hash($pass2, PASSWORD_DEFAULT);

$sql = "INSERT INTO cuentas (Nombre, Apellidos, Usuario, Direccion, Comuna, Estado_Civil, Rut, Correo, Discapacidad, Verificado, Contrasena1, Contrasena2)
Value ('" . $nombre . "', '" . $apellidos . "', '" . $usuario . "', '" . $direccion . "',
'" . $comuna . "', '" . $estadocivil . "', '" . $rut . "', '" . $correo . "',
'" . $discapacidad . "', '" . $verificado . "', '".$pass1hash."', '".$pass2hash."')";
?>

<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <title>Exito enviar</title>
</head>

<body>
    <?php
    if ($conexion->query($sql) === TRUE) {

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'nelsonmouatvergara@gmail.com';                     // SMTP username
            $mail->Password   = 'nelson29101998';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('nelsonmouatvergara@gmail.com', 'Educación Finanziera');
            $mail->addAddress($correo,);

            // Content
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = '¡BIENVENIDO a Tinplanta!';
            $mail->Body    = "<h1>Tinplanta con Verificado</h1>
            Haga clic: <a href= '$local/php/verificado.php?user=$usuario'>Verifica de tu cuenta</a>";

            $mail->send();
            echo "
            <center>
            <h1 class='display-4'>Registro exitoso. Muchas gracias por preferirnos. Tambien envio en tu correo para verificar</h1>
            <a href='../../index.php'>
            <button type='button' class='btn btn-primary'>Volver</button></a>
            </center>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $sql . $conexion->error;
    }

    $conexion->close();
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>
</body>

</html>