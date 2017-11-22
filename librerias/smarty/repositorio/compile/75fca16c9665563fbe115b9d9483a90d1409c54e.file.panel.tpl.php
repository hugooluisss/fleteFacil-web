<?php /* Smarty version Smarty-3.1.11, created on 2017-11-22 09:19:38
         compiled from "templates/plantillas/modulos/usuarios/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17638709285a12e834a33b92-34853586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75fca16c9665563fbe115b9d9483a90d1409c54e' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/panel.tpl',
      1 => 1511363976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17638709285a12e834a33b92-34853586',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a12e834b1e511_89162846',
  'variables' => 
  array (
    'PAGE' => 0,
    'empresa' => 0,
    'transportista' => 0,
    'perfiles' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a12e834b1e511_89162846')) {function content_5a12e834b1e511_89162846($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Usuarios
			<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='usuariosempresa'){?>
				de "<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getRazonSocial();?>
"
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='usuariostransportista'){?>
				de "<?php echo $_smarty_tpl->tpl_vars['transportista']->value->getNombre();?>
"
			<?php }?>
		</h1>
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
						<label for="selTipo" class="col-lg-2">Perfil</label>
						<div class="col-lg-4">
							<select class="form-control" id="selPerfil" name="selPerfil">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['perfiles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>

								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
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
						<div class="col-lg-3">
							<input class="form-control" id="txtPass" name="txtPass" type="password">
						</div>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='usuariostransportista'){?>
						<div class="form-group">
							<label for="txtPass" class="col-lg-2">NIT</label>
							<div class="col-lg-6">
								<input class="form-control" id="txtNit" name="txtNit" type="text">
							</div>
						</div>
						<div class="form-group">
							<label for="txtCelular" class="col-lg-2">Celular</label>
							<div class="col-lg-3">
								<input class="form-control" id="txtCelular" name="txtCelular" type="text">
							</div>
						</div>
						<div class="form-group">
							<label for="txtPatenteCamion" class="col-lg-2">Patente camión</label>
							<div class="col-lg-6">
								<input class="form-control" id="txtPatenteCamion" name="txtPatenteCamion" type="text">
							</div>
						</div>
						<div class="form-group">
							<label for="txtPatenteRampla" class="col-lg-2">Patente rampla</label>
							<div class="col-lg-6">
								<input class="form-control" id="txtPatenteRampla" name="txtPatenteRampla" type="text">
							</div>
						</div>
					<?php }?>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
					<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='usuariosempresa'){?>
						<input type="hidden" id="empresa" value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value->getId();?>
"/>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='usuariostransportista'){?>
						<input type="hidden" id="transportista" value="<?php echo $_smarty_tpl->tpl_vars['transportista']->value->getId();?>
"/>
					<?php }?>
				</div>
			</div>
		</form>
	</div>
</div><?php }} ?>