function addToKosar(uri) {
	$.getJSON(uri,function (json) {
		$().message(json.message);
	});
}

function addToKedvencek(uri) {
	$.getJSON(uri,function (json) {
		$().message(json.message);
	});
}

function submitKosar() {
	var k=$('#ElfogadvaCB').attr('checked');
	if (k) {
		var s='index.php?com=jaxccardcheck&par='+$('#Kartyaszam1Edit').val()+$('#Kartyaszam2Edit').val()+
			$('#Kartyaszam3Edit').val()+$('#Kartyaszam4Edit').val()+'&par2='+$('#FizmodEdit').val();
		$.getJSON(s,function (json) {
			if (!json.ok) {
				alert(json.message);
			}
			else {
				$('#KosarSubmitForm').submit();
				if (json.fizmodtipus=='P') {
					$('#PaypalForm').submit();
				}
			}
		});
	}
	else {
		$.get('index.php?com=jaxgetvasfeltmsg',function(data){
			alert(data);
		});
	}
}

function submitLoginForm() {
	$.ajax({
		type:'POST',
		url:'index.php',
		data:{
			com:'jaxlogin',
			user_login_nev:$('#LoginNevEdit').val(),
			user_login_jelszo:$('#LoginPassEdit').val()
		},
		success:function(data) {
			if (data.loggedin) {
				if (data.showmessage) {
					alert(data.message);
				}
				window.location.reload();
			}
			else {
				if (data.showmessage) {
					$().message(data.message);
				}
			}
		}
	});
}

var imgrollActImage=0;
function imageRoller() {
	$('#imageroller img').hide();
	setTimeout('rollImage()',4000);
}

function rollImage() {
	var x=$('#imageroller img');
	x.fadeOut(1500);
	x.each(function(i) {
		if (i==imgrollActImage) {
			$(this).fadeIn(1500);
		}
	});
	imgrollActImage=imgrollActImage+1;
	if (imgrollActImage>x.length-1) {
		imgrollActImage=0;
	}
	setTimeout('rollImage()',4000);
}

function filterbydim() {
	var s='',d,ur;
	ur=$('#dimfilter').attr('data-uri');
	d=$('#dim1').val();
	if (d>0) s+='&dim1='+d;
	d=$('#dim2').val();
	if (d>0) s+='&dim2='+d;
	d=$('#dim3').val();
	if (d>0) s+='&dim3='+d;
	d=$('#dim4').val();
	if (d>0) s+='&dim4='+d;
	d=$('#dim5').val();
	if (d>0) s+='&dim5='+d;
	window.location.assign(ur+s);
}