<html>
<?php
  
    //var_dump($list);
   
    $topic = $list[0]->subject;
    $description = $list[0]->description;
    $num_of_questions = $list[0]->number_of_questions;
    $total = $list[0]->full_marks;
    $positive=$list[0]->positive_mark;
    $negative=$list[0]->negative_mark;
    echo "<hr>Welcome !! This is a test of " . $topic . " ( " . $description. " ). This Test containes " .$num_of_questions." questions.";
    echo "<br> Full Marks  : " . $total ;
    echo "<br>For each correct answer you get " .$positive ." marks and for each wrong answer  ".$negative. " marks gets deducted .";
    echo "<br> Test Setter  : ". $test_setter . "<hr>";
    if($checked==1){
        echo "<br> You attempted this test " . $num_of_attempt . " times , and your best score is : " .$max_marks ;
        echo "<br> Last attempted on : " . $last_attempt;
    }
    else {
        echo "<br> You have not attempted this test before . Give a Try ! ";
        
    }
    echo "<br> <a href=". base_url(). "test/loadtest/" . $test_no .">Click here </a> to start the test";
    echo "<br> Or <a href=".base_url('/home/home_page') . ">Click here </a>to return to home page ."
   // echo "<hr>Your Marks : " .$marks;
    
    
   // echo $question . $option1 . $option2 .$option3 . $option4 ; 
?>    