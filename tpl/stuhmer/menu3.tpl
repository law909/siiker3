{if (count($menu3pontok)>0)}
<div class="mainmenu3" id="menu3">
	<div class="wf">
		<div class="wf_in">
			<span>{$spectext->focim->menu3}</span>
		</div>
	</div>
    {foreach($menu3pontok,_menupont)}
        {if ((!$userobj->viszontelado) || ($userobj->viszontelado && !$_menupont.kosar))}
        <a class="menu3" href="{$_menupont.uri}">
            {$_menupont.caption}
            {if ($_menupont.elemcount>=0)}
            ({$_menupont.elemcount}{$text->termek->termek})
            {/if}
        </a>
        {/if}
    {/foreach}
</div>

{/if}