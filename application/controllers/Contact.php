<?php
	Class Contact extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('contact_model');
	        $this->load->helper('captcha');
		}

		/*
		// Khách hàng
		*/

		function view(){
			// Lấy ds khách hàng post lên
			$this->load->library('form_validation');
			$this->load->helper('form');

			     //lay thong tin message
			     $message = $this->session->flashdata('message');
			     $this->data['message'] = $message;

			     //cau hinh capcha
				$var = array(
					'img_path'     =>'./public/captcha/',
					'img_width'    => 170,
					'img_height'   => 30,
					'img_url'      => base_url()."public/captcha/",
					'expiration'   => 60,
				);
			$captcha = create_captcha($var); 
	        $this->session->set_userdata('captcha1',$captcha);

			if($this->input->post())
			{
				$this->form_validation->set_rules('name','tên','required');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				if($this->form_validation->run())
				{
					// láº¥y dá»¯ liá»‡u post lÃªn
					$name = $this->input->post('name');
					$email = $this->input->post('email');
					$phone = $this->input->post('phone');
					$content = $this->input->post('content');

					$data = array();
					$data = array(
						'name' => $name,
						'email' => $email,
						'phone'  => $phone,
						'content' => $content,
						'created' =>now(),
						);

					if($this->contact_model->create($data))
					{
						$this->session->set_flashdata('message','bạn đã liên hệ thành công');

					} else
					{
						$this->session->set_flashdata('message','vui lòng nhập đầy đủ các thông tin');
					}
					redirect(base_url('lien-he'));

				}
			}

			// load view
			$this->load->view('site/contact/view',$this->data);

		}

	    public function check_captcha(){
	        $captcha1 = $this->session->userdata('captcha1');
			$post_captcha = $this->input->post('txtcaptcha');
			$word_captcha = $captcha1['word'];

			if($post_captcha == $word_captcha)
			{
			// tr&#7843; v&#7873; thông báo l&#7895;i
	            $this->form_validation->set_message(__FUNCTION__, 'Sai ma captcha');
	            return false;
			}
			return true;
		}

	}
?>