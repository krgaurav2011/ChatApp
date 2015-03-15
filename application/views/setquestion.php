<html>
    <head>
        <title>OnTest|Set_Questions</title>
    </head>
    <body>

           <?php echo '<hr>Enter Question : ' . $questioncount. "<hr>";?>

        <form action="<?= base_url('test/set_question_submit'); ?>" method="post" name="setquestion">
            <span id="login-error"></span>
            <table >
                <tr>
                    <td ><b>Questions *:</b></td>
                    <td><input name="question" type="text" /></td>
                    <?php echo form_error('question'); ?>
                </tr>
                <tr>
                    <td><b>Option 1 *</td>
                    <td><input name="option1" type="text" /></td>
                    <?php echo form_error('option1'); ?>
                </tr>
               <tr>
                    <td ><b>Option 2 * :</b></td>
                    <td><input name="option2" type="text"/></td>
                    <?php echo form_error('option2'); ?>
                </tr>
                <tr>
                    <td ><b>Option 3*:</b></td>
                    <td><input name="option3" type="text" /></td>
                    <?php echo form_error('option3'); ?>
                </tr>
                <tr>
                    <td ><b>Option 4*:</b></td>
                    <td><input name="option4" type="text" /></td>
                    <?php echo form_error('option4'); ?>
                </tr>
                <tr>
                    <td ><b>Correct Choice*:</b></td>
                    <td><input name="correct_answer" type="text" /></td>
                    <?php echo form_error('correct_answer'); ?>
                     <input type="hidden" name="question_number" value='<?= $questioncount; ?>'>
                     <input type="hidden" name="test_id" value='<?= $test_id; ?>'>
                     <input type="hidden" name="question_limit" value='<?= $questionlimit; ?>'>
                </tr>
               
                
            </table>
            <button>Next</button>
        </form>
    </body>
</html>
