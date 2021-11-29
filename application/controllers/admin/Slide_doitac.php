<?php
    Class Slide_doitac extends MY_Controller
    {
    	function __construct(){
    		parent::__Construct();
    		$this->load->model('slide_doitac_model');
    	}

    	/*
    	   * lấy danh sách slide
    	*/
    	function index(){
    		// lấy danh sách slide_doitac
    		$list = $this->slide_doitac_model->get_list();
    		$this->data['list'] = $list;
    		// lấy nội dung thông báo message
    		$message = $this->session->flashdata('message');
    		$this->data['message'] = $message;

    		// load view
    		$this->data['temp'] = 'admin/slide_doitac/index';
    		$this->load->view('admin/main',$this->data);
    	}

        /*
            * Thêm mới slide_doitac
        */
    	function add(){
    		// load thư viện validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');

            // neu ma co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('title', 'Tên slide', 'required');
                $this->form_validation->set_rules('image', 'ảnh slide', 'required');
                $this->form_validation->set_rules('link', 'đường link', 'required');
                // nhập liệu chính xác
                if($this->form_validation->run())
                {
                    // luu du lieu can them
                    $data = array(
                        'title'       => $this->input->post('title'),
                        'image_link'  => $this->input->post('image'),
                        'link'        => $this->input->post('link'),
                        'sort_order'  => $this->input->post('sort_order'),
                    );
                    // them moi vao csdl
                    if($this->slide_doitac_model->create($data))
                    {
                        // tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    // chuyen tới trang danh sách
                    redirect(admin_url('slide_doitac'));
                }
            }

    		// load view
    		$this->data['temp'] = 'admin/slide_doitac/add';
    		$this->load->view('admin/main',$this->data);
    	}

    	/*
    	   * Chỉnh sữa slide_doitac
    	*/
    	function edit(){
    		$id = $this->uri->rsegment('3');
            $slide = $this->slide_doitac_model->get_info($id);
            if(!$slide)
            {
                // tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'Không tồn tại slide này');
                redirect(admin_url('slide_doitac'));
            }
            $this->data['slide'] = $slide;

            // load thư viện validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');

            // neu ma co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('title', 'Tên slide', 'required');
                $this->form_validation->set_rules('image', 'ảnh slide', 'required');
                $this->form_validation->set_rules('link', 'đường link', 'required');
                // nhập liệu chính xác
                if($this->form_validation->run())
                {
                    // luu du lieu can them
                    $data = array(
                        'title'       => $this->input->post('title'),
                        'link'       => $this->input->post('link'),
                        'sort_order' => $this->input->post('sort_order'),
                        'image_link' => $this->input->post('image'),
                    );
                    // them moi vao csdl
                    if($this->slide_doitac_model->update($slide->id, $data))
                    {
                        // tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không cập nhật được');
                    }
                    // chuyen tới trang danh sách
                    redirect(admin_url('slide_doitac'));
                }
            }

    		//load view
    		$this->data['temp'] = 'admin/slide_doitac/edit';
    		$this->load->view('admin/main',$this->data);
    	}

    	 /*
            * Xoa du lieu
         */
        function del(){
            $id = $this->uri->rsegment(3);
            $this->_del($id);

            // tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Xóa slide thành công');
            redirect(admin_url('slide_doitac'));
        }

        /*
            * Xóa nhiều slide
         */
        function delete_all(){
            // lay tat ca id slide muon xoa
            $ids = $this->input->post('ids');
            foreach ($ids as $id)
            {
                $this->_del($id);
            }
        }

        /*
            *Xoa slide
         */
        private function _del($id){
            $slide = $this->slide_doitac_model->get_info($id);
            if(!$slide)
            {
                //t ạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'không tồn tại slide này');
                redirect(admin_url('slide_doitac'));
            }
            // thuc hien xoa slide
            $this->slide_doitac_model->delete($id);
        }

    }
?>