<?php /* Smarty version Smarty-3.1.11, created on 2017-12-11 09:43:18
         compiled from "templates/plantillas/modulos/ordenes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17360874265a04730740fc78-06788376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b41b2cd4b65a3beb86339193dded29b382ba17c' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/panel.tpl',
      1 => 1513006996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17360874265a04730740fc78-06788376',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a0473074949a4_85235519',
  'variables' => 
  array (
    'estados' => 0,
    'item' => 0,
    'PAGE' => 0,
    'empresas' => 0,
    'empresa' => 0,
    'start' => 0,
    'cont' => 0,
    'regiones' => 0,
    'orden' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0473074949a4_85235519')) {function content_5a0473074949a4_85235519($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Ordenes de transporte</h1>
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
						<label for="txtFolio" class="col-lg-2">Folio</label>
						<div class="col-lg-4">
							<input type="text" id="txtFolio" name="txtFolio" class="form-control" placeholder="" />
						</div>
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
						<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()!=2){?>
						<label for="selEmpresa" class="col-lg-2">Empresa</label>
						<div class="col-lg-4">
							<select class="form-control" id="selEmpresa" name="selEmpresa">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['empresas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idEmpresa'];?>
" json='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['operadores']);?>
'><?php echo $_smarty_tpl->tpl_vars['item']->value['razonsocial'];?>

								<?php } ?>
							</select>
						</div>
						<?php }else{ ?>
							<input type="hidden" id="selEmpresa" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['idEmpresa'];?>
" json='<?php echo $_smarty_tpl->tpl_vars['empresa']->value['operadores'];?>
'/>
						<?php }?>
						<label for="selTipo" class="col-lg-2">Operador</label>
						<div class="col-lg-4">
							<select class="form-control" id="selOperador" name="selOperador">
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
						<label for="txtFechaServicio" class="col-lg-2">Fecha cargo</label>
						<div class="col-lg-3">
							<input type="date" id="txtFechaServicio" name="txtFechaServicio" class="form-control" placeholder="Y-m-d" />
						</div>
						<label for="txtHora" class="col-lg-2 col-lg-offset-1">Hora presentación</label>
						<div class="col-lg-3">
							<input type="time" id="txtHora" name="txtHora" class="form-control" placeholder="H:m" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtPlazo" class="col-lg-2">Plazo de pago</label>
						<div class="col-lg-3">
							<input type="text" id="txtPlazo" name="txtPlazo" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPeso" class="col-lg-2">Peso (Ton)</label>
						<div class="col-lg-3">
							<input type="text" id="txtPeso" name="txtPeso" class="form-control" />
						</div>
						<label for="txtVolumen" class="col-lg-2 col-lg-offset-1">Volumen</label>
						<div class="col-lg-3">
							<input type="text" id="txtVolumen" name="txtVolumen" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPresupuesto" class="col-lg-2">Presupuesto disponible</label>
						<div class="col-lg-3">
							<input type="text" id="txtPresupuesto" name="txtPresupuesto" class="form-control text-right" />
						</div>
						<label for="selPropuestas" class="col-lg-offset-1 col-lg-2">Propuestas</label>
						<div class="col-lg-2">
							<select class="form-control" id="selPropuestas" name="selPropuestas">
								<?php $_smarty_tpl->tpl_vars['cont'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['cont']->step = 1;$_smarty_tpl->tpl_vars['cont']->total = (int)ceil(($_smarty_tpl->tpl_vars['cont']->step > 0 ? 25+1 - ($_smarty_tpl->tpl_vars['start']->value) : $_smarty_tpl->tpl_vars['start']->value-(25)+1)/abs($_smarty_tpl->tpl_vars['cont']->step));
if ($_smarty_tpl->tpl_vars['cont']->total > 0){
for ($_smarty_tpl->tpl_vars['cont']->value = $_smarty_tpl->tpl_vars['start']->value, $_smarty_tpl->tpl_vars['cont']->iteration = 1;$_smarty_tpl->tpl_vars['cont']->iteration <= $_smarty_tpl->tpl_vars['cont']->total;$_smarty_tpl->tpl_vars['cont']->value += $_smarty_tpl->tpl_vars['cont']->step, $_smarty_tpl->tpl_vars['cont']->iteration++){
$_smarty_tpl->tpl_vars['cont']->first = $_smarty_tpl->tpl_vars['cont']->iteration == 1;$_smarty_tpl->tpl_vars['cont']->last = $_smarty_tpl->tpl_vars['cont']->iteration == $_smarty_tpl->tpl_vars['cont']->total;?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['cont']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['cont']->value;?>

								<?php }} ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtOrigen" class="col-lg-2">Origen</label>
						<div class="col-lg-4">
							<textarea id="txtOrigen" rows="4" name="txtOrigen" class="form-control" readonly="true"></textarea>
						</div>
						<label for="selRegion" class="col-lg-2">Transportistas de las regiones</label>
						<div class="col-lg-4">
							<select class="form-control" id="selRegion" name="selRegion" multiple="true">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['regiones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idRegion'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div id="dvReporteFinal">
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

<input type="hidden" id="auxOrden" value="<?php echo $_smarty_tpl->tpl_vars['orden']->value;?>
"/>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ordenes/winMapa.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ordenes/winInteresados.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ordenes/winSeguimiento.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ordenes/winIntermedios.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ordenes/winReporte.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/puntos/winDetalleReporte.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>