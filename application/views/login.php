<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome</title>
<link rel="stylesheet" href="http://localhost/ontest/Static/css/bootstrap.min.css"/>
<script type="text/javascript" src="http://localhost/ontest/Static/js/googleJquery.js"></script>
<script type="text/javascript" src="http://localhost/ontest/Static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://localhost/ontest/Static/js/jquery.validate.js"></script>
<script type="text/javascript" src="http://localhost/ontest/Static/js/jquery-validate.bootstrap-tooltip.js"></script>

<style type="text/css">
        #panel{
            background-color: whitesmoke;
            color: #000; 
            padding-top: 10%;
            padding-bottom: 10%;
            margin: 50px;
            padding-left: 0%;
            margin-left: 25%;
            width: 51%;
            margin-right: 25%;
            border-radius: 1em;
            opacity: 0.7;
            text-align: justify;
        }
	#agreeDiv{
		background-color: rgba(0, 0, 0, 0.7);
		color: red;
	}
	body{
		background: url("http://localhost/ontest/Static/images/Exam.jpg") fixed;
		background-size: cover;
	}
	#main{
		text-align: left;
	}
	#sign_up{
		text-align: left;
		padding-top: 10%;
	}
	#login{
		text-align: right;
		background-color: #115599;
		color: white;
		padding-top: 25px;
		padding-bottom: 5px;
		padding-right: 10px; 
	}
        #menu{
		text-align: right;
                background-color: #c6c6e5;
		color: white;
		padding-top: 10px;
		padding-bottom: 20px;
		padding-right: 10px;
                height: 25px;
	}
	#header h1{
		position: absolute;
		top:2.7%;
		left:5%;
		color: #1199ff;
		text-shadow: blue;
		font-stretch: extra-expanded;
		font-variant: small-caps;
		background-color: rgba(255, 255, 255, 0.7);
		padding-right:5px;
		padding-left:5px; 
		border: 2px solid;
		border-radius: 5px;
		box-shadow: 0px 10px 5px #888888;
	}
        #btn{
	float: right;
	width: 7em;
	text-decoration: none;
	color: white;
}
</style>
<script type="text/javascript">
$(document).ready(function () {
	$("#loginform").validate({
		rules: {
			login_email: {email:true, required: true},
			login_password: {required: true}
		}
	});
	$("#register").validate({
		rules: {
			register_email: {email:true, required: true},
			password: {required: true},
			register_passconf: {equalTo: "#password"},
			agree: {required: true}
			
		},
		messages: {
			agree: "untill you are sure of the above things...you are not allowed to sign up"
		},
		tooltip_options: {
			'_all_': { placement: 'right' }
		}
	});
	$('#submi').click(function(){
		var userId = $('#id').val();
		var pswd = $('#pswd').val();
		
		if(userId != '' && pswd != ''){
		
		/* 
			check a php program login.php
			login.php will redirect to  2 types of pages depending on the user input
				1. 0: failed to login
				2. 1: login as user
		*/
		if(userId == 'ankita'){
			document.location.replace('user.html');
		}} else {
			alert('Enter id and password');
		}
	});
})
</script>
</head>
<body>
	<div id="header">
		<h1>e-Xamine</h1>
	</div>
	<div id="main">
		<div id="login">
                    <form id="loginform" class="form-inline row" role="form" action="<?= base_url('login/dologin_submit'); ?>" method="post">
				<div class="form-group">
					<div class="col-sm-2">
						<input type="text" name="login_email" id="login_email" placeholder="Enter your E-mail ID" class="form-control" value="<?php echo set_value('login_email'); ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<input type="password" name="login_password" id="login_password" placeholder="Enter your Password" class="form-control">
					</div>
				</div>
				<!-- -->
				<div class="form-group">
					<div class="col-sm-2">
                                            <input type="submit" id="submi" value="Login" class="btn-success form-control">
					</div>
                                </div>

			</form>
		</div>
            <div id ="menu">
	<div id="btn">
            <a href="<?php echo base_url('register/doregister');?>">
					<div class="form-group">
                                            <input type="button" id="sub" value="Register" class="btn-info form-control">
				</div>
				</a>
	</div>
		<div id="btn">
		<a href="Contact.html">
					<div class="form-group">
                                            <input type="button" id="sub" value="Contact Us" class="btn-info form-control">
				</div>
				</a>
	</div>
		<div id="btn">
		<a href="About.html">
					<div class="form-group">
					<input type="button" id="sub" value="About Us" class="btn-info form-control">
				</div>
				</a>
	</div>
            </div>
		<div id="panel">
                    <p class="well"> e-Xamine is a Web based application portal which is used for giving online test.
                    Here, Students can choose any subject of their choice while teacher can set any questions.
                    It is an online battle between Teacher and student.</p>
		</div>
	</div>
</body>
</html>
