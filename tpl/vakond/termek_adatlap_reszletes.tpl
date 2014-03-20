<div class="termek_adat" id="termek_adatlap_reszletes">
	{include('termekcsoport_navigator.tpl')}
	<div  class="termek_kis">
		{if (file_exists($data.smallimageuri) && $showdata.image)}
			<a href="{$data.bigimageuri}" target="_blank" class="termek_fokep"><img class="term_alap_kep" src="{$data.smallimageuri}" /></a>
		{/if}

		{if ($showdata.nev==true)}
			<div class="termek_cim">{$data.nev}
					<a onclick="" href="#">
						<img class="question" src=/themes/{$theme}/images/question.png title="{$text->termek->questiontitle}" />
					</a>
			</div>
		{/if}
		{if ($showdata.cikkszam==true)}
			<span class="megjegyzes">{$data.cikkszam}</span><br />
		{/if}

		{if ($showdata.nev2==true)}
			<span class="termek_cim2">{$data.nev2}<br /></span>
		{/if}
		{if ($showdata.nev3==true)}
			<span class="termek_cim2">{$data.nev3}<br /></span>
		{/if}
		{if ($showdata.nev4==true)}
			<span class="termek_cim2">{$data.nev4}<br /></span>
		{/if}
		{if ($showdata.nev5==true)}
			<span class="termek_cim2">{$data.nev5}<br /></span>
		{/if}
	</div>
	<div class="termekleiras">
		{if ($showdata.ar==true)}
			{if (!$setup->tizedes_az_arban)}{$t=0}{else}{$t=$setup->tizedes_az_arban}{/if}
			<div class="ar">
					{if ($showdata.netto==true)}
						<div class="ar_n">{$text->ar->netto}{number_format($data.nettoarhuf,$t,',',' ')}&nbsp;{$data.valutanem}<br /></div>
					{/if}
					{if ($showdata.brutto==true)}
						<div class="ar_b">{$text->ar->brutto}{number_format($data.bruttoarhuf,$t,',',' ')}&nbsp;{$data.valutanem}<br /></div>
					{/if}
				{if ($showdata.valutasar==true)}
					{if ($showdata.netto==true)}
						<div class="ar_n">{number_format($data.nettoar,$t,',',' ')}&nbsp;{$data.idegenvalutanem}<br /></div>
					{/if}
					{if ($showdata.brutto==true)}
						<div class="ar_b">{number_format($data.bruttoar,$t,',',' ')}&nbsp;{$data.idegenvalutanem}</div>
					{/if}
				{/if}
			</div>
		{/if}
		<p>
			{$data.leiras}
		</p>


		<br />

		<div class="fav_cart">
			{if ($showdata.kedvencek)}
				<div class="favorite">
					<a onclick="{$data.kedvenconclick}" href="#">
						<img src=/themes/{$theme}/images/favorite.gif title="{$text->termek->kedvenctitle}" />
					</a>
				</div>
			{/if}
			{if ($showdata.kosar)}
				<div class="cart">
					<a onclick="{$data.kosaronclick}" href="#">
						<img src=/themes/{$theme}/images/cart.gif title="{$text->termek->kosartitle}" />
					</a>
				</div>
			{/if}
		</div>
		{if ($showdata.me==true)}
		<div class="keszlet">
		{$text->termek->mennyegys}{$data.me}
		</div>
		{/if}
		{if ($showdata.keszlet==true)}
			<div class="keszlet">
			{$text->termek->keszlet} {number_format($data.keszlet,0,',',' ')} {$data.me}
			</div>
		{/if}
		{if ($showdata.tulajdonsagok)}
			{include('termek_tulajdonsag.tpl')}
		{/if}

		{if ($showdata.dokumentumok)}
			{include('termek_dokumentum.tpl')}
		{/if}
		{if ($showdata.kiskepek)}
			{include($setup->termekgaleria)}
		{/if}

		{if ($showdata.ajanlotttermekek)}
			<p class="cim">{$text->termek->ajanlott}</p>
			{$termekek.termeklista=$data.ajanlotttermekek}
			{include('termek_adatlapok_rovid.tpl')}
		{/if}
		{if ($showdata.hozzaszolasok)}
			<div class="commentlist">
			<h4>{$text->termek->hozzaszolasok}</h4><br />
			{foreach($data.hozzaszolasok,_hozzaszolas)}
			<span class="megjegyzes">{$_hozzaszolas.datum}</span>&nbsp;
			<span class="szoveg_bold">{$_hozzaszolas.nick}</span>
			<p class="hozzasz_output">
			{$_hozzaszolas.hozzaszolas}
			</p><br />
			{/foreach}
			</div>
			<div>
			<form action="index.php" method="post">
			<table class="komment"><tbody>
			<tr><td><label class="szoveg_bold">{$text->hozzaszolas->nev}</label></td><td><input type="text" name="nick"/></td></tr>
			<tr><td><label class="szoveg_bold">{$text->hozzaszolas->email}</label></td><td><input type="text" name="email"/></td></tr>
			<tr class="komment_hozzasz"><td><label class="szoveg_bold">{$text->hozzaszolas->hozzaszolas}</label></td><td><textarea name="szoveg"></textarea></td></tr>
			<tr><td><label class="szoveg_bold">Milyen nap van ma?</label></td><td><input id="MilyennapEdit" class="general_input" type="text" name="milyennap"/></td></tr>
			<tr><td></td><td><input type="submit" name="x" value="OK"/></td></tr>
			<input type="hidden" name="com" value="comment"/>
			<input type="hidden" name="termek" value="{$data.kod}"/>
			</tbody></table>
			</form>
			</div>
		{/if}
	</div>


	{include('spr_kalkulacio.tpl')}
	{include('spr_kalkulacio_eredmeny.tpl')}
</div>