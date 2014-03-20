<div class="tema_lista_w">
		<div class="cim">{$temakor.cim} cikkei</div>
	{foreach($temakorbejegyzesek,_cikk)}
		<div class="termek_rovid">
			{if (file_exists('$_cikk.smallimageuri'))}
			<div class="termek_rovidle_container">
			<div class="termek_rovidle_img">
			<a target="_blank" href="{$_cikk.bigimageuri}">
				<img class="rovidle" src="{$_cikk.smallimageuri}" alt="{$_cikk.imagealt}"/>
			</a>
			</div>
			</div>
			{/if}
			<div class="termek_link">
				<a href="{$_cikk.uri}">{$_cikk.caption}</a>
			</div>
			<span class="megjegyzes">{$_cikk.datum}&nbsp;&nbsp;&nbsp;{$_cikk.szerzo}</span><br/><br/>
			<p class="szoveg">{$_cikk.lead}&nbsp;&nbsp;&nbsp;<a href="{$_cikk.uri}">{$text->tovabb}</a></p>

		</div>
	{/foreach}
	{include('lapozo.tpl')}
</div>