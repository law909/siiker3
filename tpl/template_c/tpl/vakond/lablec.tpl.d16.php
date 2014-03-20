<?php
ob_start(); /* template body */ ?><div id="lablec" class="foot">
<?php echo $this->scope["lablec"];?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>