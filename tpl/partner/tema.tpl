<div class="tema_w">
	<div class="termek_kis">
		{if (file_exists($temakorbejegyzes.smallimageuri))}
		<a target="_blank" href="{$temakorbejegyzes.bigimageuri}">
			<img class="term_alap_kep" src="{$temakorbejegyzes.smallimageuri}" alt="{$temakorbejegyzes.imagealt}"/>
		</a>
		{/if}
		<div class="termek_cim">{$temakorbejegyzes.caption}</div>
		<span class="megjegyzes">{$temakorbejegyzes.datum}&nbsp;&nbsp;&nbsp;&nbsp;{$temakorbejegyzes.szerzo}</span>
		<br/><br/>
		<p class="szoveg_bold">{$temakorbejegyzes.lead}</p>
		<div class="termekleiras">
			{$temakorbejegyzes.szoveg}
		</div>
	</div>
	{$data=$temakorbejegyzes}
	{include('termek_dokumentum.tpl')}
	{include($setup->termekgaleria)}
</div>