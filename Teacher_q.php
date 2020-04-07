<?php

class Teacher_q extends CI_Controller{
	 function __construct() {
        parent::__construct();
        $this->load->model('Model_final'); 
    }
	public function index(){
		$this->load->model('Model_final');
		$result['result'] = $this->Model_final->teacher_ques();
		$this->load->view('Teacher_ques',$result);
	}
	public function store_score(){
		if(isset($_POST['submit'])){
			$score = $_POST['score'];
			$q_id = $this->input->post("hidden_id");
			$this->load->model('Model_final');
			$this->Model_final->save_score($q_id,$score);
			echo "Score saved";
		}
	}
	
}


?>