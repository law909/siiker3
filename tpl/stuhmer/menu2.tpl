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

           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/{$theme}/images/1.png" alt="Sz�rke n�gyzet, Sz�rke n�gyzet, Sz�rke n�gyzet" title="Sz�rke n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/2.png" alt="Z�ld n�gyzet" title="Z�ld n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/3.png" alt="K�k n�gyzet" title="K�k n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/4.png" alt="Piros n�gyzet" title="Piros n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/5.png" alt="Barna n�gyzet" title="Barna n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/6.png" alt="Narancs n�gyzet" title="Narancs n�gyzet" /></a>
           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/{$theme}/images/1.png" alt="Sz�rke n�gyzet" title="Sz�rke n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/2.png" alt="Z�ld n�gyzet" title="Z�ld n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/3.png" alt="K�k n�gyzet" title="K�k n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/4.png" alt="Piros n�gyzet" title="Piros n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/5.png" alt="Barna n�gyzet" title="Barna n�gyzet" /></a>
           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/{$theme}/images/1.png" alt="Sz�rke n�gyzet, Sz�rke n�gyzet, Sz�rke n�gyzet" title="Sz�rke n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/2.png" alt="Z�ld n�gyzet" title="Z�ld n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/3.png" alt="K�k n�gyzet" title="K�k n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/4.png" alt="Piros n�gyzet" title="Piros n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/5.png" alt="Barna n�gyzet" title="Barna n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/6.png" alt="Narancs n�gyzet" title="Narancs n�gyzet" /></a>
           <a href="http://index.hu"> <img class = "cloudcarousel" src="/themes/{$theme}/images/1.png" alt="Sz�rke n�gyzet" title="Sz�rke n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/2.png" alt="Z�ld n�gyzet" title="Z�ld n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/3.png" alt="K�k n�gyzet" title="K�k n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/4.png" alt="Piros n�gyzet" title="Piros n�gyzet" /></a>
           <a href="http://index.hu"><img class = "cloudcarousel" src="/themes/{$theme}/images/5.png" alt="Barna n�gyzet" title="Barna n�gyzet" /></a>       
       
        <p id="title-text"></p>
        <p id="alt-text"></p>
        <input id="left-but"  type="button" />
        <input id="right-but" type="button" />

        <!-- Define elements to accept the alt and title text from the images. -->


</div>

        
</div>

{/if}