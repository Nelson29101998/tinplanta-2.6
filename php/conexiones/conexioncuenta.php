<?php
//Heroku JawsDB
/*
$servername = "sq65ur5a5bj7flas.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user = "fwrgmuou398ho96i";
$pass = "m7ws863tr0aghxbe";
$bd = "pf6950lfz90agkbs";
*/

//Xampp

$servername = "localhost";
$user = "root";
$pass = "";
$bd = "cuentatinplanta";

$conexion = $conexion = new mysqli($servername, $user, $pass, $bd);
if($conexion -> connect_error){
    die("Conexión Fallida: " . $conexion -> connect_error);
}
?>
