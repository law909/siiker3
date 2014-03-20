{if (count($data.kiskepek)>0)}
<div class="termek_galeria" id="termek_galeria">
	{foreach($data.kiskepek,_kep)}
		<a href="{$_kep.bigimageuri}"  title="{$_kep.leiras}">
			<img src="{$_kep.smallimageuri}" />
		</a>
	{/foreach}
</div>
{/if}