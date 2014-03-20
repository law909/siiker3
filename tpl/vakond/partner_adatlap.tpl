<div class="partner_adat_w">
	<div class="cim">{$text->cim->regisztracio}</div>
	<p class="megjegyzes">{$text->regadatform->magyarazat}</p><br /><br />
	<div class="table">
	<form id="PartnerAdatForm" action="{$partner_adatlap.data.actionuri}" method="post">
	<table class="kalkulator">
	<tbody>
		<tr>
		{if ($partner_adatlap.showdata.nev)}
			<td>

				<span class="szoveg_bold">{$text->regadatform->nev}{if ($partner_adatlap.reqshowdata.nev)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input id="PartnerNevEdit" class="general_input{$partner_adatlap.reqdata.nev}" type="text" value="{$partner_adatlap.data.nev}" name="user_partnernev" />

				{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.cegnev)}
			<td>

				<span class="szoveg_bold">{$text->regadatform->cegnev}{if ($partner_adatlap.reqshowdata.vegnev)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input class="general_input{$partner_adatlap.reqdata.cegnev}" type="text" value="{$partner_adatlap.data.cegnev}" name="user_cegnev" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.webusername)}
			<td>
				<span class="szoveg_bold">{$text->regadatform->azonosito}{if ($partner_adatlap.reqshowdata.webusername)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input id="PartnerUsernameEdit" class="general_input{$partner_adatlap.reqdata.webusername}" type="text" value="{$partner_adatlap.data.webusername}" name="user_username" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.webpassword)}
			<td>
				<span class="szoveg_bold">{$text->regadatform->jelszo}{if ($partner_adatlap.reqshowdata.webpassword)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input id="PartnerPassword1Edit" class="general_input{$partner_adatlap.reqdata.webpassword}" type="password" name="user_pwd1" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.webpassword)}
			<td>
				<span class="szoveg_bold">{$text->regadatform->jelszoujra}{if ($partner_adatlap.reqshowdata.webpassword2)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input id="PartnerPassword2Edit" class="general_input{$partner_adatlap.reqdata.webpassword2}" type="password" name="user_pwd2" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.email)}
			<td>
				<span class="szoveg_bold">{$text->regadatform->email}{if ($partner_adatlap.reqshowdata.email)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input id="PartnerEmailEdit" class="general_input{$partner_adatlap.reqdata.email}" type="text" value="{$partner_adatlap.data.email}" name="user_email" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.irszam)}
			<td>
				<span class="szoveg_bold">{$text->regadatform->irszam}{if ($partner_adatlap.reqshowdata.irszam)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input class="general_input{$partner_adatlap.reqdata.irszam}" type="text" value="{$partner_adatlap.data.irszam}" name="user_irszam" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.varos)}
			<td>
				<span class="szoveg_bold">{$text->regadatform->varos}{if ($partner_adatlap.reqshowdata.varos)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input class="general_input{$partner_adatlap.reqdata.varos}" type="text" value="{$partner_adatlap.data.varos}" name="user_varos" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.utca)}
			<td>
				<span class="szoveg_bold">{$text->regadatform->cim}{if ($partner_adatlap.reqshowdata.utca)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input class="general_input{$partner_adatlap.reqdata.utca}" type="text" value="{$partner_adatlap.data.utca}" name="user_utca" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.telefon)}
			<td>
				<span class="szoveg_bold">{$text->regadatform->telefon}{if ($partner_adatlap.reqshowdata.telefon)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input class="general_input{$partner_adatlap.reqdata.telefon}" type="text" value="{$partner_adatlap.data.telefon}" name="user_telefon" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.adoszam)}
			<td>
				<span class="szoveg_bold">{$text->regadatform->adoszam}{if ($partner_adatlap.reqshowdata.adoszam)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input class="general_input{$partner_adatlap.reqdata.adoszam}" type="text" value="{$partner_adatlap.data.adoszam}" name="user_adoszam" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.cjszam)}
			<td>
				<span class="szoveg_bold">{$text->regadatform->cjszam}{if ($partner_adatlap.reqshowdata.cjszam)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input class="general_input{$partner_adatlap.reqdata.cjszam}" type="text" value="{$partner_adatlap.data.cjszam}" name="user_cjszam" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.cegbankszla)}
			<td>
				<span class="szoveg_bold">{$text->regadatform->cegbankszla}{if ($partner_adatlap.reqshowdata.cegbankszla)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
				<input class="general_input{$partner_adatlap.reqdata.cegbankszla}" type="text" value="{$partner_adatlap.data.cegbankszla}" name="user_cegbankszla" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.cegbanknev)}
			<td>
		<span class="szoveg_bold">{$text->regadatform->cegbanknev}{if ($partner_adatlap.reqshowdata.cegbanknev)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
		<input class="general_input{$partner_adatlap.reqdata.cegbanknev}" type="text" value="{$partner_adatlap.data.cegbanknev}" name="user_cegbanknev" />
			</td>
		{/if}
		</tr>
		<tr>
		{if ($partner_adatlap.showdata.viszontelado)}
			<td>
		<span class="szoveg_bold">{$text->regadatform->viszontelado}{if ($partner_adatlap.reqshowdata.viszontelado)}*&nbsp;{else}&nbsp;{/if}</span>
			</td>
			<td>
		<input class="general_input{$partner_adatlap.reqdata.viszontelado}" type="checkbox"{if ($partner_adatlap.data.viszontelado)} checked="checked"{/if} name="user_viszontelado" />
			</td>
		{/if}
		</tr>
		<tr><td><span class="szoveg_bold">Milyen nap van ma?</span></td><td><input id="MilyennapEdit" class="general_input" type="text" name="milyennap"/></td></tr>
		<tr><td>{$text->regadatform->elfogadom}{$text->regadatform->feltetelek}</td><td><input id="ElfogadvaCB" class="general_input" type="checkbox" name="elfogadva"/></td></tr>
		<tr>
		<td></td>
		<td>
			<input class="general_button" type="reset" value="{$text->regadatform->torolgomb}" />
			<input id="PartnerOkBtn" class="general_button" type="submit" name="x" value="{$text->regadatform->okgomb}" />
			<input type="hidden" name="com" value="{$partner_adatlap.data.okcommand}" />
		</td>
		</tr>
	</tbody>
	</table>
	</form>


	<p class="megjegyzes">{$text->regadatform->kotelezo}</p>
	</div>
</div>