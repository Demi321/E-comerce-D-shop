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
		
	function getRutaImagen($categoria){
		$consulta="select rutaImagen from  $this->tbname where Categoria=?";
	 
		$resultado=$this->base->prepare($consulta);
		$resultado->execute(array($categoria));
		$reg=$resultado->fetch(PDO::FETCH_ASSOC);
		 
		$contador=0;
		while($reg=$resultado->fetch(PDO::FETCH_ASSOC)){
			$rutas[$contador]=$reg["rutaImagen"];
			$contador++;
			//print($reg["rutaImagen"]);
		 
		}
		
		$resultado->closeCursor();
		return $rutas;
	 	 
	}
		
	function getMarca($categoria){
		$consulta="select Marca from  $this->tbname where Categoria=?";
	 
		$resultado=$this->base->prepare($consulta);
		$resultado->execute(array($categoria));
		$reg=$resultado->fetch(PDO::FETCH_ASSOC);
		 
		$contador=0;
		while($reg=$resultado->fetch(PDO::FETCH_ASSOC)){
			$rutas[$contador]=$reg["Marca"];
			$contador++;
			//print($reg["rutaImagen"]);
		 
		}
		
		$resultado->closeCursor();
		return $rutas;
	 	 
	}
		
			function getDescripcion($categoria){
		$consulta="select Descripcion from  $this->tbname where Categoria=?";
	 
		$resultado=$this->base->prepare($consulta);
		$resultado->execute(array($categoria));
		$reg=$resultado->fetch(PDO::FETCH_ASSOC);
		 
		$contador=0;
		while($reg=$resultado->fetch(PDO::FETCH_ASSOC)){
			$rutas[$contador]=$reg["Descripcion"];
			$contador++;
			//print($reg["rutaImagen"]);
		 
		}
		
		$resultado->closeCursor();
		return $rutas;
	 	 
	}
		function getPrecio($categoria){
		$consulta="select Precio from  $this->tbname where Categoria=?";
	 
		$resultado=$this->base->prepare($consulta);
		$resultado->execute(array($categoria));
		$reg=$resultado->fetch(PDO::FETCH_ASSOC);
		 
		$contador=0;
		while($reg=$resultado->fetch(PDO::FETCH_ASSOC)){
			$rutas[$contador]=$reg["Precio"];
			$contador++;
			//print($reg["rutaImagen"]);
		 
		}
		
		$resultado->closeCursor();
		return $rutas;
	 	 
	}
		
		
		
	}
	

	
	
	?>
 
	
</body>
</html>