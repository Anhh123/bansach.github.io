<?php
	Class Baohanh extends MY_Controller
	{
	    function __construct(){
	        parent::__construct();
	        $this->load->model('baohanh_model');
	      if($this->getPermission() != 1)
	        redirect(admin_url('permission/deny'));
	    }
	    // End
	    

		function index(){
			// lấy thông tin trang giới thiệu
		    $id = 1;
		    $baohanh = $this->baohanh_model->get_info($id);
		    $this->data['baohanh'] = $baohanh;

		    // load view
		    $this->data['temp'] = 'admin/baohanh/index';
		    $this->load->view('admin/main',$this->data);
		}
		// End
		

		function edit(){
			// lấy thông tin trang giới thiệu
		    $id = 1;
		    $baohanh = $this->baohanh_model->get_info($id);
		    $this->data['baohanh'] = $baohanh;
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
		    		if($this->baohanh_model->update($id,$data))
		    		{
		    			$this->session->set_flashdata('message','chỉnh sửa thành công');
		    		}else
		    		{
		    			$this->session->set_flashdata('message','không chỉnh sữa được');
		    		}
		    		redirect(admin_url('baohanh'));
		    	}


		    }
		    
		    // load view
		    $this->data['temp'] = 'admin/baohanh/edit';
		    $this->load->view('admin/main',$this->data);
		}
		// End
		
	}
?>