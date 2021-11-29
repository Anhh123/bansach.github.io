<?php
	Class Social extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('social_model');
	       if($this->getPermission() != 1)
	        redirect(admin_url('permission/deny'));
		}

		/*
			* lấy danh sách social
		*/
		function index(){
			// lấy ra danh sach social
			$list = $this->social_model->get_list();
			$this->data['list'] = $list;

			// lấy thông báo message
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;

			// load view
			$this->data['temp'] = 'admin/social/index';
			$this->load->view('admin/main',$this->data);
		}

		/*
			* Chinh sưa social
		*/

		function edit(){
			// lay ra id can chinh sưa
			$id = $this->uri->rsegment(3);
			$id = intval($id);

			// lấy ra thông tin theo id
			$info = $this->social_model->get_info($id);
			if(!$info)
			{
				$this->session->set_flashdata('message','Không tồn tai Social này!');
				redirect(admin_url('social'));
			}
			$this->data['info'] = $info;
			// load thư viện form_validation và helper date
			$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post())
			{
				$this->form_validation->set_rules('link','đường link','required');

				if($this->form_validation->run())
				{
					$name = $this->input->post('name');
					$link = $this->input->post('link');
					$image_social = $this->input->post('image_social');

					// thêm vào cơ sở dữ liệu
					$data = array(
						'name' => $name,
						'link' => $link,
						'image_social' => $image_social
						);
					if($this->social_model->update($id,$data))
					{
						// tạo thông báo
						$this->session->set_flashdata('message','Chỉnh sửa dữ liệu thành công!!!');
					}else
					{
						// tạo thông báo
						$this->session->set_flashdata('message','Không chỉnh sửa được!!!');
					}
					redirect(admin_url('social'));
				}
			}
			// load view
			$this->data['temp'] = 'admin/social/edit';
			$this->load->view('admin/main',$this->data);
		}

	}
?>