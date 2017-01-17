<?php

	class User extends MY_Controller{
		public function index()
		{
			$this->load->helper('html');
			$this->load->helper('url');
			$this->load->view('public/articles_list');
		}
	}

?>
