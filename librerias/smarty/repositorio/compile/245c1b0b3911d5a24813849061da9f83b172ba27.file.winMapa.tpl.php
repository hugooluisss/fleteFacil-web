<?php /* Smarty version Smarty-3.1.11, created on 2017-04-20 23:21:02
         compiled from "templates/plantillas/modulos/ordenes/winMapa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198937078658f984610a4090-21259959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '245c1b0b3911d5a24813849061da9f83b172ba27' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/winMapa.tpl',
      1 => 1492748461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198937078658f984610a4090-21259959',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_58f984610b3404_88718934',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f984610b3404_88718934')) {function content_58f984610b3404_88718934($_smarty_tpl) {?><div class="modal fade" id="winMapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel">Ubicar punto</h5>
			</div>
			<div class="modal-body">
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