// JavaScript Document
 

function getIds(){
	var agregarProductos=document.getElementById("agregarProductos");
	var gestionar=document.getElementById("gestionar");
	var ventas=document.getElementById("ventas");
	var modoOscuro=document.getElementsByClassName("modoOscuro");
	modoOscuro[0].addEventListener("click",modo,true);agregarProductos.addEventListener("click",refAgregarProducto,false);
	
}
 
function  modo(){
	 var cuerpo=document.body;
	var titulo=document.getElementsByClassName("titulo");
	var titulos=document.getElementsByClassName("tituloOpcion");
	var contenedor=document.getElementsByClassName("contenedorOpciones");
	var modo=document.getElementsByClassName("modoOscuro");
	modo[0].classList.toggle("modoOscuroSol");
	titulo[0].classList.toggle("tituloMainNon");
	cuerpo.classList.toggle("cuerpo");
 	for(var i=0;i<titulos.length;i++){
		contenedor[i].classList.toggle("contenedorNeon");
		titulos[i].classList.toggle("titulosNeon");
		
	}
}

function refAgregarProducto(){
	window.location="AgregarProducto.php";
	
}


window.addEventListener("load",getIds,false);