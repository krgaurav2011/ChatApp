<?php
class teacher_model extends CI_Model {

    function insert_update($id, $name, $sex, $photo, $designation, $age) {
        $sql = "insert into teachers(user_id,name,sex,designation,age) values('$id','$name','$sex','$designation','$age')";
        $query = $this->db->query($sql);
        return $query;
    }

    function update_Existing($id, $name, $sex, $designation, $age) {
        $sql = "UPDATE teachers SET name='$name',sex='$sex',designation='$designation',age='$age' where user_id='$id'";
        $query = $this->db->query($sql);
        return $query;
    }

    function loadTestData($id) {
        $sql = "select id,subject,description,number_of_questions,full_marks from test where test.user_id=$id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function countStudent($id) {
        $sql = "select count(marks.user_id) from test,marks where test.user_id=$id and marks.test_id=test.id group by test_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function name($id) {
        $sql = "select name,designation from teachers where user_id=$id";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
