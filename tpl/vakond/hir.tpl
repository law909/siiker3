<div class="hir_w" id="hir">
	<div class="cim">{$hir.caption}</div>
	<div class="hir_tartalom">
		{if (file_exists('$_hir.imageuri'))}
		<img class="hir" alt="{$hir.caption}" src="{$hir.imageuri}" />
		{/if}
		<span class="megjegyzes">{$hir.datum}</span><br />
		<span class="szoveg_bold">{$hir.lead}</span><br /><br />
		<p>{$hir.szoveg}</p>
		<p class="forras">{$text->hir->forras}{$hir.forras}</p>
		<a href="{$hir.uri}">{$text->tobbhir}</a>
	</div>
</div>