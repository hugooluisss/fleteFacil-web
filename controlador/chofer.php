<?php
global $objModulo;
switch($objModulo->getId()){
	case 'cchofer':
		switch($objModulo->getAction()){
			case 'getData':
				$db = TBase::conectaDB();
				
				$sql = "select * from chofer a join usuario b using(idUsuario) where idUsuario = ".$_POST['id'];
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				
				$chofer = $rs->fetch_assoc();
				$chofer['transportista'] = array();
				
				$sql = "select * from transportista where idTransportista = ".$chofer['idTransportista'];
				$rs = $db->query($sql) or errorMySQL($db, $sql);
				$chofer['transportista'] = $rs->fetch_assoc();
				
				
				$ruta = "repositorio/usuarios/".$_POST['id'].".jpg";
				$chofer['imagenPerfil'] = file_exists($ruta)?$ruta:" ";
				
				
				
				$sql = "select b.* from empresatransportista a join empresa b using(idEmpresa) where b.visible = true and idTransportista = ".$chofer['idTransportista'];
				$rsEmpresa = $db->query($sql) or errorMySQL($db, $sql);
				$datos = array();
				while($rowEmpresa = $rsEmpresa->fetch_assoc()){
					$sql = "select * from region";
					$rsRegion = $db->query($sql) or errorMySQL($db, $sql);
					
					$regiones = array();
					while($rowRegion = $rsRegion->fetch_assoc()){
						$rs = $db->query("select idTransportista from transportistaregion where idRegion = ".$rowRegion['idRegion']." and idTransportista = ".$chofer['idTransportista']." and idEmpresa = ".$rowEmpresa['idEmpresa']) or errorMySQL($db, $sql);
						
						$rowRegion["checked"] = $rs->num_rows > 0?1:0;
						
						array_push($regiones, $rowRegion);
					}
					$rowEmpresa['regiones'] = $regiones;
					
					array_push($datos, $rowEmpresa);
				}
				$chofer["empresas"] = $datos;
				
				$smarty->assign("json", $chofer);
			break;
			case 'setSituacion':
				$chofer = new TChofer($_POST['chofer']);
				$chofer->setSituacion($_POST['situacion']);
				$smarty->assign("json", array("band" => $chofer->guardar()));
			break;
			case 'setImagenPerfil':
				$chofer = new TChofer($_POST['transportista']);
				if ($chofer->getId() == '')
					$smarty->assign("json", array("band" => false));
				else{
					saveImage($_POST['imagen'], "repositorio/usuarios/".$chofer->getId().".jpg");
					$smarty->assign("json", array("band" => true));
				}
			break;

		}
	break;
}
?>