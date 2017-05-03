<?php
global $conf;

$conf['ordenes'] = array(
	'controlador' => 'ordenes.php',
	'vista' => 'ordenes/panel.tpl',
	'descripcion' => 'Ordenes de trabajo',
	'seguridad' => true,
	'js' => array('orden.class.js', 'transportista.class.js'),
	'jsTemplate' => array('ordenes.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaOrdenes'] = array(
	'controlador' => 'ordenes.php',
	'vista' => 'ordenes/lista.tpl',
	'descripcion' => 'Lista de ordenes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaOrdenesTransportista'] = array(
	'controlador' => 'ordenes.php',
	'vista' => 'ordenes/lista.tpl',
	'descripcion' => 'Lista de ordenesTransportista',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['listaOrdenesAdjudicadas'] = array(
	'controlador' => 'ordenes.php',
	'vista' => 'ordenes/lista.tpl',
	'descripcion' => 'Lista de ordenesTransportista',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);

$conf['cordenes'] = array(
	'controlador' => 'ordenes.php',
	'descripcion' => 'Controlador de ordenes',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);

?>