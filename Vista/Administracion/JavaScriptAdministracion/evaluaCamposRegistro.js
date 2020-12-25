// JavaScript Document
/*
*Funcion que obtiene el elemento div que actua cono el boton de
*"registrarse" con la ID registrase, y lo pone a la escucha
*
*/

function getId(){
	var registrarse=document.getElementById("registrarse");
	registrarse.addEventListener("click",validaDatos,false);
}


function validaDatos(){
var password=document.getElementById("password");
var telefono=document.getElementById("telefono");
var curp=document.getElementById("curp");
var municipio=document.getElementById("municipio");
var cp=document.getElementById("cp");
var correo=document.getElementById("email");
var referencias=document.getElementById("referencias");
	var contador=0;
	var banderas=0;
	var campos=document.getElementsByClassName("campos");
		//Evaluamos que no existan campos vacios
	for(var i=0;i<campos.length;i++){
		
		 if(campos[i].value==""){
			 campos[i].style.border="1px solid red";
			 contador++;
			
		 }else{
			  campos[i].style.border="1px solid green";
		 }
		
	}
		if(contador>0){
			alert("Existen campos vacíos");
			 
		}else{
			  banderas++;
		}
	//Evaluamos que el correo sea un correo valido
	var arroba=0;
	var punto=0;
	for(var  i=0;i<correo.value.length;i++){
		 if(correo.value.charAt(i)=='@'){ 
			 arroba++;
		 } 
		 if(arroba==1){
			 if(correo.value.charAt(i)=='.'){
			punto++;
			 }
		 }
	}
	if(arroba==1&&punto==1){
	    banderas++;
	   } else{
		   alert("No es un correo valido");
	   }
 
	
	//evaluamos que la contraseña sea >6 digitos
	if(password.value.length<=5){
		alert("La contraseña debe ser mayor a 5 digitos");
		 
	}else if(password.value.length>20){
		alert("La contraseña debe ser menor a 20 digitos");
	}else{
		banderas++;
	}
	//evaluamos que el telefono tenga 10 digitos
	if(telefono.value.length<10){
		alert("El Número de telefono debe tener 10 digitos");
		 
	}else if(telefono.value.length>10){
		alert("El Número de telefono no debe tener más 10 digitos");
		 
	}else{
		 banderas++;
	}
	//evaluamos que la curp tenga 18 digitos
	if(curp.value.length<18){
		alert("La CURP debe tener 18 dígitos");
		 
	}else if(curp.value.length>18){
		alert("La CURP no debe tener más de 18 dígitos");
		 
	}else{
		 banderas++;
	}
	//evaluamos que se haya escogido un municipio
	if(municipio.value=="Municipio"){
		alert("Debe seleccionar un municipio");
		municipio.style.border="1px solid red";
		 
	}else if(municipio.value=="Otro"){
			municipio.style.border="1px solid green";
			var otroMunicipio=document.getElementById("otroMunicipio");
			if(otroMunicipio.value==""){
			   alert("Debe ingresar su municipio");
				otroMunicipio.style.border="1px solid red";
				 
			   }else{
				 otroMunicipio.style.border="1px solid green";
				  banderas++;
			   }
	}else{
		municipio.style.border="1px solid green";
		 banderas++;
	}
	
	//evaluamos que codigo postal sea de 5 digitos
	if(cp.value.length<5){
		alert("El código postal debe ser de 5 dígitos");
		 
	}else if(cp.value.length>5){
		alert("El código postal no debe ser mayor a 5 dígitos");
	 
	}else{
		 banderas++;
	}
	//evaluamos que las referencias no rebasen los 50 digitos 
	if(referencias.value.length>50){
		alert("Las referencias no debe rebasar los 50 caracteres");
	   }else{
		   banderas++;
	   }
	
	 //QUEDA PENDIENTE EVALUAR EL AREATEXT QUE NO REBASE LOS 50 CARACTERES y evaluar si es un correo
	 //si banderas es = 8 podemos continuar a enviar el formulario
 	if(banderas==8){
		 var formulario=document.getElementById("formulario");
		formulario.submit();
	}  
	
	
}
 
 

window.addEventListener("load",getId,false);