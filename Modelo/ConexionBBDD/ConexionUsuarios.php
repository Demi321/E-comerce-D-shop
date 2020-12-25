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
	 print("Conexion exitosa");
			
	} catch(Exception $e){
	print($e);
	print("No se pudo realizar la conexión con la base de datos");
	}
		
			
	}
	
	function insetarUsuario($nombre,$apellidos,$usuario,$password,$email,$calle,$colonia,$municipio,$numero,$cp,$idHistorial){
		$insertar="insert into $this->tbname (Nombre,Apellidos,Usuario,Password,Email,Calle,Colonia,Municipio,Numero,Cp,IdHistorial) values('$nombre','$apellidos','$usuario','$password','$email','$calle','$colonia','$municipio',$numero,$cp,'$usuario.$numero') ";
		
		$this->base->exec($insertar);
		
		
		 
	}
		
		
	function validaDatosRegistro($usuario,$correo){//DEVUELVE VERDADERO SI ES PERMITIDO HACER EL REGISTRO
		$sql="select Usuario from $this->tbname where Usuario =?";
		$resultado=$this->base->prepare($sql);
		$resultado->execute(array($usuario));
		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
		$resultado->closeCursor(); 
		if($registro==null){
			$sql="select Email from $this->tbname where Email =?";
			$resultado=$this->base->prepare($sql);
			$resultado->execute(array($correo));
			$registro=$resultado->fetch(PDO::FETCH_ASSOC);
			$resultado->closeCursor(); 
			if($registro==null){
			return true;
			}
			
		}else{
			return false;
		}
		
	}	
		
	function validarDatos($usuario,$password){//DEVUELVE TRUE SI EL USUARIO ESTA REGISTRADO
		$sql="select Usuario, Password from $this->tbname where Usuario =? and Password=?";
		$resultado=$this->base->prepare($sql);
		$resultado->execute(array($usuario,$password));
		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
	
	/* while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
		
		echo "Usuario ".$resultado["Usuario"];
		echo "Password ".$resultado["Password"];
	 
	}*/
		$resultado->closeCursor(); 
		
		if($registro==null){
		$sql="select Email, Password from $this->tbname where Email =? and Password=?";
		$resultado=$this->base->prepare($sql);
		$resultado->execute(array($usuario,$password));
		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
			
		$resultado->closeCursor(); 
		if($registro==null){
			return false;
		}else if($registro!=null){
			return true;
		}
			
		}
		else {
			return true;
		}
		
			
		
	}	
		
		
		
		
		
		
		
		
		
		
		
		
	
		
	}
	

	
	
	?>
 
	
</body>
</html>