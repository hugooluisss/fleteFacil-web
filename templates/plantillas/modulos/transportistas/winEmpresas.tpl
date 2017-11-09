<div class="modal fade" id="winEmpresas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title">Empresas</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					{foreach from=$empresas item="row"}
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input" value="{$row.idEmpresa}">
								{$row.razonsocial}
							</label>
						</div>
					{/foreach}
				</div>
			</div>
		</div>
	</div>
</div>