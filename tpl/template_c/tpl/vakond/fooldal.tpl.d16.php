<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ?><div id="fooldal">
<?php echo Dwoo_Plugin_include($this, 'hir_minilista.tpl', null, null, null, '_root', null);?>

<?php echo Dwoo_Plugin_include($this, 'fooldal_tartalom.tpl', null, null, null, '_root', null);?>

<?php echo Dwoo_Plugin_include($this, 'termek_ajanlo.tpl', null, null, null, '_root', null);?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>