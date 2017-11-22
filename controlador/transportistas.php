<?php
global $objModulo;
switch($objModulo->getId()){
	case 'transportistas':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select * from region where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			array_push($datos, $row);
		}
		
		$smarty->assign("regiones", $datos);
		
		$rs = $db->query("select * from empresa where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			array_push($datos, $row);
		}
		
		$smarty->assign("empresas", $datos);
	break;
	case 'listaTransportistas':
		$db = TBase::conectaDB();
		$rs = $db->query("select a.*, b.color, b.nombre as estado, c.razonsocial as empresa from transportista a join situacion b using(idSituacion) join empresa c using(idEmpresa) where a.visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$sql = "select idRegion from transportistaregion where idTransportista = ".$row['idTransportista'];
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row['regiones'] = array();
			while($row2 = $rs2->fetch_assoc())
				array_push($row['regiones'], $row2['idRegion']);
				
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		$smarty->assign("lista", $datos);
	break;
	case 'getEmpresasTransportista':
		$db = TBase::conectaDB();
		
		$sql = "select * from empresatransportista where idTransportista = ".$_POST['id'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$empresas = array();
		while($row = $rs->fetch_assoc())
			array_push($empresas, $row['idEmpresa']);
		
		$smarty->assign("json", $empresas);
	break;
	case 'ctransportistas':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TTransportista();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setRepresentante($_POST['representante']);
				$obj->empresa->setId($_POST['empresa']);
				$obj->setEmail($_POST['email']);
				$obj->setCelular($_POST['celular']);
				$obj->setPass($_POST['pass']);
				
				$band = $obj->guardar();
				if ($band){
					$obj->regiones = array();				
					foreach($_POST['regiones'] as $region){
						$obj->regiones[$region] = new TRegion($region);
					}
					
					$obj->guardarRegiones();
				}
					
				$smarty->assign("json", array("band" => $band));
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
			case 'recuperarPass':
				$db = TBase::conectaDB();
				global $ini;
				$sql = "select idTransportista from transportista where email = upper('".$_POST['correo']."') and visible = true";
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				if ($rs->num_rows >= 1){
					$row = $rs->fetch_assoc();
					$transportista = new TTransportista($row['idTransportista']);
					
					$datos = array();
					$datos['transportista.nombre'] = $transportista->getNombre();
					$datos['transportista.pass'] = $transportista->getPass();
					$datos['transportista.email'] = $transportista->getEmail();
					$datos['sitio.url'] = $ini["sistema"]["url"];
					
					$email = new TMail();
					$email->setTema("Recuperación de contraseña");
					#$email->setOrigen("Grupo Domi", $ini['mail']['user']);
					$email->addDestino($transportista->getEmail(), utf8_decode($transportista->getNombre()));
					
					$email->setBodyHTML(utf8_decode($email->construyeMail(file_get_contents("repositorio/mail/recuperarPass.html"), $datos)));
					
					echo json_encode(array("band" => $email->send(), "mensaje" => "Se trató de enviar"));
				}else
					echo json_encode(array("band" => false));
			break;
			case 'getData':
				$db = TBase::conectaDB();
				
				$sql = "select * from transportista where idTransportista = ".$_POST['id'];
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				$row = $rs->fetch_assoc();
				$ruta = "repositorio/transportistas/".$_POST['id'].".jpg";
				$row['imagenPerfil'] = file_exists($ruta)?$ruta:"";
				
				
				$sql = "select b.* from empresatransportista a join empresa b using(idEmpresa) where b.visible = true and idTransportista = ".$_POST['id'];
				$rsEmpresa = $db->query($sql) or errorMySQL($db, $sql);
				$datos = array();
				while($rowEmpresa = $rsEmpresa->fetch_assoc()){
					$sql = "select * from region";
					$rsRegion = $db->query($sql) or errorMySQL($db, $sql);
					
					$regiones = array();
					while($rowRegion = $rsRegion->fetch_assoc()){
						$rs = $db->query("select idTransportista from transportistaregion where idRegion = ".$rowRegion['idRegion']." and idTransportista = ".$_POST['id']) or errorMySQL($db, $sql);
						
						$rowRegion["checked"] = $rs->num_rows > 0?1:0;
						
						array_push($regiones, $rowRegion);
					}
					$rowEmpresa['regiones'] = $regiones;
					
					array_push($datos, $rowEmpresa);
				}
				$row["empresas"] = $datos;
				$smarty->assign("json", $row);
			break;
			case 'addRegion':
				$transportista = new TTransportista($_POST['transportista']);
				$transportista->regiones[$_POST['region']] = new TRegion($_POST['region']);
				$smarty->assign("json", array("band" => $transportista->guardarRegiones()));
			break;
			case 'delRegion':
				$transportista = new TTransportista($_POST['transportista']);
				
				unset($transportista->regiones[$_POST['region']]);
				
				$smarty->assign("json", array("band" => $transportista->guardarRegiones()));
			break;
			case 'setSituacion':
				$transportista = new TTransportista($_POST['transportista']);
				$transportista->setSituacion($_POST['situacion']);
				$smarty->assign("json", array("band" => $transportista->guardar()));
			break;
			case 'setImagenPerfil':
				$transportista = new TTransportista($_POST['transportista']);
				if ($transportista->getId() == '')
					$smarty->assign("json", array("band" => false));
				else{
					saveImage($_POST['imagen'], "repositorio/transportistas/".$transportista->getId().".jpg");
					$smarty->assign("json", array("band" => true));
				}
			break;
			case 'addEmpresa':
				$db = TBase::conectaDB();
				$sql = "insert into empresatransportista(idEmpresa, idTransportista) values (".$_POST['empresa'].", ".$_POST['id'].")";
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				$smarty->assign("json", array("band" => $rs?true:false));
			break;
			case 'delEmpresa':
				$db = TBase::conectaDB();
				$sql = "delete from empresatransportista where idEmpresa = ".$_POST['empresa']." and idTransportista =  ".$_POST['id'];
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				$smarty->assign("json", array("band" => $rs?true:false));
			break;
		}
	break;
}
?>