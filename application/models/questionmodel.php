<?php
class QuestionModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function add($data){
		$this->db->query($this->db->insert_string('question',$data));
		$query=$this->db->query("select @@identity as id");
		return $query->result();
	}
	function searchById($id){
		$this->db->where('id',$id);
		$this->db->select('*');
		$query=$this->db->get('question');
		$sae = $query->result();
		return $sae[0];
	}
	function searchByUser($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->select('*');
		$query=$this->db->get('question');
		return $query->result();
	}
	function searchByIdArr($arr){
		$result=array();
		foreach ($arr as $item){
			array_push($result,$this->searchById($item->question_id));
		}
		return $result;
	}
	function searchByTitle($title){
		$title="%".$title."%";
		$query=$this->db->query("select * from question where title like '$title'");
		if($this->db->affected_rows())
			return $query->result();
		return $this->db->affected_rows();
	}
	function getAll(){
		$this->db->select("*");
		$query=$this->db->get('question');
		return $query->result();
	}
	function getUnanswered(){
		$this->db->where('answer',0);
		$this->db->select("*");
		$query=$this->db->get('question');
		return $query->result();
	}
	function addAnswer($id){
		$this->db->where('id',$id);
		$this->db->select('answer');
		$query=$this->db->get('question');
		$sae = $query->result();
		$answer=$sae[0]->answer+1;
		$arr=array('answer'=>$answer);
		$this->db->where('id',$id);
		$this->db->update('question',$arr);
	}
	function checkVote($data){
		$this->db->where('user_id',$data['user_id']);
		$this->db->where('question_id',$data['question_id']);
		$this->db->select('*');
		$query=$this->db->get('question_vote');
		return $this->db->affected_rows();
	}
	function addVote($data){
		$this->db->query($this->db->insert_string('question_vote',$data));
		$this->db->where('id',$data['question_id']);
		$this->db->select('*');
		$query=$this->db->get('question');
		$sae = $query->result();
		$user=$sae[0]->user_id;
		$vote=$sae[0]->vote+1;
		$arr=array('vote'=>$vote);
		$this->db->where('id',$data['question_id']);
		$this->db->update('question',$arr);
		
		$this->load->Model('UserModel');
		$this->UserModel->addScore($user,1);
		return $vote;
	}
	function deleteVote($data){
		$this->db->where('question_id',$data['question_id']);
		$this->db->where('user_id',$data['user_id']);
		$this->db->delete('question_vote');
		
		$this->db->where('id',$data['question_id']);
		$this->db->select('*');
		$query=$this->db->get('question');
		$sae = $query->result();
		$vote=$sae[0]->vote-1;
		$user=$sae[0]->user_id;
		$arr=array('vote'=>$vote);
		$this->db->where('id',$data['question_id']);
		$this->db->update('question',$arr);
		
		$this->load->Model('UserModel');
		$this->UserModel->addScore($user,-1);
		return $vote;
	}
	function questionNum($user_id){
		$yesterday=date("Y-m-d",strtotime("-1 day"));
		$sql="select * from question where created>'$yesterday' and user_id= '$user_id'";
		$query=$this->db->query($sql);
		return $this->db->affected_rows();
	}
}
?>