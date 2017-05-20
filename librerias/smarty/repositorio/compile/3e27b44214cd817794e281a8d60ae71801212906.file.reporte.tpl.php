<?php /* Smarty version Smarty-3.1.11, created on 2017-05-17 08:47:18
         compiled from "templates/plantillas/modulos/ordenes/reporte.tpl" */ ?>
<?php /*%%SmartyHeaderCode:656170495591c51c68434f6-55120619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e27b44214cd817794e281a8d60ae71801212906' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/reporte.tpl',
      1 => 1495028835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '656170495591c51c68434f6-55120619',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_591c51c686d473_13079055',
  'variables' => 
  array (
    'fotos' => 0,
    'row' => 0,
    'comentarios' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591c51c686d473_13079055')) {function content_591c51c686d473_13079055($_smarty_tpl) {?><hr />
<h1 class="text-center">Reporte final</h1>
<br />
<div class="row">
	<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fotos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
		<div class="col-xs-3 text-center">
			<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
" />
		</div>
	<?php } ?>
</div>
<br /><br /><br />
<div class="row">
	<div class="col-xs-12"><b>Comentario</b></div>
</div>
<div class="row">
	<div class="col-xs-12"><?php echo $_smarty_tpl->tpl_vars['comentarios']->value;?>
</div>
</div><?php }} ?>