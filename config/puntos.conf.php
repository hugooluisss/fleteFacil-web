<?php
global $conf;

$conf['listaPuntos'] = array(
	'controlador' => 'puntos.php',
	//'vista' => 'ordenes/lista.tpl',
	'descripcion' => 'Lista de puntos',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['listaPuntosReporte'] = array(
	'controlador' => 'puntos.php',
	'vista' => 'puntos/lista.tpl',
	'descripcion' => 'Lista de puntos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cpuntos'] = array(
	'controlador' => 'puntos.php',
	'descripcion' => 'Controlador de ordenes',
	'seguridad' => false,
	'capa' => LAYOUT_JSON);
	
$conf['reporteFinal'] = array(
	'controlador' => 'puntos.php',
	'vista' => 'puntos/reporte.tpl',
	'descripcion' => 'Reporte enviado por el usuario al finalizar la orden',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>