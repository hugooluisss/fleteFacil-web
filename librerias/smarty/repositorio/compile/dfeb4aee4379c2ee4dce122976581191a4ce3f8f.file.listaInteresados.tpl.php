<?php /* Smarty version Smarty-3.1.11, created on 2017-05-03 12:26:00
         compiled from "templates/plantillas/modulos/ordenes/listaInteresados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:629723564590a08c4c7b621-69299649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfeb4aee4379c2ee4dce122976581191a4ce3f8f' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/listaInteresados.tpl',
      1 => 1493832354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '629723564590a08c4c7b621-69299649',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_590a08c4d0e957_75839932',
  'variables' => 
  array (
    'estado' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590a08c4d0e957_75839932')) {function content_590a08c4d0e957_75839932($_smarty_tpl) {?><table id="tblDatosInteresados" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Desde</th>
			<th>Nombre</th>
			<th>Representante</th>
			<th>Email</th>
			<th>Celular</th>
			<?php if ($_smarty_tpl->tpl_vars['estado']->value!=4){?>
				<th>Asignar</th>
			<?php }else{ ?>
				<th>Asignado</th>
			<?php }?>
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
				<?php if ($_smarty_tpl->tpl_vars['estado']->value!=4){?>
					<td class="text-center">
						<button type="button" class="btn btn-success" action="asignar" title="Asignar orden" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-hand-o-right" aria-hidden="true"></i></button>
					</td>
				<?php }else{ ?>
					<td class="text-center">
						<?php if ($_smarty_tpl->tpl_vars['row']->value['asignado']){?>
							<i class="fa fa-check text-success" aria-hidden="true"></i>
						<?php }?>
					</td>
				<?php }?>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>