<?php

/**
 * 
 */
class Final_sub extends CI_Controller
{
	 function __construct() {
        parent::__construct();
        $this->load->model('Model_final'); //this will show "Print" word on browser. 
    }

	
	public function index(){
		
		$this->load->view('Final_subquiz');

	}
	public function custom(){
		if(isset($_POST['submit'])){
			$class = $_POST['class'];
			$title = $_POST['title'];
			$subject = $_POST['subject'];

			
			
			$this->load->model('Model_final');
			$this->Model_final->insert_data($title,$class,$subject);
			$this->load->view('Final_custom');
		}

		
	
	}
	public function display_questions(){
		if(isset($_POST['submit'])){
			$this->load->model('Model_final');
			$question = $_POST['question'];
			/*$data_q = array(
				'question' => $question,
				'id' => $id
		
			);*/
			$result = $this->Model_final->get_id();
			foreach($result->result() as $row){
				$id = $row->id;
			}
			$data_q = array(
				'question' => $question,
				'id' => $id
		
			);
			$this->Model_final->insert_data_quiz($data_q);
			$data['data']=$this->Model_final->show_ques();
		$this->load->view('quiz_display',$data);
		}
	}
	public function view_q(){
		if(isset($_POST['submit'])){

    if(!empty($_POST['ques'])) {

        foreach($_POST['ques'] as $value){
           $data['data'] = $value;
           $this->load->model('Model_final');
           $output['output'] =$this->Model_final->store_q($data);
           $this->load->view('show_title',$output);

        }


    }

}
	}
	public function show(){
		$this->load->model('Model_final');
	$data['data']=$this->Model_final->fetch_data($this->input->post("hidden_id"));
	$this->load->view('Student_quiz',$data);
	}

	public function store_a(){
		if(isset($_POST['submit'])){
			$q_id = $this->input->post("hidden_id");
			$title = $_POST['hidden_title'];
			$question = $_POST['question'];
			$answer = $_POST['answer'];
			$this->load->model('Model_final');
			$this->Model_final->insert_fetch_q($q_id,$title
				,$question,$answer);
			$query['query'] =$this->Model_final->view_score($q_id);
			$this->load->view('Score_dis',$query);

		}
	}
	

	
}
?>