<?php /* Smarty version Smarty-3.1.11, created on 2017-12-10 12:27:27
         compiled from "templates/plantillas/modulos/ordenes/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6459117825a047309b710f4-65043190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccb83fbda49be8284838e579fad0d10480204fd4' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/lista.tpl',
      1 => 1512930445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6459117825a047309b710f4-65043190',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a047309bac637_71931859',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a047309bac637_71931859')) {function content_5a047309bac637_71931859($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Folio</th>
					<th>Estado</th>
					<th>Origen</th>
					<th>Interesados</th>
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
"><?php echo $_smarty_tpl->tpl_vars['row']->value['folio'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['origen_json']->direccion;?>
</td>
						<td class="text-center">
							<button type="button" class="btn btn-warning btn-xs" action="interesados" title="Transportistas interesados" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' data-toggle="modal" data-target="#winInteresados"><?php echo $_smarty_tpl->tpl_vars['row']->value['interesados'];?>
 / <?php echo $_smarty_tpl->tpl_vars['row']->value['propuestas'];?>
</button>
						</td>
						<td class="text-right" style="width: 120px;">
							<button type="button" class="btn btn-success btn-xs" action="puntos" title="Puntos de entrega" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' data-toggle="modal" data-target="#winIntermedios"><i class="fa fa-map-marker"></i></button>
							<?php if ($_smarty_tpl->tpl_vars['row']->value['idEstado']==5){?>
							<button type="button" class="btn btn-success btn-xs" action="reporte" title="Reporte" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' data-toggle="modal" data-target="#winReporte"><i class="fa fa-book"></i></button>
							<?php }?>
							
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#winSeguimiento" action="mapa" title="Consultar transporte" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-map-o"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>