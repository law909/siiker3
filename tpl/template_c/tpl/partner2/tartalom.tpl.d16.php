<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ?><div class="content" id="tartalom">
<?php echo Dwoo_Plugin_include($this, 'baloldal.tpl', null, null, null, '_root', null);?>

<!--  <?php echo Dwoo_Plugin_include($this, 'jobboldal.tpl', null, null, null, '_root', null);?>-->
<?php echo Dwoo_Plugin_include($this, 'kozep.tpl', null, null, null, '_root', null);?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>