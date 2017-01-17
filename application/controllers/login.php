<?php
	
	class Login extends MY_Controller{
		
		public function index(){ 

			if($this->session->userdata('user_id')) redirect('admin/dashboard');

			$this->load->helper('form');
			$this->load->view('public/admin_login');
		}
		
		public function admin_login(){
			$this->load->library('form_validation');

			$this->form_validation->set_rules('username', 'User Name', 'required|alpha|trim');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run()){
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->load->model('loginmodel');

				$login_id = $this->loginmodel->valid_login($username, $password);

				if( $login_id ){
					//$this->load->library('session');
					$this->session->set_userdata('user_id' , $login_id);
					//$this->load->view('admin/dashboard');
					return redirect('admin/dashboard');
				}
				else{
					$this->session->set_flashdata('login_failed', 'Invalid Username/Password');
					return redirect('login');
				}
			}
			else{
				$this->load->view('public/admin_login');
			}
			
		}

		public function logout()
		{
			$this->session->unset_userdata('user_id');
			return redirect('login');
		}
	}

?>