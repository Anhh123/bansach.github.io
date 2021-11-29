<?php
    Class Home extends MY_Controller
    {
    	function __construct(){
    		parent::__construct();
    		$this->load->model('transaction_model');
            $this->load->model('order_model');
            if($this->getPermission() != 1)
            redirect(admin_url('permission/deny'));
    	}

        /*
            * Lấy danh sách tư vấn mua hàng *
        */
        function index(){
            // lấy danh sách bảng transaction
            $list = $this->transaction_model->get_list();
            $this->data['list'] = $list;

            $list_order = $this->order_model->get_list();
            $this->data['list_order'] = $list_order;

            // load view
            $this->data['temp'] = 'admin/home/index';
            $this->load->view('admin/main',$this->data);
        }

         /*
            * Xoa du lieu *
         */
        function del(){
            $id = $this->uri->rsegment(3);
            $id = intval($id);
            $this->_del($id);
            
            // tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'xóa dữ liệu thành công');
            redirect(admin_url('home'));
        }

        /*
            Xóa nhiều sản phẩm *
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
            $transaction = $this->transaction_model->get_info($id);
            if(!$transaction)
            {
                // tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'không tồn tại giao dịch này');
                redirect(admin_url('home'));
            }
            // thuc hien xoa san pham
            $this->transaction_model->delete($id);
        }

        /*
             * Xoa du lieu *
         */
        function del_order(){
            $id = $this->uri->rsegment(3);
            $id = intval($id);
            $this->_del_order($id);
            // tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'xóa dữ liệu thành công');
            redirect(admin_url('home'));
        }

        /*
            * Xóa nhiều sản phẩm *
         */
        function delete_order(){
            $ids = $this->input->post('ids');
            foreach ($ids as $id)
            {
                $this->_del_order($id);
            }
        }

        /*
            * Xoa san pham *
         */
        private function _del_order($id){
            $transaction = $this->order_model->get_info($id);
            if(!$transaction)
            {
                // Tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'không tồn tại giao dịch này');
                redirect(admin_url('home'));
            }
            // Thuc hien xoa san pham
            $this->order_model->delete($id);
        }

    }
?>