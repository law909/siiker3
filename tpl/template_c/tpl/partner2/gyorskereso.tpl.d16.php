<?php
ob_start(); /* template body */ ?><div class="search_w" id="gyorskereso">
	<!--<div class="wf">
		<div class="wf_in">
			<span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'kereso',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></span>
		</div>
	</div>-->

		<form class="search" method="post">
			<div class="search_input"><input type="text" value="" name="par" class="general_input"/></div>
			<input type="hidden" value="<?php echo $this->scope["gyorskeresocmd"];?>" name="com"/>
			<div class="search_button"><input type="submit" value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'kereso',    1 => 'gomb',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" class="general_button"/></div>
		</form>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>