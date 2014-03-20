<div class="partner_be_w" id="partner_belepes">
	<div class="wf">
		<div class="wf_in">
			<span>{$spectext->focim->belepes}</span>
		</div>
	</div>
	<div class="az_jel">
		<form id="LoginForm" method="post" action="{$login.actionuri}">
			<label>{$text->partner->azonosito}</label><input id="LoginNevEdit" type="text" size="8" name="user_login_nev" class="general_input_part"/>
			<label>{$text->partner->jelszo}</label><input id="LoginPassEdit" type="password" size="8" name="user_login_jelszo" class="general_input_part"/>
			<div class="bej_reg"><input type="submit" value="{$text->partner->bejelentkezesgomb}" name="x" class="general_button"/><br />
				<a class="link_bold" href="{$login.registrationuri}">
					{$text->partner->regisztracio}
				</a>
				<input id="LoginCommand" type="hidden" value="{$login.jaxcommand}" name="com"/>
			</div>
		</form>
	</div>
</div>