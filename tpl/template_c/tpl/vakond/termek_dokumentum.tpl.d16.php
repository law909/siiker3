<?php
ob_start(); /* template body */ ;
if (( count((isset($this->scope["data"]["dokumentumok"]) ? $this->scope["data"]["dokumentumok"]:null)) > 0 )) {
?>
<div class="documents">
	<ul>
		<p class="szoveg_bold"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',    2 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'dokumentum',    2 => 'letolthetodok',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',    3 => '',  ),), $this->scope["text"], false);?></p>
		<?php 
$_fh3_data = (isset($this->scope["data"]["dokumentumok"]) ? $this->scope["data"]["dokumentumok"]:null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['_doku'])
	{
/* -- foreach start output */
?>
		  <li>
				<a class="link" href="<?php echo $this->scope["_doku"]["uri"];?>"><?php echo $this->scope["_doku"]["leiras"];?></a>
		  </li>
		<?php 
/* -- foreach end output */
	}
}?>

	</ul>
</div>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>