<?php
ob_start(); /* template body */ ?><div class="termektulajdonsag">
	<ul>
		<?php 
$_fh2_data = (isset($this->scope["data"]["tulajdonsagok"]) ? $this->scope["data"]["tulajdonsagok"]:null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['_tulajdonsag'])
	{
/* -- foreach start output */
?>
		  <li>
			  <span class="szoveg_bold"><?php echo $this->scope["_tulajdonsag"]["tipusnev"];
echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',    2 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'tulajdonsag',    2 => 'kettospont',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',    3 => '',  ),), $this->scope["text"], false);?></span><?php echo $this->scope["_tulajdonsag"]["erteknev"];?>

		  </li>
		<?php 
/* -- foreach end output */
	}
}?>

	</ul>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>