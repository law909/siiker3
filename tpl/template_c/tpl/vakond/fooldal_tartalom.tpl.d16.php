<?php
ob_start(); /* template body */ ?><div class="foold_w" id="fooldal_tartalom">
	<div class="wf_main">
		<div class="wf_main_in">
			<span> <?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'fooldal',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?> </span>
		</div>
	</div>
	<div class="main_container">	
		<div class="foold_szoveg">
			<?php echo $this->scope["fooldalszoveg"];?>


		</div>
	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>