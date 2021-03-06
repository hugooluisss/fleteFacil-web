<table id="tblIntermedios" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Posici�n</th>
			<th>Direccion</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.folio}</td>
				<td>{$row.nombre}</td>
				<td>{$row.origen_json->direccion}</td>
				<td>{$row.destino_json->direccion}</td>
				<td class="text-center">
					<button type="button" class="btn btn-warning btn-xs" action="interesados" title="Transportistas interesados" datos='{$row.json}' data-toggle="modal" data-target="#winInteresados">{$row.interesados} / {$row.propuestas}</button>
				</td>
				<td class="text-right" style="width: 80px;">
					<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
					<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#winSeguimiento" action="mapa" title="Consultar transporte" datos='{$row.json}'><i class="fa fa-map-o"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>