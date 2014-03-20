<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ?><div class="right" id="jobboldal">
	<?php if (( ! (isset($this->scope["loggedin"]) ? $this->scope["loggedin"] : null) )) {
?>
		<?php echo Dwoo_Plugin_include($this, 'partner_belepes.tpl', null, null, null, '_root', null);?>

	<?php 
}
else {
?>
		<?php echo Dwoo_Plugin_include($this, 'partner_udvozles.tpl', null, null, null, '_root', null);?>

	<?php 
}?>


	<?php echo Dwoo_Plugin_include($this, 'gyorskereso.tpl', null, null, null, '_root', null);?>

	<?php if (( $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'clock',    1 => 'true',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == 1 )) {
?>
		<div>
			<object width="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'clock',    1 => 'width',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>" height="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'clock',    1 => 'height',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>">
				<param name="wmode" value="transparent" />
				<param name="movie" value="/themes/<?php echo $this->scope["theme"];?>/<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'clock',    1 => 'source',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>">
				<embed src="/themes/<?php echo $this->scope["theme"];?>/<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'clock',    1 => 'source',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>" wmode="transparent" width="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'clock',    1 => 'width',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>" height="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'clock',    1 => 'height',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>">
				</embed>
			</object>
		</div>
	<?php 
}?>

	<?php echo Dwoo_Plugin_include($this, 'menu4.tpl', null, null, null, '_root', null);?>	
	<?php echo Dwoo_Plugin_include($this, 'referencia.tpl', null, null, null, '_root', null);?>

	<?php echo Dwoo_Plugin_include($this, 'statdoboz.tpl', null, null, null, '_root', null);?>

	<?php echo Dwoo_Plugin_include($this, 'hir_doboz.tpl', null, null, null, '_root', null);?>

	<?php echo Dwoo_Plugin_include($this, 'arfolyamdoboz.tpl', null, null, null, '_root', null);?>

	<?php echo Dwoo_Plugin_include($this, 'reklam.tpl', null, null, null, '_root', null);?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>