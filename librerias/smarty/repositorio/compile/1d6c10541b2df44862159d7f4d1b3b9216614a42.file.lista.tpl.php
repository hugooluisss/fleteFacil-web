<?php /* Smarty version Smarty-3.1.11, created on 2017-12-11 10:03:08
         compiled from "templates/plantillas/modulos/puntos/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19786185035a2e9a6b4ab907-34519102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d6c10541b2df44862159d7f4d1b3b9216614a42' => 
    array (
      0 => 'templates/plantillas/modulos/puntos/lista.tpl',
      1 => 1513007685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19786185035a2e9a6b4ab907-34519102',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a2e9a6b5b8218_67771250',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'chofer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2e9a6b5b8218_67771250')) {function content_5a2e9a6b5b8218_67771250($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Destino</th>
					<th>Transporte</th>
					<th>Estado</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['direccion'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['chofer']->value;?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['row']->value['estado']==0){?>Sin entregar<?php }else{ ?>Entregado<?php }?></td>
						<td class="text-right">
							<button type="button" class="btn btn-success btn-xs" action="detalle" title="Reporte" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json_data'];?>
'><i class="fa fa-file-text"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>