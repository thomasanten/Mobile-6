$(document).on('pageinit', '#login', function(){ 

       $(document).on('click', '#logSubmit', function() { // catch the form's submit event
				
			if($('#username').val().length > 0 && $('#password').val().length > 0){
                  
				  var serialized		=	$('input#logSubmit').serialize(); 
				  var inputUsername	=	$('input#username').val();
				  var inputPassword	=	$('input#password').val();

					$.ajax({url: 'http://durfteantwoorden.nl/temp/login.php',
							crossDomain: true,
							data: {
								logUsername : inputUsername, logPassword : inputPassword},
								type: 'post',                  
								async: 'true',
								dataType: 'json',
								beforeSend: function() {
									$.mobile.loading('show');
                       		 },
                        		complete: function() {
									$.mobile.loading('hide');
                        		},
                        		success: function (result) {
									if(result.status == true) {
										$.mobile.changePage("#second");                        
									} else if(result.status == 'bestaat'){
										$( "#popupBasic" ).empty().append( "<p>"+result.message+"</p>" ).popup("open");
									}
								},
								error: function (request,status, error) {
    									alert('Pijn, er kan geen verbinding gemaakt worden!');
								}
                    });                  
            } else {
				$( "#popupBasic" ).empty().append( "<p>Vul wel de velden in!</p>" ).popup("open");
            }         
            return false; // cancel original event to prevent form submitting
        });   
		
		
		$(document).on('click', '#regSubmit', function() { // catch the form's submit event
			if($('#regName').val().length > 0 && $('#regPassword').val().length > 0 && $('#regEmail').val().length > 0){
                  
				  var serialized		=	$('input#reg-user').serialize(); 
				  var inputUsername	=	$('input#regName').val();
				  var inputPassword	=	$('input#regPassword').val();
				  var inputEmail		=	$('input#regEmail').val();
					
					$.ajax({url: 'http://durfteantwoorden.nl/temp/register.php',
							crossDomain: true,
							data: {
								regUsername : inputUsername, regPassword : inputPassword, regEmail : inputEmail},
								type: 'post',                  
								async: 'true',
								dataType: 'json',
								beforeSend: function() {
									$.mobile.loading('show');
                       		 },
                        		complete: function() {
									$.mobile.loading('hide');
                        		},
                        		success: function (result) {
									if(result.status == true) {
										$.mobile.changePage("#second");                        
									} else if(result.status == 'bestaat'){
										$('input#regName').parent('div').addClass('alert');
										$( "#popupBasic" ).empty().append( "<p>"+result.message+"</p>" ).popup("open");
									}
								},
								error: function (request,status, error) {
    									alert('Pijn, er kan geen verbinding gemaakt worden!');
								}
                    });                  
            } else {
				$( "#popupBasic" ).empty().append( "<p>Vul wel de velden in!</p>" ).popup("open");
            }         
            return false; // cancel original event to prevent form submitting
        });   
});