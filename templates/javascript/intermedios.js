$(document).ready(function(){
	var mapa = null;
	var ventana = $('#winIntermedios');
	var posicion = null;
	
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
			$("#dvListaIntermedios").find("li").remove();
			
			$.each(puntos, function(i, punto){
				showPuntoMapa(punto);
			});
		}, "json");
	}
	
	function showPuntoMapa(datos){
		var div = $('<li />', {
			class: "list-group-item",
			text: datos.direccion,
			identificador: datos.idPunto
		}).append('<span class="direccion">' + datos.direccion + '</span>');
		var btnUbicar = $("<button />", {
			class: "btn btn-default btn-xs",
			html: '<i class="fa fa-map-marker" aria-hidden="true"></i>',
			title: 'Ubicar en el mapa'
		});
		var btnBorrar = $("<button />", {
			class: "btn btn-danger btn-xs",
			html: '<i class="fa fa-times" aria-hidden="true"></i>',
			title: 'Eliminar'
		});
		div.append(btnUbicar).append(btnBorrar);
		
		$("#dvListaIntermedios").append(div);
		var posicion = jQuery.parseJSON(datos.json);
		var LatLng = new google.maps.LatLng(posicion.latitude, posicion.longitude);
		
		var marca = new google.maps.Marker({"identificador": datos.idPunto, "direccion": datos.direccion, "orden": datos.idOrden});
		marca.setDraggable(true);
		marca.setPosition(LatLng);
		marca.setMap(mapa);
		
		btnUbicar.click(function(){
			mapa.setCenter(LatLng);
		});
		
		btnBorrar.click(function(){
			if(confirm("¿Seguro?")){
				var punto = new TPunto;
				punto.del({
					identificador: datos.idPunto,
					fn: {
						before: function(){
							btnBorrar.prop("disabled", true);
						},
						after: function(resp){
							btnBorrar.prop("disabled", true);
							if (resp.band){
								btnBorrar.parent().remove();
								marca.setMap(null);
							}else
								alert("No se pudo eliminar");
						}
					}
				});
			}
		});
		
		google.maps.event.addListener(marca, 'dragend', function(event){
			var punto = new TPunto;
			var geocoder = new google.maps.Geocoder();
			var el = this;
			geocoder.geocode({'latLng': new google.maps.LatLng(el.getPosition().lat(), el.getPosition().lng())}, function (results, status){
				if (status == google.maps.GeocoderStatus.OK) {
					if (results[0]) {
						punto.add({
							id: el.identificador,
							latitude: el.getPosition().lat(),
							longitude: el.getPosition().lng(),
							orden: el.orden,
							direccion: results[0].formatted_address,
							fn: {
								after: function(resp){
									div.find(".direccion").text(results[0].formatted_address);
								}
							}
						});
					} else {
						alert('Google no retorno resultado alguno.');
					}
				} else {
					alert("Geocoding fallo debido a : " + status);
				}
			});
		});
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
								direccion: lugar.formatted_address,
								fn: {
									after: function(resp){
										if (resp.band){
											console.log("{latitude:" + lugar.geometry.location.lat + ", longitude:" + lugar.geometry.location.lng + "}");
											showPuntoMapa({
												"idPunto": resp.id,
												"direccion": lugar.formatted_address,
												"idOrden": ventana.attr("orden"),
												"json": '{"latitude":"' + lugar.geometry.location.lat + '", "longitude":"' + lugar.geometry.location.lng + '"}'
											});
										}
									}
								}
							});
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