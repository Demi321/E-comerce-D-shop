<?php


$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$correo=$_POST["email"];
$password=$_POST["password"];
$telefono=$_POST["telefono"];
$curp=$_POST["curp"];
$calle=$_POST["calle"];
$colonia=$_POST["colonia"];
$municipio=$_POST["municipio"]; 
$otroMunicipio=$_POST["otroMunicipio"];
$numeroInt=$_POST["numeroInt"];
$numeroExt=$_POST["numeroExt"];
$cp=$_POST["cp"];
$referencias=$_POST["referencias"];
$idMunicipio="";
//CREAMOS UNA CONEXION CON LA BASE DE DATOS
require_once("BDD/ConexionBD.php");
require_once("BDD/TratamientoUsuarios.php");
$conex=new Conexion("localhost","Ecomerce","root","");
$datos=new Datos($conex);
$referencias=trim($referencias);
$correo=trim($correo);
//validamos que el correo ingresado no este ya registrado
$valido=$datos->validaMailVendedorRegistro($correo,"Registro.php");

//validamos si el municipio que el usurio ingreso esta en la BD, si esta no lo insertamos, si no lo esta lo insertamos
if($municipio=="Otro"){
	$otroMunicipio=ucfirst($otroMunicipio);//ponemos en mayuscula el primer caracter
	$inicial="M_";
	$sub=substr($otroMunicipio,0,3);//extaemos los 3 primeros caracteres
	$id=$inicial.$sub;
	$flag=$datos->existeMunicipio($otroMunicipio);
	$mun=$datos->insertaMunicipio($flag,$id,$otroMunicipio);
	 
	if($flag==null){
		 
		$idMunicipio=$id;
	 
		 
	}else{
	 
		$idMunicipio=$flag;
	}
	 
}else{
	$idMunicipio=$datos->existeMunicipio($municipio);
}
//-----leemos el numero de vendedores actuales
$archivo=fopen("NumVendedor.txt","r");
$numVendedor=intval(fgets($archivo));
 
$numVendedor++;//incrementamos en unos

//--escribimos el numero en el archivo
$archivo=fopen("NumVendedor.txt","w");
fputs($archivo,$numVendedor);
fclose($archivo);


//
//creamos el idVenderdor (sera la primer inicial del nombre y las 2 iniciales del apelllido mas el numero devendedor asignado (numVendedor) ) 
$n=substr($nombre,0,1);
$n=strtoupper($n);
$a=substr($apellidos,0,2);
$a=strtoupper($a);
$idVendedor=$n.$a.$numVendedor;

//--CREAMOS Id de domicilio (sera D_IdVendedor)
$idDomicilio="D_".$idVendedor;
//ciframos la contraseña
$passCifrada=password_hash($password,PASSWORD_DEFAULT);


if($valido){
//insertamos datos de  domicilio 
$datos->insertaDomicilio($idDomicilio,$calle,$colonia,$idMunicipio,$numeroInt,$numeroExt,$cp,$referencias);
 
$datos->insertaVendedor($idVendedor,$nombre,$apellidos,$correo,$telefono,$passCifrada,$idDomicilio,$curp);
	print("REGISTRADOP");
}








/*print($nombre."<br>");
print($apellidos."<br>");
print($password."<br>");
print($curp."<br>");

print($calle."<br>");
print($colonia."<br>");
print($municipio."<br>");
print($otroMunicipio."<br>");
print($numeroInt."<br>");
print($numeroExt."<br>");
print($cp."<br>");*/

?>