<?php /* Smarty version Smarty-3.1.11, created on 2017-11-09 11:10:53
         compiled from "templates/plantillas/modulos/transportistas/winEmpresas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14815816635a04876bb43318-41853080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c1bbc3fc88114a051ac4a0ea8898b563ee9ed01' => 
    array (
      0 => 'templates/plantillas/modulos/transportistas/winEmpresas.tpl',
      1 => 1510247272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14815816635a04876bb43318-41853080',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a04876bb7f715_44426010',
  'variables' => 
  array (
    'empresas' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a04876bb7f715_44426010')) {function content_5a04876bb7f715_44426010($_smarty_tpl) {?><div class="modal fade" id="winEmpresas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title">Empresas</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['empresas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idEmpresa'];?>
">
								<?php echo $_smarty_tpl->tpl_vars['row']->value['razonsocial'];?>

							</label>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>