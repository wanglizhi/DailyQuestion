<?php
class UserModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function add(){
		$name=$_POST['name'];
		$password=$_POST['password'];
		$created=date('Y-m-d');
		$score=12;
		$head="default.jpg";
		$query=$this->db->query("select * from user where name='$name'");
		if($query->result()){
			return false;
		}else{
			$this->db->query("insert into user(name,password,created,score,head)values('$name','$password','$created','$score','$head');");
		}
		return $this->db->affected_rows();
	}
	function delete(){
		
	}
	function update($data){
		
	}
	function getScore($id){
		$this->db->where('id',$id);
		$this->db->select('score');
		$query=$this->db->get('user');
		$sae = $query->result();
		return $sae[0];
	}
	function addScore($id,$num){
		$this->db->where('id',$id);
		$this->db->select('score');
		$query=$this->db->get('user');
		$sae = $query->result();
		$score=$sae[0]->score;
		$score=$score+$num;
		$arr=array('score'=>$score);
		$this->db->where('id',$id);
		$this->db->update('user',$arr);
	}
	function searchByName($name){
		$this->db->where('name',$name);
		$this->db->select('*');
		$query=$this->db->get('user');
		if($this->db->affected_rows()){
			$sae =	$query->result();
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
		$query=$this->db->get('user');
		return $query->result();
	}
	function getFamous(){
		$sql="select * from user order by score desc limit 5";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function search($name){
		$name="%".$name."%";
		$query=$this->db->query("select * from user where name like '$name'");
		if($this->db->affected_rows())
			return $query->result();
		return $this->db->affected_rows();
	}
	function modify($id,$data){
		$this->db->where('id',$id);
		$this->db->update('user',$data);
		return $this->db->affected_rows();
	}
}
?>