$(document).ready(function(){
	getNotificaciones();
	
	setInterval(function(){
		if ($("#notificacionesmodulo").val() != 'notificaciones')
			getNotificaciones();
	}, 5 * 1000);
	
	function getNotificaciones(){
		$.get("chome", {
			"action": "getNotificaciones"
		}, function(data){
			$(".totalAvisos").html(data.total);
			notificaciones = window.localStorage.getItem("notificaciones");
			
			console.log("Notificaciones ", notificaciones);
			if (data.total > 0 && data.total > notificaciones){
				notifyMe({
					titulo: "Nuevas notificaciones",
					cuerpo: "Tienes " + data.total + " notificaciones",
					onclick: function(){
						location.href = "notificaciones";
					}
				});
			}
			
			window.localStorage.setItem("notificaciones", data.total);
		}, "json");
	}
	
	function notifyMe(opciones)  {  
		if  (!("Notification"  in  window))  {   
			alert("Este navegador no soporta notificaciones de escritorio");  
		}else  if  (Notification.permission  ===  "granted")  {
			var  options  =   {
				body:   opciones.cuerpo,
				icon:   "templates/img/logo.png",
				dir :   "ltr"
			};
			var  notification  =  new  Notification(opciones.titulo, options);
			notification.onclick = function(){
				opciones.onclick();
			}
		}else  if  (Notification.permission  !==  'denied')  {
        
			Notification.requestPermission(function (permission)  {
				if  (!('permission'  in  Notification))  {
					Notification.permission  =  permission;
				}
				if  (permission  ===  "granted")  {
					var  options  =   {
						body:   opciones.cuerpo,
						icon:   "url_del_icono.jpg",
						dir :   "ltr"
					};     
					var  notification  =  new  Notification(opciones.titulo, options);
					notification.onclick = function(){
						opciones.onclick();
					}
				}   
			});  
		}
	}
});