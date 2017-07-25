<table id="tblPosiciones" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Dirección</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr json='{$row.json}'>
				<td>{$row.fecha}</td>
				<td>{$row.direccion}</td>
			</tr>
		{/foreach}
	</tbody>
</table>