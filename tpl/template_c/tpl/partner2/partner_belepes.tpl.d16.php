<?php
ob_start(); /* template body */ ?><div class="partner_be_w" id="partner_belepes">
	<div class="wf">
	<div class="wf_in">
			<span><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'focim',    1 => 'belepes',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></span>
	</div>
	</div>
	<div class="az_jel">
		<form id="LoginForm" method="post" action="<?php echo $this->scope["login"]["actionuri"];?>">
			<!--<label><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'partner',    1 => 'azonosito',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></label>--><input id="LoginNevEdit" type="text" size="8" name="user_login_nev" value="felhasználónév" onblur="if(this.value=='') this.value='felhasználónév';" onfocus="if(this.value=='felhasználónév') this.value='';"class="general_input_part"/>
			<!--<label><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'partner',    1 => 'jelszo',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?></label>--><input id="LoginPassEdit" type="password" size="8" name="user_login_jelszo" class="general_input_part"/>
			<span class="bej_reg"><input type="submit" value="<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'partner',    1 => 'bejelentkezesgomb',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>" name="x" class="general_button"/>
				<a class="link_bold" href="<?php echo $this->scope["login"]["registrationuri"];?>">
					<?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'partner',    1 => 'regisztracio',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["text"], false);?>

				</a>
				<input id="LoginCommand" type="hidden" value="<?php echo $this->scope["login"]["jaxcommand"];?>" name="com"/>
			</span>
		</form>
	</div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>