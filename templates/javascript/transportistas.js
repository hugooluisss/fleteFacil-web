$(document).ready(function(){
	getLista();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtEmail: {
				required: true,
				email: true
			},
			txtNombre: "required",
			txtRepresentante: "required",
			selEmpresa: "required",
			txtCelular: {
				required: true,
				digits: true
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
		
			var obj = new TTransportista;
			obj.add({
				id: $("#id").val(), 
				nombre: $("#txtNombre").val(), 
				representante: $("#txtRepresentante").val(), 
				email: $("#txtEmail").val(),
				celular: $("#txtCelular").val(),
				regiones: $("#selRegion").val(),
				empresa: $("#selEmpresa").val(),
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
		$.get("listaTransportistas", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TTransportista;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idTransportista);
				$("#txtNombre").val(el.nombre);
				$("#txtEmail").val(el.email);
				$("#txtRepresentante").val(el.representante);
				$("#txtCelular").val(el.celular);
				$("#selRegion").val(el.regiones);
				$("#selEmpresa").val(el.idEmpresa);
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=empresas]").click(function(){
				$("#winEmpresas").attr("datos", $(this).attr("datos"));
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
	
	var ventana = $("#winEmpresas");
	$("#winEmpresas").on('show.bs.modal', function(){
		var transportista = jQuery.parseJSON($("#winEmpresas").attr("datos"));
		ventana.attr("transportista", transportista.idTransportista);
		ventana.find("[type=checkbox]").prop("checked", false);
		$.post("getEmpresasTransportista", {
			id: transportista.idTransportista
		}, function(resp){
			$.each(resp, function(i, empresa){
				ventana.find("[value=" + empresa + "]").prop("checked", true);
			});
		}, "json");
	});
	
	ventana.find("[type=checkbox]").click(function(){
		var obj = new TTransportista;
		if ($(this).is(":checked"))
			obj.addEmpresa({
				id: ventana.attr("transportista"),
				empresa: $(this).val(),
				fn: {
					before: function(){
						$(this).prop("disabled", true);
					},
					after: function(resp){
						$(this).prop("disabled", false);
						
						if (!resp.band)
							alert("No se pudo asignar");
					}
				}
			});
		else
			obj.delEmpresa({
				id: ventana.attr("transportista"),
				empresa: $(this).val(),
				fn: {
					before: function(){
						$(this).prop("disabled", true);
					},
					after: function(resp){
						$(this).prop("disabled", false);
						
						if (!resp.band)
							alert("No se pudo eliminar la asignación");
					}
				}
			});
	});
});