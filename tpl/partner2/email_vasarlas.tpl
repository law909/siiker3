Megrendel�s �rkezett:<br>
Megrendel�: {$kosarlista.partnernev}<br>
{$kosarlista.partnerirszam}&nbsp;{$kosarlista.partnervaros}&nbsp;{$kosarlista.partnerutca}<br>

{foreach($kosarlista.data,_termek)}
<p>
<a href="{$_termek.uri}">{$_termek.nev}</a>
{$_termek.cikkszam}<br>
{$_termek.mennyiseg}&nbsp;{$_termek.me}<br>
Nett�: {number_format($_termek.nettoarhuf,0,',',' ')}&nbsp;{$_termek.valutanem}<br>
Brutt�: {number_format($_termek.bruttoarhuf,0,',',' ')}&nbsp;{$_termek.valutanem}<br>
</p>
{/foreach}

�sszesen:
{number_format($kosarlista.sum.nettoarhuf,0,',',' ')}<br>
{number_format($kosarlista.sum.bruttoarhuf,0,',',' ')}<br>