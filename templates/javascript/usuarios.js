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
				"required": true,
				"remote": {
					url: "cusuarios",
					type: "post",
					data: {
						"action": "validarEmail",
						"id": function(){
							return $("#id").val();
						}
					}
				}
			},
			txtPass: "required",
			txtClave: "required"
		},
		wrapper: 'span',
		messages: {
			txtEmail: {
				remote: "El correo ya existe para otro, usa otro"
			}
		}, 
		submitHandler: function(form){
		
			var obj = new TUsuario;
			obj.add({
				id: $("#id").val(), 
				nombre: $("#txtNombre").val(), 
				email: $("#txtEmail").val(),
				pass: $("#txtPass").val(),
				perfil: $("#selPerfil").val(),
				empresa: $("#empresa").val(),
				transportista: $("#transportista").val(),
				nit: $("#txtNit").val(),
				celular: $("#txtCelular").val(),
				patentecamion: $("#txtPatenteCamion").val(),
				patenterampla: $("#txtPatenteRampla").val(),
				fn: {
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("No se guardó el registro, ocurrió un error");
						}
					}
				}
			});
        }

    });
		
	function getLista(){
		$.post("listaUsuarios", {
			empresa: $("#empresa").val(),
			transportista: $("#transportista").val()
		}, function(data) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TUsuario;
					obj.del($(this).attr("usuario"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idUsuario);
				$("#txtNombre").val(el.nombre);
				$("#txtEmail").val(el.email);
				$("#txtPass").val(el.pass);
				$("#selPerfil").val(el.idPerfil);
				
				
				$("#txtNit").val(el.nit);
				$("#txtCelular").val(el.celular);
				$("#txtPatenteCamion").val(el.patentecamion);
				$("#txtPatenteRampla").val(el.patenterampla);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblUsuarios").DataTable({
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