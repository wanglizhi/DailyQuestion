<?php
class TagModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function add($tagData){
		$result=$this->searchByFull($tagData['tag']);
		if($result){
			$question_tag['question_id']=$tagData['question_id'];
			$question_tag['tag_id']=$result->id;
			$question_tag['tag']=$tagData['tag'];
			$this->db->query($this->db->insert_string('question_tag',$question_tag));
			//tag question++
			$this->db->where('id',$result->id);
			$this->db->select('question_count');
			$query=$this->db->get('tags');
			$sae = $query->result();
			$count=$sae[0]->question_count+1;
			$arr=array('question_count'=>$count);
			$this->db->where('id',$result->id);
			$this->db->update('tags',$arr);
		}else{
			$arr=array('tag'=>$tagData['tag'],
					'question_count'=>0
			);
			$this->db->query($this->db->insert_string('tags',$arr));
			$query=$this->db->query("select @@identity as id");
			$question_tag['question_id']=$tagData['question_id'];
			$sae = $query->result();
			$question_tag['tag_id']=$sae[0]->id;
			$question_tag['tag']=$tagData['tag'];
			$this->db->query($this->db->insert_string('question_tag',$question_tag));
		}
	}
	function delete(){
		
	}
	function update($data){
		
	}
	function searchByQuestion($question_id){
		$this->db->where('question_id',$question_id);
		$this->db->select('*');
		$query=$this->db->get('question_tag');
		return $query->result();
	}
	//返回某个tag的所有问题
	function searchByTag($tag_id){
		$this->db->where('tag_id',$tag_id);
		$this->db->select('question_id');
		$query=$this->db->get('question_tag');
		return $query->result();
	}
	function searchByTagName($tagName){
		$this->db->where('tag',$tagName);
		$this->db->select('question_id');
		$query=$this->db->get('question_tag');
		return $query->result();
	}
	function searchByName($tag){
		$tag="%".$tag."%";
		$query=$this->db->query("select * from tags where tag like '$tag'");
		if($this->db->affected_rows())
			return $query->result();
		return $this->db->affected_rows();
	}
	function searchByFull($tag){
		$query=$this->db->query("select id from tags where tag = '$tag'");
		if($this->db->affected_rows()){
			$sae  = $query->result();
			return $sae[0];
		}
		return $this->db->affected_rows();
	}
	function searchById($id){
		$this->db->where('id',$id);
		$this->db->select('*');
		$query=$this->db->get('user');
		$sae = $query->result();
		return $sae[0];
	}
	function getAll(){
		$this->db->select('*');
		$query=$this->db->get('tags');
		return $query->result();
	}
	function getPopular(){
		$sql="select * from tags order by question_count desc limit 10";
		$query=$this->db->query($sql);
		return $query->result();
	}
}
?>