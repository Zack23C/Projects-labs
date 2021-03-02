
$(document).ready(function() {


	$("a.linked").on("click",function(e){
		e.preventDefault();

		$('.movesection').addClass('step2');
		$('.movesection').removeClass('step1 step3');


	});


	$("form").submit(function(e) {

		e.preventDefault();
		var form = $(this);
		var postform = true;
		var fields = $(this).find("*[required]");;

		fields.each(function() {

			var valid = validateField( $(this) );

			if ( !valid ) {


				postform = false;
			}
		});


		if ( !postform ) {


			e.preventDefault();

		} else {


			e.preventDefault();

			
			$.ajax({
				url: "js/users.json",
				dataType: "json"
			})
			.done(function( data ) {

 	var typedName = document.getElementById("Names").value;
 	var typedEmail = document.getElementById("emails").value;


 for(var i=0; i<data.length;i++){

 	var user = data[i];
 	console.log(user.username);
 	console.log(typedName);

 	console.log(user.email);
 	console.log(typedEmail);

 	if ( user.username == typedName && user.email == typedEmail ) {
 		// user found
 		console.log('we have logged in!');
 		//$("input.linkedtonext").on("click",function(e){
			e.preventDefault();
			$(".movesection").addClass('step3');
			$(".movesection").removeClass('step1');
			$("form.step2").removeClass('step2');

		//});
 	}else {
 		//$("input.linkedtonext").on("click",function(e){
			$(".errors").addClass('errorshowing');
		//});

 	}

 }

 //did we find a user that matches?

 // yes = show third step

 // no = show error message







			});
		

		}
	});

    


    

});

function validateField( field ) {

	// remove error messages from eventual earlier validation attempts
	field.closest("label").removeClass("error");

	// save/set some values
	var type = field.attr("type");
	var val = field.val();
	var valid = true;

	if ( type == "text" && (val == undefined || val == null || val == "") ) {
		valid = false;

	// is is an email field?
	} else if ( type == "email" && !validateEmail(val) ) {
		valid = false;
	}

	// was the field validated?
	if ( !valid ) {
		// no - add the error-appareance
		field.closest("label").addClass("error");
	}

	return valid;

}

// function to check if email has correct syntax (using regex)
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}