<?php
/**
*Clase Conexion, crea una conexion con una base de datos
*
*
*/
class Conexion{
private  $conexion;
private  $host;
private  $dbname;
private  $usuario;
private  $pass;
/*
*@param string $host indica el nombre del host EJ: localhost
*@param string $dbname indica el nombre de la base de datos
*@param string $usuario indica el nombre del usuario de la base de datos
*@param string $pass indica la contraseña de la base de datos
*/
function __construct($host,$dbname,$usuario,$pass){
$this->host=$host;
$this->dbname=$dbname;
$this->usuario=$usuario;
$this->pass=$pass;
	
$this->conexion=new PDO("mysql:host=$host;dbname=$dbname",$usuario,$pass);
 	

}

	
/*
*Metodo que devuelve la conexion creada
*@return conexion
*/
function getConexion(){
	return $this->conexion;
}
	
	
}















?>