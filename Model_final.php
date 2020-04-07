<?php
/**
 *  
 */
class Model_final extends CI_Model

{


        function __construct() {
            parent::__construct();
        }
	public function insert_data($title,$class,$subject){
		$this->load->database('sub_quiz');
	$query="insert into quiz values('','$title','$class','$subject')";
	$this->db->query($query);
	}
	public function insert_data_quiz($data_q){
		$this->load->database('sub_quiz');
		$this->db->insert('quiz_ques',$data_q);

		
	}
	public function get_id(){
		$this->load->database('sub_quiz');
		$query = $this->db->query("SELECT * FROM quiz ORDER BY id DESC LIMIT 1");
	
return $query;
	}
	public function show_ques(){
		$this->load->database('sub_quiz');
		
		$query = $this->db->get('quiz_ques');
		return $query;
	}
	public function store_q($data){
		$this->load->database('sub_quiz');
		$query = $this->db->query("SELECT id,title,class FROM quiz ORDER BY id DESC LIMIT 1");
		foreach($query->result() as $row){
			$q_id = $row->id;
			$title = $row->title;
			$class = $row->class;
		}
		foreach($data as $row){
		$query="insert into final_quiz values('','$q_id','$row','$title','$class')";
	$this->db->query($query);		
		}
		$this->db->where('q_id',$q_id);
		$output= $this->db->query("SELECT * FROM final_quiz ORDER BY id DESC LIMIT 1");
	//	display($output);
		return $output;

	}
	
	function fetch_data($id){
		$this->load->database('sub_quiz');
		
		$this->db->where("q_id",$id);
		$query = $this->db->get("final_quiz");
		return $query;
	}
	public function insert_fetch_q($q_id,$title,$question,$answer){
		$this->load->database('sub_quiz');
		$score = 0;
		$query="insert into fetch_q values('','$q_id','$title','$question','$answer','$score')";
	$this->db->query($query);	
	echo "quiz submitted";	
	}
	public function teacher_ques(){
		$this->load->database('sub_quiz');
		return $this->db->get('fetch_q');

	}
	public function save_score($q_id,$score){
		$this->load->database('sub_quiz');
		$data=['score' =>$score,];
		$this->db->where('q_id',$q_id);
		$this->db->update('fetch_q',$data);

	}
	public function view_score($q_id){
		$this->load->database('sub_quiz');
		 $this->db->select_sum('score');

		$this->db->from('fetch_q');
		$this->db->where('q_id',$q_id);
		 $result = $this->db->get()->result();
		 //$score = $result->score;
		//$query="insert into history values('','$q_id','$score')";
	//$this->db->query($query); 
        return $result;
		
	
	}
}

?>