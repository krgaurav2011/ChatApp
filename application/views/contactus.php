<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Available Tests</title>
        <link rel="stylesheet" href="http://localhost/ontest/Static/css/bootstrap.min.css"/>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/googleJquery.js"></script>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/jquery.validate.js"></script>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/jquery-validate.bootstrap-tooltip.js"></script>

        <style type="text/css">
            #panel{
                position: relative;
                background-color: whitesmoke;
                color: #000; 
                padding-top: 1%;
                padding-bottom: 1%;
                margin: 1.3%;
                padding-left: 0%;
                width: 80%;
                margin-left: 10%;
                border-radius: 1em;
                opacity: 0.7;
                text-align: justify;
            }
            #name{
                box-shadow: 3px 8px 5px #e4f689;
                padding-right:5px;
                padding-left:5px;
                border: solid #a0c002;
                background-color: #f4f95e;
                color: #444;
                margin-top: 2%;
                margin-left: 5%;
                margin-right: 5.1%;
                font-size: 2em;
                opacity: 0.7;
            }
            body{
                background: url("http://localhost/ontest/Static/images/Exam.jpg") fixed;
                background-size: 98%;
            }
            #main{
                text-align: left;
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
                width: 9em;
                text-decoration: none;
                color: white;
            }
        </style>

    </head>

    <body>
        <div id="header">
            <h1>e-Xamine</h1>
        </div>
        <div id="main">
            <?php if (!isset($_SESSION['id'])) {
                ?>
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
                                <button  id="submit" value="Login" class="btn-success form-control">Login </button>

                            </div>
                        </div>

                    </form>
                </div>
            <?php } else {
                ?>

                <div id="login">
                    <form id="loginform" class="form-inline row" role="form" action="<?= base_url('index/logout'); ?>" method="post">

                        <!-- -->
                        <div class="form-group">
                            <div class="col-sm-2">
                                <input type="submit" id="submi" value="Logout" class="btn-danger form-control">
                            </div>
                        </div>

                    </form>
                </div>
            <?php }
            ?>
            <div id ="menu">
                <div id="btn">
                    <a href="<?php echo base_url('index'); ?>">
                        <div class="form-group">
                            <input type="button" id="sub" value="Home" class="btn-info form-control">
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
                <br><br>
            </div>
            <div id="panel" style="padding-left: 25px; color: #A70000">
                <div>
                    <h4 style="color: blue; padding-left: 20px"> For Any Queries Feel free to write to us at queries@examine.com or gaurav999396@gmail.com  </p>
                        <br>Visit our <a href="http://facebook.com" >Facebook Page </a></h4>
                </div>
            </div>
        </div>
    </body>
</html>