<div>
    <div class="loginformfield">
        <span class="bej_adataim">{$login.nev}</span>
    </div>

	<div class="loginformfield">
        <span class="bej_adataim"><a class="link_bold" href="{$login.modificationuri}"> {$text->partner->adataim} </a></span>
    </div>
    {if ($login.viszontelado)}
    <div class="loginformfield">
        <span class="bej_adataim"><a class="link_bold" href="{$login.gyorsvasarlasuri}">Gyorsvásárlás</a></span>
    </div>
    {/if}
	<div class="loginformfield">
		<form method="post" action="{$login.actionuri}">
				<input class="login-button" type="submit" value="{$text->partner->kijelentkezesgomb}" />
				<input type="hidden" value="{$login.command}" name="com" />
		</form>
	</div>
</div>