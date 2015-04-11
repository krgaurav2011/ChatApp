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
                    <form action="<?= base_url('test/set_test_submit'); ?>" method="post" name="settest">
                        <span id="login-error"></span>
                        <table >
                            <tr>
                                <td ><b>Number of Questions *</b></td>
                                <td><input name="number_of_questions" type="text" value="<?php echo set_value('number_of_questions'); ?>"/></td>
                                <?php echo form_error('number_of_questions'); ?>
                            </tr>
                            <tr>
                                <td><b>Subject *</td>
                                <td><select name="subject">
                                        <option value="">--Select--</option>
                                        <option value="maths">Maths</option>
                                        <option value="physics">Physics</option>
                                        <option value="chemistry">Chemistry</option>
                                    </select></td>
                                <?php echo form_error('subject'); ?>    
                            </tr>
                            <tr>
                                <td><b>Short Description about the Test * </b></td>
                                <td><textarea style="width: 300px; height: 150px;" name="description" value="<?php echo set_value('description'); ?>">
                        
                                    </textarea>
                                </td>
                                <?php echo form_error('description'); ?>
                            </tr>
                            <tr>
                                <td ><b>Full Marks * </b></td>
                                <td><input name="full_marks" type="text" value="<?php echo set_value('full_marks'); ?>"/></td>
                                <?php echo form_error('full_marks'); ?>
                            </tr>
                            <tr>
                                <td ><b>Positive Marks * </b></td>
                                <td><input name="positive_marks" type="text" value="<?php echo set_value('positive_marks'); ?>"/></td>
                                <?php echo form_error('positive_marks'); ?>
                            </tr>
                            <tr>
                                <td ><b>Negative Marks * </b></td>
                                <td><input name="negative_marks" type="text" value="<?php echo set_value('negative_marks'); ?>"/></td>
                                <?php echo form_error('negative_marks'); ?>
                            </tr>
                        </table>
                        <button>Next</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>  