window.onload = ()=>{
	//cambiarImagen();
	setInterval(cambiarImagen, 3000);
	}
	
	
	var indiceImagen = 0;
	var imagenes = ['img/slider3.jpg','img/slider2.jpg',"img/slider1.jpg"];
	//console.log("enlace");
	
	
	
	function cambiarImagen(){
		if (indiceImagen < imagenes.length - 1){
			indiceImagen++;
		}else{
			indiceImagen = 0;
		}
		//document.getElementById('slider').setAttribute('src',imagenes[indiceImagen]);
		document.slider.src = imagenes[indiceImagen];
	}






