$(function(){
 	//alert("hello");
	$("#loginForm").validate({

		rules:{
			username:{
				required:true,
				minlength:5,
				maxlength:15
			},

			password:{
				required:true,
				minlength:5,
				maxlength:15
			}
		},
		messages:{
			username:{
				required:"username is required",
				minlength:"Your username must consist at least 5 charecters",
				maxlength:"username max length is 15"
			},

			password:{
				required:"password is required",
				minlength:"Your password must consist at least 5 charecters",
				maxlength:"password max length is 15"
			}
		}

	});
});