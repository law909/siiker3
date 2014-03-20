<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ;
if (( $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'true',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == 1 )) {
?>
	<div class="head">
			<?php echo Dwoo_Plugin_include($this, 'imageroller.tpl', null, null, null, '_root', null);?>

		<div class="headflash">
			<object width="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'width',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>" height="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'height',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>">
				<param name="movie" value="/themes/<?php echo $this->scope["theme"];?>/<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'source',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>">
				<embed src="/themes/<?php echo $this->scope["theme"];?>/<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'source',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>" width="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'width',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>" height="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'height',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>">
				</embed>
			</object>

			<h1><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'fejlec',    1 => 'focim',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></h1>
			<h3><a></a><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'fejlec',    1 => 'alcim',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></h3>

		</div>

	</div>
<?php 
}
else {
?>

<div class="head" id="fejlec">
	<h1><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'fejlec',    1 => 'focim',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></h1>
	<h3><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'fejlec',    1 => 'alcim',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></h3>

</div>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>