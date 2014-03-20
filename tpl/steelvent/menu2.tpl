{if (count($menu2pontok)>0)}
<div class="mainmenu2" id="menu2">
	<!--<div class="wf">{$spectext->focim->menu2}</div>-->
	{foreach($menu2pontok,_menupont)}
	
	<a class="menu2" href="{$_menupont.uri}">
		<span>{$_menupont.caption}{if ($_menupont.elemcount>=0)}({$_menupont.elemcount}{$text->termek->termek}){/if}</span>
		
	</a>
	{if (!$dwoo.foreach.default.last)}{$setup->menu2->elvalaszto}{/if}
	{/foreach}
</div>
{/if}