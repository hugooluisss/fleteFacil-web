<?php
global $conf;

$conf['transportistas'] = array(
	'controlador' => 'transportistas.php',
	'vista' => 'transportistas/panel.tpl',
	'descripcion' => 'Administración de transportistas',
	'seguridad' => true,
	'js' => array('transportista.class.js'),
	'jsTemplate' => array('transportistas.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaTransportistas'] = array(
	'controlador' => 'transportistas.php',
	'vista' => 'transportistas/lista.tpl',
	'descripcion' => 'Lista de transportistas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ctransportistas'] = array(
	'controlador' => 'transportistas.php',
	'descripcion' => 'Controlador de transportistasx',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['getEmpresasTransportista'] = array(
	'controlador' => 'transportistas.php',
	#'vista' => 'transportistas/lista.tpl',
	'descripcion' => 'Lista de empresas relacionadas con un transportista',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>