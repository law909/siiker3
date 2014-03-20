<div class="term_lista">
	<div class="cim">{$text->cim->kereseseredmeny}</div>
	{if (count($termekek.termeklista))}
	<p><span class="szoveg_bold">{$text->kereses->szoveg}</span> {$keresettkif}</p><br />
	{include('termek_adatlapok_rovid.tpl')}
	{include('lapozo.tpl')}
	{else}
	<div class="kosarend"><p class="cim">{$text->kereses->szoveg} {$keresettkif}<br />
	{$text->kereses->no}</p></div>
	{/if}
</div>