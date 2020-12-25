<?php
require_once("BDD/ConexionBD.php");
require_once("BDD/TratamientoUsuarios.php");

$correo=$_POST["correo"];
$password=$_POST["password"];

$conexion=new Conexion("localhost","Ecomerce","root","");
$datos=new Datos($conexion);
$correo=trim($correo);
 
$datos->validaAccesoVendedorLogin($correo,$password,"Login.php");



?>