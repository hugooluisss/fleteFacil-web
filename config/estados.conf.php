<?php
global $conf;

/* Estados */
$conf['estados'] = array(
	'controlador' => 'estados.php',
	'vista' => 'estados/panel.tpl',
	'descripcion' => 'Estados de ordenes',
	'seguridad' => true,
	'js' => array('estado.class.js'),
	'jsTemplate' => array('estados.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaEstados'] = array(
	'controlador' => 'estados.php',
	'vista' => 'estados/lista.tpl',
	'descripcion' => 'Lista de estados',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['cestados'] = array(
	'controlador' => 'estados.php',
	'descripcion' => 'Controlador de estados',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);

?>