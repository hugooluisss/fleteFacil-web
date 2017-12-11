<div class="modal fade" id="winReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="exampleModalLabel">Orden <span campo="folio"></span></h5>
			</div>
			<div class="modal-body form-horizontal" role="form" id="frmAdd">
				<div class="form-group">
					<label for="txtValor" class="col-lg-2">Valor adjudicado</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" campo="presupuestofinal" />
					</div>
					<label for="txtValor" class="col-lg-2">Empresa transporte</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" campo="transportista" />
					</div>
				</div>
				<div class="form-group">
					<label for="txtValor" class="col-lg-2">Detalle de la carga</label>
					<div class="col-lg-4">
						<textarea rows="5" class="form-control" campo="descripcion"></textarea>
					</div>
					<label for="txtValor" class="col-lg-2">Requisitos especiales</label>
					<div class="col-lg-4">
						<textarea rows="5" class="form-control" campo="requisitos"></textarea>
					</div>
				</div>
				
				<hr />
				<div id="dvEntregas"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>