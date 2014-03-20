<?php
ob_start(); /* template body */ ?><div class="search_w" id="gyorskereso">
	<div class="wf">
		<div class="wf_in">
			<span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'kereso',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></span>
		</div>
	</div>
	<div>
		<form class="search" method="post">
			<input type="text" value="" name="par" class="general_input"/>
			<input type="hidden" value="<?php echo $this->scope["gyorskeresocmd"];?>" name="com"/>
			<input type="submit" value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'kereso',    1 => 'gomb',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" class="general_button"/>
		</form>
	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>