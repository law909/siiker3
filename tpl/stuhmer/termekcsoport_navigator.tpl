<div class="termcsop_nav">
	{foreach($navigator,_navi)}
		{if ($_navi.uri!='')}
			<a href="{$_navi.uri}">
				{$_navi.caption}
			</a>
		{else}
			{$_navi.caption}
		{/if}
		{$text->termek->navigatorjel}
	{/foreach}
</div>
