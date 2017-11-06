$(document).ready(function(){
	$("#txtFechaServicio").datepicker();
	getLista();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
		
		$("#selEstado").find("option").each(function(){
			$(this).prop("disabled", false);
		});
		
		$("#dvReporteFinal").html("");
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
	
	$("#selEmpresa").change(function(){
		getOperadores();
	});
	
	function getOperadores(){
		var operadores = jQuery.parseJSON($("#selEmpresa").find("option:selected").attr("json"));
		
		$("#selOperador").find("option").remove();
		
		$.each(operadores, function(i, operador){
			$("#selOperador").append($("<option />", {
				value: operador.idUsuario,
				text: operador.nombre,
			}));
		});
	}
	
	getOperadores();
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtFolio: "required",
			selOperador: "required",
			selEstado: "required",
			selEmpresa: "required",
			txtDescripcion: "required",
			txtFechaServicio: "required",
			txtOrigen: "required",
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
				empresa: $("#selEmpresa").val(),
				usuario: $("#selOperador").val(),
				descripcion: $("#txtDescripcion").val(),
				requisitos: $("#txtRequisitos").val(),
				fechaServicio: $("#txtFechaServicio").val(),
				plazo: $("#txtPlazo").val(),
				peso: $("#txtPeso").val(),
				volumen: $("#txtVolumen").val(),
				origen: $("#txtOrigen").attr("json"),
				presupuesto: $("#txtPresupuesto").val(),
				propuestas: $("#selPropuestas").val(),
				folio: $("#txtFolio").val(),
				hora: $("#txtHora").val(),
				regiones: $("#selRegion").val(),
				fn: {
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
							
							if(confirm("¿Quieres definir los puntos de entrega?")){
								$("#winIntermedios").attr("orden", datos.id)
								$("#winIntermedios").modal();
							}
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
				$("#selEmpresa").val(el.idEmpresa);
				getOperadores();
				$("#selEstado").val(el.idEstado);
				
				$("#txtDescripcion").val(el.descripcion);
				$("#txtRequisitos").val(el.requisitos);
				$("#txtFechaServicio").val(el.fechaservicio);
				$("#txtPlazo").val(el.plazo);
				$("#txtPeso").val(el.peso);
				$("#txtVolumen").val(el.volumen);
				$("#txtPresupuesto").val(el.presupuesto);
				$("#txtOrigen").attr("json", el.origen);
				$("#selPropuestas").val(el.propuestas);
				$("#txtFolio").val(el.folio);
				$("#txtHora").val(el.hora);
				
				$("#selRegion").val(el.regiones);
				
				$("#dvReporteFinal").html("");
				if(el.idEstado == 5){
					$.post("reporteFinal", {
						"idOrden": el.idOrden
					}, function(codigo){
						$("#dvReporteFinal").html(codigo);
					});
				}
				
				$("#selOperador").val(el.idUsuario);
				try{
					var origen = jQuery.parseJSON(el.origen);
					$("#txtOrigen").val(origen.direccion);
				}catch(err){
					alert("No se pudo determinar el punto de origen");
					console.log(el.origen);
				}
				
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=interesados]").click(function(){
				$("#winInteresados").attr("datos", $(this).attr("datos"));
			});
			
			$("[action=mapa]").click(function(){
				$("#winSeguimiento").attr("datos", $(this).attr("datos"));
			});
			
			var tabla = $("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": false,
				"lengthChange": false,
				"ordering": true,
				"order": [[0, "desc"]],
				"info": true,
				"autoWidth": false
			});
			
			if ($("#auxOrden").val() != ''){
				tabla.columns(0).search($("#auxOrden").val()).draw();
				
				$("#auxOrden").val("");
			}
		});
	};
	
	var mapa = null;
	var posicion = null;
	var marca = null;
	var campo = null;
	
	function setMapa(){
		$("#winMapa").modal();
		$("#txtDireccion").val();
		
		try{
			var json = campo.attr("json");
			posicion = jQuery.parseJSON(json);
			
			if(posicion == null){
				navigator.geolocation.getCurrentPosition(function(position){
					posicion = {};
					posicion.latitude = position.coords.latitude;
					posicion.longitude = position.coords.longitude;
					
					ubicar();
				}, function(){
					alert("No se pudo obtener tu localización");
				});
			}else
				ubicar();
		}catch(e){
			navigator.geolocation.getCurrentPosition(function(position){
				posicion = {};
				posicion.latitude = position.coords.latitude;
				posicion.longitude = position.coords.longitude;
				
				ubicar();
			}, function(){
				alert("No se pudo obtener tu localización");
			});
			
			console.log(json, e.message);
		}
		
		
		function ubicar(){
			if (mapa == null){
				marca = new google.maps.Marker({});
				mapa = new google.maps.Map(document.getElementById('dvMapa'), {
					center: {lat: posicion.latitude, lng: posicion.longitude},
					scrollwheel: true,
					fullscreenControl: true,
					zoom: 7,
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
				
				var LatLng = new google.maps.LatLng(posicion.latitude, posicion.longitude);
				mapa.setCenter(LatLng);
				marca.setPosition(LatLng);
				marca.setMap(mapa);
				getDireccion(posicion.latitude, posicion.longitude);
			}else{
				var LatLng = new google.maps.LatLng(posicion.latitude, posicion.longitude);
				mapa.setCenter(LatLng);
				marca.setPosition(LatLng);
				marca.setMap(mapa);
				getDireccion(posicion.latitude, posicion.longitude);
			}
		}
		
	}
	
	$("#txtBuscarDireccion").keyup(function(e){
		if(e.keyCode == 13){
			var str = $("#txtBuscarDireccion").val() + " chile";
			$("#txtBuscarDireccion").prop("disabled", true);
			
			$.get("https://maps.googleapis.com/maps/api/geocode/json?language=es&address=" + str + "&key=AIzaSyACOp_nFCQAIBJwb58so1Ru_AJ8apWv0sY", function(resp){
				$("#txtBuscarDireccion").prop("disabled", false);
				if (resp.results.length == 0)
					alert("No hay resultados");
				else{
					var lugar = resp.results[0];
					posicion.latitude = lugar.geometry.location.lat;
					posicion.longitude = lugar.geometry.location.lng;
					
					var LatLng = new google.maps.LatLng(posicion.latitude, posicion.longitude);
					mapa.setCenter(LatLng);
					marca.setPosition(LatLng);
					marca.setMap(mapa);
					//getDireccion(posicion.latitude, posicion.longitude);
					
					$("#txtDireccion").val(lugar.formatted_address);
				}
			});
		}
	});
	
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
	
	$("#winInteresados").on('show.bs.modal', function(e){
		try{
			var el = jQuery.parseJSON($("#winInteresados").attr("datos"));
			
			$.post("listaInteresados", {
				"orden": el.idOrden
			}, function(resp){
				$("#dvListaInteresados").html(resp);
				
				$("#dvListaInteresados").find("[action=asignar]").click(function(){
					var el = jQuery.parseJSON($(this).attr("datos"));
					if(confirm("¿Seguro de asignar la orden de transporte al transportista?")){
						var obj = new TTransportista;
						obj.asignar({
							"orden": el.idOrden,
							"transportista": el.idTransportista,
							fn: {
								after: function(resp){
									if (resp.band){
										alert("La orden fué asignada");
										$("#winInteresados").modal("hide");
									}
								}
							}
						});
					}
				});
			});
		}catch(e){
			alert("No se pudo obtener la lista de interesados");
		}
	})
});
