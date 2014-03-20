<div class="term_lista">
	{include('termekcsoport_navigator.tpl')}
	{if ($csoport.data.leiras)}
		<p>{$csoport.data.leiras}</p>
	{/if}
	{foreach($csoportlista,_csoport)}

			{if file_exists($_csoport.data.smallimageuri)}

		<a class="lista_kep" href="{$_csoport.data.bigimageuri}">	<img class="termcsop_kep"src="{$_csoport.data.smallimageuri}" /></a>
			{/if}
			<a class="almenu" href="{$_csoport.data.uri}">
				{$_csoport.data.nev} {if ($_csoport.data.elemcount>0)}({$_csoport.data.elemcount} termék){/if}
			</a>
<br />

				{$_csoport.data.rovidleiras}
<br />

	{/foreach}
	<br />
	{include('lapozo.tpl')}
	{include('termek_adatlapok_rovid.tpl')}
	{include('lapozo.tpl')}
</div>