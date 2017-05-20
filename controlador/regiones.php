<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaRegiones':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from region where visible = true order by idRegion");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cregiones':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TRegion();
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TRegion($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>