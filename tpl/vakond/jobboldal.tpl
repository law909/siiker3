<div class="right" id="jobboldal">
	{if (!$loggedin)}
		{include('partner_belepes.tpl')}
	{else}
		{include('partner_udvozles.tpl')}
	{/if}

	{include('gyorskereso.tpl')}
	{if ($setup->clock->true==1)}
		<div>
			<object width="{$setup->clock->width}" height="{$setup->clock->height}">
				<param name="wmode" value="transparent" />
				<param name="movie" value="/themes/{$theme}/{$setup->clock->source}">
				<embed src="/themes/{$theme}/{$setup->clock->source}" wmode="transparent" width="{$setup->clock->width}" height="{$setup->clock->height}">
				</embed>
			</object>
		</div>
	{/if}
	{include('menu4.tpl')}	
	{include('referencia.tpl')}
	{include('statdoboz.tpl')}
	{include('hir_doboz.tpl')}
	{include('arfolyamdoboz.tpl')}
	{include('reklam.tpl')}
</div>