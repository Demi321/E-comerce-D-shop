<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>D-shop Administración</title>
	
<link rel="stylesheet" href="CSS/DesignGestor.css">
<link rel="stylesheet" href="CSS/DesignRegistro.css">
<script src="JavaScriptAdministracion/codigoModoOscuro.js"></script>
<script src="JavaScriptAdministracion/codigoRegistro.js"></script>
<script src="JavaScriptAdministracion/evaluaCamposRegistro.js"></script>
</head>
<?php
if(isset($_GET["acceso"])){
	print("<script>alert('La cuenta de correo otorgada ya está registrada');</script>");
}	

require_once("./BDD/ConexionBD.php");
require_once("./BDD/TratamientoUsuarios.php");
$conex=new Conexion("localhost","Ecomerce","root","");
$datos=new Datos($conex);
$municipios=$datos->getAllMunicipios();//obtenemos los municipios para mostrarlos en el select del formulario
 

?>
 

<body>
  <div id="contenedor">
	
	<div id="banner">
		<div id="logoMarca"> 
			<a href="#"><img src="../CSS/ImagenesPagina/bolsaLogo.png" width="50px"></a>
		</div>
		
		<div class="titulo">	
		<h2>Sistema Gestor de Almacenes</h2>
		</div>
		
	    <div class="modoOscuro">
			
		</div>
		
	 </div>

		  
	<div id="contendorLogin">
		<h1>Registrate!</h2>
		<div id="contenedorForm">
			<div id="iconoLogin">
				<img src=CSS/Imagenes/iconoLogin.png width="50px">
			</div>
			<form action="ProcesaDatosRegistro.php" method="post" id="formulario">
				<table>
				<tr><td><h2>Datos personales</h2></td></tr>
				<tr><td><input type="text" placeholder="Nombre" required class="campos" name="nombre" id="nombre"></td></tr>
				
				<tr><td><input type="text" placeholder="Apellidos"  required  class="campos" name="apellidos" id="apellidos"></td></tr>
				
				<tr><td><input type=email placeholder="Correo" required class="campos" name="email" id="email"></td></tr>
					
				<tr><td><input type="password" placeholder="Contraseña - tiene que ser mayor a 5 dígitos" required class="campos" name="password" id="password"></td></tr>
				
				
				<tr><td><input type="number" placeholder="Telefono a 10 dígitos"     required class="campos" name="telefono" id="telefono"></td></tr>
				
				<tr><td><input type="text" placeholder="CURP" required   class="campos" name="curp" id="curp"></td></tr>
					
				<tr><td><h2>Domicilio</h2></td></tr>
					
				<tr><td><input type="text" placeholder="Calle" required   class="campos" name="calle" id="calle"></td></tr>
					
				<tr><td><input type="text" placeholder="Colonia" required  class="campos" name="colonia" id="colonia"></td></tr>
				
				<tr><td>
				 	<select required name="municipio" id="municipio">
						<option selected="municipio" >Municipio</option>
						<?php
						
						for($i=0;$i<count($municipios);$i++){
						 $aux=$municipios[$i];
							
							print("<option value='$aux'>".$aux."</option>");
							print($i);
							
						}
						
						?>
						<option value="Otro"  id="otro">Otro</option>
					 
						
					</select>
					
				 
				</td></tr>
					
				<tr><td><input type="text" placeholder="Ingresa tu Municipio"  name="otroMunicipio" id="otroMunicipio" ></td></tr>
				
				<tr><td><input type="number" placeholder="Numero Interior"  required class="campos" name="numeroInt" id="numeroInt" ></td></tr>
					
				<tr><td><input type="number" placeholder="Numero Exterior" required class="campos" name="numeroExt" id="numeroExt"></td></tr>
				
				<tr><td><input type="number" placeholder="Código postal"      required class="campos" name="cp" id="cp"></td></tr>
				
				
				<tr><td><h2>Referencias</h2></td></tr>
				
				</table>
				<TEXTAREA class="textarea" max="50" name="referencias" id="referencias">
				</TEXTAREA>
				
				
				<div class="entrar"><a href="Login.php" style="text-decoration: none;"><h2>Entrar</h2></a></div>
				<div class="registrarse" id="registrarse"><h2>Registrarse</h2></div>
				 
			
				
			</form>
			
		</div>
		
		
	</div>
	  
	  
	  
	  
</div>
	
	
	
	
</body>
</html>
	
	