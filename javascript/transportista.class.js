TTransportista = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('ctransportistas', {
				"id": datos.id,
				"nombre": datos.nombre,
				"representante": datos.representante,
				"email": datos.email, 
				"celular": datos.celular,
				"pass": datos.pass,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(identificador, fn){
		$.post('ctransportistas', {
			"id": identificador,
			"action": "del"
			
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				console.log("No se pudo eliminar");
			}
		}, "json");
	};
	
	this.asignar = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cordenes', {
				"orden": datos.orden,
				"transportista": datos.transportista,
				"action": "asignar"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
};