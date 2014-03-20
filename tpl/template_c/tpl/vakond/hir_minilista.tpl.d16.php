<?php
ob_start(); /* template body */ ;
if (( (isset($this->scope["hirek"]["show"]) ? $this->scope["hirek"]["show"]:null) )) {
?>
<div class="hirmini" id="hir_minilista">
	<div class="wf_main">
		<div class="wf_main_in">
			<span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'hirek',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></span>
		</div>
	</div>
	<div class="main_container">
	<p><?php 
$_fh0_data = (isset($this->scope["hirek"]["hirlista"]) ? $this->scope["hirek"]["hirlista"]:null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['_hir'])
	{
/* -- foreach start output */
?>
	<a class="hircim_lapozo" href="<?php echo $this->scope["_hir"]["uri"];?>">
	<?php echo $this->scope["_hir"]["caption"];?>

	</a><br />
	<?php 
/* -- foreach end output */
	}
}?></p>
	</div>
</div>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>