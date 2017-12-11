<?php /* Smarty version Smarty-3.1.11, created on 2017-12-11 10:07:46
         compiled from "templates/plantillas/modulos/puntos/reporte.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7289975505a2ead2f81bf25-86988753%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9393972e82622419435cbc018be0b6c732ad13ca' => 
    array (
      0 => 'templates/plantillas/modulos/puntos/reporte.tpl',
      1 => 1513008457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7289975505a2ead2f81bf25-86988753',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a2ead2f8cbfd5_49715038',
  'variables' => 
  array (
    'fotos' => 0,
    'row' => 0,
    'comentarios' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2ead2f8cbfd5_49715038')) {function content_5a2ead2f8cbfd5_49715038($_smarty_tpl) {?><div class="row">
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
<br />
<div class="row">
	<div class="col-xs-12"><b>Comentario</b></div>
</div>
<div class="row">
	<div class="col-xs-12"><?php echo $_smarty_tpl->tpl_vars['comentarios']->value;?>
</div>
</div><?php }} ?>