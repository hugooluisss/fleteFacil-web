$(document).ready(function(){
	$("form:not(.filter) :input:visible:enabled:first").focus();
	
	$("#frmLogin").validate({
		debug: true,
		rules: {
			txtUsuario: "required",
			txtPass: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TUsuario;
			
			$("[type=submit]").prop("disabled", true);
			
			obj.login($("#txtUsuario").val(), $("#txtPass").val(), {
				after: function(datos){
					$("[type=submit]").prop("disabled", false);
					if (datos.band)
						location.href = "panelPrincipal";
					else{
						alert("Los datos son incorrectos, corrigelos y vuelve a intentarlo");
					}
				}
			});
        }

    });
	
	
	$("#btnSeguimiento").click(function(){
		$("#btnSeguimiento").text("Espera mientras buscamos tu orden").prop("disabled", true);
		
		$.post("cordenes", {
			"folio": prompt("Escribe el número de folio de tu orden", ""),
			"action": "buscarPorFolio"
		}, function(resp){
			if (resp.id == '' || resp.id == null || resp.id == undefined)
				alert("La orden no fue encontrada");
			else{
				$("#winSeguimiento").attr("datos", resp.json).modal();
			}
		}, "json").done(function(){
			$("#btnSeguimiento").text("Sigue tu orden de carga").prop("disabled", false);
		});
	});
});