<?php /* Smarty version Smarty-3.1.11, created on 2017-12-11 13:43:52
         compiled from "templates/plantillas/modulos/inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18260477015a0c6dc705d980-04078925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dd97137c284ab0e063fd62794520df2227c9f0c' => 
    array (
      0 => 'templates/plantillas/modulos/inicio.tpl',
      1 => 1513021431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18260477015a0c6dc705d980-04078925',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a0c6dc70dcc62_50800515',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0c6dc70dcc62_50800515')) {function content_5a0c6dc70dcc62_50800515($_smarty_tpl) {?><div class="box">
	<div class="box-header">
		<h3>Bienvenido </h3>
	</div>
	<div class="box-body">
		<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getNombre();?>

	</div>
</div>
<!--
<div class="box">
	<div class="row">
		<div class="col-sm-6">
			<h4>Moviles hoy</h4>
			<div class="row">
				<div class="col-xs-4 text-center">
					<h2 class="text-primary text-center">36</h2>
					<span>totales</span>
				</div>
				<div class="col-xs-4 text-center">
					<h2 class="text-primary text-center">36</h2>
					<span>En ruta</span>
				</div>
				<div class="col-xs-4 text-center">
					<h2 class="text-primary">36</h2>
					<span>Finalizados</span>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<h4>Entregas hoy</h4>
		</div>
	</div>
</div>
--><?php }} ?>