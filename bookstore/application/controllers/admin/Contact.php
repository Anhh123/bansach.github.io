<?php
    Class Contact extends MY_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('contact_model');
            if($this->getPermission() != 1)
            redirect(admin_url('permission/deny'));
        }

        /*
            * Lấy danh sách contact *
        */
        function index(){
        	// lấy ra danh sách khách hàng liên hệ
        	$list = $this->contact_model->get_list();
        	$this->data['list'] = $list;
        	
        	// lấy ra tổng số khách hàng liên hệ
        	$total = count($list);
        	$this->data['total'] = $total;
        	// load view
        	$this->data['temp'] = 'admin/contact/index';
        	$this->load->view('admin/main',$this->data);
        }

        /*
            * Xóa khách hàng liên hệ *
        */
        function del(){
            $id = $this->uri->rsegment(3);
            $id = intval($id);
            
            $this->_del($id);

            
            // tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'xóa dữ liệu thành công');
            redirect(admin_url('contact'));
        }
        
        /*
             * Xóa nhiều sản phẩm *
         */
        function delete_all(){
            $ids = $this->input->post('ids');
            foreach ($ids as $id)
            {
                $this->_del($id);
            }
        }
        
        /*
            * Xoa san pham *
         */
        private function _del($id){
            $transaction = $this->contact_model->get_info($id);
            if(!$transaction)
            {
                // tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'không tồn tại giao dịch này');
                redirect(admin_url('contact'));
            }
            // thuc hien xoa san pham
            $this->contact_model->delete($id);
        }

    }
?>