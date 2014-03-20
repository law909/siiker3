{if ($legnezettebbtermekek.show==true)}
<div class="leg_w" id="legnezettebb_termek">
	<div class="wf_2lines">
		<div class="wf_in_2lines">
			
			{$legnezettebbtermekek.elemcount}{$spectext->focim->leg->nezettebb}
		
		</div>
	</div>
	<div class="leg">
		{foreach($legnezettebbtermekek.termeklista,_termek)}
			<a href="{$_termek.data.uri}">
				{wordwrap($_termek.data.nev 16 cut=true)}
			</a>
			<br />
		{/foreach}
	</div>
</div>
{/if}