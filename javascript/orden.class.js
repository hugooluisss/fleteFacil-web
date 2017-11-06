TOrden = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cordenes', {
				"id": datos.id,
				"estado": datos.estado,
				"usuario": datos.usuario,
				"descripcion": datos.descripcion,
				"requisitos": datos.requisitos,
				"fechaServicio": datos.fechaServicio,
				"plazo": datos.plazo,
				"peso": datos.peso,
				"volumen": datos.volumen,
				"origen": datos.origen,
				"destino": datos.destino,
				"presupuesto": datos.presupuesto,
				"propuestas": datos.propuestas,
				"folio": datos.folio,
				"hora": datos.hora,
				"regiones": datos.regiones,
				"empresa": datos.empresa,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cordenes', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				console.log("No se pudo borrar");
			}
		}, "json");
	};
};