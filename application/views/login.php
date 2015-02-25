<html>
    <head>
        <title>OnTest|Login</title>
    </head>
    <body>
          

               <h1 class="header">Login</h1>

                <form class="frm frm-login" id="login-form" action="<?= base_url('loginClass/login_submit'); ?>" method="post" name="login">
                    <span id="login-error"></span>
                    <table >
                        <tr>
                            <td ><b>Email *</b></td>
                            <td><input name="login_email" type="text" value="<?php echo set_value('login_email'); ?>"/></td>
                            <?php echo form_error('login_email'); ?>
                        </tr>
                        <tr>
                            <td><b>Password *</td>
                            <td><input name="login_password" type="password" required/></td>
                            <?php echo form_error('login_password'); ?>    
                        </tr>
                        <tr>
                            <td class="forgot-password" colspan="2"><a href="<?= base_url('registerClass/register'); ?>"> New Users Register Here ! </a></td>
                        </tr>
                    </table>
                    <button class="btn btn-danger"><i class="fa fa-lock fa-fw " >  </i>  Login</button>
                </form>
    </body>
</html>
