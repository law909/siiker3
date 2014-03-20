<div>
    <form action="/index.php?com=gyorssave" method="POST">
        {foreach($termekek,_termek)}
            <div class="gyorsrow">
                <div class="gyorscol gyorskep">
        		{if (file_exists('$_termek.data.smallimageuri') && $_termek.showdata.image)}
            		<a class="termek_fokep" target="_blank" href="{$_termek.data.bigimageuri}" tabindex="-1"><img class="rovidle" src="{$_termek.data.smallimageuri}" /></a>
                {else}
            		<img class="rovidle" src="/themes/{$theme}/images/no_img.jpg" />&nbsp;
                {/if}
                </div>
                <div class="gyorscol gyorsszoveg">
                    {if ($_termek.showdata.cikkszam)}<div class="megjegyzes">{$_termek.data.cikkszam}</div>{/if}
                    <div class="termek_link">
                        <a href="{$_termek.data.uri}" tabindex="-1">{$_termek.data.nev}</a>
                        <a onclick="" href="#" tabindex="-1">
                            <img class="question" src="/themes/{$theme}/images/question.png" title="{$text->termek->questiontitle}" />
                        </a>
                    </div>
                    <div>
                        {if ($_termek.showdata.netto==true)}
                            <div class="ar_n">{$text->ar->netto}{number_format($_termek.data.nettoarhuf,$t,',',' ')}&nbsp;{$_termek.data.valutanem}</div>
                        {/if}
                        {if ($_termek.showdata.brutto==true)}
                            <div class="ar_b">{$text->ar->brutto}{number_format($_termek.data.bruttoarhuf,$t,',',' ')}&nbsp;{$_termek.data.valutanem}</div>
                        {/if}
                    </div>
                    <p>{$_termek.data.leiras}</p>
                </div>
                <div class="gyorscol">
                    <input class="gyorsinput" type="text" name="mennyiseg[]"> {$_termek.data.me}
                    <input type="hidden" name="termekkod[]" value="{$_termek.data.kod}">
                </div>
            </div>
        {/foreach}
        <div class="gyorssubmit">
            <input type="submit" value="Megrendelés">
        </div>
    </form>
</div>