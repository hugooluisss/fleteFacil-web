<?php
global $objModulo;
switch($objModulo->getId()){
	case 'chome':
		switch($objModulo->getAction()){
			case 'getNotificaciones':
				$db = TBase::conectaDB();
				global $userSesion;

				$sql = "select count(*) as total from notificacion a join notificacionusuario b using(idNotificacion) where leido = 0 and idUsuario = ".$userSesion->getId();
				
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				$row = $rs->fetch_assoc();
				$smarty->assign("json", array("total" => $row['total']));
			break;
			case 'setLeido':
				$notificacion = new TNotificacion($_POST['id']);
				$notificacion->setLeido();
				
				$smarty->assign("json", array("band" => true));
			break;
		}
	break;
}
?>