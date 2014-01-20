attachFormEvents = function () {
	$('#submit-request').on('click', function (e) {
		$.ajax({
			type : "post",
			dataType : "html",
			url : CVO.ajaxurl,
			data : {
				action: "submit_request_form_template",
				inputEmail: $('#inputEmail').val(),
				inputCompany: $('#inputCompany').val(),
				inputName: $('#inputName').val(),
				inputPhone: $('#inputPhone').val(),
			},
			success: function(response) {
				var r = ($.parseJSON(response));
				console.log(r);
				if (r != 1 && r.responseType && r.responseType === 'Error') {
					if (r.company) {
						$('#companySection .error').text(r.company);
					} else {
						$('#companySection .error').text('');
					}
					if (r.email) {
						$('#emailSection .error').text(r.email);
					} else {
						$('#emailSection .error').text('');
					}
					if (r.name) {
						$('#nameSection .error').text(r.name);
					} else {
						$('#nameSection .error').text('');
					}
				} else {
					$('.form-body').hide();
					$('#submit-request').hide();
					$('.thank-you-message').fadeIn();
				}
			}
		});
		e.preventDefault();
	});
}


$(document).ready(function() {
	$('.request-form').click(function (e) {
		jQuery.ajax({
			type : "post",
			dataType : "html",
			url : CVO.ajaxurl,
			data : {action: "get_request_form_template"},
			success: function(response) {
				if (!$('#request-modal').is('*')) {
					$('body').append(response);
				}

				$('.modal').modal('show');
				attachFormEvents();
			}
		});
		e.preventDefault();
	});


});
