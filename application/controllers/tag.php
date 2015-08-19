<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //防止用户直接访问

class Tag extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	//tag主页
	function index(){
		$data['pageTitle']='DailyQuestion';
		$this->load->library('session');
		if($this->session->userdata('name')){
			$user['id']=$this->session->userdata('id');
			$user['name']=$this->session->userdata('name');
			$user['score']=$this->session->userdata('score');
			$user['head']=$this->session->userdata('head');
			$data['login']=$this->load->view('loggedin',$user,true);
		}else{
			$data['login']=$this->load->view('login',null,true);
		}
		$this->load->model('TagModel');
		$this->load->model('TagModel');
		$this->load->model('UserModel');
		$a['popularTags']=$this->TagModel->getPopular();
		$a['famousUsers']=$this->UserModel->getFamous();
		$userList['tagList']=$this->TagModel->getAll();
		$data['content']=$this->load->view('tagList',$userList,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	function searchTag(){
		$data['pageTitle']='DailyQuestion';
		$this->load->library('session');
		$tag=$_POST['tagSearch'];
		if($this->session->userdata('name')){
			$user['id']=$this->session->userdata('id');
			$user['name']=$this->session->userdata('name');
			$user['score']=$this->session->userdata('score');
			$user['head']=$this->session->userdata('head');
			$data['login']=$this->load->view('loggedin',$user,true);
		}else{
			$data['login']=$this->load->view('login',null,true);
		}
		$this->load->model('TagModel');
		$this->load->model('UserModel');
		$a['popularTags']=$this->TagModel->getPopular();
		$a['famousUsers']=$this->UserModel->getFamous();
		$userList['tagList']=$this->TagModel->searchByName($tag);
		$data['content']=$this->load->view('tagList',$userList,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	function inputSearch(){
		$this->load->model("TagModel");
		$userInput=$this->input->post('userInput');
		$result=$this->TagModel->searchByName($userInput);
		if($result){
			echo "<li class=\"tags-label\"><b>点击tag选择</b></li>";
			foreach ($result as $arr){
				echo "<li class=\"tags-label\"><a href=\"javascript:;\" rel=\"tag\"
						class=\"tag-link\" onclick=\"addTag(this)\">".$arr->tag."</a></li>";
			}
		}
	}
	function selectTag(){
		$this->load->library('session');
		$tagArr=$this->session->userdata('tags');
		if(!$tagArr){
			$arr=array(0=>$this->input->post('tag'));
			$this->session->set_userdata('tags',$arr);	
			$tagArr=$arr;
		}
		if(!in_array($this->input->post('tag'),$tagArr) && count($tagArr)<5)
			array_push($tagArr,$this->input->post('tag'));
		echo "<li class=\"tags-label\"><b>已选择的tag</b></li>";
		foreach ($tagArr as $arr){
			echo "<li class=\"tags-label\"><a href=\"javascript:;\" rel=\"tag\"
						class=\"tag-link\" onclick=\"deleteTag(this)\">".$arr."</a></li>";
		}
		$this->session->set_userdata('tags',$tagArr);
	}
	function deleteTag(){
		$this->load->library('session');
		$tagArr=$this->session->userdata('tags');
		if($tagArr){
			$name=array_search($this->input->post('tag'),$tagArr);
			unset($tagArr[$name]);
			echo "<li class=\"tags-label\"><b>已选择的tag</b></li>";
			foreach ($tagArr as $arr){
				echo "<li class=\"tags-label\"><a href=\"javascript:;\" rel=\"tag\"
						class=\"tag-link\" onclick=\"deleteTag(this)\">".$arr."</a></li>";
			}
			$this->session->set_userdata('tags',$tagArr);
		}
	}
	function addTag(){

	}
}