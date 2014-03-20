<div class="termektulajdonsag">
	<ul>
		{foreach($data.tulajdonsagok,_tulajdonsag)}
		  <li>
			  <span class="szoveg_bold">{$_tulajdonsag.tipusnev}{$text->termek->tulajdonsag->kettospont}</span>{$_tulajdonsag.erteknev}
		  </li>
		{/foreach}
	</ul>
</div>