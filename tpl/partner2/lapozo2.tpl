{if ($lapozo.pagecount>1)}
<div class="lapozo2" id="lapozo2">
{math('($lapozo.pageno-1)*$lapozo.elemperpage+1')} - 
{if ($lapozo.pageno*$lapozo.elemperpage > $lapozo.elemcount)}
{$lapozo.elemcount}
{else}
{math('$lapozo.pageno*$lapozo.elemperpage')}
{/if}
(összesen: {$lapozo.elemcount}) 
<br />
{if ($lapozo.pageno>1)}
<a class="link_bold" href="{$lapozo.uri}1">
{$text->balranyil}{$text->balranyil}
</a>
|
<a class="link_bold" href="{$lapozo.uri}{$lapozo.pageno-1}">
{$text->balranyil}
</a>
{if ($lapozo.pageno<$lapozo.pagecount)}
|
{/if}
{/if}
{if ($lapozo.pageno<$lapozo.pagecount)}
<a  class="link_bold" href="{$lapozo.uri}{$lapozo.pageno+1}">
{$text->jobbranyil}
</a>
|
<a class="link_bold" href="{$lapozo.uri}{$lapozo.pagecount}">
{$text->jobbranyil}{$text->jobbranyil}
</a>
{/if}
</div>
{/if}