<?php /* Smarty version Smarty-3.1.11, created on 2017-12-06 12:36:16
         compiled from "templates/plantillas/modulos/notificaciones/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6428035755a2838a0d24728-36478273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d40ddc2c461a5578cee930f39e7680993a688eb' => 
    array (
      0 => 'templates/plantillas/modulos/notificaciones/panel.tpl',
      1 => 1495040001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6428035755a2838a0d24728-36478273',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a2838a0e36d66_53352564',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2838a0e36d66_53352564')) {function content_5a2838a0e36d66_53352564($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Notificaciones</h1>
	</div>
</div>

<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Mensaje</th>
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
						<td style="border-left: 3px solid <?php if ($_smarty_tpl->tpl_vars['row']->value['leido']==0){?>red<?php }else{ ?>blue<?php }?>"><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['mensaje'];?>
</td>
						<td style="text-align: right">
							<!--<button orden="<?php echo $_smarty_tpl->tpl_vars['row']->value['idOrden'];?>
" notificacion="<?php echo $_smarty_tpl->tpl_vars['row']->value['idNotificacion'];?>
" class="btn btn-primary"><i class="fa fa-info-circle"></i></button>-->
							<a href="ordenes/<?php echo $_smarty_tpl->tpl_vars['row']->value['idOrden'];?>
/" notificacion="<?php echo $_smarty_tpl->tpl_vars['row']->value['idNotificacion'];?>
" class="btn btn-primary"><i class="fa fa-info-circle"></i></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<input type="hidden" id="notificacionesmodulo" value="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['modulo'];?>
" /><?php }} ?>