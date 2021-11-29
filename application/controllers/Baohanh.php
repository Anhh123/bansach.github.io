<?php
	Class Baohanh extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('baohanh_model');
		}

		function view(){
			// lấy thông tin page bảo hành
			$id =1;
			$baohanh = $this->baohanh_model->get_info($id);
			$this->data['baohanh'] = $baohanh;

			// load view
			$this->data['temp'] = 'site/baohanh/view';
			$this->load->view('site/head/head-baohanh',$this->data);
			$this->load->view('site/header/header-no-active',$this->data);
			$this->load->view('site/section/section-gioithieu',$this->data);
			$this->load->view('site/layout/layout_chung',$this->data);
		}
	}
?>