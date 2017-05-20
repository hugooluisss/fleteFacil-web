$(document).ready(function(){
	$("[notificacion]").click(function(){
		var el = $(this);
		$.post("chome", {
			"id": el.attr("notificacion"),
			"action": "setLeido"
		}, function(){
			//location.href = "ordenes/" + el.attr("orden") + "/";
		});
	});
	
	setInterval(function(){
		$.get("notificacionespanel", function(resp){
			$("section.content").html(resp);
		});
	}, 5 * 1000);
});