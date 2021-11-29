<?php
	Class Seopage_gioithieu extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('seopage_gioithieu_model');
			$this->load->model('seopage_tintuc_model');
			$this->load->model('seopage_dichvu_model');
			$this->load->model('seopage_baohanh_model');
			$this->load->model('seopage_tuyendung_model');
	     	if($this->getPermission() != 1)
	        redirect(admin_url('permission/deny'));
		}

		function index(){
			// lấy ra danh sách seopage_giới thiệu
			$list = $this->seopage_gioithieu_model->get_list();
			$this->data['list'] = $list;

			// lấy ra danh sách seopage_tintuc
			$list1 = $this->seopage_tintuc_model->get_list();
			$this->data['list1'] = $list1;

			// lấy ra danh sách seopage_dichvu
			$list2 = $this->seopage_dichvu_model->get_list();
			$this->data['list2'] = $list2;

			// lấy danh sách seopage_baohanh
			$list3 = $this->seopage_baohanh_model->get_list();
			$this->data['list3'] = $list3;

			// lấy danh sách seopage_tuyendung
			$list4 = $this->seopage_tuyendung_model->get_list();
			$this->data['list4'] = $list4;

			// lấy thông tin biến message
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;
			// load view
			$this->data['temp'] = 'admin/seopage_gioithieu/index';
			$this->load->view('admin/main',$this->data);
		}

		/*
			* chỉnh sữa thông tin seopage_gioithieu
		*/
		function edit(){
			$id = 1;
			$info = $this->seopage_gioithieu_model->get_info($id);
			$this->data['info'] = $info;

			//load thư viện form_validation và helper form
			$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post())//nếu có dữ liệu post lên
			{
				$this->form_validation->set_rules('site_title','tiêu đề trang chủ','required');
				$this->form_validation->set_rules('site_desc','mô tả trang chủ');

				if($this->form_validation->run())
				{
					// lấy giá trị post lên
					$site_title = $this->input->post('site_title');
					$site_desc = $this->input->post('site_desc');
					$site_key = $this->input->post('site_key');

	                // thêm dữ liệu vào mảng data
	                $data = array(
	                	'site_title'  => $site_title,
	                	'site_desc'   => $site_desc,
	                	//'image_link' => $this->input->post('image'),
	                	'site_key'    => $site_key,
	                	'favicon'     => $this->input->post('favicon'),
	                	);

	                // update vào csdl
	                if($this->seopage_gioithieu_model->update($id,$data))
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật thành công');
	                }else
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật không thành công');
	                }
	                redirect(admin_url('seopage_gioithieu'));
				}

			}
			// load view
			$this->data['temp'] = 'admin/seopage_gioithieu/edit';
			$this->load->view('admin/main',$this->data);
		}

		/*
			* chỉnh sữa thông tin seopage_tintuc
		*/
		function edit_news(){
			$id = 1;
			$info = $this->seopage_tintuc_model->get_info($id);
			$this->data['info'] = $info;

			// load thư viện form_validation và helper form
			$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post())// nếu có dữ liệu post lên
			{
				$this->form_validation->set_rules('site_title','tiêu đề trang chủ','required');
				$this->form_validation->set_rules('site_desc','mô tả trang chủ');

				if($this->form_validation->run())
				{
					// lấy giá trị post lên
					$site_title = $this->input->post('site_title');
					$site_desc = $this->input->post('site_desc');
					$site_key = $this->input->post('site_key');

	                // thêm dữ liệu vào mảng data
	                $data = array(
	                	'site_title'  => $site_title,
	                	'site_desc'   => $site_desc,
	                	//'image_link' => $this->input->post('image'),
	                	'site_key'    => $site_key,
	                	'favicon'     => $this->input->post('favicon'),
	                	);

	                // update vào csdl
	                if($this->seopage_tintuc_model->update($id,$data))
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật thành công');
	                }else
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật không thành công');
	                }
	                redirect(admin_url('seopage_gioithieu'));
				}

			}
			// load view
			$this->data['temp'] = 'admin/seopage_gioithieu/edit_news';
			$this->load->view('admin/main',$this->data);
		}


		/*
			* chỉnh sữa thông tin seopage_dichvu
		*/
		function edit_dichvu(){
			$id = 1;
			$info = $this->seopage_dichvu_model->get_info($id);
			$this->data['info'] = $info;

			// load thư viện form_validation và helper form
			$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post())//nếu có dữ liệu post lên
			{
				$this->form_validation->set_rules('site_title','tiêu đề trang chủ','required');
				$this->form_validation->set_rules('site_desc','mô tả trang chủ');

				if($this->form_validation->run())
				{
					// lấy giá trị post lên
					$site_title = $this->input->post('site_title');
					$site_desc = $this->input->post('site_desc');
					$site_key = $this->input->post('site_key');

	                // thêm dữ liệu vào mảng data
	                $data = array(
	                	'site_title'  => $site_title,
	                	'site_desc'   => $site_desc,
	                	//'image_link' => $this->input->post('image'),
	                	'site_key'    => $site_key,
	                	'favicon'     => $this->input->post('favicon'),
	                	);

	                // update vào csdl
	                if($this->seopage_dichvu_model->update($id,$data))
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật thành công');
	                }else
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật không thành công');
	                }
	                redirect(admin_url('seopage_gioithieu'));
				}

			}
			// load view
			$this->data['temp'] = 'admin/seopage_gioithieu/edit_dichvu';
			$this->load->view('admin/main',$this->data);
		}

		/*
			* chỉnh sữa thông tin seopage_baohanh
		*/
		function edit_baohanh(){
			$id = 1;
			$info = $this->seopage_baohanh_model->get_info($id);
			$this->data['info'] = $info;

			// load thư viện form_validation và helper form
			$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post())//nếu có dữ liệu post lên
			{
				$this->form_validation->set_rules('site_title','tiêu đề trang chủ','required');
				$this->form_validation->set_rules('site_desc','mô tả trang chủ');

				if($this->form_validation->run())
				{
					// lấy giá trị post lên
					$site_title = $this->input->post('site_title');
					$site_desc = $this->input->post('site_desc');
					$site_key = $this->input->post('site_key');

	                // thêm dữ liệu vào mảng data
	                $data = array(
	                	'site_title'  => $site_title,
	                	'site_desc'   => $site_desc,
	                	//'image_link' => $this->input->post('image'),
	                	'site_key'    => $site_key,
	                	'favicon'     => $this->input->post('favicon'),
	                	);

	                // update vào csdl
	                if($this->seopage_baohanh_model->update($id,$data))
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật thành công');
	                }else
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật không thành công');
	                }
	                redirect(admin_url('seopage_gioithieu'));
				}

			}
			// load view
			$this->data['temp'] = 'admin/seopage_gioithieu/edit_baohanh';
			$this->load->view('admin/main',$this->data);
		}

		/*
			* chỉnh sữa thông tin seopage_tuyendung
		*/
		function edit_tuyendung(){
			$id = 1;
			$info = $this->seopage_tuyendung_model->get_info($id);
			$this->data['info'] = $info;

			// load thư viện form_validation và helper form
			$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post())// nếu có dữ liệu post lên
			{
				$this->form_validation->set_rules('site_title','tiêu đề trang chủ','required');
				$this->form_validation->set_rules('site_desc','mô tả trang chủ');

				if($this->form_validation->run())
				{
					// lấy giá trị post lên
					$site_title = $this->input->post('site_title');
					$site_desc = $this->input->post('site_desc');
					$site_key = $this->input->post('site_key');

	                // thêm dữ liệu vào mảng data
	                $data = array(
	                	'site_title'  => $site_title,
	                	'site_desc'   => $site_desc,
	                	//'image_link' => $this->input->post('image'),
	                	'site_key'    => $site_key,
	                	'favicon'     => $this->input->post('favicon'),
	                	);

	                // update vào csdl
	                if($this->seopage_tuyendung_model->update($id,$data))
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật thành công');
	                }else
	                {
	                	// tạo ra nội dung thông báo
	                	$this->session->set_flashdata('message','cập nhật không thành công');
	                }
	                redirect(admin_url('seopage_gioithieu'));
				}

			}
			// load view
			$this->data['temp'] = 'admin/seopage_gioithieu/edit_tuyendung';
			$this->load->view('admin/main',$this->data);
		}

	}
?>