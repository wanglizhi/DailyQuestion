<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //防止用户直接访问

class Question extends CI_Controller {
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
		$this->load->model('QuestionModel');
		$this->load->model('TagModel');
		$this->load->model('UserModel');
		$a['popularTags']=$this->TagModel->getPopular();
		$a['famousUsers']=$this->UserModel->getFamous();
		$b['questionList']=$this->QuestionModel->getAll();
		$data['content']=$this->load->view('questionList',$b,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	//unanswered 页面
	function unanswered(){
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
		$this->load->model('QuestionModel');
		$this->load->model('TagModel');
		$this->load->model('UserModel');
		$a['popularTags']=$this->TagModel->getPopular();
		$a['famousUsers']=$this->UserModel->getFamous();
		$b['questionList']=$this->QuestionModel->getUnanswered();
		$data['content']=$this->load->view('questionList',$b,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	function showByTagId($tag_id){
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
		$this->load->model('QuestionModel');
		$this->load->model('TagModel');
		$this->load->model('UserModel');
		$a['popularTags']=$this->TagModel->getPopular();
		$a['famousUsers']=$this->UserModel->getFamous();
		$b['questionList']=$this->QuestionModel->searchByIdArr($this->TagModel->searchByTag($tag_id));
		$data['content']=$this->load->view('questionList',$b,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	function showByTagName($tagName){
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
		$this->load->model('QuestionModel');
		$this->load->model('TagModel');
		$this->load->model('UserModel');
		$a['popularTags']=$this->TagModel->getPopular();
		$a['famousUsers']=$this->UserModel->getFamous();
		$b['questionList']=$this->QuestionModel->searchByIdArr($this->TagModel->searchByTagName($tagName));
		$data['content']=$this->load->view('questionList',$b,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	function search(){
		$data['pageTitle']='DailyQuestion';
		$this->load->library('session');
		$searchField=$_POST['search_field'];
		if($this->session->userdata('name')){
			$user['id']=$this->session->userdata('id');
			$user['name']=$this->session->userdata('name');
			$user['score']=$this->session->userdata('score');
			$user['head']=$this->session->userdata('head');
			$data['login']=$this->load->view('loggedin',$user,true);
		}else{
			$data['login']=$this->load->view('login',null,true);
		}
		$this->load->model('QuestionModel');
		$this->load->model('TagModel');
		$this->load->model('UserModel');
		$a['popularTags']=$this->TagModel->getPopular();
		$a['famousUsers']=$this->UserModel->getFamous();
		$b['questionList']=$this->QuestionModel->searchByTitle($searchField);
		$data['content']=$this->load->view('questionList',$b,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	//askQuestion
	function askQuestionPage(){
		$data['pageTitle']='AskQuestion';
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
		$this->load->model('UserModel');
		$a['popularTags']=$this->TagModel->getPopular();
		$a['famousUsers']=$this->UserModel->getFamous();
		$data['content']=$this->load->view('askQuestion',$a,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	function askQuestion(){
		$this->load->library('session');
		$data['title']=$_POST['title'];
		$data['content']=$_POST['myEditor'];
		$this->load->helper('date');
		$data['created']=date("Y-m-d H:i:s");
		$data['user_id']=$this->session->userdata('id');
		$data['user_name']=$this->session->userdata('name');
		if(!$data['user_id']){
			redirect('question/index');
			return ;
		}
		$data['vote']=0;
		$tagList="";
		$tagArr=$this->session->userdata('tags');
		$this->load->model('TagModel');
		$this->load->model('QuestionModel');
		foreach ($tagArr as $tag){
			$tagList=$tagList.'_'.$tag;
		}
		$data['tags']=$tagList;
		$result=$this->QuestionModel->add($data);
		foreach ($tagArr as $tag){
			$tagList=$tagList.'_'.$tag;
			$tagData['tag']=$tag;
			$tagData['question_id']=$result[0]->id;
			$this->TagModel->add($tagData);
		}
		
		$this->session->unset_userdata('tags');
		// 		跳转到问题页面
		redirect('question/questionPage/'.$result[0]->id);
	}
	function questionPage($id){
		$this->load->model('QuestionModel');
		$this->load->model('AnswerModel');
		$this->load->model('TagModel');
		$data['pageTitle']='Answer to Question';
		$content['question']=$this->QuestionModel->searchById($id);
		$content['answerList']=$this->AnswerModel->searchByQuestion($id);
		$content['tagList']=$this->TagModel->searchByQuestion($id);
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
		$a['popularTags']=$this->TagModel->getPopular();
		$a['famousUsers']=$this->UserModel->getFamous();
		$data['content']=$this->load->view('answerQuestion',$content,true);
		$data['famousUsers']=$this->load->view('famousUsers',$a,true);
		$data['popularTags']=$this->load->view('popularTags',$a,true);
		$this->load->view('header',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	function answerQuestion($id){
		$this->load->library('session');
		$data['question_id']=$id;
		$data['content']=$_POST['myEditor'];
		$this->load->helper('date');
		$data['created']=date("Y-m-d H:i:s");
		$data['user_id']=$this->session->userdata('id');
		$data['user_name']=$this->session->userdata('name');
		if(!$data['user_id']){
			redirect('question/index');
			return ;
		}
		$data['vote']=0;
		$this->load->model('AnswerModel');
		$result=$this->AnswerModel->add($data);
		//向问题中的回答数加1
		$this->load->model('QuestionModel');
		$this->QuestionModel->addAnswer($id);
		// 		跳转到问题页面
		redirect('question/questionPage/'.$id);
	}
	function checkScore(){
		$this->load->library('session');
		$user_id=$this->session->userdata('id');
		$this->load->model('UserModel');
		$this->load->model('QuestionModel');
		$score=$this->UserModel->getScore($user_id);
		if($score->score>10){
			//每天至多三个问题
			if($this->QuestionModel->questionNum($user_id)>=3){
				echo 'full';
			}else{
				$this->UserModel->addScore($user_id,-1);
				echo 'success';
			}
		}else if($score->score>0 && $score->score<=10){
			//每天至多一个问题
			if($this->QuestionModel->questionNum($user_id)>=1){
				echo 'full';
			}else{
				$this->UserModel->addScore($user_id , -1);
				echo 'success';
			}
		}else{
			echo 'null';
		}
	}
	function vote(){
		$question_id=$_POST['question_id'];
		$this->load->library('session');
		$this->load->Model('QuestionModel');
		if($this->session->userdata('name')){
			$data['user_id']=$this->session->userdata('id');
		}
		$data['question_id']=$question_id;
		$vote=0;
		if($this->QuestionModel->checkVote($data)){
			$vote=$this->QuestionModel->deleteVote($data);
		}else{
			$vote=$this->QuestionModel->addVote($data);
		}
		echo "<span class=\"vote-count\">".$vote."</span> <span
					class=\"vote-lable\">votes</span>";
	}
	function vote2(){
		$answer_id=$_POST['answer_id'];
		$this->load->library('session');
		$this->load->Model('AnswerModel');
		if($this->session->userdata('name')){
			$data['user_id']=$this->session->userdata('id');
		}
		$data['answer_id']=$answer_id;
		$vote=0;
		if($this->AnswerModel->checkVote($data)){
			$vote=$this->AnswerModel->deleteVote($data);
		}else{
			$vote=$this->AnswerModel->addVote($data);
		}
		echo "<span class=\"vote-count\">".$vote."</span> <span
					class=\"vote-lable\">votes</span>";
	}
	function test(){
		$current=date("Y-m-d H:i:s",strtotime("-1 day"));
		var_dump($current);
	}
}