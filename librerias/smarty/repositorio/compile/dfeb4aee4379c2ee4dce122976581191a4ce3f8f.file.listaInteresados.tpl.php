<?php /* Smarty version Smarty-3.1.11, created on 2017-04-24 10:57:07
         compiled from "templates/plantillas/modulos/ordenes/listaInteresados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141821691858fe1ff2b99de5-21729405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfeb4aee4379c2ee4dce122976581191a4ce3f8f' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/listaInteresados.tpl',
      1 => 1493049425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141821691858fe1ff2b99de5-21729405',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_58fe1ff2c13bd5_12025987',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58fe1ff2c13bd5_12025987')) {function content_58fe1ff2c13bd5_12025987($_smarty_tpl) {?><table id="tblDatosInteresados" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Desde</th>
			<th>Nombre</th>
			<th>Representante</th>
			<th>Email</th>
			<th>Celular</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['registro'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['representante'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['celular'];?>
</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>