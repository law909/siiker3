Megrendelés érkezett:<br>
Megrendelõ: {$kosarlista.partnernev}<br>
{$kosarlista.partnerirszam}&nbsp;{$kosarlista.partnervaros}&nbsp;{$kosarlista.partnerutca}<br>
Telefon: {$kosarlista.telefon}<br>

Számlázási cím: {$kosarlista.szamlanev}<br>
{$kosarlista.szamlairszam}&nbsp;{$kosarlista.szamlavaros}&nbsp;{$kosarlista.szamlautca}<br>

Szállítási cím: {$kosarlista.szallnev}<br>
{$kosarlista.szallirszam}&nbsp;{$kosarlista.szallvaros}&nbsp;{$kosarlista.szallutca}<br>

{foreach($kosarlista.data,_termek)}
<p>
<a href="{$_termek.uri}">{$_termek.nev}</a>
{$_termek.cikkszam}<br>
{$_termek.mennyiseg}&nbsp;{$_termek.me}<br>
Nettó: {number_format($_termek.nettoarhuf,0,',',' ')}&nbsp;{$_termek.valutanem}<br>
Bruttó: {number_format($_termek.bruttoarhuf,0,',',' ')}&nbsp;{$_termek.valutanem}<br>
</p>
{/foreach}

Összesen:
{number_format($kosarlista.sum.nettoarhuf,0,',',' ')}<br>
{number_format($kosarlista.sum.bruttoarhuf,0,',',' ')}<br>