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

{if ($setup->carousel->true==1)}
<div id="carousel">

<div id = "carousel1">            
            <!-- All images with class of "cloudcarousel" will be turned into carousel items -->
            <!-- You can place links around these images -->

           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/{$theme}/images/1.png" alt="Szürke négyzet, Szürke négyzet, Szürke négyzet" title="Szürke négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/2.png" alt="Zöld négyzet" title="Zöld négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/3.png" alt="Kék négyzet" title="Kék négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/4.png" alt="Piros négyzet" title="Piros négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/5.png" alt="Barna négyzet" title="Barna négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/6.png" alt="Narancs négyzet" title="Narancs négyzet" /></a>
           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/{$theme}/images/1.png" alt="Szürke négyzet" title="Szürke négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/2.png" alt="Zöld négyzet" title="Zöld négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/3.png" alt="Kék négyzet" title="Kék négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/4.png" alt="Piros négyzet" title="Piros négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/5.png" alt="Barna négyzet" title="Barna négyzet" /></a>
           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/{$theme}/images/1.png" alt="Szürke négyzet, Szürke négyzet, Szürke négyzet" title="Szürke négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/2.png" alt="Zöld négyzet" title="Zöld négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/3.png" alt="Kék négyzet" title="Kék négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/4.png" alt="Piros négyzet" title="Piros négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/5.png" alt="Barna négyzet" title="Barna négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/6.png" alt="Narancs négyzet" title="Narancs négyzet" /></a>
           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/{$theme}/images/1.png" alt="Szürke négyzet" title="Szürke négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/2.png" alt="Zöld négyzet" title="Zöld négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/3.png" alt="Kék négyzet" title="Kék négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/4.png" alt="Piros négyzet" title="Piros négyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/5.png" alt="Barna négyzet" title="Barna négyzet" /></a>       
       
        <p id="title-text"></p>
        <p id="alt-text"></p>
        <input id="left-but"  type="button" />
        <input id="right-but" type="button" />

        <!-- Define elements to accept the alt and title text from the images. -->


</div>

        
</div>

{/if}