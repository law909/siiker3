<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ?><div class="right" id="jobboldal">
	<?php echo Dwoo_Plugin_include($this, 'menu4.tpl', null, null, null, '_root', null);?>	
	<?php echo Dwoo_Plugin_include($this, 'referencia.tpl', null, null, null, '_root', null);?>

	<?php echo Dwoo_Plugin_include($this, 'statdoboz.tpl', null, null, null, '_root', null);?>

	<?php echo Dwoo_Plugin_include($this, 'hir_doboz.tpl', null, null, null, '_root', null);?>

	<?php echo Dwoo_Plugin_include($this, 'arfolyamdoboz.tpl', null, null, null, '_root', null);?>

	<?php echo Dwoo_Plugin_include($this, 'reklam.tpl', null, null, null, '_root', null);?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>