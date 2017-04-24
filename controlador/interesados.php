<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaInteresados':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select b.*, a.registro from interesado a join transportista b using(idTransportista) where idOrden = ".$_POST['orden']);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
};
?>