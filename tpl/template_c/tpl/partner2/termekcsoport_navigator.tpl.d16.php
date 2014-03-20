<?php
ob_start(); /* template body */ ?><div class="termcsop_nav">
	<?php 
$_fh1_data = (isset($this->scope["navigator"]) ? $this->scope["navigator"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['_navi'])
	{
/* -- foreach start output */
?>
		<?php if (( (isset($this->scope["_navi"]["uri"]) ? $this->scope["_navi"]["uri"]:null) != '' )) {
?>
			<a href="<?php echo $this->scope["_navi"]["uri"];?>">
				<?php echo $this->scope["_navi"]["caption"];?>

			</a>
		<?php 
}
else {
?>
			<?php echo $this->scope["_navi"]["caption"];?>

		<?php 
}?>

		<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'navigatorjel',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>

	<?php 
/* -- foreach end output */
	}
}?>

</div>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>