<?php 

class User extends MY_Controller{
	public function index(){

		$this->load->model('articlesmodel','articles');

		$this->load->library('pagination');
		$config=[
			'base_url'	=>	base_url('index.php/user/index'),
			'per_page'	=>	5,
			'total_rows'=> $this->articles->count_all_articles(),
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
		$articles= $this->articles->all_articles_list($config['per_page'],$this->uri->segment(3));
		$this->load->view('public/articles_list',compact('articles')); //compact is a php function used to pass the variables into view
	}
	public function search(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('query','Query','required');
		if(!$this->form_validation->run())
			return $this->index();
		$query=$this->input->post('query');
		return redirect("user/search_results/$query");
		// $this->load->model('Articlesmodel','articles');
		// $articles=$this->articles->search($query);

	}
	public function search_results ( $query )
	{

		$this->load->model('articlesmodel','articles');

		$this->load->library('pagination');
		$config=[
			'base_url'	=>	base_url('index.php/user/search_results/$query'),
			'per_page'	=>	5,
			'total_rows'=> $this->articles->count_search_results($query),
			'full_tag_open' => "<ul class ='pagination'>",
			'full_tag_close'=> "</ul>",
			'uri_segment' => 4,
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
		$articles = $this->articles->search( $query, $config['per_page'],$this->uri->segment(4));
		$this->load->view('public/search_results',compact('articles'));

	}
	public function article($id)
	{
		$this->load->model('articlesmodel','articles');
		$article=$this->articles->find($id);
		$this->load->view('public/article_detail',compact('article'));
	}
 }
