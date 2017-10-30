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
		
		global $userSesion;
		if ($userSesion->getIdTipo() == 1)
			$rs = $db->query("select * from estado");
		else
			$rs = $db->query("select * from estado where idEstado not in (6, 7)");
			
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("estados", $datos);
		$rs = $db->query("select * from region where visible = true");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("regiones", $datos);
		$smarty->assign("orden", $_GET['id']);
	break;
	case 'listaOrdenes':
		$db = TBase::conectaDB();
		global $userSesion;
		if ($userSesion->getIdTipo() == 1)
			$rs = $db->query("select a.*, b.*, b.nombre as estado from orden a join estado b using(idEstado) where idEstado in (1, 2, 3, 4, 5)");
		else
			$rs = $db->query("select a.*, b.*, b.nombre as estado from orden a join estado b using(idEstado) where idEstado in (1, 2, 3, 4, 5) and idUsuario = ".$userSesion->getId());
			
		$datos = array();
		while($row = $rs->fetch_assoc()){
			if (isset($_POST['movil']))
				$row['presupuesto'] = number_format($row['presupuesto'], 0, "", ".");
				
			$sql = "select count(*) as total from interesado where idOrden = ".$row['idOrden'];
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row2 = $rs2->fetch_assoc();
			
			$row['interesados'] = $row2['total'] == ''?0:$row2['total'];
			$row['origen_json'] = json_decode($row['origen']);
			$row['destino_json'] = json_decode($row['destino']);
			
			$sql = "select idRegion from ordenregion where idOrden = ".$row['idOrden'];
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row['regiones'] = array();
			while($row2 = $rs2->fetch_assoc())
				array_push($row['regiones'], $row2['idRegion']);
			
			$row['json'] = json_encode($row);
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'listaOrdenesTransportista':
		$db = TBase::conectaDB();
		
		$rs = $db->query("select a.*, b.*, b.nombre as estado from orden a join estado b using(idEstado) where idEstado = 2 and idOrden not in (select idOrden  from interesado where idTransportista = ".$_POST['transportista'].") and idOrden in (select idOrden from transportistaregion join ordenregion using(idRegion) where idTransportista = ".$_POST['transportista'].")");
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['presupuesto'] = number_format($row['presupuesto'], 0, "", ".");
			
			/*
			$sql = "select count(*) as total from interesado where idOrden = ".$row['idOrden'];
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row2 = $rs2->fetch_assoc();
			
			$row['interesados'] = $row2['total'] == ''?0:$row2['total'];
			*/
			$sql = "select * from interesado where idOrden = ".$row['idOrden']." order by registro desc";
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$cont = 0;
			$posicion = 0;
			while($row2 = $rs2->fetch_assoc()){
				$cont++;
				if ($row2['idTransportista'] == $_POST['transportista'])
					$posicion = $cont;
			}
			
			$row['interesados'] = $cont;
			$row['posicion'] = $posicion;
			
			$row['origen_json'] = json_decode($row['origen']);
			$row['destino_json'] = json_decode($row['destino']);
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("json", $datos);
	break;
	case 'listaOrdenesPostuladas':
		$db = TBase::conectaDB();
		
		$sql = "select a.*, b.*, b.nombre as estado from orden a join estado b using(idEstado) join interesado c using(idOrden) where idEstado in (2, 3) and c.idTransportista = ".$_POST['transportista'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['presupuesto'] = number_format($row['presupuesto'], 0, "", ".");
			
			$sql = "select * from interesado where idOrden = ".$row['idOrden']." order by registro asc";
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$cont = 0;
			$posicion = 0;
			while($row2 = $rs2->fetch_assoc()){
				$cont++;
				if ($row2['idTransportista'] == $_POST['transportista'])
					$posicion = $cont;
			}
			
			$row['interesados'] = $cont;
			$row['posicion'] = $posicion;
			
			$row['origen_json'] = json_decode($row['origen']);
			$row['destino_json'] = json_decode($row['destino']);
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("json", $datos);
	break;
	case 'listaOrdenesAdjudicadas':
		$db = TBase::conectaDB();
		
		$sql = "select a.*, b.*, b.nombre as estado from orden a join estado b using(idEstado) join asignado c using(idOrden) where idEstado in (4, 5) and c.idTransportista = ".$_POST['transportista'];
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
	case 'listaPosicionesOrden':
		$db = TBase::conectaDB();
		
		$sql = "select * from posicion where idOrden = ".$_POST['orden'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'reporteFinal':
		$directorio = "repositorio/ordenesTerminadas/orden_".$_POST['idOrden']."/";
		$gestor_dir = opendir($directorio);
		while (false !== ($nombre_fichero = readdir($gestor_dir))) {
			if (!in_array($nombre_fichero, array(".", "..")))
				$ficheros[] = $directorio.$nombre_fichero;
		}
		
		$smarty->assign("fotos", $ficheros);
		
		$db = TBase::conectaDB();
		
		$sql = "select comentarios from asignado where idOrden = ".$_POST['idOrden'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$row = $rs->fetch_assoc();
		$smarty->assign("comentarios", $row['comentarios']);
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
				$obj->regiones = array();
				
				foreach($_POST['regiones'] as $region){
					array_push($obj->regiones, new TRegion($region));
				}
				
				$band = $obj->guardar();
				if ($band){
					$obj->guardarRegiones();
					
					if ($obj->estado->getId() == 2){ #publicada
						$db = TBase::conectaDB();
						$sql = "select distinct idTransportista from ordenregion join transportistaregion using(idRegion) where idOrden = ".$obj->getId();
						$rs = $db->query($sql) or errorMySQL($db, $sql);
						
						$notificacion = new TNotificacion();
						$notificacion->setOrden($obj->getId());
						
						if ($_POST['id'] == '') #Es una nueva orden
							$notificacion->setMensaje("Hay una nueva orden para ti, esta es la ".$obj->getFolio().", entra para consultar los detalles");
						else
							$notificacion->setMensaje("Creemos que te puede interesar la orden ".$obj->getFolio());
							
						while($row = $rs->fetch_assoc())
							$notificacion->guardar($row['idTransportista'], 'T');
					}
				}
					
				$smarty->assign("json", array("band" => $band));
			break;
			case 'del':
				$obj = new TOrden($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'aceptar':
				$obj = new TOrden($_POST['orden']);
				$band = $obj->aceptar($_POST['transportista']);
				if ($band){
					$transportista = new TTransportista($_POST['transportista']);
					
					$notificacion = new TNotificacion();
					$notificacion->setOrden($obj->getId());
					$notificacion->setMensaje($transportista->getNombre()." se interesó en la orden".$obj->getFolio()."");
					$notificacion->guardar($obj->usuario->getId(), 'U');
				}
				$smarty->assign("json", array("band" => $band));
			break;
			case 'asignar':
				$obj = new TOrden($_POST['orden']);
				$band = $obj->asignar($_POST['transportista']);
				
				if($band){
					$notificacion = new TNotificacion();
					$notificacion->setOrden($obj->getId());
					$notificacion->setMensaje("¡¡¡ Felicidades !!! te asignaron la orden de trabajo con folio ".$obj->getFolio().", consulta los detalles de la orden y prepárate");
					$notificacion->guardar($_POST['transportista'], 'T');
				}
						
				$smarty->assign("json", array("band" => $band));
			break;
			case 'terminar':
				$obj = new TOrden($_POST['orden']);
				mkdir("repositorio/ordenesTerminadas/orden_".$obj->getId()."/", 0777, true);
				
				for($i = 1 ; $i < 5 ; $i++)
					saveImage($_POST['foto'.$i], "repositorio/ordenesTerminadas/orden_".$obj->getId()."/".date("Ymd_His")."_".$i.".jpg");
					
				$band = $obj->terminar($_POST['comentario']);
				$result = false;
				if ($band){
					$notificacion = new TNotificacion();
					$notificacion->setOrden($obj->getId());
					$notificacion->setMensaje("Han entregado la orden ".$obj->getFolio()."");
					$notificacion->guardar($obj->usuario->getId(), 'U');
					
					$db = TBase::conectaDB();
					$sql = "select * from asignado where idOrden = ".$obj->getId();
					$rs = $db->query($sql) or errorMySQL($db, $sql);
					$row = $rs->fetch_assoc();
					
					$transportista = new TTransportista($row['idTransportista']);
					$datos = array();
					$datos['transportista.nombre'] = $transportista->getNombre();
					$datos['orden.folio'] = $obj->getFolio();
					$datos['usuario.nombre'] = $obj->usuario->getNombre();
					$datos['orden.comentario'] = utf8_decode($_POST['comentario']);
					
					$datos['sitio.url'] = $ini["sistema"]["url"];
					
					$email = new TMail();
					$email->setTema("Orden terminada");
					$email->addDestino($obj->usuario->getEmail(), utf8_decode($obj->usuario->getNombre()));
					#$email->addDestino("hugooluisss@gmail.com", "Hugo Santiago");
					
					$directorio = "repositorio/ordenesTerminadas/orden_".$obj->getId()."/";
					$gestor_dir = opendir($directorio);
					//$email->adjuntos = array();
					$s = "";
					while (false !== ($nombre_fichero = readdir($gestor_dir))){
						if (!in_array($nombre_fichero, array(".", ".."))){
							$email->adjuntar($directorio.$nombre_fichero);
							array_push($email->adjuntos, array("nombre" => $nombre_fichero, "ruta" => $directorio.$nombre_fichero));
							#$s .= '<img src="'.$ini["sistema"]["url"].$directorio.$nombre_fichero.'" />';
						}
					}
					closedir($gestor_dir);
					
					$email->setBodyHTML(utf8_decode($email->construyeMail(file_get_contents("repositorio/mail/OrdenTerminada.html"), $datos)));
					$result = $email->send();	
				}
				
				$smarty->assign("json", array("band" => $band, "correo" => $result));
			break;
			case 'logPosicion':
				$orden = new TOrden($_POST['orden']);
				
				$smarty->assign("json", array("band" => $orden->addPosicion($_POST['latitude'], $_POST['longitude'])));
			break;
			case 'buscarPorFolio':
				$db = TBase::conectaDB();
		
				$sql = "select * from orden where folio = '".$_POST['folio']."'";
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				$row = $rs->fetch_assoc();
				
				$row['origen_json'] = json_decode($row['origen']);
				$row['destino_json'] = json_decode($row['destino']);
				
				$smarty->assign("json", array("id" => $row['idOrden'], "json" => json_encode($row)));
			break;
		}
	break;
};
?>