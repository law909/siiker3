<div class="term_lista">
	<div class="cim">{$text->cim->kosar}</div>
	{foreach($kosarlista.data,_termek)}
		{$_termek.cikkszam}
		{$_termek.nev}
		{$_termek.nev2}
		{$_termek.mennyiseg}
		{$_termek.me}
		{$_termek.nettoarhuf}
		{$_termek.bruttoarhuf}
		{$_termek.uri}
		{$_termek.bigimageuri}
		{$_termek.smallimageuri}
		{$_termek.imagealt}
		<br>
	{/foreach}
	{foreach($kosarlista.sum,_sum)}
		{$_sum.nettohuf}
		{$_sum.bruttohuf}
	{/foreach}
</div>