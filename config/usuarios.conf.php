<?php
global $conf;

$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cusuarios'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => 'Controlador de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['notificaciones'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'notificaciones/panel.tpl',
	'descripcion' => 'Lista de avisos',
	'seguridad' => true,
	#'js' => array('estado.class.js'),
	'jsTemplate' => array('notificaciones.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['notificacionespanel'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'notificaciones/panel.tpl',
	'descripcion' => 'Lista de notificaciones',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
	
$conf['usuariosempresa'] = $conf['admonUsuarios'];
?>