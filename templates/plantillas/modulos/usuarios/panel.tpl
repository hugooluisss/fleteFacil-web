<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Usuarios
			{if $PAGE.modulo eq 'usuariosempresa'}
				de "{$empresa->getRazonSocial()}"
			{/if}
			{if $PAGE.modulo eq 'usuariostransportista'}
				de "{$transportista->getNombre()}"
			{/if}
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
								{foreach key=key item=item from=$perfiles}
									<option value="{$key}">{$item}
								{/foreach}
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
					{if $PAGE.modulo eq 'usuariostransportista'}
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
					{/if}
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
					{if $PAGE.modulo eq 'usuariosempresa'}
						<input type="hidden" id="empresa" value="{$empresa->getId()}"/>
					{/if}
					{if $PAGE.modulo eq 'usuariostransportista'}
						<input type="hidden" id="transportista" value="{$transportista->getId()}"/>
					{/if}
				</div>
			</div>
		</form>
	</div>
</div>