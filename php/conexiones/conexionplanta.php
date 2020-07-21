<?php
//Heroku CleanDB
/*
$servername = "us-cdbr-east-05.cleardb.net";
$user = "b027541037ac8a";
$pass = "a9d1c515";
$bd = "heroku_0c065ea8e5fab3a";
*/

//Xampp

$servername = "localhost";
$user = "root";
$pass = "";
$bd = "bibliotecaplantas";

$conexionplanta = $conexionplanta = new mysqli($servername, $user, $pass, $bd);
if($conexionplanta -> connect_error){
    die("Conexión Fallida: " . $conexionplanta -> connect_error);
}
?>
