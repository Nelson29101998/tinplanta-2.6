<?php
session_start();;
$user = $_SESSION['Usuario'];
$_SESSION["Usuario"] = $user;

if (isset($_GET['num'])) {
    $ide = $_GET['num'];
?>
    <!DOCTYPE html>
    <html lang="es" class="full-height">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
        <title>Seguro</title>
    </head>

    <body>
        <div class="container d-flex h-100">
            <div class="row align-self-center w-100">
                <div class="mx-auto">
                    <center>
                        <h1>¿Esta seguro quiere borrar de tu planta?</h1>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo "<a href='eliminarplanta.php?identidad=$ide'><button type='button' class='btn btn-red'><i class='fas fa-check'></i> Si</button></a>"; ?>
                                    </td>
                                    <td>
                                       <a href="../perfil/perfil.php"><button type="button" class="btn btn-green"><i class="fas fa-times"></i> No</button></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>