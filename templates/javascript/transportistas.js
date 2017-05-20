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
			txtCelular: {
				required: true,
				digits: true
			},
			txtPass: "required"
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
				pass: $("#txtPass").val(),
				regiones: $("#selRegion").val(),
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
				$("#txtPass").val(el.pass);
				$("#selRegion").val(el.regiones);
				$('#panelTabs a[href="#add"]').tab('show');
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
});