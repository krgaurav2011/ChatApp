<?php
    $positive=$list2[0]->positive_mark;
    $negative=$list2[0]->negative_mark;
    $total = $list2[0]->full_marks;
    $topic = $list2[0]->subject;
    $description = $list2[0]->description;
    $num_of_questions = $list2[0]->number_of_questions;
    echo "<hr>Thank You !! You took a test of " . $topic . " ( " . $description. " ). This Test contained " .$num_of_questions." questions. <br>You Scored : " .$marks ." out of ".$total. ".";
    echo "<br> You scored ". $marks/$total*100 . " % marks.";
    echo "<br> You can take this <a href=". base_url(). "test/loadtestinfo/" . $test_no .">  test again </a>anytime you want.";
    echo "<a href=".base_url('/home/home_page') . ">Click here </a>to return to home page ."
?>    