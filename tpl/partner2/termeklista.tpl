<div class="term_lista">
	{include('termekcsoport_navigator.tpl')}
	{if ($csoport.data.leiras)}
		<p>{$csoport.data.leiras}</p>
	{/if}
	{foreach($csoportlista,_csoport)}

			{if file_exists($_csoport.data.smallimageuri)}

		<a id="lista_kep" href="{$_csoport.data.bigimageuri}">	<img class="termcsop_kep"src="{$_csoport.data.smallimageuri}" /></a>
			{/if}
			<a class="almenu" href="{$_csoport.data.uri}">
				{$_csoport.data.nev} {if ($_csoport.data.elemcount>0)}({$_csoport.data.elemcount} termék){/if}
			</a>
<br />

				{$_csoport.data.rovidleiras}
<br />
	{/foreach}
	<br />
	<div id="dimfilter" data-uri="{$lapozo.uri}{$lapozo.pageno}">
		{if ($szuro.length1>0)}
			<span class="dimname">{$szuro.caption1}</span>
			<select id="dim1" name="dim1">
			<option value="0">Válasszon</option>
			{foreach($szuro.dim1,_dim1)}
				<option value="{$_dim1.kod}"{if ($_dim1.selected)} selected="selected"{/if}>{$_dim1.nev}</option>
			{/foreach}
		</select>
		{/if}
		{if ($szuro.length2>0)}
		<span class="dimname">{$szuro.caption2}</span>
		<select id="dim2" name="dim2">
			<option value="0">Válasszon</option>
			{foreach($szuro.dim2,_dim2)}
				<option value="{$_dim2.kod}"{if ($_dim2.selected)} selected="selected"{/if}>{$_dim2.nev}</option>
			{/foreach}
		</select>
		{/if}
		{if ($szuro.length3>0)}
		<span class="dimname">{$szuro.caption3}</span>
		<select id="dim3" name="dim3">
			<option value="0">Válasszon</option>
			{foreach($szuro.dim3,_dim3)}
				<option value="{$_dim3.kod}"{if ($_dim3.selected)} selected="selected"{/if}>{$_dim3.nev}</option>
			{/foreach}
		</select>
		{/if}
		{if ($szuro.length4>0)}
		<span class="dimname">{$szuro.caption4}</span>
		<select id="dim4" name="dim4">
			<option value="0">Válasszon</option>
			{foreach($szuro.dim4,_dim4)}
				<option value="{$_dim4.kod}"{if ($_dim4.selected)} selected="selected"{/if}>{$_dim4.nev}</option>
			{/foreach}
		</select>
		{/if}

		{if ($szuro.length5>0)}
		<span class="dimname">{$szuro.caption5}</span>
		<select id="dim5" name="dim5">
			<option value="0">Válasszon</option>
			{foreach($szuro.dim5,_dim5)}
				<option value="{$_dim5.kod}"{if ($_dim5.selected)} selected="selected"{/if}>{$_dim5.nev}</option>
			{/foreach}
		</select>
		{/if}
	</div>
	{include('termek_adatlapok_rovid.tpl')}
	{include('lapozo.tpl')}
</div>