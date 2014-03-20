<div class="term_lista">
	<div class="cim">{$text->cim->kedvencek}</div>
	{if (count($termekek.termeklista))}
		{$kedvenclistavagyok=true}
		{include('termek_adatlapok_rovid.tpl')}
		{include('lapozo.tpl')}
	{else}
	<div class="kosarend">
		<p class="cim">{$text->kedvenc->no}</p>
	</div>
	{/if}	
</div>