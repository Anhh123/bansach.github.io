<?php
	Class Info extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('info_model');
		}

		function view(){
			//lấy thông tin trang giới thiệu
			$id = 2;
			$info = $this->info_model->get_info($id);
			$this->data['info'] = $info;

			//load view
			$this->data['temp'] = 'site/info/view';
			// $this->load->view('site/layout/layout_top_footer', $this->data);
			$this->load->view('site/head/head-info',$this->data);
			$this->load->view('site/header/header-no-active',$this->data);
			$this->load->view('site/section/section-info',$this->data);
			$this->load->view('site/layout/layout_chung',$this->data);
		}
	}
?>