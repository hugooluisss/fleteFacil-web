<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaPuntos':
		$db = TBase::conectaDB();
		
		$sql = "select * from punto where idOrden = ".$_POST['orden'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json_data'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("json", $datos);
	break;
	case 'cpuntos':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TPunto();
				$obj->setId($_POST['id']);
				$obj->setOrden($_POST['orden']);
				$obj->setDireccion($_POST['direccion']);
				$obj->setJSON(json_encode(array("latitude" => $_POST['latitude'], "longitude" => $_POST['longitude'])));
				
				$smarty->assign("json", array("band" => $obj->guardar(), "id" => $obj->getId()));
			break;
			case 'del':
				$obj = new TPunto($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>