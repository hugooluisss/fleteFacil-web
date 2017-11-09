TEmpresa = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cempresas', {
				"id": datos.id,
				"razonSocial": datos.razonSocial,
				"domicilio": datos.domicilio,
				"correo": datos.correo,
				"telefono": datos.telefono,
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cempresas', {
			"id": datos.id,
			"action": "del"
		}, function(data){
			if (datos.fn.after != undefined)
				datos.fn.after(data);
				
			if (data.band == false)
				console.log("Ocurrió un error al eliminar");
		}, "json");
	};
};