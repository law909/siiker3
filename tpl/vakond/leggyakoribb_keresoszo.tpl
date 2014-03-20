{if ($leggyakoribbkeresoszo.show==true)}
<div class="leg_w" id="leggyakoribb_keresoszo">
	<div class="wf_2lines">
		<div class="wf_in_2lines">
			
			{$leggyakoribbkeresoszo.elemcount}{$spectext->focim->leg->gyakoribb}
		
		</div>
	</div>
	<div class="leg">
	{foreach($leggyakoribbkeresoszo.szolist,_keresoszo)}
		<a href="{$_keresoszo.uri}">
			{wordwrap($_keresoszo.caption 18 cut=true)}
		</a>
		<br />
	{/foreach}
	</div>
</div>
{/if}