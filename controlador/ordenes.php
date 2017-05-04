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
			$row['presupuesto'] = number_format($row['presupuesto'], 0, "", ".");
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
	case 'listaOrdenesTransportista':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select a.*, b.*, b.nombre as estado from orden a join estado b using(idEstado) where idEstado = 2 and idOrden not in (select idOrden  from interesado where idTransportista = ".$_POST['transportista'].")");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['presupuesto'] = number_format($row['presupuesto'], 0, "", ".");
			
			$sql = "select count(*) as total from interesado where idOrden = ".$row['idOrden'];
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row2 = $rs2->fetch_assoc();
			
			$row['interesados'] = $row2['total'] == ''?0:$row2['total'];
			$row['origen_json'] = json_decode($row['origen']);
			$row['destino_json'] = json_decode($row['destino']);
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("json", $datos);
	break;
	case 'listaOrdenesAdjudicadas':
		$db = TBase::conectaDB();
		
		$sql = "select a.*, b.*, b.nombre as estado from orden a join estado b using(idEstado) join asignado c using(idOrden) where idEstado = 4 and c.idTransportista = ".$_POST['transportista'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['presupuesto'] = number_format($row['presupuesto'], 0, "", ".");
			
			$row['origen_json'] = json_decode($row['origen']);
			$row['destino_json'] = json_decode($row['destino']);
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("json", $datos);
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
				$obj->setFolio($_POST['folio']);
				$obj->setHora($_POST['hora']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TOrden($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'aceptar':
				$obj = new TOrden($_POST['orden']);
				$smarty->assign("json", array("band" => $obj->aceptar($_POST['transportista'])));
			break;
			case 'asignar':
				$obj = new TOrden($_POST['orden']);
				$smarty->assign("json", array("band" => $obj->asignar($_POST['transportista'])));
			break;
			case 'terminar':
				$obj = new TOrden($_POST['orden']);
				$smarty->assign("json", array("band" => $obj->terminar($_POST['comentario'])));
			break;
		}
	break;
};
?>