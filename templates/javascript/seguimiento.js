$(document).ready(function(){
	var ventana = $("#winSeguimiento");
	
	$("#winSeguimiento").on('shown.bs.modal', function (e) {
		var orden = jQuery.parseJSON($("#winSeguimiento").attr("datos"));
		var mapPoint = undefined;
		console.log(orden);
		ventana.find(".modal-title").html("Seguimiento de la Orden " + orden.folio);
		
		mapPoint = new google.maps.Map(document.getElementById('dvMapaSeguimiento'), {
			center: {lat: orden.origen_json.latitude, lng: orden.origen_json.longitude},
			scrollwheel: true,
			fullscreenControl: true,
			zoom: 7,
			zoomControl: true
		});
		
		$.post("listaPosicionesOrden", {"orden": orden.idOrden}, function(data) {
			ventana.find(".modal-body").append(data);
			var puntos = [];
			ventana.find(".modal-body").find("tr[json]").each(function(){
				try{
					var el = jQuery.parseJSON($(this).attr("json"));
					var marca = new google.maps.Marker({
						//label: el.fecha,
						icon: {
							path: google.maps.SymbolPath.CIRCLE,
							scale: 6, //tamaño
							strokeColor: '#f00', //color del borde
							strokeWeight: 3, //grosor del borde
							fillColor: '#00f', //color de relleno
							fillOpacity:1// opacidad del relleno
						}
					});
					marca.setPosition(new google.maps.LatLng(el.latitude, el.longitude));
					marca.setMap(mapPoint);
					puntos.push(new google.maps.LatLng(el.latitude, el.longitude));
					
					
					$(this).click(function(){
						mapPoint.setCenter(new google.maps.LatLng(el.latitude, el.longitude));
						mapPoint.setZoom(20);
					});
				}catch(e){
					console.log("Error", e);
				}
			});
			console.log(puntos);
			var flightPath = new google.maps.Polyline({
				path: puntos,
				geodesic: true,
				strokeColor: '#F00000',
				strokeOpacity: 1.0,
				strokeWeight: 2
			});
			
			flightPath.setMap(mapPoint);
			
			$("#tblPosiciones").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"order": [[0, "desc"]],
				"info": true,
				"autoWidth": false
			});
		});
	});
	
	$("#winSeguimiento").on('show.bs.modal', function (e) {
		ventana.find(".modal-body").html("");
		ventana.find(".modal-body").append($('<div id="dvMapaSeguimiento" style="height: 200px"></div>'));
	});
});