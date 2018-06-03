<?php 

class Admin extends MY_Controller{
	public function dashboard(){
		
		$this->load->library('pagination');
		$config=[
			'base_url'	=>	base_url('index.php/admin/dashboard'),
			'per_page'	=>	5,
			'total_rows'=> $this->articles->num_rows(),
			'full_tag_open' => "<ul class ='pagination'>",
			'full_tag_close'=> "</ul>",
			'first_tag_open' => "<li class ='page-item'>",
			'first_tag_close'=> "</li>",
			'last_tag_open' => "<li class ='page-item'>",
			'last_tag_close'=> "</li>",
			'next_tag_open' => "<li class ='page-item'>",
			'next_tag_close'=> "</li>",
			'prev_tag_open' => "<li class ='page-item'>",
			'prev_tag_close'=> "</li>",
			'num_tag_open' => "<li class ='page-item'>",
			'num_tag_close'=> "</a></li>",
			'cur_tag_open' => "<li class ='page-item active'>",
			'cur_tag_close'=> "</li>"

		];
		$this->pagination->initialize($config);

		$articles= $this->articles->articles_list($config['per_page'],$this->uri->segment(3));

		$this->load->view('admin/dashboard',['articles'=>$articles]);	
	}
	public function add_article()
	{
		$this->load->helper('form');
		$this->load->view('admin/add_article.php');
	}
	public function store_article()
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules')){
			$post=$this->input->post();
			
			//removing submit item present in post array
			unset($post['submit']);
			//loading model articlesmodel with name articles
			$this->flashAndRedirect($this->articles->add_articles($post),'added','add');			
		}
		else{
			$this->load->view('admin/add_article');
		}
	}
	public function edit_article($article_id)
	{
		$article= $this->articles->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=>$article]);

	}
	public function update_article($article_id)
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules')){
			$post=$this->input->post();
			//removing submit item present in post array
			unset($post['submit']);
			//loading model articlesmodel with name articles
			$this->flashAndRedirect($this->articles->update_article($article_id,$post),'updated','update');			
		}
		else{
			$this->load->view('admin/edit_article');
		}
	}	
	public function delete_article()
	{
		$article_id=$this->input->post('article_id');
		$this->flashAndRedirect($this->articles->delete_article($article_id),'deleted','delete');			
	}
	public function  __construct()
	{
		parent:: __construct(); 
		$this->load->model('articlesmodel','articles');
		if(!$this->session->userdata('user_id'))
			return redirect('login');
	}
	private function flashAndRedirect($condition,$successKeyword,$failureKeyword)
	{
		if($condition)
		{
			$this->session->set_flashdata('feedback',"Article $successKeyword Successfully");	
			$this->session->set_flashdata('feedback_class','alert-success');	
		}	
		else{
			$this->session->set_flashdata('feedback',"Article Failed to $failureKeyword.Please try Again");	
			$this->session->set_flashdata('feedback_class','alert-danger');	
		}
		return redirect('admin/dashboard');
	}

 }
