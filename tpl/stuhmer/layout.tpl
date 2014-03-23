<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu-HU" lang="hu-HU">
	<head>
		{if ($fejadat.seodescription)}
		<meta name="description" content="{$fejadat.seodescription}">
		{/if}
		{if ($fejadat.kulcsszavak)}
		<meta name="keywords" content="{$fejadat.kulcsszavak}">
		{/if}
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link type="text/css" href="/themes/{$theme}/style.css" rel="stylesheet">
		<link type="text/css" href="/themes/{$theme}/jquery.message.css" rel="stylesheet">
		<link type="text/css" href="/themes/{$theme}/jquery.fancybox.css" rel="stylesheet">
		<link type="image/x-icon" href="themes/{$theme}/images/favico.ico" rel="shortcut icon"/>
		<link rel="apple-touch-icon" href="themes/{$theme}/images/apple-touch-icon.png" />

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.fancybox.js"></script>
		<script type="text/javascript" src="js/jquery.message.js"></script>
		<script type="text/javascript" src="js/jquery.validate.js"></script>
		<script type="text/javascript" src="js/jquery.metadata.js"></script>
		<script type="text/javascript" src="js/jquery.validate.messages.{$nyelv}.js"></script>
		<script type="text/javascript" src="js/siikertools.js"></script>
		<script type="text/javascript" src="js/initforms.js"></script>
		<script type="text/JavaScript" src="js/cloud-carousel.1.0.3.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.fancybox').fancybox();
				$('a.termek_fokep').fancybox();
				$('a#lista_kep').fancybox();
				$('#termek_galeria a').fancybox();
			});
		</script>

		{if ($googleanalytics)}
		<script type="text/javascript">{$googleanalytics}</script>
		{/if}

		{if ($setup->carousel->true==1)}
		<script>
			$(document).ready(function(){

				// This initialises carousels on the container elements specified, in this case, carousel1.
				$("#carousel1").CloudCarousel(
					{
						xPos: 500,
						yPos: 50,
						buttonLeft: $("#left-but"),
						buttonRight: $("#right-but"),
						altBox: $("#alt-text"),
						titleBox: $("#title-text")
					}
				);
			});
		</script>
		{/if}


			<title>{$spectext->oldal->title}{if ($fejadat.cim)}&nbsp;-&nbsp;{$fejadat.cim}{/if}</title>
	</head>
	<body>
		<div><a name="top"></a>
			{include('fejlec.tpl')}
		</div>
        {if ($userobj->viszontelado)}
            <div class="lebegokosar">Nett� �rt�k:<br><span class="lebegonetto">0</span> Ft<br>Brutt� �rt�k:<br><span class="lebegobrutto">0</span> Ft</div>
        {/if}

		<div class="whole">
			{include('menu2.tpl')}
			{include('tartalom.tpl')}
		</div>
		<div>
			{include('lap_tetejere.tpl')}
		</div>
		<div>
			{include('lablec.tpl')}
		</div>
	</body>
</html>