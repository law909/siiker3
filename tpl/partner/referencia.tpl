{if ($referenciak.show==true)}
<div id="referencia" class="referencia_w">
	<div class="wf">
		<div class="wf_in">
			<span>{$spectext->focim->referencia}</span>
		</div>
	</div>
	<div class="ref">
		{foreach($referenciak.referencialist,_referencia)}
		<p class="szoveg_bold">{$_referencia.caption}</p>
		{if (file_exists('$_referencia.imageuri'))}
			<img src="{$_referencia.imageuri}"/>
		{/if}

		<p class="szoveg">{$_referencia.text}</p><br />
		{/foreach}
	</div>
</div>
{/if}