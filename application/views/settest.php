<html>
    <head>
        <title>OnTest|Set_Test</title>
    </head>
    <body>



        <form action="<?= base_url('test/set_test_submit'); ?>" method="post" name="settest">
            <span id="login-error"></span>
            <table >
                <tr>
                    <td ><b>Number of Questions *:</b></td>
                    <td><input name="number_of_questions" type="text" value="<?php echo set_value('number_of_questions'); ?>"/></td>
                    <?php echo form_error('number_of_questions'); ?>
                </tr>
                <tr>
                    <td><b>Subject *</td>
                    <td><select name="subject">
                                <option value="maths">Maths</option>
                                <option value="physics">Physics</option>
                                <option value="chemistry">Chemistry</option>
                      </select></td>
                    <?php echo form_error('subject'); ?>    
                </tr>
                <tr>
                    <td><b>Short Description about the Test * :</b></td>
                    <td><textarea style="width: 300px; height: 150px;" name="description" value="<?php echo set_value('description'); ?>">
                        
                        </textarea>
                    </td>
                    <?php echo form_error('description'); ?>
                </tr>
                <tr>
                    <td ><b>Full Marks* :</b></td>
                    <td><input name="full_marks" type="text" value="<?php echo set_value('full_marks'); ?>"/></td>
                    <?php echo form_error('full_marks'); ?>
                </tr>
               <tr>
                    <td ><b>Positive Marks* :</b></td>
                    <td><input name="positive_marks" type="text" value="<?php echo set_value('positive_marks'); ?>"/></td>
                    <?php echo form_error('positive_marks'); ?>
                </tr>
                <tr>
                    <td ><b>Negative Marks*:</b></td>
                    <td><input name="negative_marks" type="text" value="<?php echo set_value('negative_marks'); ?>"/></td>
                    <?php echo form_error('negative_marks'); ?>
                </tr>
                
            </table>
            <button>Next</button>
        </form>
    </body>
</html>
