<?php
ob_start(); /* template body */ ?><div class="blind">
	<div class="blind_c ">
		<a href="/?c=accessibility">
			<img src="/themes/<?php echo $this->scope["theme"];?>/images/blind.gif" title="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'blind',    1 => 'title',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" />
		</a>
	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>