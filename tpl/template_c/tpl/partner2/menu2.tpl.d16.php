<?php
ob_start(); /* template body */ ;
if (( $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'carousel',    1 => 'true',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == 1 )) {
?>

<div class="max">
<object width="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'width',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>" height="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'height',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>">
				<param name="movie" value="/themes/<?php echo $this->scope["theme"];?>/<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'source',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>">
				<embed src="/themes/<?php echo $this->scope["theme"];?>/<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'source',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>" width="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'width',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>" height="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'flashhead',    1 => 'height',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);?>">
				</embed>
</object>
</div>
<div id="carousel">

<div id = "carousel1">            
            <!-- All images with class of "cloudcarousel" will be turned into carousel items -->
            <!-- You can place links around these images -->
        <input id="left-but"  type="button" />
        <input id="right-but" type="button" />
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/maxl.png" alt="Maxlube" title="Maxlube" /></a>
           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/aral.png" alt="Aral" title="Aral" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/bp.png" alt="Bp" title="Bp" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/mol.png" alt="Mol" title="Mol" /></a>
            <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/motip.png" alt="Motip" title="Motip" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/kluber.png" alt="Kluber" title="Kluber" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/crom.png" alt="Cromwell" title="Cromwell" /></a>
           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/castrol.png" alt="Castrol" title="Castrol" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/prista.png" alt="Prista" title="Prista" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/shell.png" alt="Shell" title="Shell" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/wd40.png" alt="WD-40" title="WD-40" /></a>

           
</div>

        
</div>

<?php 
}?>


<?php if (( count((isset($this->scope["menu2pontok"]) ? $this->scope["menu2pontok"] : null)) > 0 )) {
?>
<div class="mainmenu2" id="menu2">
	<!--<div class="wf"><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'menu2',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></div>-->
	<?php 
$_fh0_data = (isset($this->scope["menu2pontok"]) ? $this->scope["menu2pontok"] : null);
$this->globals["foreach"]['default'] = array
(
	"iteration"		=> 1,
	"last"		=> null,
	"total"		=> $this->isArray($_fh0_data) ? count($_fh0_data) : 0,
);
$_fh0_glob =& $this->globals["foreach"]['default'];
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['_menupont'])
	{
		$_fh0_glob["last"] = (string) ($_fh0_glob["iteration"] === $_fh0_glob["total"]);
/* -- foreach start output */
?>
	
	<a class="menu2" href="<?php echo $this->scope["_menupont"]["uri"];?>">
		<span><?php echo $this->scope["_menupont"]["caption"];
if (( (isset($this->scope["_menupont"]["elemcount"]) ? $this->scope["_menupont"]["elemcount"]:null) >= 0 )) {
?>(<?php echo $this->scope["_menupont"]["elemcount"];
echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'termek',    1 => 'termek',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>)<?php 
}?></span>
		
	</a>
	<?php if (( ! (isset($this->globals["foreach"]["default"]["last"]) ? $this->globals["foreach"]["default"]["last"]:null) )) {

echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'menu2',    1 => 'elvalaszto',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["setup"], false);

}?>

	<?php 
/* -- foreach end output */
		$_fh0_glob["iteration"]+=1;
	}
}?>

</div>
<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>