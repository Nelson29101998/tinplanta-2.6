<?php
session_start();
include "../conexiones/conexioncuenta.php";
if (isset($_SESSION['Usuario'])) {
  $user = $_SESSION['Usuario'];
  $_SESSION["Usuario"] = $user;
}
?>

<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
  <link rel="stylesheet" href="../../css/fondopantalla-style.css">
  <style>
    body,
    html {
      height: 100%;
    }
  </style>
  <title>Ayuda</title>
</head>

<body>
  <div class="container d-flex h-100">
    <div class="row align-self-center w-100">
      <div class="mx-auto">
        <center>
          <div class="animated fadeInDown">
            <h1>¿Necesito para Ayudar? </h1>
          </div>
          <main>
            <div class="animated fadeIn">
              <form id="forml" name="forml" method="post" onsubmit="return formularios()" action="cargaayuda.php">
                <div class="jumbotron" style="background-color: limegreen">
                  <div class="form-group">
                    <table>
                      <tbody>
                        <tr>
                          <td>
                            <select class="form-control" id="ayuda" name="ayuda">
                              <option value="sele">Selección...</option>
                              <option value="Error">Error</option>
                              <option value="El contenido no aparece">El contenido no aparece</option>
                              <option value="No funciona su cuenta ni contraseña">No funciona su cuenta ni contraseña</option>
                              <option value="Otro">Otro</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td style="text-align: center;"> <textarea class="form-control" name="pregunta" id="pregunta" rows="10" cols="30"></textarea> </td>
                        </tr>
                        <tr>
                          <td style="text-align: right;"> <label>Mail: </label><input class="form-control" name="correo" id="correo" size="30" type="email"> </td>
                        </tr>
                        <tr>
                          <td style="text-align: center;">
                            <input class="btn btn-green" name="enviar" value="Enviar" type="submit">
                            <a href="../../index.php"><button type="button" class="btn btn-green" name="vol" id="vol">Volver</button></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </form>
            </div>
          </main>
        </center>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="../../js/bootstrap/bootstrap.min.js"></script>
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>
  <script type="text/javascript">
    function formularios() {
      var sel = document.forms["forml"]["ayuda"].value;
      var textos = document.forms["forml"]["pregunta"].value;
      var cor = document.forms["forml"]["correo"].value;

      if (sel == "sele") {
        alert("poner el selección");
        return false;
      }
      if (textos == null || textos == "") {
        alert("Te falta ingresa de texto");
        return false;
      }
      if (cor == null || cor == "") {
        alert("Ingresa su mail");
        return false;
      }
    }
  </script>
</body>

</html>