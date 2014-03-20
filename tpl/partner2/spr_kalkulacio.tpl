
{if ($spr_kalk.show)}
<div class="table">
<table class="kalkulator" border="1">
<form id="SprKalkulacioForm" action="{$spr_kalk.actionuri}" method="post">
	<tr>
		<td class="szoveg_bold" width="50%">{$spectext->spr_kalkulacioform->valuta}</td>
		<td class="szoveg">{$spr_kalk.valuta}</td>
	</tr>
	<tr>
		<td class="szoveg_bold" width="50%">{$spectext->spr_kalkulacioform->arfolyam}</td>
		<td class="szoveg 2">
		{if ($spr_kalk.arfolyamedit)}
		<input id="ArfolyamEdit" class="general_input" type="text" value="{$spr_kalk.arfolyam}" name="spr_kalkulacio_arfolyam"/>
		{else}
		{number_format($spr_kalk.arfolyam,2,',',' ')}
		{/if}
		</td>
	</tr>
	<tr>
		<td class="szoveg_bold" width="33%">{$spectext->spr_kalkulacioform->futamido}</td>
		<td class="szoveg">{$spr_kalk.futamido}&nbsp;{$spectext->spr_kalkulacioform->futamidome}</td>
	</tr>
	<tr>
		<td class="szoveg_bold" width="33%">{$spectext->spr_kalkulacioform->ertek}</td>
		<td class="megjegyzes"><input id="ErtekEdit"
									  class="general_input" type="text" value=""
									  name="spr_kalkulacio_ertek" /></td>
	</tr>
	<tr>
		<td  colspan="2" align="right"><input class="general_button"
								 type="submit" name="x" value="{$spectext->spr_kalkulacioform->okgomb}" />
			<input type="hidden" name="com" value="{$spr_kalk.okcommand}" />
			<input type="hidden" name="par" value="{$data.kod}" />
		</td>

	</tr>
</form>
</table>
</div>
{/if}
