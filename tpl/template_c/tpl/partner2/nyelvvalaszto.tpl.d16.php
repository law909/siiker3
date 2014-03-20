<?php
ob_start(); /* template body */ ?><div class="nyelv" id="nyelvvalaszto">
	<?php if (( (isset($this->scope["nyelvek"]["show"]) ? $this->scope["nyelvek"]["show"]:null) == true )) {
?>
	<?php 
$_fh8_data = (isset($this->scope["nyelvek"]["nyelvlist"]) ? $this->scope["nyelvek"]["nyelvlist"]:null);
if ($this->isArray($_fh8_data) === true)
{
	foreach ($_fh8_data as $this->scope['_nyelv'])
	{
/* -- foreach start output */
?>
		<a href="<?php echo $this->scope["_nyelv"]["uri"];?>" title="<?php echo $this->scope["_nyelv"]["caption"];?>">
			<img src="/themes/<?php echo $this->scope["theme"];?>/images/<?php echo $this->scope["_nyelv"]["chrkod"];?>.gif" onmouseout="(<?php echo $this->scope["_nyelv"]["chrkod"];?>.src='/themes/<?php echo $this->scope["theme"];?>/images/<?php echo $this->scope["_nyelv"]["chrkod"];?>2.gif')" onmouseover="(<?php echo $this->scope["_nyelv"]["chrkod"];?>.src='/themes/<?php echo $this->scope["theme"];?>/images/<?php echo $this->scope["_nyelv"]["chrkod"];?>.gif')" name="<?php echo $this->scope["_nyelv"]["chrkod"];?>"/>
		</a>
	<?php 
/* -- foreach end output */
	}
}?>

	<?php 
}?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>