<div class="left" id="baloldal">
{include('menu1.tpl')}

{include('menu3.tpl')}
{include('menu4.tpl')}
	{if (!$loggedin)}
		{include('partner_belepes.tpl')}
	{else}
		{include('partner_udvozles.tpl')}
	{/if}
	{include('gyorskereso.tpl')}
	{include('referencia.tpl')}
{include('legujabb_termek.tpl')}
{include('legnezettebb_termek.tpl')}
{include('legtobbszor_rendelt_termek.tpl')}
{include('leggyakoribb_keresoszo.tpl')}
{include('statdoboz.tpl')}
{include('hir_doboz.tpl')}
{include('arfolyamdoboz.tpl')}
{include('reklam.tpl')}
{include('nyelvvalaszto.tpl')}
{include('linkkuldes.tpl')}
</div>