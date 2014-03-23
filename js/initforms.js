$(document).ready(function() {
	$('#PartnerAdatForm').validate({
		submitHandler: function(form) {
			form.submit();
		},
		highlight: function(element, errorClass) {
			$(element).addClass(errorClass);
		},
		unhighlight: function(element, errorClass) {
			$(element).removeClass(errorClass);
		}
	});
	$('#LoginForm').submit(function(e) {
		e.preventDefault();
		submitLoginForm();
		return false;
	});
	$('#KosarOkBtn').click(function(e) {
		e.preventDefault();
		submitKosar();
	});
	$('PartnerAdatForm').submit(function(e) {
		var k=$('#ElfogadvaCB').attr('checked');
		if (k) {
			return true;
		}
		else {
			$.get('index.php?com=jaxgetvasfeltmsg',function(data){
				e.preventDefault();
				alert(data);
			});
		}
	});
	$('#PaypalForm').hide();
	$('#dim1,#dim2,#dim3,#dim4,#dim5').change(function(e) {
		e.preventDefault();
		filterbydim();
	});
	imageRoller();

    function lebegokosarcalc() {
        var nar = 0, bar = 0;
        $('.gyorsinput').each(function(i, el) {
            var $el = $(el);
            nar = nar + ($el.data('netto') * 1) * $el.val();
            bar = bar + ($el.data('brutto') * 1) * $el.val();
        });
        $('.lebegonetto').text(Math.round(nar));
        $('.lebegobrutto').text(Math.round(bar));
    }

    if ($('.gyorsinput').length > 0) {
        var r = $(window).width() - $('.whole').width();
        $('.lebegokosar').css({'right': r / 2 + 5, 'display': 'block'});
        lebegokosarcalc();
    }

    $('.gyorsinput').on('change', function(e) {
        lebegokosarcalc();
    });
});