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
				"regiones": datos.regiones,
				"empresa": datos.empresa,
				"action": "add"
			}, function(data){
				if (data.band == false)
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
			if (data.band == false){
				console.log("No se pudo eliminar");
			}
		}, "json");
	};
	
	this.asignar = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cordenes', {
				"orden": datos.orden,
				"transportista": datos.transportista,
				"monto": datos.monto,
				"action": "asignar"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.addEmpresa = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('ctransportistas', {
				"id": datos.id,
				"empresa": datos.empresa,
				"action": "addEmpresa"
			}, function(data){
				if (data.band == false)
					console.log("No se pudo agregar");
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.delEmpresa = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('ctransportistas', {
				"id": datos.id,
				"empresa": datos.empresa,
				"action": "delEmpresa"
			}, function(data){
				if (data.band == false)
					console.log("No se pudo eliminar");
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
};