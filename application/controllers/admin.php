<?php


	class Admin extends MY_Controller{
		
		/*function __construct(argument)
		{
			
		}*/

		public function dashboard()
		{
			//$this->load->helper('form');
			//$this->load->model('articlesmodel','articles');

			$articles = $this->articles->articles_list();

			$this->load->view('admin/dashboard', ['articles'=>$articles]);
		}

		public function add_article()
		{
			//$this->load->helper('form');
			$this->load->view('admin/add_article');
		}

		public function edit_article($article_id)
		{
			//$this->load->helper('form');
			//$this->load->model('articlesmodel','articles');
			$article = $this->articles->find_article($article_id);
			$this->load->view('admin/edit_article', ['article'=>$article]);
		}

		public function update_article($article_id)
		{
			$this->load->library('form_validation');
			if( $this->form_validation->run('add_article_rules') ){
				$post = $this->input->post();
				unset($post['submit']);
				//$this->load->model('articlesmodel', 'articles');
				/*if( $this->articles->update_article($article_id,$post) ){
					$this->session->set_flashdata('feedback', 'Article Updated Successfully');
					$this->session->set_flashdata('feedback_class', 'alert-success');
				}
				else{
					$this->session->set_flashdata('feedback', 'Article Failed To Update');
					$this->session->set_flashdata('feedback_class', 'alert-danger');
				}
				return redirect('admin/dashboard');*/

				$this->_flashAndRedirect(
					$this->articles->update_article($article_id,$post),
					'Article Updated Successfully',
					'Article Failed To Update'
				);
			}
			else{

				//return redirect('admin/add_article');
				$this->load->view('admin/edit_article');
			}
		}

		public function store_article()
		{
			$this->load->library('form_validation');
			if( $this->form_validation->run('add_article_rules') ){
				$post = $this->input->post();
				unset($post['submit']);
				$post['user_id'] = $this->session->userdata('user_id');
				//$this->load->model('articlesmodel', 'articles');

				/*if( $this->articles->add_article($post) ){
					$this->session->set_flashdata('feedback', 'Article Added Successfully');
					$this->session->set_flashdata('feedback_class', 'alert-success');
				}
				else{
					$this->session->set_flashdata('feedback', 'Article Failed To Add');
					$this->session->set_flashdata('feedback_class', 'alert-danger');
				}
				return redirect('admin/dashboard');*/

				$this->_flashAndRedirect(
					$this->articles->add_article($post),
					'Article Added Successfully',
					'Article Failed To Add'
				);
			}
			else{

				//return redirect('admin/add_article');
				$this->load->view('admin/add_article');
			}
		}

		public function delete_article()
		{
			$article_id = $this->input->post('article_id');

			$this->_flashAndRedirect(
				$this->articles->delete_article($article_id),
				'Article Deleted Successfully',
				'Article Failed To Delete'
			);

			//$this->load->model('articlesmodel', 'articles');

			/*if( $this->articles->delete_article($article_id) ){
				$this->session->set_flashdata('feedback', 'Article Deleted Successfully');
				$this->session->set_flashdata('feedback_class', 'alert-success');
			}
			else{
				$this->session->set_flashdata('feedback', 'Article Failed To Delete');
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}
			return redirect('admin/dashboard');*/


		}

		public function __construct()
		{	
			parent::__construct();
			if( ! $this->session->userdata('user_id') )	return redirect('login');
			$this->load->model('articlesmodel', 'articles');
			$this->load->helper('form');
		}

		private function _flashAndRedirect($successful, $success_msg, $failture_mrg)
		{
			if( $successful ){
				$this->session->set_flashdata('feedback', $success_msg);
				$this->session->set_flashdata('feedback_class', 'alert-success');
			}
			else{
				$this->session->set_flashdata('feedback',  $failture_mrg);
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}
			return redirect('admin/dashboard');
		}
	}

?>