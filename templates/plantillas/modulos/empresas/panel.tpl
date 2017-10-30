<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Empresas</h1>
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
						<label for="txtRazonSocial" class="col-sm-2">Razón social</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtRazonSocial" name="txtRazonSocial">
						</div>
					</div>
					<div class="form-group">
						<label for="txtDomicilio" class="col-sm-2">Domicilio</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="txtDomicilio" name="txtDomicilio" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCorreo" class="col-sm-2">Correo</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtCorreo" name="txtCorreo">
						</div>
					</div>
					<div class="form-group">
						<label for="txtTelefono" class="col-sm-2">Teléfono</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtTelefono" name="txtTelefono">
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