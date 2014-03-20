<?php
ob_start(); /* template body */ ?><div class="kosarend">
<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'partner',    1 => 'regok',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>