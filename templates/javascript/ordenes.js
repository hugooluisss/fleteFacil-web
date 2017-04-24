$(document).ready(function(){
	var auxPos = {};
	navigator.geolocation.getCurrentPosition(function(position){
		auxPos.latitude = position.coords.latitude;
		auxPos.longitude = position.coords.longitude;
	}, function(){
		alert("No se pudo determinar");
	});
	getLista();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#txtOrigen").click(function(){
		campo = $("#txtOrigen");
		setMapa();
	});
	
	$("#txtDestino").click(function(){
		campo = $("#txtDestino");
		setMapa();
	});
	
	$("#btnUbicacion").click(function(){
		var json = new Object;
		json.latitude = posicion.latitude;
		json.longitude = posicion.longitude;
		json.direccion = $("#txtDireccion").val();
		
		campo.attr("json", JSON.stringify(json));
		campo.val($("#txtDireccion").val());
		
		$("#winMapa").modal("hide");
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			selOperador: "required",
			selEstado: "required",
			txtDescripcion: "required",
			txtFechaServicio: "required",
			txtOrigen: "required",
			txtDestino: "required",
			txtPresupuesto: {
				required: true,
				number: true
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TOrden;
			obj.add({
				id: $("#id").val(), 
				estado: $("#selEstado").val(),
				usuario: $("#selOperador").val(),
				descripcion: $("#txtDescripcion").val(),
				requisitos: $("#txtRequisitos").val(),
				fechaServicio: $("#txtFechaServicio").val(),
				plazo: $("#txtPlazo").val(),
				peso: $("#txtPeso").val(),
				volumen: $("#txtVolumen").val(),
				origen: $("#txtOrigen").attr("json"),
				destino: $("#txtDestino").attr("json"),
				presupuesto: $("txtPresupuesto").val(),
				fn: {
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			});
        }

    });
		
	function getLista(){
		$.get("listaOrdenes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TOrden;
					obj.del($(this).attr("item"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idOrden);
				$("#selOperador").val(el.idUsuario);
				$("#selEstado").val(el.idEstado);
				
				$("#txtDescripcion").val(el.descripcion);
				$("#txtRequisitos").val(el.requisitos);
				$("#txtFechaServicio").val(el.fechaservicio);
				$("#txtPlazo").val(el.plazo);
				$("#txtPeso").val(el.peso);
				$("#txtVolumen").val(el.volumen);
				$("#txtPresupuesto").val(el.presupuesto);
				$("#txtOrigen").attr("json", el.origen);
				try{
					var origen = jQuery.parseJSON(el.origen);
					$("#txtOrigen").val(origen.referencia);
				}catch(err){
					alert("No se pudo determinar el punto de origen");
					console.log(el.origen);
				}
				
				$("#txtDestino").attr("json", el.destino);
				try{
					var origen = jQuery.parseJSON(el.destino);
					$("#txtDestino").val(destino.referencia);
				}catch(err){
					alert("No se pudo determinar el punto de destino");
					console.log(el.destino);
				}
				
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": false,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	};
	
	var mapa = null;
	var posicion = null;
	var marca = null;
	var campo = null;
	
	function setMapa(){
		$("#winMapa").modal();
		if (mapa == null){
			marca = new google.maps.Marker({});
			mapa = new google.maps.Map(document.getElementById('dvMapa'), {
				center: {lat: auxPos.latitude, lng: auxPos.longitude},
				scrollwheel: true,
				fullscreenControl: true,
				zoom: 12,
				zoomControl: true
			});
			
			google.maps.event.addListener(mapa, 'click', function(event){
				var LatLng = event.latLng;
				marca.setPosition(LatLng);
				marca.setMap(mapa);
				posicion.latitude = event.latLng.lat();
				posicion.longitude = event.latLng.lng();
				
				getDireccion(posicion.latitude, posicion.longitude);
			});
		}
		
		$("#txtDireccion").val();
		try{
			var json = campo.attr("json");
			posicion = jQuery.parseJSON(json);
		}catch(e){
			posicion = {};
			posicion.latitude = auxPos.latitude;
			posicion.longitude = auxPos.longitude;
			
			console.log(json, e.message);
		}
		
		var LatLng = new google.maps.LatLng(posicion.latitude, posicion.longitude);
		
		mapa.setCenter(LatLng);
		marca.setPosition(LatLng);
		marca.setMap(mapa);
		getDireccion(posicion.latitude, posicion.longitude);
	}
	
	function getDireccion(latitude, longitude){
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({'latLng': new google.maps.LatLng(latitude, longitude)}, function (results, status){
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {
					$("#txtDireccion").val(results[0].formatted_address);
				} else {
					alert('Google no retorno resultado alguno.');
				}
			} else {
				alert("Geocoding fallo debido a : " + status);
			}
		});
	}
});

google.maps.event.addDomListener(window, 'load', initialize);
