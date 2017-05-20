<?php /* Smarty version Smarty-3.1.11, created on 2017-05-12 22:37:20
         compiled from "templates/plantillas/modulos/regiones/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80729306059167f703fc7f6-31252098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc262e960a3722c00b83930d0749a45374bbcf8b' => 
    array (
      0 => 'templates/plantillas/modulos/regiones/panel.tpl',
      1 => 1494646636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80729306059167f703fc7f6-31252098',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59167f704431b1_43791163',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59167f704431b1_43791163')) {function content_59167f704431b1_43791163($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Regiones</h1>
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
						<div class="col-lg-5">
							<input class="form-control" id="txtNombre" name="txtNombre">
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