<?php
ob_start(); /* template body */ ;
if (( count((isset($this->scope["menu2pontok"]) ? $this->scope["menu2pontok"] : null)) > 0 )) {
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
}?>


<?php if (( $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'carousel',    1 => 'true',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == 1 )) {
?>
<div id="carousel">

<div id = "carousel1">            
            <!-- All images with class of "cloudcarousel" will be turned into carousel items -->
            <!-- You can place links around these images -->

           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/1.png" alt="Szürke négyzet, Szürke négyzet, Szürke négyzet" title="Szürke négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/2.png" alt="Zöld négyzet" title="Zöld négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/3.png" alt="Kék négyzet" title="Kék négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/4.png" alt="Piros négyzet" title="Piros négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/5.png" alt="Barna négyzet" title="Barna négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/6.png" alt="Narancs négyzet" title="Narancs négyzet" /></a>
           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/1.png" alt="Szürke négyzet" title="Szürke négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/2.png" alt="Zöld négyzet" title="Zöld négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/3.png" alt="Kék négyzet" title="Kék négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/4.png" alt="Piros négyzet" title="Piros négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/5.png" alt="Barna négyzet" title="Barna négyzet" /></a>
           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/1.png" alt="Szürke négyzet, Szürke négyzet, Szürke négyzet" title="Szürke négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/2.png" alt="Zöld négyzet" title="Zöld négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/3.png" alt="Kék négyzet" title="Kék négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/4.png" alt="Piros négyzet" title="Piros négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/5.png" alt="Barna négyzet" title="Barna négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/6.png" alt="Narancs négyzet" title="Narancs négyzet" /></a>
           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/1.png" alt="Szürke négyzet" title="Szürke négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/2.png" alt="Zöld négyzet" title="Zöld négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/3.png" alt="Kék négyzet" title="Kék négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/4.png" alt="Piros négyzet" title="Piros négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/<?php echo $this->scope["theme"];?>/images/5.png" alt="Barna négyzet" title="Barna négyzet" /></a>       
       
        <p id="title-text"></p>
        <p id="alt-text"></p>
        <input id="left-but"  type="button" />
        <input id="right-but" type="button" />

        <!-- Define elements to accept the alt and title text from the images. -->


</div>

        
</div>

<?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>