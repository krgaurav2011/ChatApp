<?php
$i=1;
foreach ($list as $row){
    //var_dump($row);
    $id= $row->id;
    //echo $id;
    echo $i . ") <a href=" . base_url(). "test/loadtestinfo/" . $id .">" . $row->subject ."</a><br>". $row->description . "<br>By    :  " . $row->designation ." ". $row->name  . "<br>\tFull Marks: "
            . $row->full_marks . "\t\t\t\tNumber Of Questions : ". $row->number_of_questions . "\tMarking Scheme: +". $row->positive_mark . " and -". $row->negative_mark ."<hr>";
    $i++;
}