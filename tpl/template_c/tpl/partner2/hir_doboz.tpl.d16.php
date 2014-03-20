<?php
ob_start(); /* template body */ ;
if (( (isset($this->scope["hirdoboz"]["show"]) ? $this->scope["hirdoboz"]["show"]:null) )) {
?>
<div class="hirdoboz_w" id="hirdoboz">
	<div class="wf">
		<div class="wf_in">
			<span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'cim',    1 => 'hireink',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></span>
		</div>
	</div>
	<div class="hirdoboz">
	<?php 
$_fh10_data = (isset($this->scope["hirdoboz"]["hirlista"]) ? $this->scope["hirdoboz"]["hirlista"]:null);
if ($this->isArray($_fh10_data) === true)
{
	foreach ($_fh10_data as $this->scope['_hir'])
	{
/* -- foreach start output */
?>
	<div class="hirdoboz_hir">
		<a class="hircim_lapozo" href="<?php echo $this->scope["_hir"]["uri"];?>">
			<?php echo $this->scope["_hir"]["caption"];?>

		</a><br />
		<span class="megjegyzes"><?php echo $this->scope["_hir"]["datum"];?></span>
		<p class="lead"><?php echo $this->scope["_hir"]["lead"];?>

			<a href="<?php echo $this->scope["_hir"]["uri"];?>">&nbsp;<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'tovabb',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["text"], false);?></a>
		</p>
	</div>
	<?php 
/* -- foreach end output */
	}
}?>

	</div>
</div>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>