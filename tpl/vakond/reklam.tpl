{if ($reklamok.show==true)}
<div class="reklam">
{foreach($reklamok.reklamlist,_reklam)}
<a href="{$_reklam.linkuri}">
{$_reklam.caption}<br>
<img src="{$_reklam.imageuri}" alt="{$_reklam.alt}"/>
</a>
{/foreach}
</div>
{/if}