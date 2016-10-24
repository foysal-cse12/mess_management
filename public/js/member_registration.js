$(function(){
 	//alert("hello");
	$("#registrationForm").validate({

		rules:{
			username:{
				required:true,
				minlength:5,
				maxlength:15
			},

			fullname:{
				required:true,
				minlength:3
			},

			password:{
				required:true,
				minlength:5
			},

			repassword:{
				required:true,
				minlength:5,
				equalTo:"#password"
			},

			email:{
				required:true,
				email:true
			},

			mobile:{
				required:true,
				minlength:11,
				maxlength:11
			}
		},
		messages:{
			username:{
				required:"username is required",
				minlength:"Your username must consist at least 5 charecters",
				maxlength:"username max length is 15"
			},

			fullname:{
				required:"password is required",
				minlength:"Your password must consist at least 3 charecters",
				
			},
			password:{
				required:"please provide a password",
				minlength:"your password must be at least 5 charecters long"
			},

			repassword:{
				required:"please provide a confirm password",
				minlength:"your password must be at least 5 charecters long",
				equalTo:"please enter the same password as above"
			},

			mobile:{
				required:"please enter your mobile number",
				minlength:"mobile number length must be 11",
				maxlength:"mobile number length must be 11"
			}
		}

	});
});