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
	{include('menu2.tpl')}
	{include('blind.tpl')}
	<h1>{$spectext->fejlec->focim}</h1>
	<h3>{$spectext->fejlec->alcim}</h3>
			


</div>
{/if}