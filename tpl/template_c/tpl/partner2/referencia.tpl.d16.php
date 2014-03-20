<?php
ob_start(); /* template body */ ;
if (( (isset($this->scope["referenciak"]["show"]) ? $this->scope["referenciak"]["show"]:null) == true )) {
?>
<div id="referencia" class="referencia_w">
	<div class="wf">
		<div class="wf_in">
			<span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'referencia',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></span>
		</div>
	</div>
	<div class="ref">
		<?php 
$_fh3_data = (isset($this->scope["referenciak"]["referencialist"]) ? $this->scope["referenciak"]["referencialist"]:null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['_referencia'])
	{
/* -- foreach start output */
?>
		<p class="szoveg_bold"><?php echo $this->scope["_referencia"]["caption"];?></p>
		<?php if (( file_exists((string) ''.(isset($this->scope["_referencia"]["imageuri"]) ? $this->scope["_referencia"]["imageuri"]:null).'') )) {
?>
			<img src="<?php echo $this->scope["_referencia"]["imageuri"];?>"/>
		<?php 
}?>


		<p class="szoveg"><?php echo $this->scope["_referencia"]["text"];?></p><br />
		<?php 
/* -- foreach end output */
	}
}?>

	</div>
</div>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>