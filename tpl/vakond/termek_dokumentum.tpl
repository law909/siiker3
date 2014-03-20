{if (count($data.dokumentumok)>0)}
<div class="documents">
	<ul>
		<p class="szoveg_bold">{$text->termek->dokumentum->letolthetodok}</p>
		{foreach($data.dokumentumok,_doku)}
		  <li>
				<a class="link" href="{$_doku.uri}">{$_doku.leiras}</a>
		  </li>
		{/foreach}
	</ul>
</div>
{/if}
{if (count($data.archivdokumentumok)>0)}
<div class="documents">
	Archív dokumentumok
	<ul>
		<p class="szoveg_bold">{$text->termek->dokumentum->letolthetodok}</p>
		{foreach($data.archivdokumentumok,_doku)}
			<li>
				<a class="link" href="{$_doku.uri}">{$_doku.leiras} - {$_doku.archivdatum}</a>
			</li>
		{/foreach}
	</ul>
</div>
{/if}