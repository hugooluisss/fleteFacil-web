<?php
global $objModulo;
switch($objModulo->getId()){
	case 'ordenes':
		$db = TBase::conectaDB();
		
		
		global $userSesion;
		if ($userSesion->getPerfil() == 1)
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
		
		if (!in_array($userSesion->getPerfil(), array(2, 3))){
			$rs = $db->query("select * from empresa where visible = true");
			$datos = array();
			while($row = $rs->fetch_assoc()){
				$rsUser = $db->query("select * from usuario a join usuarioempresa b using(idUsuario) where visible = true and idEmpresa = ".$row['idEmpresa']);
				$row['operadores'] = array();
				while($row2 = $rsUser->fetch_assoc())
					array_push($row['operadores'], $row2);
				
				$row['json'] = json_encode($row);
				
				array_push($datos, $row);
			}
			
			$smarty->assign("empresas", $datos);
		}else{
			$rsUser = $db->query("select * from usuario a join usuarioempresa b using(idUsuario) where visible = true and idEmpresa = ".$userSesion->getEmpresa());
			$operadores = array();
			while($row2 = $rsUser->fetch_assoc())
				array_push($operadores, $row2);
			
			$smarty->assign("empresa", array("idEmpresa" => $userSesion->getEmpresa(), "operadores" => json_encode($operadores)));
		}
		
		$smarty->assign("orden", $_GET['id']);
	break;
	case 'listaOrdenes':
		$db = TBase::conectaDB();
		global $userSesion;
		
		switch($userSesion->getPerfil()){
			case 1:
				$sql = "select a.*, b.*, b.nombre as estado from orden a join estado b using(idEstado) where idEstado in (1, 2, 3, 4, 5)";
			break;
			case 2:
				$sql = "select a.*, b.*, b.nombre as estado from orden a join estado b using(idEstado) where idEstado in (1, 2, 3, 4, 5) and idEmpresa = ".$userSesion->getEmpresa();
			break;
			default:
				$sql = "select a.*, b.*, b.nombre as estado from orden a join estado b using(idEstado) where idEstado in (1, 2, 3, 4, 5) and idUsuario = ".$userSesion->getId();
			break;
		}
		
		$rs = $db->query($sql) or errorMySQL($db, $sql);
			
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
			
			$sql = "select c.nombre as transportista, d.nombre as chofer from ordenchofer a join chofer b using(idUsuario) join usuario d using(idUsuario) join transportista c using(idTransportista);";
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row2 = $rs2->fetch_assoc();
			
			$row['transportista'] = $row2["transportista"];
			$row['chofer'] = $row2["chofer"];
			
			$row['json'] = json_encode($row);
			array_push($datos, $row);
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'listaOrdenesTransportista':
		$db = TBase::conectaDB();
		$sql = "select a.*, b.*, b.nombre as estado 
from orden a join estado b using(idEstado) 
	join empresatransportista c using(idEmpresa)
where idEstado = 2 and c.idTransportista = ".$_POST['transportista']."
	and not idOrden in (select idOrden  from interesado where idTransportista = ".$_POST['transportista'].")
	and idOrden in (select distinct idOrden from transportistaregion join empresatransportista using(idTransportista, idEmpresa) join ordenregion using(idRegion) where idTransportista = ".$_POST['transportista'].")";
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['presupuestoFormat'] = number_format($row['presupuesto'], 0, "", ".");
			
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
			//$row['destino_json'] = json_decode($row['destino']);
			$row['destinos'] = array();
			$sql = "select * from punto where idOrden = ".$row['idOrden'];
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			while($row2 = $rs2->fetch_assoc()){
				$row2['posicion'] = json_decode($row2["json"]);
				array_push($row['destinos'], $row2);
			}
				
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
			$sql = "select * from interesado where idOrden = ".$row['idOrden']." order by registro asc";
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$cont = 0;
			$posicion = 0;
			
			while($row2 = $rs2->fetch_assoc()){
				$cont++;
				if ($row2['idTransportista'] == $_POST['transportista'])
					$posicion = $cont;
			}
			
			$sql = "select * from interesado where idOrden = ".$row['idOrden']." and idTransportista = ".$_POST['transportista']." order by registro asc";
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			$row2 = $rs2->fetch_assoc();
			$row['presupuesto'] = number_format($row2['monto'], 0, "", ".");
			
			$row['interesados'] = $cont;
			$row['posicion'] = $posicion;
			
			$row['origen_json'] = json_decode($row['origen']);
			$row['destinos'] = array();
			$sql = "select * from punto where idOrden = ".$row['idOrden'];
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			while($row2 = $rs2->fetch_assoc()){
				$row2['posicion'] = json_decode($row2["json"]);
				array_push($row['destinos'], $row2);
			}
			
			$row['json'] = json_encode($row);
			
			array_push($datos, $row);
		}
		
		$smarty->assign("json", $datos);
	break;
	case 'listaOrdenesAdjudicadas':
		$db = TBase::conectaDB();
		
		$sql = "select a.*, b.*, b.nombre as estado, d.idUsuario as chofer from orden a join estado b using(idEstado) join asignadotransportista c using(idOrden) left join ordenchofer d using(idOrden) where idEstado in (4, 5) and c.idTransportista = ".$_POST['transportista'];
		$rs = $db->query($sql) or errorMySQL($db, $sql);
		$datos = array();
		while($row = $rs->fetch_assoc()){
			$row['presupuesto'] = number_format($row['presupuestofinal'], 0, "", ".");
			
			$row['origen_json'] = json_decode($row['origen']);
			$row['destinos'] = array();
			$sql = "select * from punto where idOrden = ".$row['idOrden'];
			$rs2 = $db->query($sql) or errorMySQL($db, $sql);
			while($row2 = $rs2->fetch_assoc()){
				$row2['posicion'] = json_decode($row2["json"]);
				array_push($row['destinos'], $row2);
			}
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
	case 'cordenes':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TOrden();
				$obj->setId($_POST['id']);
				$obj->usuario = new TUsuario($_POST['usuario']);
				$obj->estado = new TEstado($_POST['estado']);
				$obj->empresa = new TEmpresa($_POST['empresa']);
				
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setRequisitos($_POST['requisitos']);
				$obj->setFechaServicio($_POST['fechaServicio']);
				$obj->setPlazo($_POST['plazo']);
				$obj->setPeso($_POST['peso']);
				$obj->setVolumen($_POST['volumen']);
				$obj->setOrigen($_POST['origen']);
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
						
						$sql = "select distinct idUsuario from ordenregion join transportistaregion using(idRegion) join chofer c using(idTransportista) join usuario using(idUsuario) where idOrden = ".$obj->getId()." and idPerfil = 4 and idEmpresa = ".$obj->empresa->getId();
						$rs = $db->query($sql) or errorMySQL($db, $sql);
						
						$notificacion = new TNotificacion();
						$notificacion->setOrden($obj->getId());
						
						while($row = $rs->fetch_assoc()){
							if ($_POST['id'] == '') #Es una nueva orden
								$notificacion->setMensaje("Hay una nueva orden para ti, esta es la ".$obj->getFolio().", entra para consultar los detalles");
							else
								$notificacion->setMensaje("Creemos que te puede interesar la orden ".$obj->getFolio());
								
							$notificacion->guardar($row['idUsuario']);
						}
					}
				}
					
				$smarty->assign("json", array("band" => $band, "id" => $obj->getId()));
			break;
			case 'del':
				$obj = new TOrden($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'aceptar':
				$obj = new TOrden($_POST['orden']);
				$band = $obj->aceptar($_POST['transportista'], $_POST['monto']);
				if ($band){
					$transportista = new TTransportista($_POST['transportista']);
					
					$notificacion = new TNotificacion();
					$notificacion->setOrden($obj->getId());
					$notificacion->setMensaje($transportista->getNombre()." se interesó en la orden".$obj->getFolio()."");
					$notificacion->guardar($obj->usuario->getId());
				}
				$smarty->assign("json", array("band" => $band));
			break;
			case 'asignar':
				$obj = new TOrden($_POST['orden']);
				$band = $obj->asignar($_POST['transportista'], $_POST['monto']);
				
				if($band){
					$db = TBase::conectaDB();
						
					$sql = "select distinct idUsuario from ordenregion join transportistaregion using(idRegion) join chofer c using(idTransportista) join usuario using(idUsuario) where idOrden = ".$obj->getId()." and idPerfil = 4 and idEmpresa = ".$obj->empresa->getId();
					$rs = $db->query($sql) or errorMySQL($db, $sql);
					
					$notificacion = new TNotificacion();
					$notificacion->setOrden($obj->getId());
					
					while($row = $rs->fetch_assoc()){
						$notificacion->setMensaje("¡¡¡ Felicidades !!! asignaron la ordende trabajo con folio ".$obj->getFolio()." a tu empresa, consulta los detalles de la orden y asignasela a un chofer");
							
						$notificacion->guardar($row['idUsuario']);
					}
				}
						
				$smarty->assign("json", array("band" => $band));
			break;
			case 'asignarChofer':
				$obj = new TOrden($_POST['orden']);
				$band = $obj->asignarChofer($_POST['chofer']);
				$chofer = new TChofer($_POST['chofer']);
				$chofer->setPatenteCamion($_POST['patenteCamion']);
				$chofer->setPatenteRampla($_POST['patenteRampla']);
				
				$notificacion = new TNotificacion();
				$notificacion->setOrden($obj->getId());
				$notificacion->setMensaje("La carga de la orden ".$obj->getFolio()." te fue asignada, consulta los detalles para iniciar el trabajo");
				$notificacion->guardar($_POST['chofer']);
				
				$smarty->assign("json", array("band" => $band));
			break;

			case 'setEnRuta':
				
			break;
			case 'terminar':
				$obj = new TPunto($_POST['punto']);
				mkdir("repositorio/reportes/punto_".$obj->getId()."/", 0777, true);
				
				for($i = 1 ; $i < 5 ; $i++)
					saveImage($_POST['foto'.$i], "repositorio/ordenesTerminadas/punto_".$obj->getId()."/".date("Ymd_His")."_".$i.".jpg");
				
				$obj->setEstado(1);
				$obj->setComentario($_POST['comentario']);
				$band = $obj->guardar();
				
				$orden = new TOrden($obj->getOrden());
				if ($orden->contarPuntosSinEntregar() <= 0)
					$orden->setTerminar();
				
				
				$result = $band;
				
				if ($band){
					$notificacion = new TNotificacion();
					$notificacion->setOrden($orden->getId());
					$notificacion->setMensaje("Han entregado el servicio en el punto ".$obj->getDireccion()." de la orden ".$orden->getFolio()."");
					$notificacion->guardar($orden->usuario->getId());
					
					$db = TBase::conectaDB();
					$sql = "select * from asignadotransportista where idOrden = ".$obj->getId();
					$rs = $db->query($sql) or errorMySQL($db, $sql);
					$row = $rs->fetch_assoc();
					
					$transportista = new TTransportista($row['idTransportista']);
					$datos = array();
					$datos['transportista.nombre'] = $transportista->getNombre();
					$datos['orden.folio'] = $orden->getFolio();
					$datos['usuario.nombre'] = $orden->usuario->getNombre();
					$datos['orden.comentario'] = utf8_decode($_POST['comentario']);
					
					$datos['sitio.url'] = $ini["sistema"]["url"];
					
					$email = new TMail();
					$email->setTema("Orden terminada");
					$email->addDestino($orden->usuario->getEmail(), utf8_decode($orden->usuario->getNombre()));
					#$email->addDestino("hugooluisss@gmail.com", "Hugo Santiago");
					
					$directorio = "repositorio/reportes/punto_".$obj->getId()."/";
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