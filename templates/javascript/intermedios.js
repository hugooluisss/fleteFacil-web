$(document).ready(function(){
	var mapa = null;
	var posicion = null;
	var marca = null;
	var campo = null;
	var ventana = $('#winIntermedios');
	
	if (posicion == null){
		navigator.geolocation.getCurrentPosition(function(position){
			posicion = {};
			posicion.latitude = position.coords.latitude;
			posicion.longitude = position.coords.longitude;
		}, function(){
			alert("No se pudo obtener tu localización");
		});
	}
	
	ventana.on('shown.bs.modal', function(){
		if (mapa == null){
			mapa = new google.maps.Map(document.getElementById('dvMapaIntermedios'), {
				center: {lat: posicion.latitude, lng: posicion.longitude},
				scrollwheel: true,
				fullscreenControl: true,
				zoom: 7,
				zoomControl: true
			});
		}else{
			var LatLng = new google.maps.LatLng(posicion.latitude, posicion.longitude);
			mapa.setCenter(LatLng);
		}
		
		getPuntos();
		
	});
	
	function getPuntos(){
		$.post("listaPuntos", {
			"orden": ventana.attr("orden")
		}, function(puntos){
			$.each(puntos, function(i, punto){
				$("#dvListaIntermedios").find("li").remove();
				$("#dvListaIntermedios").append($('<li />', {
					class: "list-group-item",
					text: punto.direccion
				}));
			});
		}, "json");
	}
	
	$("#btnAgregarPunto").click(function(){
		var direccion = prompt("¿Cual es la direccion?");
		
		if (direccion != '' && direccion != null && direccion != undefined){
			objDireccion({
				"direccion": direccion,
				fn: {
					after: function(resp){
						if (resp.results.length == 0)
							alert("No hay resultados");
						else{
							var punto = new TPunto;
								
							var lugar = resp.results[0];
							punto.add({
								orden: ventana.attr("orden"),
								latitude: lugar.geometry.location.lat,
								longitude: lugar.geometry.location.lng,
								fn: {
									after: function(resp){
										if (resp.band){
											posicion.latitude = lugar.geometry.location.lat;
											posicion.longitude = lugar.geometry.location.lng;
											
											var LatLng = new google.maps.LatLng(posicion.latitude, posicion.longitude);
											var div = $('<li />', {
												class: "list-group-item",
												text: lugar.formatted_address
											});
											marca = new google.maps.Marker({"div": div});
											marca.setDraggable(true);
											
											mapa.setCenter(LatLng);
											marca.setPosition(LatLng);
											marca.setMap(mapa);
											
											google.maps.event.addListener(marca, 'dragend', function(event){
												alert(this.getPosition().lat());
												console.log(marca);
											});
										}
									}
								}
							});
							
							$("#dvListaIntermedios").append(div);
						}
					}
				}
			});
		}
	});
	
	
	
	var objDireccion = function(datos){
		if (datos.fn.before != undefined)
				datos.fn.before();
				
		$.get("https://maps.googleapis.com/maps/api/geocode/json?language=es&address=" + datos.direccion + "&key=AIzaSyACOp_nFCQAIBJwb58so1Ru_AJ8apWv0sY", function(resp){
			if (datos.fn.after != undefined)
				datos.fn.after(resp);
		});
	}
});