<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
	class Conexion{
		
	private  $host;
	private $dbname;
	private $tbname;
	private $usuario;
	private $pass;
	public $base;
		
		
	function __construct($host,$dbname,$tbname,$usuario,$pass){
	$this->host=$host;
	$this->dbname=$dbname;
	$this->tbname=$tbname;
	$this->usuario=$usuario;
	$this->pass=$pass;
	
		 
	try{
		
	$this->base=new PDO("mysql:host=$host;dbname=$dbname",$usuario,$pass);
	//print("Conexion exitosa");
			
	} catch(Exception $e){
	print($e);
	print("No se pudo realizar la conexión con la base de datos");
	}
		
			
	}
		
	
 
		
	}
	

	
	
	?>
 
	
</body>
</html>