<div class="box">
	<div class="box-body">
	
		<table id="tblUsuarios" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Correo</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr title="{$row.estado}">
						{if $modulo eq 'usuariostransportista'}
							<td style="border-left: 3px solid {$row.color}">{$row.nombre}</td>
						{else}
							<td>{$row.nombre}</td>
						{/if}
						<td>{$row.email}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary btn-xs" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" usuario="{$row.idUsuario}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>