<?php
global $conf;

/* Estados */
$conf['regiones'] = array(
	'controlador' => 'regiones.php',
	'vista' => 'regiones/panel.tpl',
	'descripcion' => 'regiones',
	'seguridad' => true,
	'js' => array('region.class.js'),
	'jsTemplate' => array('regiones.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaRegiones'] = array(
	'controlador' => 'regiones.php',
	'vista' => 'regiones/lista.tpl',
	'descripcion' => 'Lista de regiones',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['cregiones'] = array(
	'controlador' => 'regiones.php',
	'descripcion' => 'Controlador de regiones',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);

?>