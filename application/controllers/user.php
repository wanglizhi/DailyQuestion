<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //防止用户直接访问

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
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
		$this->load->model('UserModel');
		$this->load->model('TagModel');
		$this->load->model('UserModel');
		$a['popularTags']=$this->TagModel->getPopular();
		$a['famousUsers']=$this->UserModel->getFamous();
		$userList['userList']=$this->UserModel->getAll();
		$data['content']=$this->load->view('userList',$userList,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	function searchUser(){
		$data['pageTitle']='DailyQuestion';
		$this->load->library('session');
		$name=$_POST['userName'];
		if($this->session->userdata('name')){
			$user['id']=$this->session->userdata('id');
			$user['name']=$this->session->userdata('name');
			$user['score']=$this->session->userdata('score');
			$user['head']=$this->session->userdata('head');
			$data['login']=$this->load->view('loggedin',$user,true);
		}else{
			$data['login']=$this->load->view('login',null,true);
		}
		$this->load->model('UserModel');
		$this->load->model('TagModel');
		$a['popularTags']=$this->TagModel->getPopular();
		$a['famousUsers']=$this->UserModel->getFamous();
		$userList['userList']=$this->UserModel->search($name);
		$data['content']=$this->load->view('userList',$userList,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	function home($id){
		$this->load->model("UserModel");
		$this->load->model("QuestionModel");
		$this->load->model("AnswerModel");
		$userHome['user']=$this->UserModel->searchById($id);
		$userHome['questionList']=$this->QuestionModel->searchByUser($id);
		$userHome['answerList']=$this->QuestionModel->searchByIdArr(
				$this->AnswerModel->searchByUser($id));
		$a=0;
		$data['pageTitle']='DailyQuestion';
		$this->load->library('session');
		if($this->session->userdata('name')){
			$user['id']=$this->session->userdata('id');
			$user['name']=$this->session->userdata('name');
			$user['score']=$this->session->userdata('score');
			$user['head']=$this->session->userdata('head');
			$data['login']=$this->load->view('loggedin',$user,true);
			$userHome['currentUser']=$this->session->userdata('id');
		}else{
			$data['login']=$this->load->view('login',$a,true);
		}
		$data['content']=$this->load->view('userHome',$userHome,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	function login(){
		$this->load->model("UserModel");
 		$name=$this->input->post('name');
 		$password=$this->input->post('password');
		$result=$this->UserModel->searchByName($name);
		if ($result) {
			if($result->password==$password){
				$this->load->library('session');
				$arr=array('id'=>$result->id,
						'name'=>$result->name,
						'score'=>$result->score, 
						'head'=>$result->head
				);
				$this->session->set_userdata($arr);			
			}else{
				echo 'login error';
			}
		}else{
			echo 'login error';
		}
		$this->load->library('session');
		if($this->session->userdata('name')){
			$user['id']=$this->session->userdata('id');
			$user['name']=$this->session->userdata('name');
			$user['score']=$this->session->userdata('score');
			$user['head']=$this->session->userdata('head');
			$data['login']=$this->load->view('loggedin',$user,true);
			$this->load->view('loggedin',$user);
		}
	}
	function checkUser(){
		$this->load->library('session');
		if($this->session->userdata('name')){
			echo "true";
		}else{
			echo "false";
		}
 	}
	function logout(){
		$this->load->library('session');
		$this->session->unset_userdata('name');
		$this->load->view("login");
	}
	function registerPage(){
		$data['pageTitle']='DailyQuestion';
		$this->load->view('header',$data);		
		$this->load->view('register');
		$this->load->view('footer');
	}
	function register(){
		$this->load->model('UserModel');
		if (!$this->UserModel->add()) {
			echo 'error';
		}else{
			redirect('question/index');
		}
	}
	function modifyPage(){
		$data['pageTitle']='DailyQuestion';
		$this->load->view('header',$data);
		$this->load->view('modify');
		$this->load->view('footer');
	}
	function modify(){
		$this->load->model("UserModel");
		$this->load->library('session');
		$id=$this->session->userdata('id');
		$result=$this->UserModel->searchById($id);
		if ($result) {
			if($result->password==$_POST['prePassword']){
				if($_POST['password1'])
					$data['password']=$_POST['password1'];
				$data['head']='default.jpg';
				var_dump($_FILES['head']);
				if(!empty($_FILES['head'])){
					echo $id;
					//上传文件
					$config['file_name']=$this->session->userdata('user_name');
					$config['upload_path']='./upload/head';
					$config['allowed_types']='gif|jpg|png';
					$config['max_size']='20000';
					$this->load->library('upload',$config);
					if($this->upload->do_upload('head'))
						echo 'sucess';
					else{
						echo $this->upload->display_errors();
					}
					$sae = $this->upload->data();
					$data['head']=$sae['file_name'];
					echo $data['head'];
				}
				$this->UserModel->modify($id,$data);
				$this->session->set_userdata('head',$data['head']);
			}else{
				echo 'password wrong';
			}
		}else{
			echo 'id error';
		}
		redirect('user/home/'.$id);
	}
}