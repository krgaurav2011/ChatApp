<?php
/**
 * Description of test.php
 *
 * @author gaurav
 */
class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->model('test_model');
        $this->load->model('marks_model');
    }

    function showtests() {
        $data['list'] = $this->test_model->fetch_tests();
        $this->load->view('test', $data);
    }

    function loadtestinfo($test_id) {

        $data['list'] = $this->test_model->fetch_test_details($test_id);
        $data['test_setter'] = $this->test_model->fetch_test_setter($test_id);
        $history = $this->marks_model->fetch_test_history($_SESSION['id'], $test_id);
        $data['num_of_attempt'] = $history->num_rows;
        $data['checked'] = 0;
        $max_marks = -100000;
        $last_attempt = " ";
        if ($history->num_rows > 0) {
            $data['checked'] = 1;
            $last_attempt = $history->result()[0]->test_completed;
            foreach ($history->result() as $row) {
                if ($row->marks > $max_marks)
                    $max_marks = $row->marks;
                if ($last_attempt < $row->test_completed)
                    $last_attempt = $row->test_completed;
            }
        }
        $data['max_marks'] = $max_marks;
        $data['last_attempt'] = $last_attempt;
        $data['test_no'] = $test_id;
        $this->load->view('loadtestinfo', $data);
    }

    function loadtest($id) {
        $data['list'] = $this->test_model->fetch_test_questions($id);
        $data['list2'] = $this->test_model->fetch_test_details($id);
        $data['attempted'] = 1;
        $data['test_no'] = $id;
        $data['marks'] = 0;
        $this->load->view('loadtest', $data);
    }

    function questionsubmit() {
        $response = $this->input->post('resp');
        $q_no = $this->input->post('question_no');
        $test_no = $this->input->post('test_no');
        $positive = $this->input->post('positive');
        $negative = $this->input->post('negative');
        $score = $this->input->post('score');
        $numq = $this->input->post('numq');
        // echo " resp " . $response;
        // echo " qno " . $q_no;
        // echo " test" . $test_no;
        // echo " positive " . $positive;
        // echo " negative " . $negative;

        $out = $this->test_model->check_answer($q_no, $test_no, $response);
        if ($out) {
            $score+=$positive;
        } else {
            $score-=$negative;
        }
        $this->tempdata = array('q_no' => $q_no, 'score' => $score, 'test_no' => $test_no, 'testid' => $test_no);
        if ($q_no < $numq)
            $this->nextquestion();
        else {
            $this->testcomplete();
        }
    }

    function nextquestion() {
        $data['list'] = $this->test_model->fetch_test_questions($this->tempdata['testid']);
        $data['list2'] = $this->test_model->fetch_test_details($this->tempdata['testid']);
        $data['attempted'] = $this->tempdata['q_no'] + 1;
        $data['test_no'] = $this->tempdata['testid'];
        $data['marks'] = $this->tempdata['score'];
        $this->load->view('loadtest', $data);
        //$this->load->view('loadtest',$data);
    }

    function testcomplete() {
        //echo $this->tempdata['testid'];
        //echo " userid : ".$_SESSION['id'];
        //$data['list'] = $this->test_model->load_test($this->tempdata['testid']);
        $success = $this->marks_model->insert_marks($_SESSION['id'], $this->tempdata['testid'], $this->tempdata['score']);
        $data['list2'] = $this->test_model->fetch_test_details($this->tempdata['testid']);
        // $data['attempted'] = $this->tempdata['q_no']+1;
        $data['test_no'] = $this->tempdata['testid'];
        $data['marks'] = $this->tempdata['score'];
        $this->load->view('testcomplete', $data);
    }

    function set_test() {
        $this->load->view('settest');
    }

    function set_test_submit() {
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('full_marks', 'Full Marks', 'trim|required|numeric|greater_than[0]');
        $this->form_validation->set_rules('positive_marks', 'Positive Marks', 'required|trim|numeric|greater_than[0]');
        $this->form_validation->set_rules('negative_marks', 'Negative Marks', 'required|trim|numeric');
        $this->form_validation->set_rules('number_of_questions', 'Number of Questions', 'required|trim|numeric|greater_than[0]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('settest');
        } else {
            $subject = $this->input->post('subject');
            $description = $this->input->post('description');
            $full_marks = $this->input->post('full_marks');
            $positive_marks = $this->input->post('positive_marks');
            $negative_marks = $this->input->post('negative_marks');
            $number_of_questions = $this->input->post('number_of_questions');
            $user_id = $_SESSION['id'];
            //echo $_SESSION['email'];
            $test_id = $this->test_model->insert_test_details($user_id, $subject, $description, $full_marks, $positive_marks, $negative_marks, $number_of_questions);
            if ($test_id > 0) {
                $this->number_of_questions = $number_of_questions;
                $this->test_id = $test_id;
                $this->set_questions();
            } else {
                $this->load->view('settest');
            }
        }
    }

    function set_questions() {
        $data['questionlimit'] = $this->number_of_questions;
        $data['questioncount'] = 1;
        $data['test_id'] = $this->test_id;
        //echo $data['test_id'];
        $this->load->view('setquestion', $data);
    }

    function set_question_submit() {
        $this->form_validation->set_rules('question', 'Question', 'trim|required');
        $this->form_validation->set_rules('option1', 'Option 1', 'trim|required');
        $this->form_validation->set_rules('option2', 'Option 2', 'trim|required');
        $this->form_validation->set_rules('option3', 'Option 3', 'required|trim');
        $this->form_validation->set_rules('option4', 'Option 4', 'required|trim');
        $this->form_validation->set_rules('correct_answer', 'Correct Option', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            //echo "helle";
            $this->load->view('setquestion');
        } else {
            $question = $this->input->post('question');
            $option1 = $this->input->post('option1');
            $option2 = $this->input->post('option2');
            $option3 = $this->input->post('option3');
            $option4 = $this->input->post('option4');
            $correct_answer = $this->input->post('correct_answer');
            $question_number = $this->input->post('question_number');
            $question_limit = $this->input->post('question_limit');
            $test_id = $this->input->post('test_id');
            $success = $this->test_model->insert_question_details($test_id, $question_number, $question, $option1, $option2, $option3, $option4, $correct_answer);
            if ($success == 1) {
                if ($question_number < $question_limit) {
                    $this->question_number = $question_number + 1;
                    $this->number_of_questions = $question_limit;
                    $this->test_id = $test_id;
                    $this->set_next_question();
                } else {
                    $data['list'] = $this->test_model->fetch_test_details($test_id);
                    $this->load->view('settestcomplete', $data);
                }
            } else {
                $this->load->view('setquestion');
            }
        }
    }

    function set_next_question() {
        $data['questionlimit'] = $this->number_of_questions;
        $data['questioncount'] = $this->question_number;
        $data['test_id'] = $this->test_id;
        echo $data['test_id'];
        $this->load->view('setquestion', $data);
    }
    function view($id){
        $testid=$id;
        $question['list']=$this->test_model->fetch_test_questions($testid);
        $this->load->view('viewEditQuestion',$question);    
    }

}
