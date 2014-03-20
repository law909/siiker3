<?php
ob_start(); /* template body */ ;
if (( count((isset($this->scope["menu1pontok"]) ? $this->scope["menu1pontok"] : null)) > 0 )) {
?>
<div class="mainmenu1" id="menu1">
	<div class="wf">
		<div class="wf_in">
			<span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'menu1',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></span>
		</div>
	</div>	
	<?php 
$_fh1_data = (isset($this->scope["menu1pontok"]) ? $this->scope["menu1pontok"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['_menupont'])
	{
/* -- foreach start output */
?>
	<a class="menu1" href="<?php echo $this->scope["_menupont"]["uri"];?>">
		<?php echo $this->scope["_menupont"]["caption"];?>

		<?php if (( (isset($this->scope["_menupont"]["elemcount"]) ? $this->scope["_menupont"]["elemcount"]:null) >= 0 )) {
?>
		(<?php echo $this->scope["_menupont"]["elemcount"];
echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'termek',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>)
		<?php 
}?>

	</a>
	<?php 
/* -- foreach end output */
	}
}?>


</div>

<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>