<?php /* Smarty version Smarty-3.1.11, created on 2017-11-09 09:23:51
         compiled from "templates/plantillas/modulos/ordenes/winIntermedios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3170887705a0473074a5d72-18995591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b7baa5487f05ddda67657ee6fbf1c4a1e845bb6' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/winIntermedios.tpl',
      1 => 1510240465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3170887705a0473074a5d72-18995591',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a0473074a7345_36673351',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0473074a7345_36673351')) {function content_5a0473074a7345_36673351($_smarty_tpl) {?><div class="modal fade" id="winIntermedios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title">Puntos intermedios</h5>
			</div>
			<div class="modal-body">
				<div class="">
					<div class="row">
						<div class="col-xs-6">
							<div style="height: 400px;" id="dvMapaIntermedios"></div>
						</div>
						<div class="col-xs-6">
							<button class="btn-primary btn-xs btn" id="btnAgregarPunto">Agregar</button>
							<br /><br />
							<ul class="list-group" id="dvListaIntermedios"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>