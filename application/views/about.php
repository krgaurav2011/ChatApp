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
                    <a href="<?php echo base_url('home/contactus'); ?>">
                        <div class="form-group">
                            <input type="button" id="sub" value="Contact Us" class="btn-info form-control">
                        </div>
                    </a>
                </div>
            </div>
            <div id="panel" style="padding-left: 25px; color: #A70000">
                <div>
                    <p style="color: blue; padding-left: 20px"> The Team Consisted of following Members ! </p> 
                </div>
                <br>
                <table  class="table">
                    <tr>
                        <th>Name</th>
                        <th>Phone</th> 
                        <th>Email</th>

                    </tr>
                    <tr>
                        <th>Kumar Gaurav</th>
                        <th>+918653169502</th> 
                        <th>gaurav999396@gmail.com</th>
                    </tr>
                    <tr>
                        <th>Shivam Singh</th>
                        <th>+919903667887</th> 
                        <th>shivam.nitdgp@gmail.com</th>
                    </tr>
                    <tr>
                        <th>Ankit Tiwari</th>
                        <th>+918759101213</th> 
                        <th>ankit.t1786@gmail.com</th>
                    </tr>
                    <tr>
                        <th>Rijoy Mukherjee</th>
                        <th>+919475458372</th> 
                        <th>rijoy.mukherjee@gmail.com</th>
                    </tr>
                    <tr>
                        <th>Subhash Kumar Das</th>
                        <th>+918768390170</th> 
                        <th>subhash.das4523@gmail.com</th>
                    </tr>
                    <tr>
                        <th>Mousumi Saha</th>
                        <th>+918926640588</th> 
                        <th>sahamousumi88@gmail.com</th>
                    </tr>
                    <tr>
                        <th>Anand Kumar</th>
                        <th>+919733287397</th> 
                        <th>anand12cs15@gmail.com</th>
                    </tr>
                    <tr>
                        <th>Kartik Paswan</th>
                        <th>+918101882098</th> 
                        <th>rishirocks.kumar32@gmail.com</th>
                    </tr>
                    <tr>
                        <th>Ram Narayan</th>
                        <th>+919733280903</th> 
                        <th>rambharadwaj555@gmail.com</th>
                    </tr>


                </table>
            </div>
        </div>
    </body>
</html>