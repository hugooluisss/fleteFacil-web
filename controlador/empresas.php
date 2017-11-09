<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaEmpresas':
		$db = TBase::conectaDB();
		
		$sql = "select * from empresa where visible = true";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cempresas':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TEmpresa();
				$obj->setId($_POST['id']);
				$obj->setRazonSocial($_POST['razonSocial']);
				$obj->setDomicilio($_POST['domicilio']);
				$obj->setCorreo($_POST['correo']);
				$obj->setTelefono($_POST['telefono']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TEmpresa($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>