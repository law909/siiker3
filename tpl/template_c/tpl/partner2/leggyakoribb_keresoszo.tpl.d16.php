<?php
ob_start(); /* template body */ ;
if (( (isset($this->scope["leggyakoribbkeresoszo"]["show"]) ? $this->scope["leggyakoribbkeresoszo"]["show"]:null) == true )) {
?>
<div class="leg_w" id="leggyakoribb_keresoszo">
	<div class="wf_2lines">
		<div class="wf_in_2lines">
			
			<?php echo $this->scope["leggyakoribbkeresoszo"]["elemcount"];
echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',    2 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'leg',    2 => 'gyakoribb',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',    3 => '',  ),), $this->scope["spectext"], false);?>

		
		</div>
	</div>
	<div class="leg">
	<?php 
$_fh7_data = (isset($this->scope["leggyakoribbkeresoszo"]["szolist"]) ? $this->scope["leggyakoribbkeresoszo"]["szolist"]:null);
if ($this->isArray($_fh7_data) === true)
{
	foreach ($_fh7_data as $this->scope['_keresoszo'])
	{
/* -- foreach start output */
?>
		<a href="<?php echo $this->scope["_keresoszo"]["uri"];?>">
			<?php echo wordwrap((isset($this->scope["_keresoszo"]["caption"]) ? $this->scope["_keresoszo"]["caption"]:null),18,'
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
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>