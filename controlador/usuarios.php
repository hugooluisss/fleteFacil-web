<?php
global $objModulo;
switch($objModulo->getId()){
	case 'admonUsuarios':
	case 'usuariosempresa':
		$db = TBase::conectaDB();
		global $sesion;
		
		if ($objModulo->getId() == 'admonUsuarios')
			$sql = "select * from perfil where rol = 1";
		else{
			$sql = "select * from perfil where rol = 2";
			$smarty->assign("empresa", new TEmpresa($_GET['id']));
		}
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$datos[$row['idPerfil']] = $row['nombre'];
		}
		
		$smarty->assign("perfiles", $datos);
	break;
	case 'listaUsuarios':
		$db = TBase::conectaDB();
		global $sesion;
		
		$sql = "select * from usuario a where a.visible = true";
		if (isset($_POST['empresa']))
			$sql = "select * from usuario a join usuarioempresa b using(idUsuario) where a.visible = true and idEmpresa = ".$_POST['empresa'];
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'notificaciones': case 'notificacionespanel':
		$db = TBase::conectaDB();
		global $userSesion;
		
		$sql = "select * from notificacion a join notificacionusuario b using(idNotificacion) where idUsuario = ".$userSesion->getId()." order by fecha desc";
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
		$smarty->assign("json", $datos);
	break;
	case 'cusuarios':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TUsuario();
				
				$rs = $db->query("select idUsuario from usuario where email = '".$_POST['clave']."'");
				
				if ($rs->num_rows > 0){ #si es que encontró la clave
					$row = $rs->fetch_assoc();
					if ($row["idUsuario"] <> $_POST['id']){
						$obj->setId($row['idUsuario']);
						echo json_encode(array("band" => false, "mensaje" => "El correo ya se encuentra registrado con el usuario ".$obj->getNombreCompleto()));
						exit(1);
					}
				}

				$obj = new TUsuario();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setEmail($_POST['email']);
				$obj->setPass($_POST['pass']);
				$obj->setPerfil($_POST['perfil']);
				$band = $obj->guardar();
				
				if($band){
					if (isset($_POST['empresa']) and $_POST['id'] == ''){
						$empresa = new TEmpresa($_POST['empresa']);
						$empresa->addUsuario($obj->getId());
					}
				}
				
				$smarty->assign("json", array("band" => $band));
			break;
			case 'del':
				$obj = new TUsuario($_POST['usuario']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'saveDatosPersonales':
				global $sesion;
				
				$obj = new TUsuario();
				$obj->setId($sesion['usuario']);
				$obj->setNombre($_POST['nombre']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
			case 'savePassword':
				global $sesion;
				
				$obj = new TUsuario();
				$obj->setId($sesion['usuario']);
				$obj->setPass($_POST['pass']);
				
				$smarty->assign("json", array("band" => $obj->guardar()));
			break;
		}
	break;
}
?>