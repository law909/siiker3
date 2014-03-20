<div class="term_lista">
	<div class="cim">{$text->cim->kosar}</div>
	{if (count($kosarlista.data))}
		{foreach($kosarlista.data,_termek)}
		<div class="termek_kosar">
			<form action="index.php" method="post">
				<div class="termek_rovidle_container">
					{if (file_exists('$_termek.smallimageuri'))}
					<div class="termek_rovidle_img">
						<a class="fancybox" href="{$_termek.bigimageuri}"><img class="rovidle" src="{$_termek.smallimageuri}" title="{$_termek.imagealt}" /></a>&nbsp;
				 	</div>
					 {else}
					<div class="termek_rovidle_noimg">
						<img class="rovidle" src="/themes/{$theme}/images/no_img.jpg" />&nbsp;
					</div>
				 	{/if}
			 	</div>
			 	<div class="cart">
				<a href="{$_termek.removeuri}"><img src=/themes/{$theme}/images/cartdel.gif title="{$text->termek->kosardeltitle}" /></a>
				</div>

			 	<div class="termek_link">
					<a href="{$_termek.uri}">{$_termek.nev}</a>
				</div>
				<p class="megjegyzes">{$_termek.cikkszam}</p>
				{if ($_termek.me==true)}
					<div class="">
					{$text->termek->mennyegys}{$_termek.me}
					</div>
				{/if}
				<input id="KosarMennyisegEdit" class="general_input" type="text" value="{$_termek.mennyiseg}" name="mennyiseg"/>
				{$_termek.me}
				<div class="ar_n szoveg_bold">{$text->ar->netto}{number_format($_termek.nettoarhuf,0,',',' ')}&nbsp;{$_termek.valutanem}</div>
				<div class="ar_b szoveg_bold">{$text->ar->brutto}{number_format($_termek.bruttoarhuf,0,',',' ')}&nbsp;{$_termek.valutanem}</div>
				<input class="general_button" type="submit" name="KosarTermekOkBtn" value="{$text->kosar->gomb->ok1}" />
				<input type="hidden" name="com" value="{$kosarlista.okcommand}" />
				<input type="hidden" name="par" value="{$_termek.kod}" />
			</form>
		</div>
		{/foreach}
		<div class="szum_ar">
		<div class="szum_ar_n szoveg_bold">{$text->ar->szum->netto}{number_format($kosarlista.sum.nettoarhuf,0,',',' ')}&nbsp;{$_termek.valutanem}</div>
		<div class="szum_ar_b szoveg_bold">{$text->ar->szum->brutto}{number_format($kosarlista.sum.bruttoarhuf,0,',',' ')}&nbsp;{$_termek.valutanem}</div>
		</div>

		{if ($kosarlista.loggedin)}
		<a href="{$kosarlista.adatbekerouri}" class="button"><span>{$text->kosar->gomb->ok2}</span></a>
		{else}
		<p class="szoveg_bold">{$text->kosar->vasarlashoz}</p>
		{/if}
	{else}
		<p class="szoveg_bold">{$text->kosar->empty}</p>
	{/if}
</div>