<?php
ob_start(); /* template body */ ?>
<?php if (( (isset($this->scope["spr_kalk"]["show"]) ? $this->scope["spr_kalk"]["show"]:null) )) {
?>
<div class="table">
<table class="kalkulator" border="1">
<form id="SprKalkulacioForm" action="<?php echo $this->scope["spr_kalk"]["actionuri"];?>" method="post">
	<tr>
		<td class="szoveg_bold" width="50%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioform',    1 => 'valuta',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
		<td class="szoveg"><?php echo $this->scope["spr_kalk"]["valuta"];?></td>
	</tr>
	<tr>
		<td class="szoveg_bold" width="50%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioform',    1 => 'arfolyam',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
		<td class="szoveg 2">
		<?php if (( (isset($this->scope["spr_kalk"]["arfolyamedit"]) ? $this->scope["spr_kalk"]["arfolyamedit"]:null) )) {
?>
		<input id="ArfolyamEdit" class="general_input" type="text" value="<?php echo $this->scope["spr_kalk"]["arfolyam"];?>" name="spr_kalkulacio_arfolyam"/>
		<?php 
}
else {
?>
		<?php echo number_format((isset($this->scope["spr_kalk"]["arfolyam"]) ? $this->scope["spr_kalk"]["arfolyam"]:null),2,',',' ');?>

		<?php 
}?>

		</td>
	</tr>
	<tr>
		<td class="szoveg_bold" width="33%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioform',    1 => 'futamido',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
		<td class="szoveg"><?php echo $this->scope["spr_kalk"]["futamido"];?>&nbsp;<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioform',    1 => 'futamidome',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
	</tr>
	<tr>
		<td class="szoveg_bold" width="33%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioform',    1 => 'ertek',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
		<td class="megjegyzes"><input id="ErtekEdit"
									  class="general_input" type="text" value=""
									  name="spr_kalkulacio_ertek" /></td>
	</tr>
	<tr>
		<td  colspan="2" align="right"><input class="general_button"
								 type="submit" name="x" value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioform',    1 => 'okgomb',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?>" />
			<input type="hidden" name="com" value="<?php echo $this->scope["spr_kalk"]["okcommand"];?>" />
			<input type="hidden" name="par" value="<?php echo $this->scope["data"]["kod"];?>" />
		</td>

	</tr>
</form>
</table>
</div>
<?php 
}?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>