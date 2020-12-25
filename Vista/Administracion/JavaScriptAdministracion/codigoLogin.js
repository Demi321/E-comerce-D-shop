// JavaScript Document


function getDatos(){
	var entrar=document.getElementById("entrar");
	var formulario=document.getElementById("formulario");
	
	entrar.addEventListener("click",function(){
		 formulario.submit();
	},false);
}



window.addEventListener("load",getDatos,false);