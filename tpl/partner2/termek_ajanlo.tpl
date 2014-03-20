<div id="termek_ajanlo" class="termek_ajanlo">
	{if ($termekek.show==true)}
		<div class="wf_main">
			<div class="wf_main_in">
				<span> {$spectext->focim->ajanlo} </span>
			</div>
		</div>
		<div class="main_container">
			{include('termek_adatlapok_rovid.tpl')}
		</div>	
	{/if}
</div>