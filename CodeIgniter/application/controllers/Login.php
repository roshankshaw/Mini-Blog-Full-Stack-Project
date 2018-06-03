<?php 

class Login extends MY_Controller{
	public function index(){
		
		//CHECKING IF USER IS ALREADY LOGGED IN
		if($this->session->userdata('user_id'))
			return redirect('admin/dashboard');
		

		$this->load->helper('form');
		$this->load->view('public/admin_login.php');
	}
	public function admin_login(){

		//CHECKING IF USER IS ALREADY LOGGED IN
		if($this->session->userdata('user_id'))
			return redirect('admin/dashboard');
		

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','User Name','required|alpha|max_length[100]|trim');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run()){
			//validation success
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$this->load->model('loginmodel');
			$login_id=$this->loginmodel->login_valid($username, $password);
			if($login_id){
				$this->load->library('session');
				$this->session->set_userdata('user_id',$login_id);
				return redirect('admin/dashboard');

			}else{
				// authentication failed.
				$this->session->set_flashdata('login_failed','Invalid Username/Password');
				return redirect('login');
			}	
		}
		else{
			$this->load->view('public/admin_login.php');
		}
	}
	public function logout(){
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
}



