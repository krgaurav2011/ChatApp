<?php

class test_model extends CI_Model {

    function fetch_tests() {
        //$sql = "select * from test";
        $this->db->select('test.id,test.user_id,subject,description,full_marks,positive_mark,number_of_questions,negative_mark,name,designation')->from('test');
        $this->db->join('teachers', 'teachers.user_id = test.user_id','inner');
        $query=$this->db->get();
        //var_dump($query->result());
        //print_r($query);
        return $query->result();
    }
    function fetch_test_details($id) {
        $this->db->select('*')->from('test');
        $this->db->where('id', $id);
        $query=$this->db->get();
       // echo "<hr>";
       // var_dump($query->result());
        //print_r($query);
        return $query->result();
    }
    function fetch_test_questions($id){
       $this->db->select('*')->from('questions');
       $this->db->where('questions.test_id', $id);
       $query=$this->db->get();
       //var_dump($query->result());
       return $query->result();
    }
    function check_answer($q_no,$test_id,$response){
        $this->db->select('*')->from('questions');
        $this->db->where('test_id', $test_id);
        $this->db->where('q_no', $q_no);
        $query=$this->db->get()->result();
        $answer= $query[0]->correct_answer;
        //var_dump($query[0]);
        
        if($answer == $response)
           return true;
        else
           return false;
    }
    function fetch_test_setter($test_id){
        $this->db->select('*')->from('test');
       //$this->db->having('test.test_id', $test_id);
        $this->db->join('teachers', 'teachers.user_id = test.user_id');
        $this->db->where('test.id', $test_id);
        $query=$this->db->get()->result();
        //var_dump($query);
        //print_r($query);
       // return $query->result();
       return $query[0]->designation ." ". $query[0]->name;
       
    }
    function insert_test_details($user_id, $subject, $description, $full_marks, $positive_mark, $negative_mark, $number_of_questions){
     
        $sql="insert into test (user_id, subject, description, full_marks, positive_mark, negative_mark, number_of_questions) values($user_id, '$subject', '$description',$full_marks, $positive_mark, $negative_mark, $number_of_questions)";
        $this->db->query($sql);
        $test_id= $this->db->insert_id();
        return $test_id;
    
    }
    function insert_question_details($test_id,$question_number, $question, $option1, $option2, $option3, $option4, $correct_answer){
     
        $sql="insert into questions (test_id,q_no, question, option_1, option_2, option_3, option_4, correct_answer) values($test_id,$question_number, '$question', '$option1', '$option2', '$option3', '$option4', '$correct_answer')";
        $out= $this->db->query($sql);
        return $out;
    }

}
