<div class="menu_tartalom_w" id="menupont_tartalom">
	<div class="cim">{$menu.cim}</div>
	<div class="menu_tartalom">
		{if (file_exists('$menu.elokepuri'))}
			<div class="menup_kep">
				<img src="{$menu.elokepuri}" />
			</div>
		{/if}
		<p>{$menu.szoveg}</p>
		{if (file_exists('$menu.utokepuri'))}
			<div class="menup_kep">
				<img src="{$menu.utokepuri}" />
			</div>
		{/if}
	</div>
</div>