<div id="linktar" class="linktar_w">
		<div class="cim">{$text->cim->linktar}</div>
		<div class="linktartalom">
			{foreach($linkcsoportlista,_linkcsoport)}
				<p class="szoveg_bold">{$_linkcsoport.csoportnev}</p>
			<div class="linkbox">
				{foreach($_linkcsoport.linklista,_link)}
					<div class="hlink">
					{if (file_exists($_link.imageuri))}
					<img class="link_kep" src="{$_link.imageuri}" />
					{/if}
					<a href="{$_link.uri}" target="_blank">{$_link.caption}</a><br />
					</div>
				{/foreach}
			</div>	
			{/foreach}
		</div>
</div>