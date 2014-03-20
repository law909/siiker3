
{if ($spr_kalk_eredmeny.show)}
<div class="table">
	<table class="kalkulator" border="1">
		<tr>
			<td class="szoveg_bold" width="33%">{$spectext->spr_kalkulacioform->ertek}</td>
			<td class="szoveg">{number_format($spr_kalk_eredmeny.szerzodesertek,0,',',' ')}&nbsp;{$spr_kalk_eredmeny.valuta}</td>
			<td></td>
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%">{$spectext->spr_kalkulacioform->valuta}</td>
			<td></td>
			<td class="szoveg">{$spr_kalk_eredmeny.valuta}</td>
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%">{$spectext->spr_kalkulacioform->arfolyam}</td>
			<td class="szoveg">{number_format($spr_kalk_eredmeny.arfolyam,2,',',' ')}</td>
			<td></td>
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%">{$spectext->spr_kalkulacioform->futamido}</td>
			<td class="szoveg">{$spr_kalk_eredmeny.futamido}&nbsp;{$spectext->spr_kalkulacioform->futamidome}</td>
			<td></td>
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%">{$spectext->spr_kalkulacioeredmeny->indulo}</td>
			{if ($spr_kalk_eredmeny.indulo!=$spr_kalk_eredmeny.indulovaluta)}
			
			<td class="szoveg">{number_format($spr_kalk_eredmeny.indulo,0,',',' ')}&nbsp;HUF</td>
			
			<td class="szoveg">{number_format($spr_kalk_eredmeny.indulovaluta,2,',',' ')}&nbsp;{$spr_kalk_eredmeny.valuta}</td>
			{else}
			<td class="szoveg">{number_format($spr_kalk_eredmeny.indulo,0,',',' ')}&nbsp;HUF</td>
			{/if}
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%">{$spectext->spr_kalkulacioeredmeny->szerzkotdij}</td>
			<td class="szoveg">{number_format($spr_kalk_eredmeny.szerzkotdij,0,',',' ')}&nbsp;HUF</td>
			<td></td>
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%">{$spectext->spr_kalkulacioeredmeny->havidij}</td>
			{if ($spr_kalk_eredmeny.havidij!=$spr_kalk_eredmeny.havidijvaluta)}
			<td class="szoveg">{number_format($spr_kalk_eredmeny.havidij,0,',',' ')}&nbsp;HUF</td>
			
			<td class="szoveg">{number_format($spr_kalk_eredmeny.havidijvaluta,2,',',' ')}&nbsp;{$spr_kalk_eredmeny.valuta}</td>
			{else}
			<td class="szoveg">{number_format($spr_kalk_eredmeny.havidij,0,',',' ')}
					&nbsp;HUF
			</td>
			{/if}
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%">{$spectext->spr_kalkulacioeredmeny->maradvanyertek}</td>
			<td class="szoveg">{number_format($spr_kalk_eredmeny.maradvanyertek,0,',',' ')}&nbsp;HUF</td>
			<td></td>
		</tr>
	</table>
	<br />
	<a class="button" target=_blank href="{$spr_kalk_eredmeny.szerzkivonaturi}"><span>{$spectext->spr_kalkulacioeredmeny->szerzodeskivonat}</span></a>
	<br /><br />
	<a class="button" href="{$spr_kalk_eredmeny.ajanlatkeresuri}"><span>{$spectext->spr_kalkulacioeredmeny->ajanlatkeres}</span></a>
</div>
{/if}
