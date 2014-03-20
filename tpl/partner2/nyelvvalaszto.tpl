<div class="nyelv" id="nyelvvalaszto">
	{if ($nyelvek.show==true)}
	{foreach($nyelvek.nyelvlist,_nyelv)}
		<a href="{$_nyelv.uri}" title="{$_nyelv.caption}">
			<img src="/themes/{$theme}/images/{$_nyelv.chrkod}.gif" onmouseout="({$_nyelv.chrkod}.src='/themes/{$theme}/images/{$_nyelv.chrkod}2.gif')" onmouseover="({$_nyelv.chrkod}.src='/themes/{$theme}/images/{$_nyelv.chrkod}.gif')" name="{$_nyelv.chrkod}"/>
		</a>
	{/foreach}
	{/if}
</div>