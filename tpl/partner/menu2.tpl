{if (count($menu2pontok)>0)}
<div class="mainmenu2" id="menu2">
	<!--<div class="wf">{$spectext->focim->menu2}</div>-->
	<ul>{foreach($menu2pontok,_menupont)}
	
	<li>
	<a class="menu2" href="{$_menupont.uri}">
		{$_menupont.caption}{if ($_menupont.elemcount>=0)}({$_menupont.elemcount}{$text->termek->termek}){/if}
		
	</a>
	</li>
	
	{if (!$dwoo.foreach.default.last)}{$setup->menu2->elvalaszto}{/if}
	{/foreach}</ul>
</div>
{/if}