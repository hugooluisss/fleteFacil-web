<?php /* Smarty version Smarty-3.1.11, created on 2017-04-20 23:56:29
         compiled from "templates/plantillas/modulos/ordenes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99619919458f976ab3f6839-48047683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b41b2cd4b65a3beb86339193dded29b382ba17c' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/panel.tpl',
      1 => 1492750588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99619919458f976ab3f6839-48047683',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_58f976ab4a86f0_73871707',
  'variables' => 
  array (
    'estados' => 0,
    'item' => 0,
    'usuarios' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f976ab4a86f0_73871707')) {function content_58f976ab4a86f0_73871707($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Estados</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">			
					<div class="form-group">
						<label for="selTipo" class="col-lg-2">Estado</label>
						<div class="col-lg-4">
							<select class="form-control" id="selEstado" name="selEstado">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idEstado'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>

								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="selTipo" class="col-lg-2">Operador</label>
						<div class="col-lg-4">
							<select class="form-control" id="selOperador" name="selOperador">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idUsuario'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>

								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-lg-2">Descripción</label>
						<div class="col-lg-4">
							<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="5"></textarea>
						</div>
						<label for="txtRequisitos" class="col-lg-2">Requisitos</label>
						<div class="col-lg-4">
							<textarea class="form-control" id="txtRequisitos" name="txtRequisitos" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="txtFechaServicio" class="col-lg-2">Fecha</label>
						<div class="col-lg-3">
							<input type="date" id="txtFechaServicio" name="txtFechaServicio" class="form-control" placeholder="Y-m-d" />
						</div>
						<label for="txtPlazo" class="col-lg-2 col-lg-offset-1">Plazo</label>
						<div class="col-lg-3">
							<input type="date" id="txtPlazo" name="txtPlazo" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPeso" class="col-lg-2">Peso</label>
						<div class="col-lg-3">
							<input type="date" id="txtPeso" name="txtPeso" class="form-control" />
						</div>
						<label for="txtVolumen" class="col-lg-2 col-lg-offset-1">Volumen</label>
						<div class="col-lg-3">
							<input type="date" id="txtVolumen" name="txtVolumen" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtOrigen" class="col-lg-2">Origen</label>
						<div class="col-lg-4">
							<input type="text" id="txtOrigen" name="txtOrigen" class="form-control" readonly="true" />
						</div>
						<label for="txtDestino" class="col-lg-2">Destino</label>
						<div class="col-lg-4">
							<input type="text" id="txtDestino" name="txtDestino" class="form-control" readonly="true"/>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ordenes/winMapa.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>