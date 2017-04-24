<table id="tblDatosInteresados" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Desde</th>
			<th>Nombre</th>
			<th>Representante</th>
			<th>Email</th>
			<th>Celular</th>
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
			</tr>
		{/foreach}
	</tbody>
</table>