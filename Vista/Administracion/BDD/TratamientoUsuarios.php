<?php
class Datos{
	
	private $conexion;
	private $sql;
	
	function __construct(Conexion $conexion){
		
	$this->conexion=$conexion;
		
	}
	/*
	*metodo el cual obtiene todos los municipios registrados en la tabla Municipio
	*/
	function getAllMunicipios(){
		$this->sql="SELECT  Municipio FROM MUNICIPIOS ORDER BY Municipio ASC";
		$resultado=$this->conexion->getConexion()->prepare($this->sql);
		$resultado->execute();
		$array;
		$contador=0;
		while($res=$resultado->fetch(PDO::FETCH_ASSOC)){
			
			$array[$contador]=$res["Municipio"];
			$contador++;
		}
		
		return $array;
	}
	/*
	*Metodo evalua si un municipio existe en la base de datos
	*si no existe regresa un null, si existe regresa la id del municipio
	*@param $mun nombre del municipio que se consultara en la BD
	*/
	function existeMunicipio($mun){
		$this->sql="SELECT IdMunicipio FROM MUNICIPIOS WHERE Municipio=?";
		$resultado=$this->conexion->getConexion()->prepare($this->sql);
		$resultado->execute(array($mun));
		$res=$resultado->fetch(PDO::FETCH_ASSOC);
		
		if($res==""){	  
		return null;
		}else{
			return $res["IdMunicipio"];
		}
	}
	//valida si el municipio ya existe en la bse de datos, si existe no lo inserta y devuelve el idDel municipio
	//si no existe inserta el municipio
	function insertaMunicipio($bandera,$idMunicipio,$municipio){
		 if($bandera==null){
		 $this->sql="INSERT INTO MUNICIPIOS VALUES ('$idMunicipio','$municipio')";
         $this->conexion->getConexion()->prepare($this->sql)->execute();
			
		}
		
	}
	/*
	*Metodo encargado de insertar los datos domiciliarios de los usuarios
	*
	*/
	function insertaDomicilio($IdDomicilio,$Calle,$Colonia,$IdMunicipio,$NumeroInt,$NumExt,$CP,$Referencias){
		 
		$this->sql="INSERT INTO DOMICILIO VALUES ('$IdDomicilio','$Calle','$Colonia','$IdMunicipio',$NumeroInt,$NumExt,$CP,'$Referencias')";
		$this->conexion->getConexion()->prepare($this->sql)->execute();
	}
	
	
	/*
	*Inserta los datos del vendedor en la base de datos vendedores
	*/
	function insertaVendedor($idVendedor,$Nombre,$Apellidos,$Correo,$Telefono,$Password,$IdDomicilio,$Curp){
		$this->sql="INSERT INTO VENDEDOR VALUES ('$idVendedor','$Nombre','$Apellidos','$Correo','$Telefono','$Password','$IdDomicilio','$Curp',null)";
		$this->conexion->getConexion()->prepare($this->sql)->execute();
	}
	
  /*Metodo valida los accesos del vendedor
  *
  */
	//	password_verify($pass,$hass);
	function validaAccesoVendedorLogin($mail,$password,$link){
		$this->sql="SELECT CORREO FROM VENDEDOR WHERE CORREO=?";
		$password=htmlentities(addslashes($_POST["password"]));
		$resultado=$this->conexion->getConexion()->prepare($this->sql);
		$resultado->execute(array($mail,$password));
		
		$res=$resultado->fetch(PDO::FETCH_ASSOC);
		if($res==""){
			print("Correo no encontrado");
			header("Location:$link"."?acceso=false");
		}else{
		print($res["CORREO"]);
		}
		
	}
	 /*
	*Metodo evalua si un correo ya esta registrado en la tabla vendedor, si no lo esta
	*manda mensaje de no encontrado y redirecciona a la pagina registro.php
	*@param $mail correo que se validra en la base de datos
	*/
	function validaMailVendedorRegistro($mail,$link){//retorna true si es valido
		$this->sql="SELECT CORREO FROM VENDEDOR WHERE CORREO=?";
		$resultado=$this->conexion->getConexion()->prepare($this->sql);
		$resultado->execute(array($mail));
		
		$res=$resultado->fetch(PDO::FETCH_ASSOC);
		if($res!=""){
		 header("Location:$link");
		 return false;
		}else{ 
		return true;
		}
	}
	
}





?>