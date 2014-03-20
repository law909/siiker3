<?php
ob_start(); /* template body */ ;
if (( (isset($this->scope["legtobbszorrendelttermekek"]["show"]) ? $this->scope["legtobbszorrendelttermekek"]["show"]:null) == true )) {
?>
<div class="leg_w" id="legtobbszor_rendelt_termek">
	<div class="wf_2lines">
		<div class="wf_in_2lines">
				<?php echo $this->scope["legtobbszorrendelttermekek"]["elemcount"];
echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',    2 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'leg',    2 => 'tobbszor',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',    3 => '',  ),), $this->scope["spectext"], false);?>

		</div>
	</div>
	<div class="leg">
	<?php 
$_fh6_data = (isset($this->scope["legtobbszorrendelttermekek"]["termeklista"]) ? $this->scope["legtobbszorrendelttermekek"]["termeklista"]:null);
if ($this->isArray($_fh6_data) === true)
{
	foreach ($_fh6_data as $this->scope['_termek'])
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