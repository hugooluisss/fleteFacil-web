<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaPuntos': case 'listaPuntosReporte':
		$db = TBase::conectaDB();
		
		$sql = "select * from punto where idOrden = ".$_POST['orden'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json_data'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("json", $datos);
		$smarty->assign("lista", $datos);
		$orden = new TOrden($_POST['orden']);
		
		$smarty->assign("chofer", $orden->getChofer());
	break;
	case 'reporteFinal':
		$directorio = "repositorio/reportes/punto_".$_POST['punto']."/";
		$ficheros = array();
		
		if (is_dir($directorio)){
			$gestor_dir = opendir($directorio);
			
			while (false !== ($nombre_fichero = readdir($gestor_dir))) {
				if (!in_array($nombre_fichero, array(".", "..")))
					$ficheros[] = $directorio.$nombre_fichero;
			}
			echo 'asdf';
		}
		$smarty->assign("fotos", $ficheros);
		
		$db = TBase::conectaDB();
		
		$sql = "select * from punto where idPunto = ".$_POST['punto'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$row = $rs->fetch_assoc();
		
		$smarty->assign("comentarios", $row['comentario']);
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