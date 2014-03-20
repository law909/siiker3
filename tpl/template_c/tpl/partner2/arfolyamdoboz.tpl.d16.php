<?php
ob_start(); /* template body */ ;
if (( (isset($this->scope["arfolyamdoboz"]["show"]) ? $this->scope["arfolyamdoboz"]["show"]:null) )) {
?>
<div class="arfolyam" id="arfolyamdoboz">
	<div class="wf">
		<div class="wf_in">
			<span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'napiarfolyam',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></span>
		</div>
	</div>
	<div class="valuta">
	<?php 
$_fh11_data = (isset($this->scope["arfolyamdoboz"]["arfolyamlista"]) ? $this->scope["arfolyamdoboz"]["arfolyamlista"]:null);
if ($this->isArray($_fh11_data) === true)
{
	foreach ($_fh11_data as $this->scope['_arfolyam'])
	{
/* -- foreach start output */
?>
		<span class="szoveg_bold"><?php echo $this->scope["_arfolyam"]["valutanem"];?>-<?php echo $this->scope["_arfolyam"]["arfolyam"];?></span><br/>
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