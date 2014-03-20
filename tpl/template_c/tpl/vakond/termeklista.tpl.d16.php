<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ;
if (( $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'kepgaleriatipus',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == "lightbox" )) {
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('a#termek_fokep').lightbox();
		$('a#lista_kep').lightbox();
	});
</script>
<?php 
}?>

<?php if (( $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'kepgaleriatipus',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == "flyout" )) {
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('a#termek_fokep').flyout();
		$('a#lista_kep').flyout();
	});
</script>
<?php 
}?>


<div class="term_lista">
	<?php echo Dwoo_Plugin_include($this, 'termekcsoport_navigator.tpl', null, null, null, '_root', null);?>

	<?php if (( (isset($this->scope["csoport"]["data"]["leiras"]) ? $this->scope["csoport"]["data"]["leiras"]:null) )) {
?>
		<p><?php echo $this->scope["csoport"]["data"]["leiras"];?></p>
	<?php 
}?>

	<?php 
$_fh0_data = (isset($this->scope["csoportlista"]) ? $this->scope["csoportlista"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['_csoport'])
	{
/* -- foreach start output */
?>

			<?php if (file_exists((string) (isset($this->scope["_csoport"]["data"]["smallimageuri"]) ? $this->scope["_csoport"]["data"]["smallimageuri"]:null))) {
?>

		<a id="lista_kep" href="<?php echo $this->scope["_csoport"]["data"]["bigimageuri"];?>">	<img class="termcsop_kep"src="<?php echo $this->scope["_csoport"]["data"]["smallimageuri"];?>" /></a>
			<?php 
}?>

			<a class="almenu" href="<?php echo $this->scope["_csoport"]["data"]["uri"];?>">
				<?php echo $this->scope["_csoport"]["data"]["nev"];?> <?php if (( (isset($this->scope["_csoport"]["data"]["elemcount"]) ? $this->scope["_csoport"]["data"]["elemcount"]:null) > 0 )) {
?>(<?php echo $this->scope["_csoport"]["data"]["elemcount"];?> termék)<?php 
}?>

			</a>
<br />

				<?php echo $this->scope["_csoport"]["data"]["rovidleiras"];?>

<br />

	<?php 
/* -- foreach end output */
	}
}?>

	<br />
	<?php echo Dwoo_Plugin_include($this, 'termek_adatlapok_rovid.tpl', null, null, null, '_root', null);?>

	<?php echo Dwoo_Plugin_include($this, 'lapozo.tpl', null, null, null, '_root', null);?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>