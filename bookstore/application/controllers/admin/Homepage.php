<?php
	Class Homepage extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('homepage_model');
	       if($this->getPermission() != 1)
	        redirect(admin_url('permission/deny'));
		}

		/*
			* lấy thông tin homepage *
		*/
		function index(){
			$list = $this->homepage_model->get_list();
			$this->data['list'] = $list;
			// lấy thông tin biến message
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;
			// load view
			$this->data['temp'] = 'admin/homepage/index';
			$this->load->view('admin/main',$this->data);
		}

		/*
			* Chỉnh sữa thông tin homepage *
		*/
		function edit(){
			$id = 1;
			$info = $this->homepage_model->get_info($id);
			$this->data['info'] = $info;

			//load thư viện form_validation và helper form
			$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post())//nếu có dữ liệu post lên
			{
				$this->form_validation->set_rules('site_title','tiêu đề trang chủ','required');
				$this->form_validation->set_rules('site_desc','mô tả trang chủ','required');
				

				if($this->form_validation->run())
				{
					//lấy giá trị post lên
					$site_title = $this->input->post('site_title');
					$site_desc = $this->input->post('site_desc');
					$site_key = $this->input->post('site_key');

	                //thêm dữ liệu vào mảng data
	                $data = array(
	                	'site_title'  => $site_title,
	                	'site_desc'   => $site_desc,
	                	'image_link'  => $this->input->post('image'),
	                	'site_key'    => $site_key,
	                	'favicon'     => $this->input->post('favicon'),
	                	'hotline'     => $this->input->post('hotline'),
	                	'analytic'    => $this->input->post('analytic'),
	                	'analytic_2'  => $this->input->post('analytic_2'),
	                	'google_map'  => $this->input->post('google_map'),
	                	'chat_box'    => $this->input->post('chat_box'),
	                	'page_face'   => $this->input->post('page_face'),
	                	'video_youtube' => $this->input->post('video_youtube'),
	                );

	                //update vào csdl
	                if($this->homepage_model->update($id,$data))
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật thành công');
	                }else
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật không thành công');
	                }
	                redirect(admin_url('homepage'));
				}

			}
			//load view
			$this->data['temp'] = 'admin/homepage/edit';
			$this->load->view('admin/main',$this->data);
		}

	}
?>