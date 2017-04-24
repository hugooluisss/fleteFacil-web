<?php
global $objModulo;
switch($objModulo->getId()){
	case 'ordenes':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from usuario where visible = 1 and idTipo = 2 order by nombre");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("usuarios", $datos);
		
		$rs = $db->query("select * from estado");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("estados", $datos);
	break;
	case 'listaOrdenes':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select a.*, b.*, b.nombre as estado from orden a join estado b using(idEstado)");
		$datos = array();
		while($row = $rs->fetch_assoc()){
		
			$sql = "select count(*) as total from interesado where idOrden = ".$row['idOrden'];
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row2 = $rs2->fetch_assoc();
			
			$row['interesados'] = $row2['total'] == ''?0:$row2['total'];
			$row['origen_json'] = json_decode($row['origen']);
			$row['destino_json'] = json_decode($row['destino']);
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cordenes':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TOrden();
				$obj->setId($_POST['id']);
				$obj->usuario = new TUsuario($_POST['usuario']);
				$obj->estado = new TEstado($_POST['estado']);
				
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setRequisitos($_POST['requisitos']);
				$obj->setFechaServicio($_POST['fechaServicio']);
				$obj->setPlazo($_POST['plazo']);
				$obj->setPeso($_POST['peso']);
				$obj->setVolumen($_POST['volumen']);
				$obj->setOrigen($_POST['origen']);
				$obj->setDestino($_POST['destino']);
				$obj->setPresupuesto($_POST['presupuesto']);
				$obj->setPropuestas($_POST['propuestas']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TOrden($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>