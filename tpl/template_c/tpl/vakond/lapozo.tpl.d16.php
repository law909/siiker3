<?php
ob_start(); /* template body */ ;
if (( (isset($this->scope["lapozo"]["pagecount"]) ? $this->scope["lapozo"]["pagecount"]:null) > 1 )) {
?>
<div class="lapozo" id="lapozo">
<?php echo (((isset($this->scope["lapozo"]["pageno"]) ? $this->scope["lapozo"]["pageno"]:null)-1)*(isset($this->scope["lapozo"]["elemperpage"]) ? $this->scope["lapozo"]["elemperpage"]:null)+1);?> - 
<?php if (( ((isset($this->scope["lapozo"]["pageno"]) ? $this->scope["lapozo"]["pageno"]:null) * (isset($this->scope["lapozo"]["elemperpage"]) ? $this->scope["lapozo"]["elemperpage"]:null)) > (isset($this->scope["lapozo"]["elemcount"]) ? $this->scope["lapozo"]["elemcount"]:null) )) {
?>
<?php echo $this->scope["lapozo"]["elemcount"];?>

<?php 
}
else {
?>
<?php echo ((isset($this->scope["lapozo"]["pageno"]) ? $this->scope["lapozo"]["pageno"]:null)*(isset($this->scope["lapozo"]["elemperpage"]) ? $this->scope["lapozo"]["elemperpage"]:null));?>

<?php 
}?>

(összesen: <?php echo $this->scope["lapozo"]["elemcount"];?>)
<br />
<?php if (( (isset($this->scope["lapozo"]["pageno"]) ? $this->scope["lapozo"]["pageno"]:null) > 1 )) {
?>
<a class="link_bold" href="<?php echo $this->scope["lapozo"]["uri"];
echo ($this->scope["lapozo"]["pageno"] - 1);?>">
<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'balranyil',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["text"], false);?>

</a>
<?php 
}?>

<?php 
$_for0_from = 1;
$_for0_to = (isset($this->scope["lapozo"]["pagecount"]) ? $this->scope["lapozo"]["pagecount"]:null);
$_for0_step = abs(1);
if (is_numeric($_for0_from) && !is_numeric($_for0_to)) { $this->triggerError('For requires the <em>to</em> parameter when using a numerical <em>from</em>'); }
$tmp_shows = $this->isArray($_for0_from, true) || (is_numeric($_for0_from) && (abs(($_for0_from - $_for0_to)/$_for0_step) !== 0 || $_for0_from == $_for0_to));
if ($tmp_shows)
{
	if ($this->isArray($_for0_from, true)) {
		$_for0_to = is_numeric($_for0_to) ? $_for0_to - $_for0_step : count($_for0_from) - 1;
		$_for0_from = 0;
	}
	if ($_for0_from > $_for0_to) {
				$tmp = $_for0_from;
				$_for0_from = $_for0_to;
				$_for0_to = $tmp;
			}
	for ($this->scope['i'] = $_for0_from; $this->scope['i'] <= $_for0_to; $this->scope['i'] += $_for0_step)
	{
/* -- for start output */
?>
<?php if (( (isset($this->scope["i"]) ? $this->scope["i"] : null) == (isset($this->scope["lapozo"]["pageno"]) ? $this->scope["lapozo"]["pageno"]:null) )) {
?>
|
<?php echo $this->scope["i"];?>

<?php 
}
else {
?>
|
<a class="link_bold" href="<?php echo $this->scope["lapozo"]["uri"];
echo $this->scope["i"];?>"><?php echo $this->scope["i"];?></a>
<?php 
}?>

<?php /* -- for end output */
	}
}
?>

|
<?php if (( (isset($this->scope["lapozo"]["pageno"]) ? $this->scope["lapozo"]["pageno"]:null) < (isset($this->scope["lapozo"]["pagecount"]) ? $this->scope["lapozo"]["pagecount"]:null) )) {
?>
<a class="link_bold" href="<?php echo $this->scope["lapozo"]["uri"];
echo ($this->scope["lapozo"]["pageno"] + 1);?>">
<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'jobbranyil',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["text"], false);?>

</a>
<?php 
}?>

</div>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>