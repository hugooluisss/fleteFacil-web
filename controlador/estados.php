<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaEstados':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from estado order by idEstado");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cestados':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TEstado();
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setColor($_POST['color']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TEstado($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>