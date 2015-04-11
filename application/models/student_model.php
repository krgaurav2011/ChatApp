<?php

class student_model extends CI_Model {

    function UpdateStudentInfo($id, $name, $age, $education, $gender) {
        $sql = "insert into students(user_id,name,sex,education,age) values('$id','$name','$gender','$education','$age')";
        $out = $this->db->query($sql);
        return $out;
    }

    function UpdateExistingStudentInfo($id, $name, $age, $education, $gender) {
        $sql = "UPDATE students SET name='$name',sex='$gender',education='$education',age ='$age' where user_id = '$id'";
        $out = $this->db->query($sql);
        return $out;
    }

    function studentdata($id, $test_id) {
        $sql = "select test.id, test.subject,test.description, marks.marks, marks.test_completed from test,marks, users where marks.user_id='$id' and marks.test_id=test.id and test.id='$test_id' group by marks.id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function maximumstudentdata($id) {
        $sql = "select test.id, test.subject,test.description, MAX(marks.marks) as marks, marks.test_completed from test,marks, users where marks.user_id='$id' and marks.test_id=test.id group by marks.test_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function displaysubjects() {
        $sql = "select distinct subject from test";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function displaygraph($subject, $id) {
        $sql = "select marks.marks,marks.test_completed from test, marks where test.id in (select distinct id from test where test.subject='$subject') and marks.user_id='$id' and marks.test_id=test.id";
        $query = $this->db->query($sql);
        // var_dump($query);
        return $query->result();
    }

    function name($id) {
        $sql = "select name from students where user_id=$id";
        $query = $this->db->query($sql);

        return $query->result();
    }

}
