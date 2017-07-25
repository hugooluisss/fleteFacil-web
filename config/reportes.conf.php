<?php
global $conf;

$conf['estadoTransportistas'] = array(
	'controlador' => 'reportes.php',
	'vista' => 'reportes/panel.tpl',
	'descripcion' => 'Estados de ordenes',
	'seguridad' => true,
	'jsTemplate' => array('estados.js'),
	'capa' => LAYOUT_DEFECTO);
?>