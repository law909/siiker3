{if ($legtobbszorrendelttermekek.show==true)}
<div class="leg_w" id="legtobbszor_rendelt_termek">
	<div class="wf_2lines">
		<div class="wf_in_2lines">
				{$legtobbszorrendelttermekek.elemcount}{$spectext->focim->leg->tobbszor}
		</div>
	</div>
	<div class="leg">
	{foreach($legtobbszorrendelttermekek.termeklista,_termek)}
		<a href="{$_termek.data.uri}">
			{wordwrap($_termek.data.nev 16 cut=true)}
		</a>
		<br />
	{/foreach}
	</div>
</div>
{/if}