{if (count($menu1pontok)>0)}
<div class="mainmenu1" id="menu1">
	<div class="wf">
		<div class="wf_in">
			<span>{$spectext->focim->menu1}</span>
		</div>
	</div>	
	{foreach($menu1pontok,_menupont)}
	<a class="menu1" href="{$_menupont.uri}">
		{$_menupont.caption}
		{if ($_menupont.elemcount>=0)}
		({$_menupont.elemcount}{$text->termek->termek})
		{/if}
	</a>
	{/foreach}

</div>

{/if}