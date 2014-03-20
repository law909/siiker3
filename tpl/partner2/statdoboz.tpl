{if ($statdoboz.show)}
<div class="statdoboz_w" id="statdoboz">
	{if (count_characters($spectext->focim->statdoboz, true)>12)}
		<div class="wf_2lines">
			<div class="wf_in_2lines">
				<span>{$spectext->focim->statdoboz}</span>
			</div>
		</div>	
	{else}
		<div class="wf">
			<div class="wf_in">
				<span>{$spectext->focim->statdoboz}</span>
			</div>
		</div>	
	{/if}
	<div class="stat"><span class="stat_no">{$statdoboz.stat.latogatoszam}</span></div>
</div>
{/if}