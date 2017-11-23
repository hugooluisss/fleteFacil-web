<table id="tblDatosInteresados" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Desde</th>
			<th>Nombre</th>
			<th>Representante</th>
			<th>Email</th>
			<th>Celular</th>
			<th>Presupuesto</th>
			{if $estado neq 4}
				<th>Asignar</th>
			{else}
				<th>Asignado</th>
			{/if}
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.registro}</td>
				<td>{$row.nombre}</td>
				<td>{$row.representante}</td>
				<td>{$row.email}</td>
				<td>{$row.celular}</td>
				<td class="text-right">{$row.monto}</td>
				{if $estado neq 4}
					<td class="text-center">
						<button type="button" class="btn btn-success" action="asignar" title="Asignar orden a transportista" datos='{$row.json}'><i class="fa fa-hand-o-right" aria-hidden="true"></i></button>
					</td>
				{else}
					<td class="text-center">
						{if $row.asignado}
							<i class="fa fa-check text-success" aria-hidden="true"></i>
						{/if}
					</td>
				{/if}
			</tr>
		{/foreach}
	</tbody>
</table>