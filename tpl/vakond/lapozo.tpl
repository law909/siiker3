{if ($lapozo.pagecount>1)}
<div class="lapozo" id="lapozo">
{math('($lapozo.pageno-1)*$lapozo.elemperpage+1')} - 
{if ($lapozo.pageno*$lapozo.elemperpage > $lapozo.elemcount)}
{$lapozo.elemcount}
{else}
{math('$lapozo.pageno*$lapozo.elemperpage')}
{/if}
(összesen: {$lapozo.elemcount})
<br />
{if ($lapozo.pageno>1)}
<a class="link_bold" href="{$lapozo.uri}{$lapozo.pageno-1}">
{$text->balranyil}
</a>
{/if}
{for(i,1,$lapozo.pagecount)}
{if ($i==$lapozo.pageno)}
|
{$i}
{else}
|
<a class="link_bold" href="{$lapozo.uri}{$i}">{$i}</a>
{/if}
{/for}
|
{if ($lapozo.pageno<$lapozo.pagecount)}
<a class="link_bold" href="{$lapozo.uri}{$lapozo.pageno+1}">
{$text->jobbranyil}
</a>
{/if}
</div>
{/if}