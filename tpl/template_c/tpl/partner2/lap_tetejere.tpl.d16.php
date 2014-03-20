<?php
ob_start(); /* template body */ ?><div class="tetejere">
<a href="#top"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'tetejere',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["text"], false);?></a>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>