<form id="LoginForm" method="post" action="{$login.actionuri}">
    <div class="loginformfield">
        <input id="LoginNevEdit" type="text" size="12" name="user_login_nev" value="{$text->partner->felhasznalonev}" placeholder="FELHASZN�L�" class="login-input"/>
    </div>
    <div class="loginformfield">
        <input id="LoginPassEdit" type="password" size="12" name="user_login_jelszo" placeholder="JELSZ�" class="login-input"/>
    </div>
    <div class="loginformfield">
       <input type="submit" value="BEJELENTKEZ�S" name="x" class="login-button"/>
    </div>
    <div class="loginformfield">
        <a class="link_bold" href="{$login.registrationuri}">
            REGISZTR�CI�
        </a>
        <input id="LoginCommand" type="hidden" value="{$login.command}" name="com"/>
    </div>
</form>
