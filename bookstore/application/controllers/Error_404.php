<?php
	Class Error_404 extends MY_Controller
	{
		function __contruct(){
			parent::__construct();
			$this->load->model('catalog_model');
		}

		function index(){
			// load view
			$this->data['temp'] = 'errors/error_404';
			$this->load->view('site/layout404',$this->data);
		}
	}
?>