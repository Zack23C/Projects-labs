$(document).ready(function() {


	// ------- showing/hiding additional fields if user would like newsletters
	// on change-event of <select>, do stuff
	$("#iam").change(function() {

		// save the chosen value
		var val = $(this).find("option:selected").attr("value");

		// clear "show"-class first to make sure a change from "if  yes" to another option = additional fields are hidden again
		$(".if-Yes").removeClass("show");

		// has the user shosen the option "yes"?
		if ( val=="yes") {

			// yes, add class "show" and let special CSS for this show the hidden fields
			$(".if-Yes").addClass("show");
		}
	});

	// ------- validation of fields when user tries to submit form
	// on submit-event of the form, do stuff
	$("form").submit( function(event) {
		
		// start by assuming the form fields will validate
		var postform = true;

		// get and save all fields with attribute "required" in the form in a variable
		var fields = $(this).find("*[required]");

		// remove any "error"-classes from earlier validation attempts
		fields.removeClass("error");

		// ok, no go through att fields and validate them one by one
		fields.each(function() {

			// save the value per field and that type of input it is
			var type = $(this).attr("type");
			var val = $(this).val();

			// is this a "normal" input type text field?
			if ( type== "text" ) {

				// yes, check if the user has written anything in the field
				if( val == undefined || val == null || val == "" ) {

					// the user hasn't written anythin = change the assumption that all fields are valid
					postform = false;

					// add errror-class on input field so CSS can show that the field isn't filled in correctly
					$(this).addClass("error");
				}

			// is this an input especially for email addresses?
			} else if ( type=="email" ) {

				// yes, check if it's a correct email address
				if ( !validateEmail(val) ) { // calling validateEmail-function

					// the user hasn't written anythin = change the assumption that all fields are valid
					postform = false;

					// add errror-class on input field so CSS can show that the field isn't filled in correctly
					$(this).addClass("error");
				}
//if (postform){ $("form").submit(function(){

   // $("#modform").addClass("hidden");
			//$("#thanks").removeClass("hidden");
			//$("#thankscontent").show("slide");
		//    

   // });

if(postform){
			event.preventDefault();
			$("#modform").addClass("hidden");
			$("#thanks").removeClass("hidden");
			
		}//
		// has one or more of the fields failed the validation?
		else{
		//if ( !postform ) {

			// yes, prevent the form from submitting (so that the user will se all our pretty error-messages)
			event.preventDefault();
		}
	
		}


		});

		// has one or more of the fields failed the validation?
		if ( !postform ) {

			// yes, prevent the form from submitting (so that the user will se all our pretty error-messages)
			event.preventDefault();
		}
	} );


   

	// Open the modal by adding class to <body> and use CSS- to change things when body has that class
	$("a.open-modal").on("click", function(e) {
		e.preventDefault();
		


		$("body").addClass("modal-showing");
	})

	
	// CLOSE modal by removing the class from <body>
	// 1. click on the cancel-button
	// 2. click on the modal container
	$(".modal .button.cancel").on("click", function(e) {
		e.preventDefault();

		$("body").addClass("closing");

		var transEnd = "transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd";
		$(".modal-container .modal").one(transEnd, function() {

			$("body").removeClass("modal-showing closing");
			$(this).off(transEnd);
		});
	})

	
	})



	/* but NOT on clicks in the modal (=prevent "bubbling")
	$(".modal").on("click", function(e) {
		e.stopPropagation();
		return false;
	})*/


// function to check if email has correct syntax (using regex)
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase()
    	);
}
