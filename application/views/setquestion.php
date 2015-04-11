<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Set-Test</title>
        <link rel="stylesheet" href="http://localhost/ontest/Static/css/bootstrap.min.css"/>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/googleJquery.js"></script>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/jquery.validate.js"></script>
        <script type="text/javascript" src="http://localhost/ontest/Static/js/jquery-validate.bootstrap-tooltip.js"></script>

        <style type="text/css">
            #panel{
                position: absolute;
                background-color: whitesmoke;
                color: #000; 
                padding-top: 1%;
                padding-bottom: 1%;
                margin: 4%;
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
                background: url("http://localhost/ontest/Static/images/quote1.jpg") fixed;
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
                width: 7em;
                text-decoration: none;
                color: white;
            }
            #space{
                padding-bottom: 5px;
            }
        </style>
    </head>

    <body>
        <div id="header">
            <h1>e-Xamine</h1>
        </div>
        <div id="main">
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
                <div id="btn">
                    <a href="<?php echo base_url('home/about'); ?>">
                        <div class="form-group">
                            <input type="button" id="sub" value="About Us" class="btn-info form-control">
                        </div>
                    </a>
                </div>


                <div id="panel" style="padding-left: 60px;">
                    <?php echo '<hr><font color=red size =5>Enter Question : ' . $questioncount . "</font><hr>"; ?>

                    <form action="<?= base_url('test/set_question_submit'); ?>" method="post" name="setquestion">
                        <span id="login-error"></span>
                        <table >
                            <tr>
                                <td ><b>Question * </b></td>
                                <td><input name="question" type="text" /></td>
                                <?php echo form_error('question'); ?>
                            </tr>
                            <tr>
                                <td><b>Option 1 * </td>
                                <td><input name="option1" type="text" /></td>
                                <?php echo form_error('option1'); ?>
                            </tr>
                            <tr>
                                <td ><b>Option 2 * </b></td>
                                <td><input name="option2" type="text"/></td>
                                <?php echo form_error('option2'); ?>
                            </tr>
                            <tr>
                                <td ><b>Option 3 * </b></td>
                                <td><input name="option3" type="text" /></td>
                                <?php echo form_error('option3'); ?>
                            </tr>
                            <tr>
                                <td ><b>Option 4 * </b></td>
                                <td><input name="option4" type="text" /></td>
                                <?php echo form_error('option4'); ?>
                            </tr>
                            <tr>
                                <td ><b>Correct Answer * </b></td>
                                <td><input name="correct_answer" type="text" /></td>
                                <?php echo form_error('correct_answer'); ?>
                            <input type="hidden" name="question_number" value='<?= $questioncount; ?>'>
                            <input type="hidden" name="test_id" value='<?= $test_id; ?>'>
                            <input type="hidden" name="question_limit" value='<?= $questionlimit; ?>'>
                            </tr>


                        </table>
                        <button>Next</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>  