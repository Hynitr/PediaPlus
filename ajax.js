$(document).ready(function() 
{

	//signup
	$("#sub").click(function() 
	{
		var fname	 = $("#fname").val();
		var tel  	 = $("#tel").val();
		var email 	 = $("#email").val();
		var inst 	 = $("#inst").val();
		var user 	 = $("#usname").val();
		var pword  	 = $("#pword").val();
		var cpword 	 = $("#cpword").val();
		
		if (fname == "" || fname == null) {

			$('#msg').html("Input your full name please");

		} else {

		if(tel == "" || tel == null) {

			$('#msg').html("Telephone number cannot be empty");

		} else {

			if(email == "" || email == null) {

				$('#msg').html("Invalid email address");

			} else {

			if(inst == "" || inst == null) {

				$('#msg').html("Fill in your institution name");

			}else {

			if(user == "" || user == null) {

				$('#msg').html("Create a username");

			}else {
			
				if(pword == "" || pword == null) {

					$('#msg').html("Create a secured password");

				}else {

				if(cpword == "" || cpword == null) {

					$('#msg').html("Confirm your password");

				}else {

					if(pword != cpword) {

						$('#msg').html("Password does not match");

					} else {

						$('#msg').html("Loading...Please Wait");

						$.ajax
(
{
    type        :  'post',
    url         :  'functions/init.php',
    data        :  {fname:fname,tel:tel,email:email,user:user,pword:pword,cpword:cpword,inst:inst},
    success     :  function(data)
    {
        $('#msg').html(data);
    }
}
    )
					}

				}
				}

			}
			}
			}
		}


				}
		$("#exampleModalCenter").modal();
	})



	//signin
	$("#signin").click(function() 
	{
		var username	 = $("#lgusr").val();
		var password 	 = $("#lgpword").val();

		if(username == "" || username == null) {

			$('#msg').html("Please insert your username");	

		} else {

		if(password == "" || password == null) {

			$('#msg').html("Your password is empty");

		} else {

			$.ajax
			(
			{
				type 		:  'post',
				url			:  'functions/init.php',
				data 		:  {username:username,password:password},
				success 	:  function(data)
				{
					$('#msg').html(data);
				}
			}
				)

		}
		}

		$("#exampleModalCenter").modal();

})

	//forgot
	$("#forgot").click(function() 
	{
		var fgeml	 = $("#fgeml").val();

		if(fgeml == "" || fgeml == null) {

			$('#msg').html("Please insert your email");		
		} else {

			$('#msg').html("Loading...Please Wait!");		

			$.ajax
	(
	{
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {fgeml:fgeml},
		success 	:  function(data)
		{
			$('#msg').html(data);
		}
	}
		)

		}
	
		$("#exampleModalCenter").modal();
})

		//reset
	$("#reset").click(function() 
	{
		var passworder	 = $("#passworder").val();
		var cpassword	 = $("#cpassword").val();
		var emailr  	 = $("#emailr").val();
		$("#resetModalCenter").modal();

	$.ajax
	(
	{
		type 		:  'post',
		url			:  'https://pediaplus.com.ng/functions/init.php',
		data 		:  {passworder:passworder, cpassword:cpassword, emailr:emailr},
		success 	:  function(data)
		{
			$('#msg').html(data);
		}
	}
		)

})

})