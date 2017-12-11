<?php /* Smarty version Smarty-3.1.11, created on 2017-12-11 12:36:35
         compiled from "templates/plantillas/modulos/reportes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1539446065a2ecff9af4902-49926247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1ddcb92f60099fae7bed851d36cdb2131315a31' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/panel.tpl',
      1 => 1513017393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1539446065a2ecff9af4902-49926247',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a2ecff9c0b377_15160430',
  'variables' => 
  array (
    'lista' => 0,
    'situacion' => 0,
    'region' => 0,
    'transportista' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2ecff9c0b377_15160430')) {function content_5a2ecff9c0b377_15160430($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Estado de transportistas</h1>
	</div>
</div>


<div class="box">
	<div class="box-body">
		<div class="panel-group" id="accordion">
			<?php  $_smarty_tpl->tpl_vars["situacion"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["situacion"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["situacion"]->key => $_smarty_tpl->tpl_vars["situacion"]->value){
$_smarty_tpl->tpl_vars["situacion"]->_loop = true;
?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" style="color:<?php echo $_smarty_tpl->tpl_vars['situacion']->value['color'];?>
">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $_smarty_tpl->tpl_vars['situacion']->value['idSituacion'];?>
">
							<?php echo $_smarty_tpl->tpl_vars['situacion']->value['nombre'];?>

						</a>
					</h3>
				</div>
				<div id="collapse<?php echo $_smarty_tpl->tpl_vars['situacion']->value['idSituacion'];?>
" class="panel-collapse collapse">
					<div class="panel-body">
						<?php  $_smarty_tpl->tpl_vars["region"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["region"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['situacion']->value['region']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["region"]->key => $_smarty_tpl->tpl_vars["region"]->value){
$_smarty_tpl->tpl_vars["region"]->_loop = true;
?>
							<h4><?php echo $_smarty_tpl->tpl_vars['region']->value['nombre'];?>
</h4>
									<table id="tblDatos" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>Representante</th>
												<th>Celular</th>
												<th>Email</th>
												<th>Chofer</th>
											</tr>
										</thead>
										<tbody>
											<?php  $_smarty_tpl->tpl_vars["transportista"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["transportista"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['region']->value['transportistas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["transportista"]->key => $_smarty_tpl->tpl_vars["transportista"]->value){
$_smarty_tpl->tpl_vars["transportista"]->_loop = true;
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['transportista']->value['nombre'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['transportista']->value['representante'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['transportista']->value['celular'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['transportista']->value['email'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['transportista']->value['chofer'];?>
</td>
												</tr>
											<?php }
if (!$_smarty_tpl->tpl_vars["transportista"]->_loop) {
?>
												<tr><td colspan="4">Sin transportistas en este estado</td></tr>
											<?php } ?>
										</tbody>
									</table>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div><?php }} ?>