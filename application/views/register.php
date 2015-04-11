<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register | e-Xamine</title>
        <link rel="stylesheet" href="http://localhost/ontest/Static/css/bootstrap.min.css"/>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/googleJquery.js"></script>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/jquery.validate.js"></script>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/jquery-validate.bootstrap-tooltip.js"></script>

        <style type="text/css">
            .error{
                color: red;
            }
            #panel{
                background-color: activecaption;
                color: #000; 
                padding-top: 1%;
                padding-bottom: 1%;
                padding-left: 4%;
                margin-left: 25%;
                width: 51%;
                margin-right: 25%;
                border-radius: 2em;
                opacity: 0.82;
            }
            #agreeDiv{
                background-color: rgba(0, 0, 0, 0.7);
                color: red;
            }
            body{
                background: url("http://localhost/ontest/Static/images/Rows_of_Bookshelves.jpg") no-repeat center center fixed;
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
            #menu{
                text-align: right;
                background-color: #c6c6e5;
                color: white;
                padding-top: 10px;
                padding-bottom: 20px;
                padding-right: 10px;
                height: 25px;
            }
            #btn{
                float: right;
                width: 7em;
                text-decoration: none;
                color: white;
            </style>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#loginform").validate({
                        rules: {
                            login_email: {email: true, required: true},
                            login_password: {required: true}
                        }
                    });

                    $('#loginform').submit(function () {
                        var data = $('#loginform').serialize();
                        var url = "<?php echo base_url('/login/dologin_submit'); ?>";
                        $.ajax(url, {
                            type: "POST",
                            data: data,
                            success: onLoginSuccess,
                            error: onLoginError
                        });
                        return false;
                    });
                    $('#password').keyup(function (e) {
                        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
                        var mediumRegex = new RegExp("^(?=.{8,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
                        var enoughRegex = new RegExp("(?=.{8,}).*", "g");
                        if (false == enoughRegex.test($(this).val())) {
                            $('#passstrength').html('<font color=red>More Characters</font>');
                        } else if (strongRegex.test($(this).val())) {
                            $('#passstrength').className = 'ok';
                            $('#passstrength').html('<font color=red>Strong!</font>');
                        } else if (mediumRegex.test($(this).val())) {
                            $('#passstrength').className = 'alert';
                            $('#passstrength').html('<font color=red>Medium!</font>');
                        } else {
                            $('#passstrength').className = 'error';
                            $('#passstrength').html('<font color=red>Weak!</font>');
                        }
                        return true;
                    });
                    $("#signupform").validate({
                        rules: {
                            register_email: {email: true, required: true},
                            password: {required: true, minlength: 8},
                            confirmpwd: {equalTo: "#password", required: true},
                            role: {required: true}


                        },
                        tooltip_options: {
                            '_all_': {placement: 'right'}
                        }
                    });
                    $('#signupform').submit(function () {
                        var data = $('#signupform').serialize();
                        var url = "<?php echo base_url('/register/doregister_submit'); ?>";
                        $.ajax(url, {
                            type: "POST",
                            data: data,
                            success: onSuccess,
                            error: onError
                        });
                        return false;
                    });

                });
                function onLoginSuccess(response) {
                    console.log(response);
                    // alert(response);
                    try {
                        data = $.parseJSON(response);
                        if (data.success) {
                            //alert(data.errorMsg);
                            window.location.href = data.loc;
                        }
                        else {
                            alert(data.errorMsg);
                            // window.location.href = "<?php echo base_url('login/dologin'); ?>";
                        }
                    } catch (e) {
                        $('#login-error').addClass('error').html(response);
                    }
                }
                function onLoginError() {
                    //console.log(response);
                    alert("Error!! Something Went Wrong Please Try again");
                }
                ;
                function onSuccess(response) {
                    console.log(response);
                    // alert(response);
                    try {
                        data = $.parseJSON(response);
                        // alert(response);
                        if (data.success) {
                            //alert(data.errorMsg);
                            alert("Successfully Registered ! Please Login to Continue..");
                            window.location.href = "<?php echo base_url('login/dologin'); ?>";
                        }
                        else {
                            alert(data.errorMsg);
                            // window.location.href = "<?php echo base_url('login/dologin'); ?>";
                        }
                    } catch (e) {
                        $('#register-eror').addClass('error').html(response);
                    }
                }
                function onError() {
                    alert("Error!! Something Went Wrong Please Try again");
                }
                ;
            </script>
        </head>
        <body>
            <div id="header">
                <h1>Register yourself</h1>
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
                        <a href="<?php echo base_url('login/dologin'); ?>">
                            <div class="form-group">
                                <input type="button" id="sub" value="Home" class="btn-info form-control">
                            </div>
                        </a>
                    </div>
                    <div id="btn">
                        <a href="<?php echo base_url('home/contactus'); ?>">
                            <div class="form-group">
                                <input type="button" id="sub" value="Contact Us" class="btn-info form-control">
                            </div>
                        </a>
                    </div>
                    <div id="btn">
                        <a href="<?php echo base_url('home/about'); ?>">
                            <div class="form-group">
                                <input type="button" id="sub" value="About Us" class="btn-info form-control">
                            </div>
                        </a>
                    </div>
                </div>

                <div id="sign_up"><div id="panel">
                        <span id="register-error"></span>
                        <form role="form" class="form-horizontal" id="signupform" action="<?= base_url('register/doregister_submit'); ?>" method="post" name="register">
                            <div class="form-group">
                                <label class="col-sm-offset-2 form-label col-sm-2" id ="register_email" for="user_id">E-mail ID</label>
                                <div class="col-sm-4">
                                    <input name="register_email" id="register_email" type="text" value="<?php echo set_value('register_email'); ?>" placeholder="someone@example.com" class="form-control" id="register_email">	
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-offset-2 form-label col-sm-2" for="spswd">Password</label>
                                <div class="col-sm-4">
                                    <input id="password" name="register_password" type="password" placeholder="Enter Password" class="col-sm-2 form-control">	
                                </div>
                                <span id="passstrength"></span>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-offset-2 form-label col-sm-2" for="scpwd">Confirm Password</label>
                                <div class="col-sm-4">
                                    <input id = "confirmpwd" name="register_passconf" type="password" placeholder="Confirm Password" class="col-sm-2 form-control">	
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-offset-2 col-sm-2 form-label" for="type">Role</label>
                                <div class="col-sm-4">
                                    <select id="role" class="form-control" name="type">
                                        <option value="" name ="type">--Select Role--</option>
                                        <option value="Teacher" name = "type">Teacher</option>
                                        <option value="Student" name = "type">Student</option>


                                    </select>	
                                </div>	
                                <br>		
                            </div>



                            <br><br>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-2">
                                    <input type="reset" id="reset" class="btn btn-danger">
                                </div>
                                <div class="col-sm-2">
                                    <button  id="submit" value="Login" class="btn-success form-control">Register</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </body>
    </html>