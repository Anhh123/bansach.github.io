<?php
    Class Chantrang extends MY_Controller
    {
    	function __construct(){
            parent::__construct();
            $this->load->model('chantrang_model');
           if($this->getPermission() != 1)
            redirect(admin_url('permission/deny'));
        }


        /*
            * lấy danh sach footer *
        */
        function index(){
        	// lấy danh sách
            $list = $this->chantrang_model->get_list();
            $this->data['list'] = $list;

            // lấy tổng số danh sách
            $total = $this->chantrang_model->get_total();
            $this->data['total'] = $total;

            // lấy thông báo
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

        	// load layout
        	$this->data['temp'] = 'admin/footer/index';
            $this->load->view('admin/main',$this->data);
        }


        /*
            * Thêm mới danh sách *
        */
        function add(){
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            // neu ma co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name', 'Tên', 'required');
                $this->form_validation->set_rules('link', 'Đường link', 'required');
                $this->form_validation->set_rules('sort_order', 'Mật khẩu', 'required');
                
                // nhập liệu chính xác
                if($this->form_validation->run())
                {
                    // them vao csdl
                    $name     = $this->input->post('name');
                    $link = $this->input->post('link');
                    $sort_order = $this->input->post('sort_order');
                    
                    $data = array(
                        'name'        => $name,
                        'link'        => $link,
                        'sort_order'  => $sort_order,
                    );
                    if($this->chantrang_model->create($data))
                    { 
                        // tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    // chuyen tới trang danh sách quản trị viên
                    redirect(admin_url('chantrang'));
                }
            }
            
            $this->data['temp'] = 'admin/footer/add';
            $this->load->view('admin/main', $this->data);
        }


        /*
            * Chỉnh sữa danh sách *
        */

        function edit(){
            // lay id cua quan tri vien can chinh sua
            $id = $this->uri->rsegment('3');
            $id = intval($id);
            
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            // lay thong cua quan trị viên
            $info  = $this->chantrang_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại thông tin này');
                redirect(admin_url('chantrang'));
            }
            $this->data['info'] = $info;
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('name', 'Tên', 'required');
                $this->form_validation->set_rules('link', 'Đường link', 'required');
                $this->form_validation->set_rules('sort_order', 'Mật khẩu', 'required');

                if($this->form_validation->run())
                {
                    // them vao csdl
                    $name     = $this->input->post('name');
                    $link = $this->input->post('link');
                    $sort_order = $this->input->post('sort_order');
                    
                    $data = array(
                        'name'        => $name,
                        'link'        => $link,
                        'sort_order'  => $sort_order,
                    );
                    
                    if($this->chantrang_model->update($id, $data))
                    {
                        // tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không cập nhật được');
                    }
                    // chuyen tới trang danh sách quản trị viên
                    redirect(admin_url('chantrang'));
                }
            }
            // load view
            $this->data['temp'] = 'admin/footer/edit';
            $this->load->view('admin/main',$this->data);
        }


        /*
            * xóa dữ liệu *
        */

        function delete(){
            $id = $this->uri->rsegment('3');
            $id = intval($id);
            // lay thong tin cua quan tri vien
            $info = $this->chantrang_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại dữ liệu này');
                redirect(admin_url('chantrang'));
            }
            // thuc hiện xóa
            $this->chantrang_model->delete($id);
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
            redirect(admin_url('chantrang'));
        }
    }
?>