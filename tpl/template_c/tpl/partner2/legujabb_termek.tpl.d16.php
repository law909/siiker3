<?php
ob_start(); /* template body */ ;
if (( (isset($this->scope["legujabbtermekek"]["show"]) ? $this->scope["legujabbtermekek"]["show"]:null) == true )) {
?>
<div class="leg_w" id="legujabb_termek">
	<div class="wf">
		<div class="wf_in">
			<span><?php echo $this->scope["legujabbtermekek"]["elemcount"];
echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',    2 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'leg',    2 => 'ujabb',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',    3 => '',  ),), $this->scope["spectext"], false);?></span>
		</div>
	</div>
	<div class="leg">
	<?php 
$_fh4_data = (isset($this->scope["legujabbtermekek"]["termeklista"]) ? $this->scope["legujabbtermekek"]["termeklista"]:null);
if ($this->isArray($_fh4_data) === true)
{
	foreach ($_fh4_data as $this->scope['_termek'])
	{
/* -- foreach start output */
?>
		<a href="<?php echo $this->scope["_termek"]["data"]["uri"];?>">
			<?php echo wordwrap((isset($this->scope["_termek"]["data"]["nev"]) ? $this->scope["_termek"]["data"]["nev"]:null),16,'
',true);?>

		</a>
		<br />
	<?php 
/* -- foreach end output */
	}
}?>

	</div>
</div>
<?php 
}?>	<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>