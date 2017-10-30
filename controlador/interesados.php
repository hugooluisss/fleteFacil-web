<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaInteresados':
		$db = TBase::conectaDB();
		$orden = new TOrden($_POST['orden']);
		$smarty->assign("estado", $orden->estado->getId());
		
		$rs = $db->query("select b.*, a.registro, a.idOrden from interesado a join transportista b using(idTransportista) where idOrden = ".$_POST['orden']." order by registro");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['asignado'] = false;
			if ($orden->estado->getId() == 4){
				$rs2 = $db->query("select idOrden from asignado where idOrden = ".$_POST['orden']." and idTransportista = ".$row['idTransportista']);
				if ($rs2->num_rows > 0) $row['asignado'] = true;
			}
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
};
?>