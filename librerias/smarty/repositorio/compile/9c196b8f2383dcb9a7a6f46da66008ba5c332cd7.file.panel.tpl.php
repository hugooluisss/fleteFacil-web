<?php /* Smarty version Smarty-3.1.11, created on 2017-05-03 12:19:31
         compiled from "templates/plantillas/modulos/transportistas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1733112260590a1123d0ba73-75725624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c196b8f2383dcb9a7a6f46da66008ba5c332cd7' => 
    array (
      0 => 'templates/plantillas/modulos/transportistas/panel.tpl',
      1 => 1493040030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1733112260590a1123d0ba73-75725624',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_590a1123ebbf43_83220768',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590a1123ebbf43_83220768')) {function content_590a1123ebbf43_83220768($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Transportistas</h1>
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
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtRepresentante" class="col-lg-2">Representante</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtRepresentante" name="txtRepresentante">
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmail" class="col-lg-2">Correo electrónico</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtEmail" name="txtEmail" type="email">
						</div>
					</div>
					<div class="form-group">
						<label for="txtPass" class="col-lg-2">Contraseña</label>
						<div class="col-lg-2">
							<input class="form-control" id="txtPass" name="txtPass" type="password">
						</div>
					</div>
					<div class="form-group">
						<label for="txtCelular" class="col-lg-2">Celular</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtCelular" name="txtCelular" type="text">
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