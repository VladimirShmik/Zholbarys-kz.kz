// Contact Form Scripts
jQuery(document).ready(function($) {

    $("#contactForm input").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
			var item = $("input[name='item']").val();
            var name = $("input[name='name']").val();
            var email = $("input[name='email']").val();
            var phone = $("input[name='phone']").val();
			var city = $("input[name='city']").val();
            var message = $("textarea[name='message']").val();
            
            // Check for white space in name for Success/Fail message
           
            $.ajax({
                url: "/local/templates/zholbarys/include/mail/contact_me.php",
                type: "POST",
                data: {
					item: item,
                    name: name,
                    phone: phone,
                    email: email,
					city: city,
                    message: message
                },
                cache: false,
				beforeSend: function(){
					$('#submit').text('Отправляю...');
				},
			
                success: function() {
					
					 // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Ваше сообщение отправлено. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');
                   
					$('#submit').text('Отправлено!');
                    //clear all fields
                    $('#contactForm').trigger("reset");
					
					ym(56809111, 'reachGoal', 'ORDER'); return true;
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                     $('#success > .alert-danger').append($("<strong>").text("Извините " + name + ", почтовый сервер не отвечает. Пожалуйста, попробуйте позднее!"));
                    $('#success > .alert-danger').append('</div>');
					$('#submit').text('Отправлено!');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            });
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });
	/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});
});



