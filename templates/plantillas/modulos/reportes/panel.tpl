<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Estado de transportistas</h1>
	</div>
</div>


<div class="box">
	<div class="box-body">
		<div class="panel-group" id="accordion">
			{foreach from=$lista item="situacion"}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" style="color:{$situacion.color}">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse{$situacion.idSituacion}">
							{$situacion.nombre}
						</a>
					</h3>
				</div>
				<div id="collapse{$situacion.idSituacion}" class="panel-collapse collapse">
					<div class="panel-body">
						{foreach from=$situacion.region item="region"}
							<h4>{$region.nombre}</h4>
									<table id="tblDatos" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>Representante</th>
												<th>Celular</th>
												<th>Email</th>
												<th>Chofer</th>
											</tr>
										</thead>
										<tbody>
											{foreach from=$region.transportistas item="transportista"}
												<tr>
													<td>{$transportista.nombre}</td>
													<td>{$transportista.representante}</td>
													<td>{$transportista.celular}</td>
													<td>{$transportista.email}</td>
													<td>{$transportista.chofer}</td>
												</tr>
											{foreachelse}
												<tr><td colspan="4">Sin transportistas en este estado</td></tr>
											{/foreach}
										</tbody>
									</table>
						{/foreach}
					</div>
				</div>
			</div>
			{/foreach}
		</div>
	</div>
</div>