// JavaScript Document

$(document).ready(function(){

	$("#botonEnvio").click(function(){
		var nombre=document.getElementById("idNombre").value;
		var apellidos=document.getElementById("idApellidos").value;
		var usuario=document.getElementById("idUsuario").value;
		var email=document.getElementById("idEmail").value;
		var calle=document.getElementById("idCalle").value;
	 	var colonia=document.getElementById("idColonia").value;
	 	var municipio=document.getElementById("idMunicipio").value;
		var numero=document.getElementById("idNumero").value;
		var cp=document.getElementById("idCp").value;
		var password=document.getElementById("idPassword").value;
	
	 	
  		if(nombre==""||apellidos==""||usuario==""||email==""||calle==""||colonia==""||municipio==""||numero==""||cp==""||password==""){
			alert("Existen campos vacios");
		   return false;
		   }else{
			    
			   
		   }

	});	
	
});
