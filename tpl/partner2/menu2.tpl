{if ($setup->carousel->true==1)}

<div class="max">
<object width="{$setup->flashhead->width}" height="{$setup->flashhead->height}">
				<param name="movie" value="/themes/{$theme}/{$setup->flashhead->source}">
				<embed src="/themes/{$theme}/{$setup->flashhead->source}" width="{$setup->flashhead->width}" height="{$setup->flashhead->height}">
				</embed>
</object>
</div>
<div id="carousel">

<div id = "carousel1">
            <!-- All images with class of "cloudcarousel" will be turned into carousel items -->
            <!-- You can place links around these images -->
        <input id="left-but"  type="button" />
        <input id="right-but" type="button" />
           <a href="#"><img class = "cloudcarousel" src="/themes/{$theme}/images/maxl.png" alt="Maxlube" title="Maxlube" /></a>
           <a href="#"><img class = "cloudcarousel" src="/themes/{$theme}/images/bp.png" alt="Bp" title="Bp" /></a>
           <a href="#"><img class = "cloudcarousel" src="/themes/{$theme}/images/mol.png" alt="Mol" title="Mol" /></a>
           <a href="#"><img class = "cloudcarousel" src="/themes/{$theme}/images/motip.png" alt="Motip" title="Motip" /></a>
           <a href="#"><img class = "cloudcarousel" src="/themes/{$theme}/images/crom.png" alt="Cromwell" title="Cromwell" /></a>
           <a href="/index.php?com=termeklista&par=0&par2=1&dim1=2"><img class = "cloudcarousel" src="/themes/{$theme}/images/castrol.png" alt="Castrol" title="Castrol" /></a>
           <a href="/index.php?com=termeklista&par=0&par2=1&dim1=3"><img class = "cloudcarousel" src="/themes/{$theme}/images/prista.png" alt="Prista" title="Prista" /></a>
           <a href="#"><img class = "cloudcarousel" src="/themes/{$theme}/images/shell.png" alt="Shell" title="Shell" /></a>
           <a href="#"><img class = "cloudcarousel" src="/themes/{$theme}/images/wd40.png" alt="WD-40" title="WD-40" /></a>
           <a href="/index.php?com=termeklista&par=0&par2=1&dim1=1"><img class = "cloudcarousel" src="/themes/{$theme}/images/mobil.png" alt="Mobil" title="Mobil" /></a>


</div>


</div>

{/if}

{if (count($menu2pontok)>0)}
<div class="mainmenu2" id="menu2">
	<!--<div class="wf">{$spectext->focim->menu2}</div>-->
	{foreach($menu2pontok,_menupont)}

	<a class="menu2" href="{$_menupont.uri}">
		<span>{$_menupont.caption}{if ($_menupont.elemcount>=0)}({$_menupont.elemcount}{$text->termek->termek}){/if}</span>

	</a>
	{if (!$dwoo.foreach.default.last)}{$setup->menu2->elvalaszto}{/if}
	{/foreach}
</div>
{/if}