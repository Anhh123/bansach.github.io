<?php
    Class Tuyendung extends MY_Controller
    {
    	function __construct(){
            parent::__construct();
            $this->load->model('tuyendung_model');

        }

        /*
            * Lay danh sach tuyen dung
         */

        function index(){
            $input = array();
            $list = $this->tuyendung_model->get_list($input);
            $this->data['list'] = $list;

            $total = $this->tuyendung_model->get_total();
            $this->data['total'] = $total;

            // lay nội dung của biến message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            $this->data['temp'] = 'admin/tuyendung/index';
            $this->load->view('admin/main', $this->data);
        }

        /*
            * thêm mới tin tuyển dụng
        */
        function add(){
        	$this->load->library('form_validation');
            $this->load->helper('form');

            // neu ma co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name', 'Tên', 'required');
                $this->form_validation->set_rules('intro', 'mô tả nội dung', 'required');
                $this->form_validation->set_rules('content', 'nội dung chính', 'required');
                if($this->input->post('slug') != '')
                    $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');

                // nhập liệu chính xác
                if($this->form_validation->run())
                {
                    // them vao csdl
                    $name      = $this->input->post('name');
                    $intro     = $this->input->post('intro');
                    $content   = $this->input->post('content');

                    $data = array(
                        'title'     => $name,
                        'site_title' => $this->input->post('site_title'),
                        'intro' => $intro,
                        'content' => $content,
                        'image_link' => $this->input->post('image'),
                        'meta_desc'  => $this->input->post('meta_desc'),
                        'meta_key'   => $this->input->post('meta_key'),
                    );

                    if($this->input->post('slug') == '')
                        $data['slug']  = str_slug($name);
                    else
                        $data['slug'] =$this->input->post('slug');

                    if($this->tuyendung_model->create($data))
                    {
                        // tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    // chuyen tới trang danh sách quản trị viên
                    redirect(admin_url('tuyendung'));
                }
            }
        	// load view
        	$this->data['temp'] = 'admin/tuyendung/add';
        	$this->load->view('admin/main',$this->data);

        }

        /*
            * chỉnh sửa tin tuyển dụng
        */
        function edit(){
            if($this->getPermission() != 1)
            redirect(admin_url('permission/deny'));

        	// lấy info theo id
        	$id = $this->uri->rsegment(3);
        	$id = intval($id);
        	$info = $this->tuyendung_model->get_info($id);
        	if(!$info)
        	{
        		$this->session->set_flashdata('session','không tồn tại tin tức này');
        		redirect(admin_url('tuyendung'));
        	}
        	$this->data['info'] = $info;
        	// load thư viện validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');
             if($this->input->post('slug') != '')
                    $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');

            // neu ma co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name', 'Tên', 'required');
                $this->form_validation->set_rules('intro', 'mô tả nội dung', 'required');
                $this->form_validation->set_rules('content', 'nội dung chính', 'required');

                // nhập liệu chính xác
                if($this->form_validation->run())
                {
                    // them vao csdl
                    $name      = $this->input->post('name');
                    $intro     = $this->input->post('intro');
                    $content   = $this->input->post('content');
                    $data = array();
                    $data = array(
                        'title'     => $name,
                        'site_title' => $this->input->post('site_title'),
                        'intro' => $intro,
                        'content' => $content,
                        'meta_desc'  => $this->input->post('meta_desc'),
                        'meta_key'   => $this->input->post('meta_key'),
                        'image_link'   => $this->input->post('image'),
                    );
                     if($this->input->post('slug') == '')
                        $data['slug']  = str_slug($name);
                    else
                         $data['slug'] =$this->input->post('slug');
                    if($image_link != '')
                    {
                    	$data['image_link'] = $image_link;
                    }
                    // thêm vào cơ sở dữ liệu
                    if($this->tuyendung_model->update($info->id,$data))
                    {
                    	$this->session->set_flashdata('message','chỉnh sữa dữ liệu thành công');
                    }
                    else
                    {
                    	$this->session->set_flashdata('message','không chỉnh sữa được');
                    }
                    redirect(admin_url('tuyendung'));
                }
            }

        	// load view
        	$this->data['temp'] = 'admin/tuyendung/edit';
        	$this->load->view('admin/main',$this->data);
        }

        /*
            * Hàm xóa dữ liệu
         */
        function delete(){
            if($this->getPermission() != 1)
            redirect(admin_url('permission/deny'));
            $id = $this->uri->rsegment('3');
            $id = intval($id);

            // lay thong tin cua quan tri vien
            $info = $this->tuyendung_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
                redirect(admin_url('tuyendung'));
            }

            // thuc hiện xóa
            $this->tuyendung_model->delete($id);
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
            redirect(admin_url('tuyendung'));
        }


        function _check_slug(){
            $slug = $this->input->post('slug');
            $info = $this->tuyendung_model->get_info($this->uri->rsegment(3));
            if($this->uri->rsegment('3')){
               $conditional = $this->tuyendung_model->get_list(array('where'=>array('slug !=' =>$info->slug,'slug'=>$slug)));
            }
            else{
                $conditional = $this->tuyendung_model->get_list(array('where'=>array('slug'=>$slug)));
            }
            if($conditional){
                $this->form_validation->set_message(__FUNCTION__,'Slug đã tồn tại!');
                return false;
            }
            else{
                return true;
            }
        }
    }
?>