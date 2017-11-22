<?php /* Smarty version Smarty-3.1.11, created on 2017-11-20 08:34:14
         compiled from "templates/plantillas/modulos/empresas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16752794285a12e7e6621060-80357131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd63a03a6b06a43d8e23885d9275b8c97cfe103ca' => 
    array (
      0 => 'templates/plantillas/modulos/empresas/panel.tpl',
      1 => 1509393450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16752794285a12e7e6621060-80357131',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a12e7e6813676_30805069',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a12e7e6813676_30805069')) {function content_5a12e7e6813676_30805069($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Empresas</h1>
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
						<label for="txtRazonSocial" class="col-sm-2">Razón social</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtRazonSocial" name="txtRazonSocial">
						</div>
					</div>
					<div class="form-group">
						<label for="txtDomicilio" class="col-sm-2">Domicilio</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="txtDomicilio" name="txtDomicilio" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCorreo" class="col-sm-2">Correo</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtCorreo" name="txtCorreo">
						</div>
					</div>
					<div class="form-group">
						<label for="txtTelefono" class="col-sm-2">Teléfono</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtTelefono" name="txtTelefono">
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
</div><?php }} ?>