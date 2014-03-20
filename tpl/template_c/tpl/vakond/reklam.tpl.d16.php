<?php
ob_start(); /* template body */ ;
if (( (isset($this->scope["reklamok"]["show"]) ? $this->scope["reklamok"]["show"]:null) == true )) {
?>
<div class="reklam">
<?php 
$_fh12_data = (isset($this->scope["reklamok"]["reklamlist"]) ? $this->scope["reklamok"]["reklamlist"]:null);
if ($this->isArray($_fh12_data) === true)
{
	foreach ($_fh12_data as $this->scope['_reklam'])
	{
/* -- foreach start output */
?>
<a href="<?php echo $this->scope["_reklam"]["linkuri"];?>">
<?php echo $this->scope["_reklam"]["caption"];?><br>
<img src="<?php echo $this->scope["_reklam"]["imageuri"];?>" alt="<?php echo $this->scope["_reklam"]["alt"];?>"/>
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