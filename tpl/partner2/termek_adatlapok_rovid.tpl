<div class="termek_r_w" id="termek_adatlapok_rovid">
    {foreach($termekek.termeklista,_termek)}
    <div class="termek_rovid">
    	{if ($setup->termekrovidhasab->true==0)}
        <div class="fav_cart">
        	{if (!$kedvenclistavagyok)}
            {if ($_termek.showdata.kedvencek)}
            <div class="favorite">
                <a onclick="{$_termek.data.kedvenconclick}" href="#"><img src=/themes/{$theme}/images/favorite.gif title="{$text->termek->kedvenctitle}" /></a>
            </div>
			{/if}
			{/if}
			{if ($kedvenclistavagyok)}
            <div class="favorite">
                <a href="{$_termek.data.kedvencdeluri}"><img src=/themes/{$theme}/images/favoritedel.gif title="{$text->termek->kedvencdeltitle}" /></a>
            </div>
			{/if}
            {if ($_termek.showdata.kosar)}
            <div class="cart">
                <a onclick="{$_termek.data.kosaronclick}" href="#"><img src=/themes/{$theme}/images/cart.gif title="{$text->termek->kosartitle}" /></a>
            </div>
			{/if}
        </div>
        {/if}

		<div class="termek_rovidle_container">
		{if (file_exists('$_termek.data.smallimageuri') && $_termek.showdata.image)}
		<div class="termek_rovidle_img">
		<a class="termek_fokep" target="_blank" href="{$_termek.data.bigimageuri}"  title="{$_termek.data.nev}"><img class="rovidle" src="{$_termek.data.smallimageuri}" title="{$_termek.data.nev}" /></a>&nbsp;
		</div>
		{else}
		<div class="termek_rovidle_noimg">
		<img class="rovidle" src="/themes/{$theme}/images/no_img.jpg" />&nbsp;
		</div>
		{/if}
		</div>

        <div class="termek_link">
            <a href="{$_termek.data.uri}">{$_termek.data.nev}</a>
        </div>

		{if ($_termek.showdata.me==true)}
		<span class="termek_cim2">{$_termek.data.me}<br /></span>
		{/if}

		{if ((($setup->sprinter_rovidar->true==1)&&($_termek.showdata.kosar)&&($_termek.showdata.ar==true))||(($setup->sprinter_rovidar->true==0)&&($_termek.showdata.ar==true)))}
			{if (!$setup->tizedes_az_arban)}{$t=0}{else}{$t=$setup->tizedes_az_arban}{/if}
			<div class="ar">
					{if ($_termek.showdata.netto==true)}
						<div class="ar_n">{$text->ar->netto}{number_format($_termek.data.nettoarhuf,$t,',',' ')}&nbsp;{$_termek.data.valutanem}<br /></div>
					{/if}
					{if ($_termek.showdata.brutto==true)}
						<div class="ar_b">{$text->ar->brutto}{number_format($_termek.data.bruttoarhuf,$t,',',' ')}&nbsp;{$_termek.data.valutanem}<br /></div>
					{/if}
				{if ($_termek.showdata.valutasar==true)}
					{if ($_termek.showdata.netto==true)}
						<div class="ar_n">{number_format($_termek.data.nettoar,$t,',',' ')}&nbsp;{$_termek.data.idegenvalutanem}<br /></div>
					{/if}
					{if ($_termek.showdata.brutto==true)}
						<div class="ar_b">{number_format($_termek.data.bruttoar,$t,',',' ')}&nbsp;{$_termek.data.idegenvalutanem}</div>
					{/if}
				{/if}
			</div>
		{/if}

        {if ($_termek.showdata.cikkszam)}<span class="megjegyzes">{$_termek.data.cikkszam}</span>
        <br/>
        {/if}
        {if ($_termek.showdata.rovidleiras)}
        <p>
            {$_termek.data.rovidleiras}
        </p>
        {/if}

		{if ($_termek.showdata.tulajdonsagok)}
			{$data=$_termek.data}
			{include('termek_tulajdonsag.tpl')}
		{/if}
		{if ($_termek.showdata.dokumentumok)}
			{$data=$_termek.data}
			{include('termek_dokumentum.tpl')}
		{/if}
		{if ($_termek.showdata.kiskepek)}
			{$data=$_termek.data}
			{include($setup->termekgaleria)}
		{/if}
		{if ($_termek.showdata.me==true)}
			<div class="keszlet">
			{$text->termek->mennyegys}{$_termek.data.me}
			</div>
		{/if}
        {if ($_termek.showdata.keszlet==true)}
			<div class="keszlet">
			{$text->termek->keszlet} {number_format($_termek.data.keszlet,0,',',' ')} {$_termek.data.me}
			</div>
		{/if}
        {if ($setup->termekrovidhasab->true==1)}
        <div class="fav_cart">
        	{if (!$kedvenclistavagyok)}
            {if ($_termek.showdata.kedvencek)}
            <div class="favorite">
                <a onclick="{$_termek.data.kedvenconclick}" href="#"><img src=/themes/{$theme}/images/favorite.gif title="{$text->termek->kedvenctitle}" /></a>
            </div>
			{/if}
			{/if}
			{if ($kedvenclistavagyok)}
            <div class="favorite">
                <a href="{$_termek.data.kedvencdeluri}"><img src=/themes/{$theme}/images/favoritedel.gif title="{$text->termek->kedvencdeltitle}" /></a>
            </div>
			{/if}
            {if ($_termek.showdata.kosar)}
            <div class="cart">
                <a onclick="{$_termek.data.kosaronclick}" href="#"><img src=/themes/{$theme}/images/cart.gif title="{$text->termek->kosartitle}" /></a>
            </div>
			{/if}
		</div>
		{/if}
        <p class="megjegyzes">
            <a href="{$_termek.data.uri}">{$text->bovebben}</a>
        </p>
    </div>
    {/foreach}
</div>
