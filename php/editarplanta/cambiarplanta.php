<?php
session_start();
include "../conexiones/conexionplanta.php";
$user = $_SESSION['Usuario'];
$_SESSION["Usuario"] = $user;
if (isset($_GET['num'])) {
    $iden = $_GET['num'];
    $sql = "SELECT * FROM plantas WHERE Id = '$iden'";
    $res = mysqli_query($conexionplanta, $sql);
}
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
    <title>Editar planta</title>
</head>

<body>
    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="mx-auto">
                <center>
                    <h1>Editar planta</h1>
                    <main>
                        <div class="container">
                            <form name="planta" id="planta" method="POST" onsubmit="return formula()" action="<?php echo 'actualizarplanta.php?numid=' . $iden; ?>">
                                <div class="jumbotron" style="background-color:limegreen;">
                                    <div class="form-group">
                                        <?php
                                        while ($editar = mysqli_fetch_array($res)) {
                                        ?>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="font-weight-bold align-middle">Nombre de
                                                                Planta:</label>
                                                            <input type="text" class="form-control" name="nomplanta" id="nomplanta" value="<?php echo $editar['Nombre']; ?>" maxlength="20">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="font-weight-bold align-middle">Tipo de Plantas:

                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" class="custom-control-input" name="checkplanta" id="hortaliza" value="Hortaliza" <?php
                                                                                                                                                                            if (isset($editar['Tipo_planta'])) {
                                                                                                                                                                                if ($editar['Tipo_planta'] == "Hortaliza") {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                }
                                                                                                                                                                            }
                                                                                                                                                                            ?>>
                                                                    <label class="custom-control-label" for="hortaliza">
                                                                        Hortaliza
                                                                    </label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" class="custom-control-input" name="checkplanta" id="legumbre" value="Legumbre" <?php
                                                                                                                                                                        if (isset($editar['Tipo_planta'])) {
                                                                                                                                                                            if ($editar['Tipo_planta'] == "Legumbre") {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            }
                                                                                                                                                                        }
                                                                                                                                                                        ?>>
                                                                    <label class="custom-control-label" for="legumbre">
                                                                        Legumbre
                                                                    </label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" class="custom-control-input" name="checkplanta" id="fruta" value="Fruta" <?php
                                                                                                                                                                    if (isset($editar['Tipo_planta'])) {
                                                                                                                                                                        if ($editar['Tipo_planta'] == "Fruta") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                    }
                                                                                                                                                                    ?>>
                                                                    <label class="custom-control-label" for="fruta">
                                                                        Fruta
                                                                    </label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" class="custom-control-input" name="checkplanta" id="cereal" value="Cereal" <?php
                                                                                                                                                                    if (isset($editar['Tipo_planta'])) {
                                                                                                                                                                        if ($editar['Tipo_planta'] == "Cereal") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        }
                                                                                                                                                                    }
                                                                                                                                                                    ?>>
                                                                    <label class="custom-control-label" for="cereal">
                                                                        Cereal
                                                                    </label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" class="custom-control-input" name="checkplanta" id="otro" value="Otro" <?php
                                                                                                                                                                if (isset($editar['Tipo_planta'])) {
                                                                                                                                                                    if ($editar['Tipo_planta'] == "Otro") {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    }
                                                                                                                                                                }
                                                                                                                                                                ?>>
                                                                    <label class="custom-control-label" for="otro">
                                                                        Otro
                                                                    </label>
                                                                </div>

                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="font-weight-bold align-middle">Época de siembra:</label>
                                                            <select class="browser-default custom-select" id="ano" name="ano">
                                                                <?php
                                                                if ($editar['Epocaano'] == "Verano") {
                                                                ?>
                                                                    <option value="Verano">Verano</option>
                                                                    <option value="Otoño">Otoño</option>
                                                                    <option value="Invierno">Invierno</option>
                                                                    <option value="Primavera">Primavera</option>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                if ($editar['Epocaano'] == "Otoño") {
                                                                ?>
                                                                    <option value="Otoño">Otoño</option>
                                                                    <option value="Invierno">Invierno</option>
                                                                    <option value="Primavera">Primavera</option>
                                                                    <option value="Verano">Verano</option>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                if ($editar['Epocaano'] == "Invierno") {
                                                                ?>
                                                                    <option value="Invierno">Invierno</option>
                                                                    <option value="Primavera">Primavera</option>
                                                                    <option value="Verano">Verano</option>
                                                                    <option value="Otoño">Otoño</option>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                if ($editar['Epocaano'] == "Primavera") {
                                                                ?>
                                                                    <option value="Primavera">Primavera</option>
                                                                    <option value="Verano">Verano</option>
                                                                    <option value="Otoño">Otoño</option>
                                                                    <option value="Invierno">Invierno</option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold align-middle" for="exampleFormControlTextarea2">Detalle:</label>
                                                                <textarea class="form-control rounded-0" name="detalle" id="detalle" rows="1" maxlength="255"><?php echo $editar['Detalle']; ?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="font-weight-bold align-middle">Tiempo de cosecha:</label>
                                                            <?php
                                                            $md = $editar['Duracion'];
                                                            $longitud = strlen($md);
                                                            for ($sacar = 1; $sacar < $longitud; $sacar++) {
                                                                if ($md[$sacar] == "M") {
                                                                    $meses = $md[$sacar];
                                                                }
                                                            }

                                                            for ($sacar = 1; $sacar < $longitud; $sacar++) {
                                                                if ($md[$sacar] == "D") {
                                                                    $dias = $md[$sacar];
                                                                }
                                                            }
                                                            ?>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input" name="checkdura" id="mes" value="mes" <?php
                                                                                                                                                        if (isset($meses)) {
                                                                                                                                                            if ($meses == "M") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            }
                                                                                                                                                        }
                                                                                                                                                        ?>>
                                                                <label class="custom-control-label" for="mes">
                                                                    Mes:
                                                                </label>

                                                                <select class="browser-default custom-select" id="durames" name="durames">
                                                                    <?php
                                                                    if (isset($meses)) {
                                                                        if ($meses == "M") {
                                                                    ?>
                                                                            <option value="<?php echo $md; ?>"><?php echo $md; ?></option>
                                                                        <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <option selected value="sele" disabled>Selección</option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    for ($i = 1; $i <= 30; $i++) {
                                                                        if ($i <= 1) {
                                                                            $numeros = $i . " Mes";
                                                                            if ($md != $numeros) {
                                                                    ?>
                                                                                <option value="<?php echo $i . ' Mes'; ?>"><?php echo $i . " Mes"; ?></option>
                                                                            <?php
                                                                            }
                                                                        } else {
                                                                            $numeros = $i . " Meses";
                                                                            if ($md != $numeros) {
                                                                            ?>
                                                                                <option value="<?php echo $i . ' Meses'; ?>"><?php echo $i . " Meses"; ?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input" name="checkdura" id="dia" value="dia" <?php
                                                                                                                                                        if (isset($dias)) {
                                                                                                                                                            if ($dias == "D") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            }
                                                                                                                                                        }
                                                                                                                                                        ?>>
                                                                <label class="custom-control-label" for="dia">
                                                                    Día:
                                                                </label>

                                                                <select class="browser-default custom-select" id="duradia" name="duradia">
                                                                    <?php
                                                                    if (isset($dias)) {
                                                                        if ($dias == "D") {
                                                                    ?>
                                                                            <option value="<?php echo $md; ?>"><?php echo $md; ?></option>
                                                                        <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <option selected value="sele" disabled>Selección</option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                    for ($m = 1; $m <= 250; $m++) {
                                                                        if ($m <= 1) {
                                                                            $numeros = $i . " Días";
                                                                            if ($md != $numeros) {
                                                                    ?>
                                                                                <option value="<?php echo $m . ' Día'; ?>"><?php echo $m . " Día"; ?></option>
                                                                            <?php
                                                                            }
                                                                        } else {
                                                                            $numeros = $i . " Días";
                                                                            if ($md != $numeros) {
                                                                            ?>
                                                                                <option value="<?php echo $m . ' Días'; ?>"><?php echo $m . " Días"; ?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="font-weight-bold align-middle">*Subir la Imagen:</label>
                                                            <input type="text" class="form-control" name="imagen" id="imagen" value="<?php echo $editar['Image']; ?>" maxlength="255">
                                                            <br>
                                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">

                                                                <strong>* <i class="fas fa-exclamation-triangle"></i> Importante:</strong>
                                                                <br>
                                                                Para <strong>subir las imágenes</strong>, puedes usar una nueva entrada del blog o una página estática y luego obtener las URLs.
                                                                <br>
                                                                Partiré del hecho de que <strong>ya descargaste la imagen</strong>, es decir, que ya la tienes guardada en una carpeta de tu computadora.
                                                                <br>
                                                                Ahora, veamos <strong>cómo obtener la URL de la imagen</strong> en los distintos navegadores.
                                                                <br>
                                                                <br>
                                                                <strong>Obtener la URL de la imagen, cuando usas Google Chrome</strong>
                                                                <br>
                                                                <strong>Paso 1:</strong> Ve al panel de edición de entradas, y sube la imagen desde "Redactar" (No del HTML de la entrada) usando la herramienta de "Inserta imagen" que aparece a un lado de "Enlace".
                                                                <br>
                                                                <strong>Paso 2:</strong> Ya que subiste la imagen, pon el puntero del ratón sobre ésta, haz click en el botón derecho del mouse, y selecciona la opción de "Copiar dirección de enlace" del menú contextual, como puede apreciarse en la imagen.

                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="submit" class="btn btn-green" name="switch" id="switch" value="Cambiar">
                                                            <a href="../perfil/perfil.php"><button type="button" class="btn btn-green">Cancelar</button></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </main>
                </center>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="../../js/bootstrap/bootstrap.min.js"></script>

<script type="text/javascript">
    $(".alert").alert()
</script>

<script type="text/javascript">
    function formula() {
        var nom = document.forms['planta']['nomplanta'].value;
        var tipla = document.forms['planta']['checkplanta'].value;
        var ano = document.forms['planta']['ano'].value;
        var det = document.forms['planta']['detalle'].value;
        var tiempo = document.forms['planta']['checkdura'].value;
        var durames = document.forms['planta']['durames'].value;
        var duradia = document.forms['planta']['duradia'].value;

        if (nom == "" || nom == null) {
            alert("Introduzca su Nombre de Planta");
            return false;
        }

        if (tipla == "" || tipla == null) {
            alert("Indique si su apunte es tipo de planta a través de un check.");
            return false;
        }

        if (ano == "sele") {
            alert("Introduzca su época de siembra");
            return false;
        }

        if (det == "" || det == null) {
            alert("Introduzca su detalle");
            return false;
        }

        if (tiempo == "" || tiempo == null) {
            alert("Indique si su apunte es tiempo de cosecha a través de un check.");
            return false;
        }

        if (durames == "sele" && duradia == "sele") {
            alert("Introduzca su tiempo de cosecha de mes o dia");
            return false;
        }
    }
</script>


</html>