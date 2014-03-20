{if ($hirek.show)}
<div class="hirmini" id="hir_minilista">
	<div class="wf_main">
		<div class="wf_main_in">
			<span>{$spectext->focim->hirek}</span>
		</div>
	</div>
	<div class="main_container">
	<p>{foreach($hirek.hirlista,_hir)}
	<a class="hircim_lapozo" href="{$_hir.uri}">
	{$_hir.caption}
	</a><br />
	{/foreach}</p>
	</div>
</div>
{/if}