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
				$obj->setPass($_POST['pass']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TTransportista($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'login':
				$db = TBase::conectaDB();
				$sql = "select idTransportista, pass from transportista where upper(email) = upper('".$_POST['usuario']."') and visible = true";
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				$result = array('band' => false, 'mensaje' => 'Error al consultar los datos');
				if($rs->num_rows < 1)
					$result = array('band' => false, 'mensaje' => 'El usuario no existe');
				else{
					$row = $rs->fetch_assoc();
					if(strtoupper($row['pass']) <> strtoupper($_POST['pass'])){
						$result = array('band' => false, 'mensaje' => 'Contraseña inválida');
					}else{
						$obj = new TTransportista($row['idTransportista']);
						if ($obj->getId() == '')
							$result = array('band' => false, 'mensaje' => 'Acceso denegado');
						else
							$result = array('band' => true, 'transportista' => $row['idTransportista']);
					}
				}
				$smarty->assign("json", $result);
			break;
		}
	break;
}
?>