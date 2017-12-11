<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Representante</th>
					{if $PAGE.usuario->getPerfil() neq 2}
					<th>Empresa</th>
					{/if}
					<th>Correo</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr title="{$row.estado}">
						<td>{$row.idTransportista}</td>
						<td>{$row.nombre}</td>
						<td>{$row.representante}</td>
						{if $PAGE.usuario->getPerfil() neq 2}
						<td>{$row.empresa}</td>
						{/if}
						<td>{$row.email}</td>
						<td style="text-align: right">
							<a href="usuariostransportista/{$row.idTransportista}/" class="btn btn-primary btn-xs" title="Usuarios de la empresa"><i class="fa fa-users"></i></a>
							{if $PAGE.usuario->getPerfil() neq 2}
							<button type="button" class="btn btn-primary btn-xs" action="empresas" title="Empresas con las que participa" datos='{$row.json}' data-toggle="modal" data-target="#winEmpresas"><i class="fa fa-building-o" aria-hidden="true"></i></button>
							{/if}
							<button type="button" class="btn btn-primary btn-xs" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="{$row.idTransportista}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>