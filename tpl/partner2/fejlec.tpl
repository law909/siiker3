{if ($setup->flashhead->true==1)}
	<div class="head">
			{include('imageroller.tpl')}
		<div class="headflash">
			<object width="{$setup->flashhead->width}" height="{$setup->flashhead->height}">
				<param name="movie" value="/themes/{$theme}/{$setup->flashhead->source}">
				<embed src="/themes/{$theme}/{$setup->flashhead->source}" width="{$setup->flashhead->width}" height="{$setup->flashhead->height}">
				</embed>
			</object>

			<h1>{$spectext->fejlec->focim}</h1>
			<h3><a></a>{$spectext->fejlec->alcim}</h3>

		</div>

	</div>
{else}

<div class="head" id="fejlec">
	<h1>{$spectext->fejlec->focim}</h1>
	<h3>{$spectext->fejlec->alcim}</h3>

		{include('gyorskereso.tpl')}
		{if (!$loggedin)}
		{include('partner_belepes.tpl')}
	{else}
		{include('partner_udvozles.tpl')}
	{/if}

<div class="kosar_butt"><a href="/?c=kosar&mx=2"><img src="/themes/{$theme}/images/kosar.png" /></a></div>

</div>
{/if}
