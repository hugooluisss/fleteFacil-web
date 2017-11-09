TPunto = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cpuntos', {
				"id": datos.id,
				"orden": datos.orden,
				"direccion": datos.direccion,
				"latitude": datos.latitude, 
				"longitude": datos.longitude,
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(datos){
		if (datos.fn.before != undefined)
			datos.fn.before();
				
		$.post('cpuntos', {
			"id": datos.identificador,
			"action": "del"
		}, function(data){
			if (datos.fn.after != undefined)
				datos.fn.after(data);
				
			if (data.band == false)
				console.log("No se pudo eliminar");
		}, "json");
	};
};