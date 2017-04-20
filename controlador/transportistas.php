<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaTransportistas':
		$db = TBase::conectaDB();
		$rs = $db->query("select * from transportista a where a.visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'ctransportistas':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TTransportista();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setRepresentante($_POST['representante']);
				$obj->setEmail($_POST['email']);
				$obj->setCelular($_POST['celular']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TTransportista($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>