<?php
ob_start(); /* template body */ ?><div>
Szeszesitalaink fogyaszt�s�t 18 �ven aluliaknak nem aj�nljuk.<br>
<a href="/?c=setnagykoru">Elm�ltam 18 �ves.</a><br>
<a href="http://www.google.hu">Nem m�ltam 18 �ves.</a>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>