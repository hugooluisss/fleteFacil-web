<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Razón Social</th>
					<th>Correo</th>
					<th>Teléfono</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idEmpresa}</td>
						<td>{$row.razonsocial}</td>
						<td>{$row.correo}</td>
						<td>{$row.telefono}</td>
						<td style="text-align: right">
							<a href="usuariosempresa/{$row.idEmpresa}/" class="btn btn-primary btn-xs" title="Usuarios de la empresa"><i class="fa fa-users"></i></a>
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" item="{$row.idEmpresa}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>