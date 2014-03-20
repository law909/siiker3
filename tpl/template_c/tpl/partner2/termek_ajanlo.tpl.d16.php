<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ?><div id="termek_ajanlo" class="termek_ajanlo">
	<?php if (( (isset($this->scope["termekek"]["show"]) ? $this->scope["termekek"]["show"]:null) == true )) {
?>
		<div class="wf_main">
			<div class="wf_main_in">
				<span> <?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'ajanlo',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?> </span>
			</div>
		</div>
		<div class="main_container">
			<?php echo Dwoo_Plugin_include($this, 'termek_adatlapok_rovid.tpl', null, null, null, '_root', null);?>

		</div>	
	<?php 
}?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>