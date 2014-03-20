Ön a következõ megrendelést adta le webáruházunkban:<br>
Megrendelõ: {$kosarlista.partnernev}<br>
{$kosarlista.partnerirszam}&nbsp;{$kosarlista.partnervaros}&nbsp;{$kosarlista.partnerutca}<br>

Megrendelés azonosító: {$kosarlista.kod}<br>
{foreach($kosarlista.data,_termek)}
<p>
{$_termek.nev}<br>
{$_termek.cikkszam}<br>
{$_termek.mennyiseg}&nbsp;{$_termek.me}<br>
Nettó: {number_format($_termek.nettoarhuf,0,',',' ')}&nbsp;{$_termek.valutanem}<br>
Bruttó: {number_format($_termek.bruttoarhuf,0,',',' ')}&nbsp;{$_termek.valutanem}<br>
</p>
{/foreach}

Összesen:
{number_format($kosarlista.sum.nettoarhuf,0,',',' ')}<br>
{number_format($kosarlista.sum.bruttoarhuf,0,',',' ')}<br>