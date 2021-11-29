<?php
	Class Gioithieu extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('gioithieu_model');
		}

		function view(){
			//lấy thông tin trang giới thiệu
			$id = 1;
			$gioithieu = $this->gioithieu_model->get_info($id);
			$this->data['gioithieu'] = $gioithieu;

			//load view
			$this->data['temp'] = 'site/gioithieu/view';
			// $this->load->view('site/layout/layout_top_footer', $this->data);
			$this->load->view('site/head/head-gioithieu',$this->data);
			$this->load->view('site/header/header-gioithieu',$this->data);
			$this->load->view('site/section/section-gioithieu',$this->data);
			$this->load->view('site/layout/layout_chung',$this->data);
		}
	}
?>