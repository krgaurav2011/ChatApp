<html>
    <head>
        <title>Update your profile</title>
    </head>
    <body>


        <h1 class="header">Profile</h1>

        <form class="frm frm-login" id="login-form" action="<?= base_url('updateprofile/doprofile_submit'); ?>" method="post" name="login">
            <span id=""></span>
            <table >
                <tr>
                    <td ><b>Name *</b></td>
                    <td><input name="update_name" type="text" value="<?php echo set_value('update_name'); ?>"/></td>
                    <?php echo form_error('update_name'); ?>
                </tr>
                <tr>
                    <td><b>sex *</td>
                    <td><input name="update_sex" type="radio" value="male">Male</td>
                    <br>
                    <td><input name="update_sex" type="radio" value="female">Female</td>
                    <?php echo form_error('update_sex'); ?>    
                </tr>
                <tr>
                    <td><b>Photo </td>
                    <td><input name="update_photo" type="photo" /></td>
                    <?php echo form_error('update_photo'); ?>    
                </tr>
                <tr>
                    <td><b>Designation* </td>
                    <td><input name="update_designation" type="text" /></td>
                    <?php echo form_error('update_designation'); ?>    
                </tr>
                <tr>
                    <td><b>Age* </td>
                    <td><input name="update_age" type="number" /></td>
                    <?php echo form_error('update_age'); ?>    
                </tr>
            </table>
            <button class="btn btn-danger"><i class="fa fa-lock fa-fw " >  </i>  Submit</button>
        </form>
    </body>
</html>