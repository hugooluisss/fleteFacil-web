<?php
global $conf;

$conf['listaPuntos'] = array(
	'controlador' => 'puntos.php',
	'vista' => 'ordenes/lista.tpl',
	'descripcion' => 'Lista de puntos',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['cpuntos'] = array(
	'controlador' => 'puntos.php',
	'descripcion' => 'Controlador de ordenes',
	'seguridad' => false,
	'capa' => LAYOUT_JSON);
?>