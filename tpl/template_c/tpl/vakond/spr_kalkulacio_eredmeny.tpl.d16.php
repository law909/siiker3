<?php
ob_start(); /* template body */ ?>
<?php if (( (isset($this->scope["spr_kalk_eredmeny"]["show"]) ? $this->scope["spr_kalk_eredmeny"]["show"]:null) )) {
?>
<div class="table">
	<table class="kalkulator" border="1">
		<tr>
			<td class="szoveg_bold" width="33%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioform',    1 => 'ertek',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
			<td class="szoveg"><?php echo number_format((isset($this->scope["spr_kalk_eredmeny"]["szerzodesertek"]) ? $this->scope["spr_kalk_eredmeny"]["szerzodesertek"]:null),0,',',' ');?>&nbsp;<?php echo $this->scope["spr_kalk_eredmeny"]["valuta"];?></td>
			<td></td>
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioform',    1 => 'valuta',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
			<td></td>
			<td class="szoveg"><?php echo $this->scope["spr_kalk_eredmeny"]["valuta"];?></td>
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioform',    1 => 'arfolyam',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
			<td class="szoveg"><?php echo number_format((isset($this->scope["spr_kalk_eredmeny"]["arfolyam"]) ? $this->scope["spr_kalk_eredmeny"]["arfolyam"]:null),2,',',' ');?></td>
			<td></td>
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioform',    1 => 'futamido',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
			<td class="szoveg"><?php echo $this->scope["spr_kalk_eredmeny"]["futamido"];?>&nbsp;<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioform',    1 => 'futamidome',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
			<td></td>
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioeredmeny',    1 => 'indulo',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
			<?php if (( (isset($this->scope["spr_kalk_eredmeny"]["indulo"]) ? $this->scope["spr_kalk_eredmeny"]["indulo"]:null) != (isset($this->scope["spr_kalk_eredmeny"]["indulovaluta"]) ? $this->scope["spr_kalk_eredmeny"]["indulovaluta"]:null) )) {
?>
			
			<td class="szoveg"><?php echo number_format((isset($this->scope["spr_kalk_eredmeny"]["indulo"]) ? $this->scope["spr_kalk_eredmeny"]["indulo"]:null),0,',',' ');?>&nbsp;HUF</td>
			
			<td class="szoveg"><?php echo number_format((isset($this->scope["spr_kalk_eredmeny"]["indulovaluta"]) ? $this->scope["spr_kalk_eredmeny"]["indulovaluta"]:null),2,',',' ');?>&nbsp;<?php echo $this->scope["spr_kalk_eredmeny"]["valuta"];?></td>
			<?php 
}
else {
?>
			<td class="szoveg"><?php echo number_format((isset($this->scope["spr_kalk_eredmeny"]["indulo"]) ? $this->scope["spr_kalk_eredmeny"]["indulo"]:null),0,',',' ');?>&nbsp;HUF</td>
			<?php 
}?>

		</tr>
		<tr>
			<td class="szoveg_bold" width="33%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioeredmeny',    1 => 'szerzkotdij',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
			<td class="szoveg"><?php echo number_format((isset($this->scope["spr_kalk_eredmeny"]["szerzkotdij"]) ? $this->scope["spr_kalk_eredmeny"]["szerzkotdij"]:null),0,',',' ');?>&nbsp;HUF</td>
			<td></td>
		</tr>
		<tr>
			<td class="szoveg_bold" width="33%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioeredmeny',    1 => 'havidij',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
			<?php if (( (isset($this->scope["spr_kalk_eredmeny"]["havidij"]) ? $this->scope["spr_kalk_eredmeny"]["havidij"]:null) != (isset($this->scope["spr_kalk_eredmeny"]["havidijvaluta"]) ? $this->scope["spr_kalk_eredmeny"]["havidijvaluta"]:null) )) {
?>
			<td class="szoveg"><?php echo number_format((isset($this->scope["spr_kalk_eredmeny"]["havidij"]) ? $this->scope["spr_kalk_eredmeny"]["havidij"]:null),0,',',' ');?>&nbsp;HUF</td>
			
			<td class="szoveg"><?php echo number_format((isset($this->scope["spr_kalk_eredmeny"]["havidijvaluta"]) ? $this->scope["spr_kalk_eredmeny"]["havidijvaluta"]:null),2,',',' ');?>&nbsp;<?php echo $this->scope["spr_kalk_eredmeny"]["valuta"];?></td>
			<?php 
}
else {
?>
			<td class="szoveg"><?php echo number_format((isset($this->scope["spr_kalk_eredmeny"]["havidij"]) ? $this->scope["spr_kalk_eredmeny"]["havidij"]:null),0,',',' ');?>

					&nbsp;HUF
			</td>
			<?php 
}?>

		</tr>
		<tr>
			<td class="szoveg_bold" width="33%"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioeredmeny',    1 => 'maradvanyertek',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></td>
			<td class="szoveg"><?php echo number_format((isset($this->scope["spr_kalk_eredmeny"]["maradvanyertek"]) ? $this->scope["spr_kalk_eredmeny"]["maradvanyertek"]:null),0,',',' ');?>&nbsp;HUF</td>
			<td></td>
		</tr>
	</table>
	<br />
	<a class="button" target=_blank href="<?php echo $this->scope["spr_kalk_eredmeny"]["szerzkivonaturi"];?>"><span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioeredmeny',    1 => 'szerzodeskivonat',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></span></a>
	<br /><br />
	<a class="button" href="<?php echo $this->scope["spr_kalk_eredmeny"]["ajanlatkeresuri"];?>"><span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'spr_kalkulacioeredmeny',    1 => 'ajanlatkeres',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></span></a>
</div>
<?php 
}?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>