<div class="dokum">
<div class="cim">{$spectext->focim->spr_dokumentumok}</div>
{foreach($partner_dokumentum,_doku)}
<a class="button" href="{$_doku.uri}"><span>{$_doku.leiras}</span></a><br /><br />
{/foreach}
</div>