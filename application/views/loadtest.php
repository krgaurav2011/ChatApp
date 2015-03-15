<?php
    $attempted--;
    $question= $list[$attempted]->question;
    $option1 = $list[$attempted]->option_1;
    $option2 = $list[$attempted]->option_2;
    $option3 = $list[$attempted]->option_3;
    $option4 = $list[$attempted]->option_4;
    $q_no = $list[$attempted]->q_no;
    $positive=$list2[0]->positive_mark;
    $negative=$list2[0]->negative_mark;
    $num_of_questions = $list2[0]->number_of_questions;
    echo "<hr>Your Current Marks : " .$marks;
?>    
            <h2> <?php echo $question; ?> </h2>
                <form action="<?= base_url('/test/questionsubmit')?>" style="float:justify;" method ="post">
                    <input type ="radio" name="resp" value="<?php echo $option1; ?>" > <?php echo $option1 ?> <br/>
                    <input type ="radio" name="resp" value= "<?php echo $option2; ?>" > <?php echo $option2 ?> <br/>
                    <input type ="radio" name="resp" value= "<?php echo $option3; ?>" > <?php echo $option3 ?> <br/>
                    <input type ="radio" name="resp" value= "<?php echo $option4; ?>" > <?php echo $option4 ?> <br/>
                    <input type ="hidden" name=question_no value="<?php echo $q_no;?>" >
                    <input type ="hidden" name=test_no value="<?php echo $test_no;?>" >
                    <input type ="hidden" name=positive value="<?php echo $positive;?>" >
                    <input type ="hidden" name=negative value="<?php echo $negative;?>" >
                    <input type ="hidden" name=score value="<?php echo $marks;?>" >
                    <input type ="hidden" name=numq value="<?php echo $num_of_questions;?>" >
                    <input type="submit" name="submit" value="next">
                </form>
           
    
    
    
  
