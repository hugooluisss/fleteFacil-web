<?php /* Smarty version Smarty-3.1.11, created on 2017-10-30 13:51:29
         compiled from "templates/plantillas/modulos/estados/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1784816424590a089679dfa9-77733447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '283ab36ed022f8de806ba5eba9c046cd5bc45491' => 
    array (
      0 => 'templates/plantillas/modulos/estados/lista.tpl',
      1 => 1509393085,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1784816424590a089679dfa9-77733447',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_590a0896858618_03334763',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590a0896858618_03334763')) {function content_590a0896858618_03334763($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblEstados" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
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
						<td style="border-left: 2px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['idEstado'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<?php if ($_smarty_tpl->tpl_vars['row']->value['eliminar']==1){?>
								<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" item="<?php echo $_smarty_tpl->tpl_vars['row']->value['idEstado'];?>
"><i class="fa fa-times"></i></button>
							<?php }?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>