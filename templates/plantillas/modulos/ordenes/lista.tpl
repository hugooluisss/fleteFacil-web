<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Folio</th>
					<th>Nombre</th>
					<th>Origen</th>
					<th>Destino</th>
					<th>Interesados</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td style="border-left: 2px solid {$row.color}">{$row.folio}</td>
						<td>{$row.nombre}</td>
						<td>{$row.origen_json->direccion}</td>
						<td>{$row.destino_json->direccion}</td>
						<td class="text-center">
							<button type="button" class="btn btn-warning" action="interesados" title="Transportistas interesados" datos='{$row.json}' data-toggle="modal" data-target="#winInteresados">{$row.interesados} / {$row.propuestas}</button>
						</td>
						<td class="text-right">
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>