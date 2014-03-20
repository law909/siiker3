<div class="kosaradat_w">
	{if ($kosarlista.loggedin)}
	<form id="KosarSubmitForm" action="index.php" method="post">
	<table class="kosaradat"><tbody>

		<tr><td><p class="szoveg_bold">{$text->regadatform->szallcim}</p></td></tr>
        <tr><td>Név:</td><td><input class="general_input" type="text" name="szal_nev" value="{$kosarlista.data.szal_nev}"></td></tr>
		<tr><td>{$text->regadatform->irszam}</td><td><input class="general_input" type="text" name="szal_irszam" value="{$kosarlista.data.szal_irszam}"/></td></tr>
		<tr><td>{$text->regadatform->varos}</td><td><input class="general_input" type="text" name="szal_varos" value="{$kosarlista.data.szal_varos}"/></td></tr>
		<tr><td>{$text->regadatform->cim}</td><td><input class="general_input" type="text" name="szal_utca" value="{$kosarlista.data.szal_utca}"/></td></tr>
		<tr><td><p class="szoveg_bold">{$text->regadatform->szamlcim}</p></td></tr>
        <tr><td>Név:</td><td><input class="general_input" type="text" name="szam_nev" value="{$kosarlista.data.szam_nev}"></td></tr>
		<tr><td>{$text->regadatform->irszam}</td><td><input class="general_input" type="text" name="szam_irszam" value="{$kosarlista.data.szam_irszam}"/></td></tr>
		<tr><td>{$text->regadatform->varos}</td><td><input class="general_input" type="text" name="szam_varos" value="{$kosarlista.data.szam_varos}"/></td></tr>
		<tr><td>{$text->regadatform->cim}</td><td><input class="general_input" type="text" name="szam_utca" value="{$kosarlista.data.szam_utca}"/></td></tr>
        <tr><td>Adószám:</td><td><input class="general_input" type="text" name="szam_adoszam" value="{$kosarlista.data.szam_adoszam}"></td></tr>
		<tr><td>{$text->regadatform->fizmod}</td>
		<td><select id="FizmodEdit" name="fizmod">
		{foreach($kosarlista.data.fizmodok,_fizmod)}
		<option value="{$_fizmod.kod}">{$_fizmod.nev}</option>
		{/foreach}
		</select></td></tr>
		{if ($setup->kellbankkartya)}
		<tr><td>{$text->regadatform->bankkartyaszam}</td>
		<td>
		<input id="Kartyaszam1Edit" class="general_input" type="text" name="kartyaszam1" maxlength="4" size="1"/>
		<input id="Kartyaszam2Edit" class="general_input" type="text" name="kartyaszam2" maxlength="4" size="1"/>
		<input id="Kartyaszam3Edit" class="general_input" type="text" name="kartyaszam3" maxlength="4" size="1"/>
		<input id="Kartyaszam4Edit" class="general_input" type="text" name="kartyaszam4" maxlength="4" size="1"/>
		</td></tr>
		<tr><td>{$text->regadatform->biztkod}</td><td><input class="general_input" type="text" name="kartyabiztkod"/></td></tr>
		<tr><td>{$text->regadatform->banktelepules}</td><td><input class="general_input" type="text" name="banktelepules"/></td></tr>
		{/if}
		<tr><td>{$text->regadatform->elfogadom}{$text->regadatform->feltetelek}</td><td><input id="ElfogadvaCB" class="general_input" type="checkbox" name="elfogadva"/></td></tr>
		<tr>
		<td></td>
		<td>
		<input id="KosarOkBtn" class="general_button" type="submit" name="KosarOkBtn" value="{$text->kosar->gomb->ok3}" />

		</td></tr>
		<input type="hidden" name="com" value="{$kosarlista.submitcommand}"/>

	</tbody>
	</table>
	</form>
	<p class="megjegyzes2">* Kötelezõ kitölteni</p>
	{else}
	<p class="szoveg_bold">{$text->kosar->vasarlashoz}</p>
	{/if}
</div>