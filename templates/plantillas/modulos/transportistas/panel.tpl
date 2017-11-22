<div class="row">
	<div class="col-sm-12">
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
						<label for="txtNombre" class="col-sm-2">Nombre</label>
						<div class="col-sm-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtRepresentante" class="col-sm-2">Representante</label>
						<div class="col-sm-6">
							<input class="form-control" id="txtRepresentante" name="txtRepresentante">
						</div>
					</div>
					<div class="form-group">
						<label for="selEmpresa" class="col-sm-2">Empresa</label>
						<div class="col-sm-4">
							<select class="form-control" id="selEmpresa" name="selEmpresa">
								{foreach key=key item=item from=$empresas}
									<option value="{$item.idEmpresa}">{$item.razonsocial}
								{/foreach}
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="txtEmail" class="col-sm-2">Correo electrónico</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtEmail" name="txtEmail" type="email">
						</div>
					</div>
					<div class="form-group">
						<label for="txtCelular" class="col-sm-2">Celular</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtCelular" name="txtCelular" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="selRegion" class="col-sm-2">Regiones</label>
						<div class="col-sm-4">
							<select class="form-control" id="selRegion" name="selRegion" multiple="true">
								{foreach key=key item=item from=$regiones}
									<option value="{$item.idRegion}">{$item.nombre}</option>
								{/foreach}
							</select>
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
</div>

{include file=$PAGE.rutaModulos|cat:"modulos/transportistas/winEmpresas.tpl"}