<?php
ob_start(); /* template body */ ?><div class="center" id="kozep">
<?php echo $this->scope["maindata"];?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>