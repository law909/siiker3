<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ?><script type="text/javascript">
	$(document).ready(function(){
		$('a#termek_fokep').lightbox();
	});
</script>
<div class="termek_r_w" id="termek_adatlapok_rovid">
    <?php 
$_fh1_data = (isset($this->scope["termekek"]["termeklista"]) ? $this->scope["termekek"]["termeklista"]:null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['_termek'])
	{
/* -- foreach start output */
?>
    <div class="termek_rovid">
    	<?php if (( $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termekrovidhasab',    1 => 'true',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == 0 )) {
?>
        <div class="fav_cart">
        	<?php if (( ! (isset($this->scope["kedvenclistavagyok"]) ? $this->scope["kedvenclistavagyok"] : null) )) {
?>
            <?php if (( (isset($this->scope["_termek"]["showdata"]["kedvencek"]) ? $this->scope["_termek"]["showdata"]["kedvencek"]:null) )) {
?>
            <div class="favorite">
                <a onclick="<?php echo $this->scope["_termek"]["data"]["kedvenconclick"];?>" href="#"><img src=/themes/<?php echo $this->scope["theme"];?>/images/favorite.gif title="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'kedvenctitle',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" /></a>
            </div>
			<?php 
}?>

			<?php 
}?>

			<?php if (( (isset($this->scope["kedvenclistavagyok"]) ? $this->scope["kedvenclistavagyok"] : null) )) {
?>
            <div class="favorite">
                <a href="<?php echo $this->scope["_termek"]["data"]["kedvencdeluri"];?>"><img src=/themes/<?php echo $this->scope["theme"];?>/images/favoritedel.gif title="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'kedvencdeltitle',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" /></a>
            </div>
			<?php 
}?>

            <?php if (( (isset($this->scope["_termek"]["showdata"]["kosar"]) ? $this->scope["_termek"]["showdata"]["kosar"]:null) )) {
?>
            <div class="cart">
                <a onclick="<?php echo $this->scope["_termek"]["data"]["kosaronclick"];?>" href="#"><img src=/themes/<?php echo $this->scope["theme"];?>/images/cart.gif title="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'kosartitle',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" /></a>
            </div>
			<?php 
}?>

        </div>
        <?php 
}?>


		<div class="termek_rovidle_container">
		<?php if (( file_exists((string) ''.(isset($this->scope["_termek"]["data"]["smallimageuri"]) ? $this->scope["_termek"]["data"]["smallimageuri"]:null).'') && (isset($this->scope["_termek"]["showdata"]["image"]) ? $this->scope["_termek"]["showdata"]["image"]:null) )) {
?>
		<div class="termek_rovidle_img">
		<a id="termek_fokep" target="_blank" href="<?php echo $this->scope["_termek"]["data"]["bigimageuri"];?>"><img class="rovidle" src="<?php echo $this->scope["_termek"]["data"]["smallimageuri"];?>" /></a>&nbsp;
		</div>
		<?php 
}
else {
?>
		<div class="termek_rovidle_noimg">
		<img class="rovidle" src="/themes/<?php echo $this->scope["theme"];?>/images/no_img.jpg" />&nbsp;
		</div>
		<?php 
}?>

		</div>

        <div class="termek_link">
            <a href="<?php echo $this->scope["_termek"]["data"]["uri"];?>"><?php echo $this->scope["_termek"]["data"]["nev"];?></a>
            		<a onclick="" href="#">
						<img class="question" src=/themes/<?php echo $this->scope["theme"];?>/images/question.png title="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'questiontitle',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" />
					</a>
        </div>

		<?php if (( ( ( $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'sprinter_rovidar',    1 => 'true',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == 1 ) && ( (isset($this->scope["_termek"]["showdata"]["kosar"]) ? $this->scope["_termek"]["showdata"]["kosar"]:null) ) && ( (isset($this->scope["_termek"]["showdata"]["ar"]) ? $this->scope["_termek"]["showdata"]["ar"]:null) == true ) ) || ( ( $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'sprinter_rovidar',    1 => 'true',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == 0 ) && ( (isset($this->scope["_termek"]["showdata"]["ar"]) ? $this->scope["_termek"]["showdata"]["ar"]:null) == true ) ) )) {
?>
			<div class="ar">
					<?php if (( (isset($this->scope["_termek"]["showdata"]["netto"]) ? $this->scope["_termek"]["showdata"]["netto"]:null) == true )) {
?>
						<div class="ar_n"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'ar',    1 => 'netto',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
echo number_format((isset($this->scope["_termek"]["data"]["nettoarhuf"]) ? $this->scope["_termek"]["data"]["nettoarhuf"]:null),0,',',' ');?>&nbsp;<?php echo $this->scope["_termek"]["data"]["valutanem"];?><br /></div>
					<?php 
}?>

					<?php if (( (isset($this->scope["_termek"]["showdata"]["brutto"]) ? $this->scope["_termek"]["showdata"]["brutto"]:null) == true )) {
?>
						<div class="ar_b"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'ar',    1 => 'brutto',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
echo number_format((isset($this->scope["_termek"]["data"]["bruttoarhuf"]) ? $this->scope["_termek"]["data"]["bruttoarhuf"]:null),0,',',' ');?>&nbsp;<?php echo $this->scope["_termek"]["data"]["valutanem"];?><br /></div>
					<?php 
}?>

				<?php if (( (isset($this->scope["_termek"]["showdata"]["valutasar"]) ? $this->scope["_termek"]["showdata"]["valutasar"]:null) == true )) {
?>
					<?php if (( (isset($this->scope["_termek"]["showdata"]["netto"]) ? $this->scope["_termek"]["showdata"]["netto"]:null) == true )) {
?>
						<div class="ar_n"><?php echo number_format((isset($this->scope["_termek"]["data"]["nettoar"]) ? $this->scope["_termek"]["data"]["nettoar"]:null),0,',',' ');?>&nbsp;<?php echo $this->scope["_termek"]["data"]["idegenvalutanem"];?><br /></div>
					<?php 
}?>

					<?php if (( (isset($this->scope["_termek"]["showdata"]["brutto"]) ? $this->scope["_termek"]["showdata"]["brutto"]:null) == true )) {
?>
						<div class="ar_b"><?php echo number_format((isset($this->scope["_termek"]["data"]["bruttoar"]) ? $this->scope["_termek"]["data"]["bruttoar"]:null),0,',',' ');?>&nbsp;<?php echo $this->scope["_termek"]["data"]["idegenvalutanem"];?></div>
					<?php 
}?>

				<?php 
}?>

			</div>
		<?php 
}?>


        <?php if (( (isset($this->scope["_termek"]["showdata"]["cikkszam"]) ? $this->scope["_termek"]["showdata"]["cikkszam"]:null) )) {
?><span class="megjegyzes"><?php echo $this->scope["_termek"]["data"]["cikkszam"];?></span>
        <br/>
        <?php 
}?>

        <?php if (( (isset($this->scope["_termek"]["showdata"]["rovidleiras"]) ? $this->scope["_termek"]["showdata"]["rovidleiras"]:null) )) {
?>
        <p>
            <?php echo $this->scope["_termek"]["data"]["rovidleiras"];?>

        </p>
        <?php 
}?>


		<?php if (( (isset($this->scope["_termek"]["showdata"]["tulajdonsagok"]) ? $this->scope["_termek"]["showdata"]["tulajdonsagok"]:null) )) {
?>
			<?php $this->scope["data"]=(isset($this->scope["_termek"]["data"]) ? $this->scope["_termek"]["data"]:null)?>

			<?php echo Dwoo_Plugin_include($this, 'termek_tulajdonsag.tpl', null, null, null, '_root', null);?>

		<?php 
}?>

		<?php if (( (isset($this->scope["_termek"]["showdata"]["dokumentumok"]) ? $this->scope["_termek"]["showdata"]["dokumentumok"]:null) )) {
?>
			<?php $this->scope["data"]=(isset($this->scope["_termek"]["data"]) ? $this->scope["_termek"]["data"]:null)?>

			<?php echo Dwoo_Plugin_include($this, 'termek_dokumentum.tpl', null, null, null, '_root', null);?>

		<?php 
}?>

		<?php if (( (isset($this->scope["_termek"]["showdata"]["kiskepek"]) ? $this->scope["_termek"]["showdata"]["kiskepek"]:null) )) {
?>
			<?php $this->scope["data"]=(isset($this->scope["_termek"]["data"]) ? $this->scope["_termek"]["data"]:null)?>

			<?php echo Dwoo_Plugin_include($this, $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'termekgaleria',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true), null, null, null, '_root', null);?>

		<?php 
}?>

		<?php if (( (isset($this->scope["_termek"]["showdata"]["me"]) ? $this->scope["_termek"]["showdata"]["me"]:null) == true )) {
?>
			<div class="keszlet">
			<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'mennyegys',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);
echo $this->scope["_termek"]["data"]["me"];?>

			</div>
		<?php 
}?>

        <?php if (( (isset($this->scope["_termek"]["showdata"]["keszlet"]) ? $this->scope["_termek"]["showdata"]["keszlet"]:null) == true )) {
?>
			<div class="keszlet">
			<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'keszlet',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?> <?php echo number_format((isset($this->scope["_termek"]["data"]["keszlet"]) ? $this->scope["_termek"]["data"]["keszlet"]:null),0,',',' ');?> <?php echo $this->scope["_termek"]["data"]["me"];?>

			</div>
		<?php 
}?>

        <?php if (( $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termekrovidhasab',    1 => 'true',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == 1 )) {
?>
        <div class="fav_cart">
        	<?php if (( ! (isset($this->scope["kedvenclistavagyok"]) ? $this->scope["kedvenclistavagyok"] : null) )) {
?>
            <?php if (( (isset($this->scope["_termek"]["showdata"]["kedvencek"]) ? $this->scope["_termek"]["showdata"]["kedvencek"]:null) )) {
?>
            <div class="favorite">
                <a onclick="<?php echo $this->scope["_termek"]["data"]["kedvenconclick"];?>" href="#"><img src=/themes/<?php echo $this->scope["theme"];?>/images/favorite.gif title="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'kedvenctitle',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" /></a>
            </div>
			<?php 
}?>

			<?php 
}?>

			<?php if (( (isset($this->scope["kedvenclistavagyok"]) ? $this->scope["kedvenclistavagyok"] : null) )) {
?>
            <div class="favorite">
                <a href="<?php echo $this->scope["_termek"]["data"]["kedvencdeluri"];?>"><img src=/themes/<?php echo $this->scope["theme"];?>/images/favoritedel.gif title="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'kedvencdeltitle',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" /></a>
            </div>
			<?php 
}?>

            <?php if (( (isset($this->scope["_termek"]["showdata"]["kosar"]) ? $this->scope["_termek"]["showdata"]["kosar"]:null) )) {
?>
            <div class="cart">
                <a onclick="<?php echo $this->scope["_termek"]["data"]["kosaronclick"];?>" href="#"><img src=/themes/<?php echo $this->scope["theme"];?>/images/cart.gif title="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'kosartitle',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" /></a>
            </div>
			<?php 
}?>

		</div>
		<?php 
}?>

        <p class="megjegyzes">
            <a href="<?php echo $this->scope["_termek"]["data"]["uri"];?>"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'bovebben',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["text"], false);?></a>
        </p>
    </div>
    <?php 
/* -- foreach end output */
	}
}?>

</div>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>