<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ;
if (( $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'kepgaleriatipus',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == "lightbox" )) {
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('a#termek_fokep').lightbox();
	});
</script>
<?php 
}?>

<?php if (( $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'kepgaleriatipus',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == "flyout" )) {
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('a#termek_fokep').flyout();
	});
</script>
<?php 
}?>

<div class="termek_adat" id="termek_adatlap_reszletes">
	<?php echo Dwoo_Plugin_include($this, 'termekcsoport_navigator.tpl', null, null, null, '_root', null);?>

	<div  class="termek_kis">
		<?php if (( file_exists((string) (isset($this->scope["data"]["smallimageuri"]) ? $this->scope["data"]["smallimageuri"]:null)) && (isset($this->scope["showdata"]["image"]) ? $this->scope["showdata"]["image"]:null) )) {
?>
			<a href="<?php echo $this->scope["data"]["bigimageuri"];?>" target="_blank" id="termek_fokep"><img class="term_alap_kep" src="<?php echo $this->scope["data"]["smallimageuri"];?>" /></a>
		<?php 
}?>


		<?php if (( (isset($this->scope["showdata"]["nev"]) ? $this->scope["showdata"]["nev"]:null) == true )) {
?>
			<div class="termek_cim"><?php echo $this->scope["data"]["nev"];?>

					<a onclick="" href="#">
						<img class="question" src=/themes/<?php echo $this->scope["theme"];?>/images/question.png title="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'questiontitle',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" />
					</a>
			</div>
		<?php 
}?>

		<?php if (( (isset($this->scope["showdata"]["cikkszam"]) ? $this->scope["showdata"]["cikkszam"]:null) == true )) {
?>
			<span class="megjegyzes"><?php echo $this->scope["data"]["cikkszam"];?></span><br />
		<?php 
}?>


		<?php if (( (isset($this->scope["showdata"]["nev2"]) ? $this->scope["showdata"]["nev2"]:null) == true )) {
?>
			<span class="termek_cim2"><?php echo $this->scope["data"]["nev2"];?><br /></span>
		<?php 
}?>

		<?php if (( (isset($this->scope["showdata"]["nev3"]) ? $this->scope["showdata"]["nev3"]:null) == true )) {
?>
			<span class="termek_cim2"><?php echo $this->scope["data"]["nev3"];?><br /></span>
		<?php 
}?>

		<?php if (( (isset($this->scope["showdata"]["nev4"]) ? $this->scope["showdata"]["nev4"]:null) == true )) {
?>
			<span class="termek_cim2"><?php echo $this->scope["data"]["nev4"];?><br /></span>
		<?php 
}?>

		<?php if (( (isset($this->scope["showdata"]["nev5"]) ? $this->scope["showdata"]["nev5"]:null) == true )) {
?>
			<span class="termek_cim2"><?php echo $this->scope["data"]["nev5"];?><br /></span>
		<?php 
}?>

	</div>
	<div class="termekleiras">
		<?php if (( (isset($this->scope["showdata"]["ar"]) ? $this->scope["showdata"]["ar"]:null) == true )) {
?>
			<div class="ar">
					<?php if (( (isset($this->scope["showdata"]["netto"]) ? $this->scope["showdata"]["netto"]:null) == true )) {
?>
						<div class="ar_n"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'ar',    1 => 'netto',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
echo number_format((isset($this->scope["data"]["nettoarhuf"]) ? $this->scope["data"]["nettoarhuf"]:null),0,',',' ');?>&nbsp;<?php echo $this->scope["data"]["valutanem"];?><br /></div>
					<?php 
}?>

					<?php if (( (isset($this->scope["showdata"]["brutto"]) ? $this->scope["showdata"]["brutto"]:null) == true )) {
?>
						<div class="ar_b"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'ar',    1 => 'brutto',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
echo number_format((isset($this->scope["data"]["bruttoarhuf"]) ? $this->scope["data"]["bruttoarhuf"]:null),0,',',' ');?>&nbsp;<?php echo $this->scope["data"]["valutanem"];?><br /></div>
					<?php 
}?>

				<?php if (( (isset($this->scope["showdata"]["valutasar"]) ? $this->scope["showdata"]["valutasar"]:null) == true )) {
?>
					<?php if (( (isset($this->scope["showdata"]["netto"]) ? $this->scope["showdata"]["netto"]:null) == true )) {
?>
						<div class="ar_n"><?php echo number_format((isset($this->scope["data"]["nettoar"]) ? $this->scope["data"]["nettoar"]:null),0,',',' ');?>&nbsp;<?php echo $this->scope["data"]["idegenvalutanem"];?><br /></div>
					<?php 
}?>

					<?php if (( (isset($this->scope["showdata"]["brutto"]) ? $this->scope["showdata"]["brutto"]:null) == true )) {
?>
						<div class="ar_b"><?php echo number_format((isset($this->scope["data"]["bruttoar"]) ? $this->scope["data"]["bruttoar"]:null),0,',',' ');?>&nbsp;<?php echo $this->scope["data"]["idegenvalutanem"];?></div>
					<?php 
}?>

				<?php 
}?>

			</div>
		<?php 
}?>

		<p>
			<?php echo $this->scope["data"]["leiras"];?>

		</p>


		<br />

		<div class="fav_cart">
			<?php if (( (isset($this->scope["showdata"]["kedvencek"]) ? $this->scope["showdata"]["kedvencek"]:null) )) {
?>
				<div class="favorite">
					<a onclick="<?php echo $this->scope["data"]["kedvenconclick"];?>" href="#">
						<img src=/themes/<?php echo $this->scope["theme"];?>/images/favorite.gif title="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'kedvenctitle',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" />
					</a>
				</div>
			<?php 
}?>

			<?php if (( (isset($this->scope["showdata"]["kosar"]) ? $this->scope["showdata"]["kosar"]:null) )) {
?>
				<div class="cart">
					<a onclick="<?php echo $this->scope["data"]["kosaronclick"];?>" href="#">
						<img src=/themes/<?php echo $this->scope["theme"];?>/images/cart.gif title="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'kosartitle',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" />
					</a>
				</div>
			<?php 
}?>

		</div>
		<?php if (( (isset($this->scope["showdata"]["me"]) ? $this->scope["showdata"]["me"]:null) == true )) {
?>
		<div class="keszlet">
		<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'mennyegys',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
echo $this->scope["data"]["me"];?>

		</div>
		<?php 
}?>

		<?php if (( (isset($this->scope["showdata"]["keszlet"]) ? $this->scope["showdata"]["keszlet"]:null) == true )) {
?>
			<div class="keszlet">
			<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'keszlet',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?> <?php echo number_format((isset($this->scope["data"]["keszlet"]) ? $this->scope["data"]["keszlet"]:null),0,',',' ');?> <?php echo $this->scope["data"]["me"];?>

			</div>
		<?php 
}?>

		<?php if (( (isset($this->scope["showdata"]["tulajdonsagok"]) ? $this->scope["showdata"]["tulajdonsagok"]:null) )) {
?>
			<?php echo Dwoo_Plugin_include($this, 'termek_tulajdonsag.tpl', null, null, null, '_root', null);?>

		<?php 
}?>


		<?php if (( (isset($this->scope["showdata"]["dokumentumok"]) ? $this->scope["showdata"]["dokumentumok"]:null) )) {
?>
			<?php echo Dwoo_Plugin_include($this, 'termek_dokumentum.tpl', null, null, null, '_root', null);?>

		<?php 
}?>

		<?php if (( (isset($this->scope["showdata"]["kiskepek"]) ? $this->scope["showdata"]["kiskepek"]:null) )) {
?>
			<?php echo Dwoo_Plugin_include($this, $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'termekgaleria',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true), null, null, null, '_root', null);?>

		<?php 
}?>


		<?php if (( (isset($this->scope["showdata"]["ajanlotttermekek"]) ? $this->scope["showdata"]["ajanlotttermekek"]:null) )) {
?>
			<p class="cim"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'ajanlott',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></p>
			<?php $this->scope["termekek"]["termeklista"]=(isset($this->scope["data"]["ajanlotttermekek"]) ? $this->scope["data"]["ajanlotttermekek"]:null)?>

			<?php echo Dwoo_Plugin_include($this, 'termek_adatlapok_rovid.tpl', null, null, null, '_root', null);?>

		<?php 
}?>

		<?php if (( (isset($this->scope["showdata"]["hozzaszolasok"]) ? $this->scope["showdata"]["hozzaszolasok"]:null) )) {
?>
			<div>
			<h4><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'hozzaszolasok',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></h4><br />
			<?php 
$_fh0_data = (isset($this->scope["data"]["hozzaszolasok"]) ? $this->scope["data"]["hozzaszolasok"]:null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['_hozzaszolas'])
	{
/* -- foreach start output */
?>
			<span class="megjegyzes"><?php echo $this->scope["_hozzaszolas"]["datum"];?></span>&nbsp;
			<span class="szoveg_bold"><?php echo $this->scope["_hozzaszolas"]["nick"];?></span>
			<p class="hozzasz_output">
			<?php echo $this->scope["_hozzaszolas"]["hozzaszolas"];?>

			</p><br />
			<?php 
/* -- foreach end output */
	}
}?>

			</div>
			<div>
			<form action="index.php" method="post">
			<table class="komment"><tbody>
			<tr><td><label class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'hozzaszolas',    1 => 'nev',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></label></td><td><input type="text" name="nick"/></td></tr>
			<tr><td><label class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'hozzaszolas',    1 => 'email',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></label></td><td><input type="text" name="email"/></td></tr>
			<tr class="komment_hozzasz"><td><label class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'hozzaszolas',    1 => 'hozzaszolas',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></label></td><td><textarea name="szoveg"></textarea></td></tr>
			<tr><td></td><td><input type="submit" name="x" value="OK"/></td></tr>
			<input type="hidden" name="com" value="comment"/>
			<input type="hidden" name="termek" value="<?php echo $this->scope["data"]["kod"];?>"/>
			</tbody></table>
			</form>
			</div>
		<?php 
}?>

	</div>


	<?php echo Dwoo_Plugin_include($this, 'spr_kalkulacio.tpl', null, null, null, '_root', null);?>

	<?php echo Dwoo_Plugin_include($this, 'spr_kalkulacio_eredmeny.tpl', null, null, null, '_root', null);?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>