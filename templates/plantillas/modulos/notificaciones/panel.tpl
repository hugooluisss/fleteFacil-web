<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Notificaciones</h1>
	</div>
</div>

<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Mensaje</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td style="border-left: 3px solid {if $row.leido eq 0}red{else}blue{/if}">{$row.fecha}</td>
						<td>{$row.mensaje}</td>
						<td style="text-align: right">
							<!--<button orden="{$row.idOrden}" notificacion="{$row.idNotificacion}" class="btn btn-primary"><i class="fa fa-info-circle"></i></button>-->
							<a href="ordenes/{$row.idOrden}/" notificacion="{$row.idNotificacion}" class="btn btn-primary"><i class="fa fa-info-circle"></i></a>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>
<input type="hidden" id="notificacionesmodulo" value="{$PAGE.modulo}" />