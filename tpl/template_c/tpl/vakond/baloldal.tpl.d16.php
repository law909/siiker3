<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ?><div class="left" id="baloldal">
<?php echo Dwoo_Plugin_include($this, 'menu1.tpl', null, null, null, '_root', null);?>


<?php echo Dwoo_Plugin_include($this, 'menu3.tpl', null, null, null, '_root', null);?>


<?php echo Dwoo_Plugin_include($this, 'legujabb_termek.tpl', null, null, null, '_root', null);?>

<?php echo Dwoo_Plugin_include($this, 'legnezettebb_termek.tpl', null, null, null, '_root', null);?>

<?php echo Dwoo_Plugin_include($this, 'legtobbszor_rendelt_termek.tpl', null, null, null, '_root', null);?>

<?php echo Dwoo_Plugin_include($this, 'leggyakoribb_keresoszo.tpl', null, null, null, '_root', null);?>

<?php echo Dwoo_Plugin_include($this, 'nyelvvalaszto.tpl', null, null, null, '_root', null);?>

<?php echo Dwoo_Plugin_include($this, 'linkkuldes.tpl', null, null, null, '_root', null);?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>