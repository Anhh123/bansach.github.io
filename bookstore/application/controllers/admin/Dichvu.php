<?php
    Class Dichvu extends MY_Controller
    {
    	function __construct(){
    		parent::__construct();
    		$this->load->model('dichvu_model');
           if($this->getPermission() != 1)
            redirect(admin_url('permission/deny'));
    	}
        /*
            * Lấy danh sách admin *
        */
    	function index(){
    		// Đêm tổng số bài viết dịch vụ
    		$total = $this->dichvu_model->get_total();
    		$this->data['total'] = $total;
    		
    		// load ra thu vien phan trang
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total;// tong tat ca cac bài viết tren website
            $config['base_url']   = admin_url('dichvu/index'); // link hien thi ra danh sach bài viết
            $config['per_page']   = 5;// so luong bài viết hien thi tren 1 trang
            $config['uri_segment'] = 4;// phan doan hien thi ra so trang tren url
            $config['next_link']   = 'Trang kế tiếp';
            $config['prev_link']   = 'Trang trước';
            // khoi tao cac cau hinh phan trang
            $this->pagination->initialize($config);
            
            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            
            $input = array();
            $input['limit'] = array($config['per_page'], $segment);
            
            // kiem tra co thuc hien loc du lieu hay khong
            $id = $this->input->get('id');
            $id = intval($id);
            $input['where'] = array();
            if($id > 0)
            {
                $input['where']['id'] = $id;
            }
            $title = $this->input->get('title');
            if($title)
            {
                $input['like'] = array('title', $title);
            }
           
            // lay danh sach bai viet dịch vụ
            $list = $this->dichvu_model->get_list($input);
            $this->data['list'] = $list;
           
            // lay nội dung của biến message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
    		// load view
    		$this->data['temp'] ='admin/dichvu/index';
    		$this->load->view('admin/main',$this->data);
    	}

        /*
            * thêm mới bài viết dịch vụ *
        */
        function add(){
            // load thư viện validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            // neu ma co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('title', 'Tiêu đề bài viết', 'required');
                $this->form_validation->set_rules('content', 'Nội dung bài viết', 'required');
                  if($this->input->post('slug') != '')
                    $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');
                // nhập liệu chính xác
                if($this->form_validation->run())
                {
                    //luu du lieu can them
                    $data = array(
                        'title'      => $this->input->post('title'),
                        'image_link' => $this->input->post('image'),
                        'site_title' => $this->input->post('site_title'),
                        'meta_desc'  => $this->input->post('meta_desc'),
                        'meta_key'   => $this->input->post('meta_key'),
                        'content'    => $this->input->post('content'),
                        'status'     => $this->input->post('status'),
                        'intro'      => $this->input->post('intro'),
                        'created'    => now(),
                    );

                    if($this->input->post('slug') == '')
                        $data['slug']  = str_slug($this->input->post('title'));
                    else
                         $data['slug'] =$this->input->post('slug');
                    // them moi vao csdl
                    if($this->dichvu_model->create($data))
                    {
                        // Tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    // chuyen tới trang danh sách
                    redirect(admin_url('dichvu'));
                }
            }
            // load view
            $this->data['temp'] = 'admin/dichvu/add';
            $this->load->view('admin/main', $this->data);
        }

        /*
            * Chỉnh sữa bài viết dịch vụ *
        */
        function edit(){
            $id = $this->uri->rsegment('3');
            $dichvu = $this->dichvu_model->get_info($id);
            if(!$dichvu)
            {
                // Tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'Không tồn tại bài viết này');
                redirect(admin_url('dichvu'));
            }
            $this->data['dichvu'] = $dichvu;
           
            // load thư viện validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            // neu ma co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('title', 'Tiêu đề bài viết', 'required');
                $this->form_validation->set_rules('content', 'Nội dung bài viết', 'required');
                  if($this->input->post('slug') != '')
                    $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');
                // nhập liệu chính xác
                if($this->form_validation->run())
                {
                    // luu du lieu can them
                    $data = array(
                        'title'      => $this->input->post('title'),
                        'site_title' => $this->input->post('site_title'),
                        'meta_desc'  => $this->input->post('meta_desc'),
                        'meta_key'   => $this->input->post('meta_key'),
                        'image_link'   => $this->input->post('image'),
                        'content'    => $this->input->post('content'),
                        'status'     => $this->input->post('status'),
                        'intro'      => $this->input->post('intro'),
                        'created'    => now(),
                    );

                    if($this->input->post('slug') == '')
                        $data['slug']  = str_slug($this->input->post('title'));
                    else
                         $data['slug'] =$this->input->post('slug');
                   
                    // them moi vao csdl
                    if($this->dichvu_model->update($dichvu->id, $data))
                    {
                        // tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không cập nhật được');
                    }
                    // chuyen tới trang danh sách
                    redirect(admin_url('dichvu'));
                }
            }
            
            // load view
            $this->data['temp'] = 'admin/dichvu/edit';
            $this->load->view('admin/main', $this->data);
        }

        /*
            * Xóa bài viết tin tức *
        */
        function del(){
            $id = $this->uri->rsegment(3);
            $this->_del($id);
            
            // tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Xóa bài viết thành công');
            redirect(admin_url('dichvu'));
        }

        /*
            * Xóa nhiều bài viết *
         */
        function delete_all(){
            // lay tat ca id bai viet muon xoa
            $ids = $this->input->post('ids');
            foreach ($ids as $id)
            {
                $this->_del($id);
            }
        }

        /*
            * Xoa bài viết *
         */
        private function _del($id){
            $dichvu = $this->dichvu_model->get_info($id);
            if(!$dichvu)
            {
                // tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'không tồn tại bài viết này');
                redirect(admin_url('dichvu'));
            }
            // thuc hien xoa bài viết
            $this->dichvu_model->delete($id);
            // xoa cac anh cua bài viết
            $image_link = './upload/dichvu/'.$news->image_link;
            if(file_exists($image_link))
            {
                unlink($image_link);
            }
        }

        /*
            * Check *
         */
        function _check_slug(){
            $slug = $this->input->post('slug');
            $info = $this->dichvu_model->get_info($this->uri->rsegment(3));
            if($this->uri->rsegment('3')){
                $conditional = $this->dichvu_model->get_list(array('where'=>array('slug !=' =>$info->slug,'slug'=>$slug)));
            }
            else{
                $conditional = $this->dichvu_model->get_list(array('where'=>array('slug'=>$slug)));
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