<div class="hir_lista_w" id="hir_lista">

	<div class="cim">{$text->cim->hireink}</div>
	{foreach($hirlista,_hir)}
	<div class="hir_lista">
		<a class="hircim_lapozo" href="{$_hir.uri}">
			{$_hir.caption}
		</a><br />
		<span class="megjegyzes">{$_hir.datum}</span>
		{if (file_exists('$_hir.imageuri'))}
		<img class="hir" alt="{$_hir.caption}" src="{$_hir.imageuri}" />
		{/if}
		<p class="lead">{$_hir.lead}
			<a href="{$_hir.uri}">&nbsp;{$text->tovabb}</a>
		</p>
	</div>

	{/foreach}
	{include('lapozo.tpl')}
</div>