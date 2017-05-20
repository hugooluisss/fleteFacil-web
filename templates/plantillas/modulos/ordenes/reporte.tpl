<hr />
<h1 class="text-center">Reporte final</h1>
<br />
<div class="row">
	{foreach from=$fotos item="row"}
		<div class="col-xs-3 text-center">
			<img src="{$row}" />
		</div>
	{/foreach}
</div>
<br /><br /><br />
<div class="row">
	<div class="col-xs-12"><b>Comentario</b></div>
</div>
<div class="row">
	<div class="col-xs-12">{$comentarios}</div>
</div>