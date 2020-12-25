// JavaScript Document
 
$(document).ready(function(){
 
	$("#imagenLogo").click(function(){
		$(location).attr("href","Index.php");
	});
	
	 var menu=$(".menu");
	$("#menuLogo").click(function(){
		
	menu.toggle("slow",null);
	subMcat.hide();
		
	});
	
	var subMcat=$(".subMenu");
	
	$("#categoria").hover(function(){
	subMcat.show();
	
	subMcat.mouseleave(function(){
		subMcat.hide();
	});
		
	});

	var listaProductos=$("#listaProductos");
	
	$("#imgCarrito").click(function(){
	 listaProductos.toggle("slow",null);
		
		
		
	});
	
	
	
});


$.getElemento=$("#accessos").hide();
function evento(e,idProducto,producto){
var elemento=document.getElementById(e);
elemento.addEventListener("click",function(){
	
},false);
		
	}
 





function getCarrito(e1,usuario,contador,marca,descripcion,precio,img,id,categoria,aux,flag,size){
	
	var carr=document.getElementById(e1);
 	
carr.addEventListener("click",function(){
	
window.location="PaginaProducto.php?usuario="+usuario+"&contador="+contador+"&marca="+marca+"&descripcion="+descripcion+"&precio="+precio+"&ruta="+img+"&Id="+id+"&categoria="+categoria+"&aux="+aux+"&flag="+flag+"&size="+size+" ";
 
},false);
	
 
}


 

function addElemento(e,img,marca,descripcion,precio){
	 
	if(parseInt(e)-1>0){
		
	var lista=document.getElementById("listaProductos");
		
		lista.innerHTML+=""; 
	}
	
}
 

//window.addEventListener("load",getCarrito,false);

 
 
 

 
