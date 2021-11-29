<?php
    Class Admin extends MY_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('admin_model');
        }
        // End Construct
        

        /*
             * Lấy ra danh sách Admin *
         */
        function index(){
            $input = array();
            $input['order'] = array('id','ASC');
            $list = $this->admin_model->get_list($input);
            $this->data['list'] = $list;
            
            $total = $this->admin_model->get_total();
            $this->data['total'] = $total;
            
            //lay nội dung của biến message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            
            $this->data['temp'] = 'admin/admin/index';
            $this->load->view('admin/main', $this->data);
        }
        // End Index
        

        /*
            * Lấy danh sách thành viên *
        */
        function user(){
            $this->load->model('user_model');

            $input = array();
            $list_user = $this->user_model->get_list($input);
            $this->data['list_user'] = $list_user;
        
            $total = $this->user_model->get_total();
            $this->data['total'] = $total;
            
            //lay nội dung của biến message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            
            $this->data['temp'] = 'admin/user/index';
            $this->load->view('admin/main', $this->data);
        }
        // End User
        

        /*
            *  Kiểm tra username đã tồn tại chưa *
         */
        function check_username(){
            $info = $this->admin_model->get_info($this->uri->rsegment(3));

                $username = $this->input->post('username');
                if($this->uri->rsegment(3))
                {
                    $where = $this->admin_model->get_list(array('where'=>array('username !=' =>$info->username,'username'=>$username)));
                }
                else{
                    $where = $this->admin_model->get_list(array('where'=>array('username'=>$username)));
                }

                if($where)
                {
                    //trả về thông báo lỗi
                    $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
                    return false;
                }
                return true;
        }
        // End Check username
        

        /*
            * Thêm mới quản trị viên *
         */
        function add(){
            if($this->getPermission() != 1)
                redirect(admin_url('permission/deny'));

            $this->load->library('form_validation');
            $this->load->helper('form');
            
            // Nếu mà có dữ liệu lên thì kiểm tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name', 'Tên', 'required|min_length[6]');
                $this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required|callback_check_username');
                $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
                $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
                
                // Nhập liệu chính xác
                if($this->form_validation->run())
                {
                    // Thêm vào csdl
                    $name     = $this->input->post('name');
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    
                    $data = array(
                        'name'     => $name,
                        'username' => $username,
                        'password' => md5($password),
                        'level'    => $this->input->post('level')
                    );
                    if($this->admin_model->create($data))
                    {
                        // Tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    // Chuyển tới trang danh sách quản trị viên
                    redirect(admin_url('admin'));
                }
            }
            
            $this->data['temp'] = 'admin/admin/add';
            $this->load->view('admin/main', $this->data);
        }
        // End Add
        

        /*
            * Hàm chỉnh sửa thông tin quản trị viên *
         */
        function edit(){
            if($this->getPermission() != 1)
            redirect(admin_url('permission/deny'));
        
            // lấy id của quản trị viên cần chỉnh sửa
            $id = $this->uri->rsegment('3');
            $id = intval($id);
            
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            // lấy thông tiin của quản trị viên
            $info  = $this->admin_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
                redirect(admin_url('admin'));
            }
            $this->data['info'] = $info;
            
            if($this->input->post())
            {
                $this->form_validation->set_rules('name', 'Tên', 'required|min_length[6]');
                $this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required|callback_check_username');
                
                $password = $this->input->post('password');
                if($password)
                {
                    $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
                    $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
                }
                if($this->form_validation->run())
                {
                    // Thêm vào csdl
                    $name     = $this->input->post('name');
                    $username = $this->input->post('username');
                   
                    $data = array(
                        'name'     => $name,
                        'username' => $username,
                        'level'     => $this->input->post('level')
                    );

                    // Nếu mà thây đổi mật khẩu thì mới cập nhật dữ liệu
                    if($password)
                    {
                        $data['password'] = md5($password);
                    }
                    
                    if($this->admin_model->update($id, $data))
                    {
                        // Tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không cập nhật được');
                    }
                    // Chuyển tới trang danh sách quản trị viên
                    redirect(admin_url('admin'));
                }
            }
            
            $this->data['temp'] = 'admin/admin/edit';
            $this->load->view('admin/main', $this->data);
        }
        // End Edit
        

        /*
            * Hàm xóa dữ liệu *
         */
        function delete(){
            if($this->getPermission() != 1)
            redirect(admin_url('permission/deny'));

            $id = $this->uri->rsegment('3');
            $id = intval($id);
            // Lấy thông tin của quản trị viên
            $info = $this->admin_model->get_info($id);
            if(!$info)
            {
                $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
                redirect(admin_url('admin'));
            }
            // Thực hiện xóa
            $this->admin_model->delete($id);
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
            redirect(admin_url('admin'));
        }
        // End Delete
        

        /*
            * Thực hiện đăng xuất
         */
        function logout(){
            if($this->session->userdata('login'))
            {
                $this->session->unset_userdata('login');
            }
            redirect(admin_url('login'));
        }
        // End logout
        
    }
?>



