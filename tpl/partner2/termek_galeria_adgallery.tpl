{if (count($data.kiskepek)>0)}
<div class="ad-gallery">
	<div class="ad-image-wrapper">
	</div>
	<div class="ad-controls">
	</div>
	<div class="ad-nav">
		<div class="ad-thumbs">
			<ul class="ad-thumb-list">
				{foreach($data.kiskepek,_kep)}
				<li>
					<a href="{$_kep.bigimageuri}">
						<img src="{$_kep.smallimageuri}" title="{$_kep.leiras}" />
					</a>
				</li>
				{/foreach}
			</ul>
		</div>
	</div>
</div>
{/if}