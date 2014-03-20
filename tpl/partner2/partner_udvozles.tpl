<div class="partner_be_w" id="partner_belepes">
	
	{if (count_characters($login.nev, true)>12)}
		<div class="wf_2lines">
			<div class="wf_in_2lines">
				<span>{$login.nev}</span>
			</div>
		</div>	
	{else}
		<div class="wf">
			<div class="wf_in">
				<span>{$login.nev}</span>
			</div>
		</div>	
	{/if}
	
	<div class="az_jel">
		<form method="post" action="{$login.actionuri}">
			<span class="bej_adataim"><a class="link_bold" href="{$login.modificationuri}"> {$text->partner->adataim} </a>
				<input class="general_button" type="submit" value="{$text->partner->kijelentkezesgomb}" />
				<input type="hidden" value="{$login.command}" name="com" />
			</dspan>
		</form>
	</div>
</div>