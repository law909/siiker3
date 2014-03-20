{if ($legujabbtermekek.show==true)}
<div class="leg_w" id="legujabb_termek">
	<div class="wf">
		<div class="wf_in">
			<span>{$legujabbtermekek.elemcount}{$spectext->focim->leg->ujabb}</span>
		</div>
	</div>
	<div class="leg">
	{foreach($legujabbtermekek.termeklista,_termek)}
		<a href="{$_termek.data.uri}">
			{wordwrap($_termek.data.nev 16 cut=true)}
		</a>
		<br />
	{/foreach}
	</div>
</div>
{/if}