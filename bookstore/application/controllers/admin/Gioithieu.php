<?php
	Class Gioithieu extends MY_Controller
	{
	    function __construct(){
	        parent::__construct();
	        $this->load->model('gioithieu_model');
	       if($this->getPermission() != 1)
	        redirect(admin_url('permission/deny'));
	    }

		function index(){
			// lấy thông tin trang giới thiệu
		    $id = 1;
		    $gioithieu = $this->gioithieu_model->get_info($id);
		    $this->data['gioithieu'] = $gioithieu;

		    // load view
		    $this->data['temp'] = 'admin/gioithieu/index';
		    $this->load->view('admin/main',$this->data);
		}

		function edit(){
			// lấy thông tin trang giới thiệu
		    $id = 1;
		    $gioithieu = $this->gioithieu_model->get_info($id);
		    $this->data['gioithieu'] = $gioithieu;
		    // load form_validation và thư viện helper
		    $this->load->library('form_validation');
		    $this->load->helper('form');
		    if($this->input->post())
		    {
		    	$this->form_validation->set_rules('content','Nội dung','required');
		    	if($this->form_validation->run())
		    	{
		    		// lấy nội dung
		    		$content = $this->input->post('content');
		    		// thêm vào cơ sở dữ liệu
		    		$data = array();
		    		$data['content'] = $content;
		    		if($this->gioithieu_model->update($id,$data))
		    		{
		    			$this->session->set_flashdata('message','chỉnh sửa thành công');
		    		}else
		    		{
		    			$this->session->set_flashdata('message','không chỉnh sửa được');
		    		}
		    		redirect(admin_url('gioithieu'));
		    	}
		    }
		    
		    // load view
		    $this->data['temp'] = 'admin/gioithieu/edit';
		    $this->load->view('admin/main',$this->data);
		}

	}
?>