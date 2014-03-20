<?php
if (function_exists('Dwoo_Plugin_include')===false)
	$this->getLoader()->loadPlugin('include');
ob_start(); /* template body */ ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu-HU" lang="hu-HU">
	<head>
		<link type="text/css" href="/themes/<?php echo $this->scope["theme"];?>/style.css" rel="stylesheet">
		<link type="text/css" href="/themes/<?php echo $this->scope["theme"];?>/jquery.message.css" rel="stylesheet">
		<link type="image/x-icon" href="themes/<?php echo $this->scope["theme"];?>/images/favico.ico" rel="shortcut icon"/>
		<link rel="apple-touch-icon" href="themes/<?php echo $this->scope["theme"];?>/images/apple-touch-icon.png" />

			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/jquery.lightbox.js"></script>
			<script type="text/javascript" src="js/jquery.message.js"></script>
			<script type="text/javascript" src="js/jquery.validate.js"></script>
			<script type="text/javascript" src="js/jquery.metadata.js"></script>
			<script type="text/javascript" src="js/jquery.validate.messages.<?php echo $this->scope["nyelv"];?>.js"></script>
			<script type="text/javascript" src="js/siikertools.js"></script>
			<script type="text/javascript" src="js/initforms.js"></script>
			<script type="text/JavaScript" src="js/cloud-carousel.1.0.3.js"></script>
		
			<script type="text/javascript">$(function(){
				$.Lightbox.construct({
					show_helper_text: false,
					base_url: '',
					text: {
						image: 'Kép',
						of: '/',
						close: 'Bezár',
						download: 'Letölt'
					},
					files: {
						js: {
							lightbox: 'js/jquery.lightbox.js'
						},
						css: {
							lightbox: 'themes/<?php echo $this->scope["theme"];?>/jquery.lightbox.css'
						},
						images: {
							prev: 'themes/<?php echo $this->scope["theme"];?>/images/lightbox_prev.gif',
							next: 'themes/<?php echo $this->scope["theme"];?>/images/lightbox_next.gif',
							blank: 'themes/<?php echo $this->scope["theme"];?>/images/lightbox_blank.gif',
							loading: 'themes/<?php echo $this->scope["theme"];?>/images/lightbox_loading.gif'
						}
					}
				});
			});</script>
			
<?php if (( $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'carousel',    1 => 'true',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), (isset($this->scope["setup"]) ? $this->scope["setup"]:null), true) == 1 )) {
?><script>
      $(document).ready(function(){
  						   
	// This initialises carousels on the container elements specified, in this case, carousel1.
	$("#carousel1").CloudCarousel(		
		{			
			xPos:360,
			yPos: 15,
			xRadius: 350,
			yRadius: 25,
			buttonLeft: $("#left-but"),
			buttonRight: $("#right-but"),
			altBox: $("#alt-text"),
			titleBox: $("#title-text")
		}
	);
});
  
 
</script>
<?php 
}?>

			

			<title><?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',    1 => '->',  ),  2 =>   array (    0 => 'oldal',    1 => 'title',  ),  3 =>   array (    0 => '',    1 => '',    2 => '',  ),), $this->scope["spectext"], false);?></title>
	</head>
	<body>
		<div><a name="top"></a>
			<?php echo Dwoo_Plugin_include($this, 'fejlec.tpl', null, null, null, '_root', null);?>

		</div>

		<div class="whole">
			<?php echo Dwoo_Plugin_include($this, 'blind.tpl', null, null, null, '_root', null);?>

			<?php echo Dwoo_Plugin_include($this, 'menu2.tpl', null, null, null, '_root', null);?>

			<?php echo Dwoo_Plugin_include($this, 'tartalom.tpl', null, null, null, '_root', null);?>

		</div>
		<div>
			<?php echo Dwoo_Plugin_include($this, 'lap_tetejere.tpl', null, null, null, '_root', null);?>

		</div>
		<div>
			<?php echo Dwoo_Plugin_include($this, 'lablec.tpl', null, null, null, '_root', null);?>

		</div>
	</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>