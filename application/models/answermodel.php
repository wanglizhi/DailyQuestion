<?php
class AnswerModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function add($data){
		$this->db->query($this->db->insert_string('answer',$data));
		$query=$this->db->query("select @@identity as id");
		return $query->result();
	}
	function searchByQuestion($question_id){
		$this->db->where('question_id',$question_id);
		$this->db->select('*');
		$query=$this->db->get('answer');
		return $query->result();
	}
	function searchByUser($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->select('question_id');
		$query=$this->db->get('answer');
		return $query->result();
	}
	function checkVote($data){
		$this->db->where('user_id',$data['user_id']);
		$this->db->where('answer_id',$data['answer_id']);
		$this->db->select('*');
		$query=$this->db->get('answer_vote');
		return $this->db->affected_rows();
	}
	function addVote($data){
		$this->db->query($this->db->insert_string('answer_vote',$data));
		$this->db->where('id',$data['answer_id']);
		$this->db->select('*');
		$query=$this->db->get('answer');
		$sae = $query->result();
		$user=$sae[0]->user_id;
		$vote=$sae[0]->vote+1;
		$arr=array('vote'=>$vote);
		$this->db->where('id',$data['answer_id']);
		$this->db->update('answer',$arr);
	
		$this->load->Model('UserModel');
		$this->UserModel->addScore($user,1);
		return $vote;
	}
	function deleteVote($data){
		$this->db->where('answer_id',$data['answer_id']);
		$this->db->where('user_id',$data['user_id']);
		$this->db->delete('answer_vote');
	
		$this->db->where('id',$data['answer_id']);
		$this->db->select('*');
		$query=$this->db->get('answer');
		$sae = $query->result();
		$vote=$sae[0]->vote-1;
		$user=$sae[0]->user_id;
		$arr=array('vote'=>$vote);
		$this->db->where('id',$data['answer_id']);
		$this->db->update('answer',$arr);
	
		$this->load->Model('UserModel');
		$this->UserModel->addScore($user,-1);
		return $vote;
	}
}
?>