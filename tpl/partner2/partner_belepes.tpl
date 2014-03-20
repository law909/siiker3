<div class="partner_be_w" id="partner_belepes">
	<div class="az_jel">&nbsp;&nbsp;<label>{$text->partner->azonosito}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>{$text->partner->jelszo}</label>
		<form id="LoginForm" method="post" action="{$login.actionuri}">
			<!--<label>{$text->partner->azonosito}</label>--><input id="LoginNevEdit" type="text" size="8" name="user_login_nev" class="general_input_part"/>
			<!--<label>{$text->partner->jelszo}</label>-->
			<input id="LoginPassEdit" type="password" size="8" name="user_login_jelszo" class="general_input_part"/>
			<span class="bej_reg"><input type="submit" value="{$text->partner->bejelentkezesgomb}" name="x" class="general_button"/>
				<a class="link_bold" href="{$login.registrationuri}">
					{$text->partner->regisztracio}
				</a>
				<input id="LoginCommand" type="hidden" value="{$login.jaxcommand}" name="com"/>
			</span>
		</form>
	</div>
</div>