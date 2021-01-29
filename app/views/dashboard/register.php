<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  
  
  <link rel="stylesheet" href="<?php echo URLROOT;?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo URLROOT;?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo URLROOT;?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo URLROOT;?>/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo URLROOT;?>/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Create Account</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Create your account. It's free and only takes a minute.</p>

    
    <?php if(!empty($errors)) {
      echo $errors;
    } ?>

    <form action="<?php echo URLROOT; ?>/auth/register" name="contactForm" method="post">
    
    <p class="text-danger ml-4">
						<?php
							if(isset($data['name-err']))
							echo $data['name-err'];
						?>
    </p>
    <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" id="name" placeholder="Username" autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <p class="text-danger ml-4">
						<?php
							if(isset($data['email-err']))
							echo $data['email-err'];
						?>
					</p>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
					<p class="text-danger ml-4">
						<?php
							if(isset($data['password-err']))
							echo $data['password-err'];
						?>
					</p>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
					<p class="text-danger ml-4">
						<?php
							if(isset($data['address-err']))
							echo $data['address-err'];
						?>
					</p>
      <div class="form-group has-feedback">
        <textarea name="address" class="form-control" id="address" placeholder="Address"></textarea>
        <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
      </div>
      
					<p class="text-danger ml-4">
						<?php
							if(isset($data['contact-err']))
							echo $data['contact-err'];
						?>
					</p>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number" autocomplete="off">
        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
         
        </div>
        <!-- /.col -->
        <div class="col-xs-12 ">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
        </div>
        <!-- /.col -->
      </div>
      
      <div class="pt-100">
      already have an account?<a class="txt2" href="<?php echo URLROOT; ?>/dashboard/login">
							Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->

<script src="<?php echo URLROOT;?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo URLROOT;?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo URLROOT;?>/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  

$(function () {

var str=$('name').val();
if(/^[a-zA-Z- ]*$/.test(str) == false) {
		alert('Your search string contains illegal characters.');
	}
$("form[name='contactForm']").validate({
	// Define validation rules
	rules: {
		name: "required",
		email: "required",
		password: "required",
		
		name: {
			required: true,
			minlength: 6,
			maxlength: 20,

		},
		email: {
			required: true,
			minlength: 6,
			maxlength: 50,
			email: true
		},
		password: {
			minlength: 8,
			maxlength: 30,
			required: true,
			//pwcheck: true,
			// checklower: true,
			// checkupper: true,
			// checkdigit: true
		},
		
	},
	// Specify validation error messages
	messages: {
		required: "Please enter your name",
		minlength: "Name must be min 6 characters long",

		
		email: {
			required: "Please enter your email",
			minlength: "Please enter a valid email address",
		},
		password: {
			required: "Please enter your password",
			minlength: "Password length must be min 8 characters long",
			maxlength: "Password length must not be more than 30 characters long"
		},
		
	},
	submitHandler: function (form) {
		form.submit();
	}
});
}); 
	
$(document).ready(function() {

// form autocomplete off		
$(":input").attr('autocomplete', 'off');

// remove box shadow from all text input
$(":input").css('box-shadow', 'none');



$("#name").blur(function() {

var name  		= 		$('#name').val();


// if name is empty then return
if(name == "") {
	return;
}
var form_url = '<?php echo URLROOT; ?>/auth/formRegister';

// send ajax request if name is not empty
$.ajax({
		url:form_url,
		type: 'post',
		data: {
			'name':name,
			
	},

	success:function(response) {	

		// clear span before error message
		$("#name_error").remove();

		// adding span after name textbox with error message
		$("#name").after("<span id='name_error' class='text-danger'>"+response+"</span>");
	},

	error:function(e) {
		$("#result").html("Something went wrong");
	}

});
});


// ------------------- [ Email blur function ] -----------------

$("#email").blur(function() {

	var email  		= 		$('#email').val();


	// if email is empty then return
	if(email == "") {
		return;
	}
	var form_url = '<?php echo URLROOT; ?>/auth/formRegister';

	// send ajax request if email is not empty
	$.ajax({
			url:form_url,
			type: 'post',
			data: {
				'email':email,
				'email_check':1,
		},

		success:function(response) {	

			// clear span before error message
			$("#email_error").remove();

			// adding span after email textbox with error message
			$("#email").after("<span id='email_error' class='text-danger'>"+response+"</span>");
		},

		error:function(e) {
			$("#result").html("Something went wrong");
		}

	});
});
$("#passsword").blur(function() {

var password  		= 		$('#password').val();


// if password is empty then return
if(password == "") {
	return;
}
var form_url = '<?php echo URLROOT; ?>/auth/formRegister';

// send ajax request if password is not empty
$.ajax({
		url:form_url,
		type: 'post',
		data: {
			'password':password,
			
	},

	success:function(response) {	

		// clear span before error message
		$("#password_error").remove();

		// adding span after password textbox with error message
		$("#password").after("<span id='password_error' class='text-danger'>"+response+"</span>");
	},

	error:function(e) {
		$("#result").html("Something went wrong");
	}

});
});


// -----------[ Clear span after clicking on inputs] -----------

$("#name").keyup(function() {
$("#error").remove();
});


$("#email").keyup(function() {
$("#error").remove();
$("span").remove();
});

$("#password").keyup(function() {
$("#error").remove();
});

$("#c_password").keyup(function() {
$("#error").remove();
});

});


</script>
</body>
</html>
