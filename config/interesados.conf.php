<?php
global $conf;

$conf['listaInteresados'] = array(
	'controlador' => 'interesados.php',
	'vista' => 'ordenes/listaInteresados.tpl',
	'descripcion' => 'Lista de interesados',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>