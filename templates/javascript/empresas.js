$(document).ready(function(){
	getLista();
	
	function getOperadores(){
		var operadorSeleccionado = $("#selOperador").val();
		
		
	}
	
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
			txtRazonSocial: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TEmpresa;
			obj.add({
				id: $("#id").val(),
				razonSocial: $("#txtRazonSocial").val(),
				domicilio: $("#txtDomicilio").val(),
				correo: $("#txtCorreo").val(),
				telefono: $("#txtTelefono").val(),
				fn: {
					before: function(){
						$("#frmAdd [type=submit]").prop("disabled", true);
					},
					after: function(datos){
						$("#frmAdd [type=submit]").prop("disabled", false);
						
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
		$.get("listaEmpresas", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TEmpresa;
					obj.del({
						id: $(this).attr("item"), 
						fn: {
							before: function(){
								$(this).prop("disabled", true);
							},
							after: function(data){
								$(this).prop("disabled", false);
								if (data.band)
									getLista();
								else
									alert("No se pudo eliminar");
							}
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idEmpresa);
				$("#txtRazonSocial").val(el.razonsocial);
				$("#txtDomicilio").val(el.domicilio);
				$("#txtCorreo").val(el.correo);
				$("#txtTelefono").val(el.telefono);
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
});