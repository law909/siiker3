{if ($hirdoboz.show)}
<div class="hirdoboz_w" id="hirdoboz">
	<div class="wf">
		<div class="wf_in">
			<span>{$text->cim->hireink}</span>
		</div>
	</div>
	<div class="hirdoboz">
	{foreach($hirdoboz.hirlista,_hir)}
	<div class="hirdoboz_hir">
		<a class="hircim_lapozo" href="{$_hir.uri}">
			{$_hir.caption}
		</a><br />
		<span class="megjegyzes">{$_hir.datum}</span>
		<p class="lead">{$_hir.lead}
			<a href="{$_hir.uri}">&nbsp;{$text->tovabb}</a>
		</p>
	</div>
	{/foreach}
	</div>
</div>
{/if}