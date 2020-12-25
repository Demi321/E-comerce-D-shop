// JavaScript Document



var flag=true;
function getElementos(){
	var municipio=document.getElementById("municipio");
	var otroMunicipio=document.getElementById("otroMunicipio");
	otroMunicipio.style.display="none";
	municipio.addEventListener("click",function(){
		
		if(municipio.value=="Otro"&&flag){
		 	otroMunicipio.style.display="block";
			otroMunicipio.style.borderBottom="2px solid green";
			flag=false;
		}else{
			flag=true;
			otroMunicipio.style.display="none";
		}
		
		
	},false);
	
	
}


window.addEventListener("load",getElementos,false);