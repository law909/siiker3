{if (count($menu4pontok)>0)}
<div class="mainmenu4" id="menu4">
	<div class="wf">
		<div class="wf_in">
			<span>{$spectext->focim->menu4}</span>
		</div>
	</div>	
{foreach($menu4pontok,_menupont)}
<a class="menu4" href="{$_menupont.uri}">
{$_menupont.caption}
{if ($_menupont.elemcount>=0)}
({$_menupont.elemcount}{$text->termek->termek})
{/if}
</a>
{/foreach}

</div>

{/if}