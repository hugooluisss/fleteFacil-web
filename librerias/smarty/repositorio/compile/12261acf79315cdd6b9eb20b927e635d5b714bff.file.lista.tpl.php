<?php /* Smarty version Smarty-3.1.11, created on 2017-10-31 08:50:47
         compiled from "templates/plantillas/modulos/transportistas/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:224740053590a1127017f46-34395958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12261acf79315cdd6b9eb20b927e635d5b714bff' => 
    array (
      0 => 'templates/plantillas/modulos/transportistas/lista.tpl',
      1 => 1509461444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224740053590a1127017f46-34395958',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_590a11271402e2_08855486',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590a11271402e2_08855486')) {function content_590a11271402e2_08855486($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Representante</th>
					<th>Empresa</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr title="<?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
">
						<td style="border-left: 3px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['idTransportista'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['representante'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['empresa'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary btn-xs" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idTransportista'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>