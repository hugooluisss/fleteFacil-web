<?php
global $conf;

/* Estados */
$conf['empresas'] = array(
	'controlador' => 'empresas.php',
	'vista' => 'empresas/panel.tpl',
	'descripcion' => 'Empresas',
	'seguridad' => true,
	'js' => array('empresa.class.js'),
	'jsTemplate' => array('empresas.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaEmpresas'] = array(
	'controlador' => 'empresas.php',
	'vista' => 'empresas/lista.tpl',
	'descripcion' => 'Lista de empresas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['cempresas'] = array(
	'controlador' => 'empresas.php',
	'descripcion' => 'Controlador de empresas',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);

?>