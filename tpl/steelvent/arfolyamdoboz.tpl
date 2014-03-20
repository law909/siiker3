{if ($arfolyamdoboz.show)}
<div class="arfolyam" id="arfolyamdoboz">
	<div class="wf">
		<div class="wf_in"> 
			<span>{$spectext->focim->napiarfolyam}</span>
		</div>
	</div>
	<div class="valuta">
	{foreach($arfolyamdoboz.arfolyamlista,_arfolyam)}
		<span class="szoveg_bold">{$_arfolyam.valutanem}-{$_arfolyam.arfolyam}</span><br/>
	{/foreach}
	</div>
</div>
{/if}