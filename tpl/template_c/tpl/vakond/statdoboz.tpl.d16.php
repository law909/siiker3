<?php
ob_start(); /* template body */ ;
if (( (isset($this->scope["statdoboz"]["show"]) ? $this->scope["statdoboz"]["show"]:null) )) {
?>
<div class="statdoboz_w" id="statdoboz">
	<?php if (( mb_strlen($this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'statdoboz',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), (isset($this->scope["spectext"]) ? $this->scope["spectext"]:null), true), $this->charset) > 12 )) {
?>
		<div class="wf_2lines">
			<div class="wf_in_2lines">
				<span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'statdoboz',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></span>
			</div>
		</div>	
	<?php 
}
else {
?>
		<div class="wf">
			<div class="wf_in">
				<span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'statdoboz',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></span>
			</div>
		</div>	
	<?php 
}?>

	<div class="stat"><span class="stat_no"><?php echo $this->scope["statdoboz"]["stat"]["latogatoszam"];?></span></div>
</div>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>