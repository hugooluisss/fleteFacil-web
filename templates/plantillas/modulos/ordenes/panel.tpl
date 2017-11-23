<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Ordenes de transporte</h1>
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
						<label for="txtFolio" class="col-lg-2">Folio</label>
						<div class="col-lg-4">
							<input type="text" id="txtFolio" name="txtFolio" class="form-control" placeholder="" />
						</div>
						<label for="selTipo" class="col-lg-2">Estado</label>
						<div class="col-lg-4">
							<select class="form-control" id="selEstado" name="selEstado">
								{foreach key=key item=item from=$estados}
									<option value="{$item.idEstado}">{$item.nombre}
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="selEmpresa" class="col-lg-2">Empresa</label>
						<div class="col-lg-4">
							<select class="form-control" id="selEmpresa" name="selEmpresa">
								{foreach key=key item=item from=$empresas}
									<option value="{$item.idEmpresa}" json='{json_encode($item.operadores)}'>{$item.razonsocial}
								{/foreach}
							</select>
						</div>
						<label for="selTipo" class="col-lg-2">Operador</label>
						<div class="col-lg-4">
							<select class="form-control" id="selOperador" name="selOperador">
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-lg-2">Descripción</label>
						<div class="col-lg-4">
							<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="5"></textarea>
						</div>
						<label for="txtRequisitos" class="col-lg-2">Requisitos</label>
						<div class="col-lg-4">
							<textarea class="form-control" id="txtRequisitos" name="txtRequisitos" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="txtFechaServicio" class="col-lg-2">Fecha cargo</label>
						<div class="col-lg-3">
							<input type="date" id="txtFechaServicio" name="txtFechaServicio" class="form-control" placeholder="Y-m-d" />
						</div>
						<label for="txtHora" class="col-lg-2 col-lg-offset-1">Hora presentación</label>
						<div class="col-lg-3">
							<input type="time" id="txtHora" name="txtHora" class="form-control" placeholder="H:m" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtPlazo" class="col-lg-2">Plazo de pago</label>
						<div class="col-lg-3">
							<input type="text" id="txtPlazo" name="txtPlazo" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPeso" class="col-lg-2">Peso (Ton)</label>
						<div class="col-lg-3">
							<input type="text" id="txtPeso" name="txtPeso" class="form-control" />
						</div>
						<label for="txtVolumen" class="col-lg-2 col-lg-offset-1">Volumen</label>
						<div class="col-lg-3">
							<input type="text" id="txtVolumen" name="txtVolumen" class="form-control"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPresupuesto" class="col-lg-2">Presupuesto disponible</label>
						<div class="col-lg-3">
							<input type="text" id="txtPresupuesto" name="txtPresupuesto" class="form-control text-right" />
						</div>
						<label for="selPropuestas" class="col-lg-offset-1 col-lg-2">Propuestas</label>
						<div class="col-lg-2">
							<select class="form-control" id="selPropuestas" name="selPropuestas">
								{for $cont=$start to 25}
									<option value="{$cont}">{$cont}
								{/for}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtOrigen" class="col-lg-2">Origen</label>
						<div class="col-lg-4">
							<textarea id="txtOrigen" rows="4" name="txtOrigen" class="form-control" readonly="true"></textarea>
						</div>
						<label for="selRegion" class="col-lg-2">Transportistas de las regiones</label>
						<div class="col-lg-4">
							<select class="form-control" id="selRegion" name="selRegion" multiple="true">
								{foreach key=key item=item from=$regiones}
									<option value="{$item.idRegion}">{$item.nombre}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div id="dvReporteFinal">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" id="btnUbicacion">Seleccionar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<input type="hidden" id="auxOrden" value="{$orden}"/>
{include file=$PAGE.rutaModulos|cat:"modulos/ordenes/winMapa.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/ordenes/winInteresados.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/ordenes/winSeguimiento.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/ordenes/winIntermedios.tpl"}