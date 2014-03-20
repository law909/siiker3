<?php
ob_start(); /* template body */ ;
if (( (isset($this->scope["legnezettebbtermekek"]["show"]) ? $this->scope["legnezettebbtermekek"]["show"]:null) == true )) {
?>
<div class="leg_w" id="legnezettebb_termek">
	<div class="wf_2lines">
		<div class="wf_in_2lines">
			
			<?php echo $this->scope["legnezettebbtermekek"]["elemcount"];
echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',    2 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'leg',    2 => 'nezettebb',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',    3 => '',  ),), $this->scope["spectext"], false);?>

		
		</div>
	</div>
	<div class="leg">
		<?php 
$_fh5_data = (isset($this->scope["legnezettebbtermekek"]["termeklista"]) ? $this->scope["legnezettebbtermekek"]["termeklista"]:null);
if ($this->isArray($_fh5_data) === true)
{
	foreach ($_fh5_data as $this->scope['_termek'])
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
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>