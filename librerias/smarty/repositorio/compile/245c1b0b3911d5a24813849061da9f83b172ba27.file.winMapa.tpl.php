<?php /* Smarty version Smarty-3.1.11, created on 2017-11-09 09:23:51
         compiled from "templates/plantillas/modulos/ordenes/winMapa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19552210935a047307499824-25892331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '245c1b0b3911d5a24813849061da9f83b172ba27' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/winMapa.tpl',
      1 => 1496336808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19552210935a047307499824-25892331',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a04730749b9c3_47778211',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a04730749b9c3_47778211')) {function content_5a04730749b9c3_47778211($_smarty_tpl) {?><div class="modal fade" id="winMapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel">Ubicar punto</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<input type="text" class="form-control" placeholder="Escribe la dirección a buscar" id="txtBuscarDireccion"/>
					</div>
				</div>
				<br />
				<div class="row">
					<div id="dvMapa" class="col-xs-12" style="height: 300px">&nbsp;</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-12">
						<textarea rows="3" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Dirección"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="btnUbicacion">Seleccionar</button>
			</div>
		</div>
	</div>
</div><?php }} ?>