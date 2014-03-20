<?php
ob_start(); /* template body */ ?><div class="partner_adat_w">
	<div class="cim"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'cim',    1 => 'regisztracio',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></div>
	<p class="megjegyzes"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'magyarazat',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></p><br /><br />
	<div class="table">
	<table class="kalkulator">
	<form id="PartnerAdatForm" action="<?php echo $this->scope["partner_adatlap"]["data"]["actionuri"];?>" method="post">
	<tbody>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["nev"]) ? $this->scope["partner_adatlap"]["showdata"]["nev"]:null) )) {
?>
			<td>

				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'nev',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["nev"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["nev"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input id="PartnerNevEdit" class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["nev"];?>" type="text" value="<?php echo $this->scope["partner_adatlap"]["data"]["nev"];?>" name="user_partnernev" />

				<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["cegnev"]) ? $this->scope["partner_adatlap"]["showdata"]["cegnev"]:null) )) {
?>
			<td>

				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'cegnev',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["vegnev"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["vegnev"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["cegnev"];?>" type="text" value="<?php echo $this->scope["partner_adatlap"]["data"]["cegnev"];?>" name="user_cegnev" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["webusername"]) ? $this->scope["partner_adatlap"]["showdata"]["webusername"]:null) )) {
?>
			<td>
				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'azonosito',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["webusername"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["webusername"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input id="PartnerUsernameEdit" class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["webusername"];?>" type="text" value="<?php echo $this->scope["partner_adatlap"]["data"]["webusername"];?>" name="user_username" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["webpassword"]) ? $this->scope["partner_adatlap"]["showdata"]["webpassword"]:null) )) {
?>
			<td>
				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'jelszo',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["webpassword"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["webpassword"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input id="PartnerPassword1Edit" class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["webpassword"];?>" type="password" name="user_pwd1" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["webpassword"]) ? $this->scope["partner_adatlap"]["showdata"]["webpassword"]:null) )) {
?>
			<td>
				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'jelszoujra',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["webpassword2"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["webpassword2"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input id="PartnerPassword2Edit" class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["webpassword2"];?>" type="password" name="user_pwd2" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["email"]) ? $this->scope["partner_adatlap"]["showdata"]["email"]:null) )) {
?>
			<td>
				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'email',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["email"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["email"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input id="PartnerEmailEdit" class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["email"];?>" type="text" value="<?php echo $this->scope["partner_adatlap"]["data"]["email"];?>" name="user_email" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["irszam"]) ? $this->scope["partner_adatlap"]["showdata"]["irszam"]:null) )) {
?>
			<td>
				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'irszam',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["irszam"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["irszam"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["irszam"];?>" type="text" value="<?php echo $this->scope["partner_adatlap"]["data"]["irszam"];?>" name="user_irszam" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["varos"]) ? $this->scope["partner_adatlap"]["showdata"]["varos"]:null) )) {
?>
			<td>
				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'varos',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["varos"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["varos"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["varos"];?>" type="text" value="<?php echo $this->scope["partner_adatlap"]["data"]["varos"];?>" name="user_varos" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["utca"]) ? $this->scope["partner_adatlap"]["showdata"]["utca"]:null) )) {
?>
			<td>
				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'cim',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["utca"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["utca"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["utca"];?>" type="text" value="<?php echo $this->scope["partner_adatlap"]["data"]["utca"];?>" name="user_utca" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["telefon"]) ? $this->scope["partner_adatlap"]["showdata"]["telefon"]:null) )) {
?>
			<td>
				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'telefon',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["telefon"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["telefon"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["telefon"];?>" type="text" value="<?php echo $this->scope["partner_adatlap"]["data"]["telefon"];?>" name="user_telefon" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["adoszam"]) ? $this->scope["partner_adatlap"]["showdata"]["adoszam"]:null) )) {
?>
			<td>
				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'adoszam',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["adoszam"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["adoszam"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["adoszam"];?>" type="text" value="<?php echo $this->scope["partner_adatlap"]["data"]["adoszam"];?>" name="user_adoszam" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["cjszam"]) ? $this->scope["partner_adatlap"]["showdata"]["cjszam"]:null) )) {
?>
			<td>
				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'cjszam',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["cjszam"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["cjszam"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["cjszam"];?>" type="text" value="<?php echo $this->scope["partner_adatlap"]["data"]["cjszam"];?>" name="user_cjszam" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["cegbankszla"]) ? $this->scope["partner_adatlap"]["showdata"]["cegbankszla"]:null) )) {
?>
			<td>
				<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'cegbankszla',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["cegbankszla"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["cegbankszla"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
				<input class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["cegbankszla"];?>" type="text" value="<?php echo $this->scope["partner_adatlap"]["data"]["cegbankszla"];?>" name="user_cegbankszla" />
			</td>
		<?php 
}?>

		</tr>
		<tr>
		<?php if (( (isset($this->scope["partner_adatlap"]["showdata"]["cegbanknev"]) ? $this->scope["partner_adatlap"]["showdata"]["cegbanknev"]:null) )) {
?>
			<td>
		<span class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'cegbanknev',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
if (( (isset($this->scope["partner_adatlap"]["reqshowdata"]["cegbanknev"]) ? $this->scope["partner_adatlap"]["reqshowdata"]["cegbanknev"]:null) )) {
?>*&nbsp;<?php 
}
else {
?>&nbsp;<?php 
}?></span>
			</td>
			<td>
		<input class="general_input<?php echo $this->scope["partner_adatlap"]["reqdata"]["cegbanknev"];?>" type="text"value="<?php echo $this->scope["partner_adatlap"]["data"]["cegbanknev"];?>" name="user_cegbanknev" />
			</td>
		<?php 
}?>

		</tr>
		<tr><td><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'elfogadom',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'feltetelek',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></td><td><input id="ElfogadvaCB" class="general_input" type="checkbox" name="elfogadva"/></td></tr>
		<tr>
		<td></td>
		<td>
			<input class="general_button" type="reset" value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'torolgomb',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" />
			<input id="PartnerOkBtn" class="general_button" type="submit" name="x" value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'okgomb',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" />
			<input type="hidden" name="com" value="<?php echo $this->scope["partner_adatlap"]["data"]["okcommand"];?>" />
		</td>
		</tr>
	</tbody>
	</form>
	</table>


	<p class="megjegyzes"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'regadatform',    1 => 'kotelezo',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></p>
	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>