<div class="right" id="jobboldal">
	{if (!$loggedin)}
		{include('partner_belepes.tpl')}
	{else}
		{include('partner_udvozles.tpl')}
	{/if}

</div>