<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Destino</th>
					<th>Transporte</th>
					<th>Estado</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.direccion}</td>
						<td>{$chofer}</td>
						<td>{if $row.estado eq 0}Sin entregar{else}Entregado{/if}</td>
						<td class="text-right">
							<button type="button" class="btn btn-success btn-xs" action="detalle" title="Reporte" datos='{$row.json_data}'><i class="fa fa-file-text"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>