<?php
ob_start(); /* template body */ ?><div class="link" id="linkkuldes">
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>