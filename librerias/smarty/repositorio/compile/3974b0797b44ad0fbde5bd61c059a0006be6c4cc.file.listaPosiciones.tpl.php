<?php /* Smarty version Smarty-3.1.11, created on 2017-11-06 11:49:27
         compiled from "templates/plantillas/modulos/ordenes/listaPosiciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:577270127596e3833bf55d2-30967530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3974b0797b44ad0fbde5bd61c059a0006be6c4cc' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/listaPosiciones.tpl',
      1 => 1509384001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '577270127596e3833bf55d2-30967530',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_596e3833c61e02_58724308',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_596e3833c61e02_58724308')) {function content_596e3833c61e02_58724308($_smarty_tpl) {?><table id="tblPosiciones" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Dirección</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr json='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['direccion'];?>
</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>