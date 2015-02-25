<html>
    <head>
        <title>OnTest|Register</title>
    </head>
    <body>
          
<h1 class="header">Register</h1>

                <form class="frm frm-register" id="register-form" action="<?= base_url('registerClass/register_submit'); ?>" method="post" name="register">
                    <span id="register-error"></span>
                    <table>
                        <tr>
                            <td ><b>Email *</b></td>
                            <td><input name="register_email" type="text" value="<?php echo set_value('register_email'); ?>" /></td>
                            <?php echo form_error('register_email'); ?> 
                        </tr>
                        <tr>
                            <td><b>Password (8-20 characters in length) *</td>
                            <td><input id="password" name="register_password" type="password"/></td>
                            <?php echo form_error('register_password'); ?> 
                        </tr>
                        <tr>
                            <td><b>Re-Enter your Password *</td>
                            <td><input name="register_passconf" type="password"/></td>
                            <?php echo form_error('register_passconf'); ?> 
                        </tr>
                        <tr>
                            <td><b>Enter Your Category *</td>
                            <td><input name="type" value="Student" type="radio"/>Student<br><input name="type" value="Teacher" type="radio"/>Teacher </td>
                            <?php echo form_error('type'); ?> 
                        </tr>
                    </table>
                    <button class="btn btn-danger"><i class="fa fa-user fa-fw"></i> Register</button>
                </form>
   </body>
</html>