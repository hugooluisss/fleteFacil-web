<?php /* Smarty version Smarty-3.1.11, created on 2017-12-10 12:34:13
         compiled from "templates/plantillas/modulos/ordenes/winReporte.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11134559165a2d7da3555bd4-91757068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93740dacf41da656bf74d9ad949b6b847544f965' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/winReporte.tpl',
      1 => 1512930852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11134559165a2d7da3555bd4-91757068',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a2d7da355da24_68123480',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2d7da355da24_68123480')) {function content_5a2d7da355da24_68123480($_smarty_tpl) {?><div class="modal fade" id="winReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel">Orden <span campo="folio"></span></h5>
			</div>
			<div class="modal-body form-horizontal" role="form" id="frmAdd">
				<div class="form-group">
					<label for="txtValor" class="col-lg-2">Valor adjudicado</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" campo="presupuestofinal" />
					</div>
					<label for="txtValor" class="col-lg-2">Empresa transporte</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" campo="transportista" />
					</div>
				</div>
				<div class="form-group">
					<label for="txtValor" class="col-lg-2">Detalle de la carga</label>
					<div class="col-lg-4">
						<textarea rows="5" class="form-control" campo="descripcion"></textarea>
					</div>
					<label for="txtValor" class="col-lg-2">Requisitos especiales</label>
					<div class="col-lg-4">
						<textarea rows="5" class="form-control" campo="requisitos"></textarea>
					</div>
				</div>
				
				<hr />
				<div id="dvEntregas"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div><?php }} ?>