<?php /* Smarty version Smarty-3.1.11, created on 2017-11-20 08:34:15
         compiled from "templates/plantillas/modulos/empresas/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12742892765a12e7e79d5064-57630097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1dd6b5fce0dd38d2e1d39d3560331c3daa4d349' => 
    array (
      0 => 'templates/plantillas/modulos/empresas/lista.tpl',
      1 => 1509393450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12742892765a12e7e79d5064-57630097',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a12e7e7bbc340_73886963',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a12e7e7bbc340_73886963')) {function content_5a12e7e7bbc340_73886963($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Razón Social</th>
					<th>Correo</th>
					<th>Teléfono</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['razonsocial'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['correo'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['telefono'];?>
</td>
						<td style="text-align: right">
							<a href="usuariosempresa/<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
/" class="btn btn-primary btn-xs" title="Usuarios de la empresa"><i class="fa fa-users"></i></a>
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" item="<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>