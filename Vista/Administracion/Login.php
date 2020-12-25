<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>D-shop Administración</title>
<link rel="stylesheet" href="CSS/DesignGestor.css">
	<link rel="stylesheet" href="CSS/DesignLogin.css">
<script src="JavaScriptAdministracion/codigoModoOscuro.js"></script>
<script src="JavaScriptAdministracion/codigoLogin.js"></script>
</head>
	
</head>
<?php

if(isset($_GET["acceso"])){
	print("<script>alert('la cuenta porporcioanda no existe');</script>");
	
}
?>
<body>
  <div id="contenedor">
	
	<div id="banner">
		<div id="logoMarca"> 
			<img src="../CSS/ImagenesPagina/bolsaLogo.png" width="50px">
		</div>
		
		<div class="titulo">	
		<h2>Sistema Gestor de Almacenes</h2>
		</div>
		
	    <div class="modoOscuro">
			
		</div>
		
	 </div>

		  
	<div id="contendorLogin">
		<h1>Mi cuenta</h2>
		<div id="contenedorForm">
			<div id="iconoLogin">
				<img src=CSS/Imagenes/iconoLogin.png width="50px">
			</div>
			<form action="ProcesaDatosLogin.php" method="post" id="formulario">
				<table>
					
				<tr><td><input type="text" placeholder="Usuario o Correo" class="campos" name="correo"></td></tr>
				<tr><td><input type="password" placeholder="Contraseña" class="campos" name="password"></td></tr>
					
				</table>
				<div class="recuperaPass">
				<h3>¿Olvidaste tu contraseña?</h3>
				</div>
				<div class="entrar" id="entrar"><h2>Entrar</h2></div>
				<div class="registrarse"><a href="Registro.php" style="text-decoration: none;"><h2>Registrarse</h2></a></div>
				
			</form>
			
		</div>
		
		
	</div>
	  
	  
	  
	  
</div>
	
	
	
	
</body>
</html>
	
	