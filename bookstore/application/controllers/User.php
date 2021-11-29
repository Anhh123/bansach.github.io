<?php 
Class User extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	/*
		// Hàm check_email kiểm tra email đã tồn tại chưa
	*/
	function check_email() {
		$email = $this->input->post('email');
		$where = array('email' => $email);

		//dùng hàm check_exists() kiểm tra xem email đã tồn tại chưa
		//nếu chạy hàm này chứng tỏ email đã tồn tại
		if($this->user_model->check_exists($where)) {
			$this->form_validation->set_message(__FUNCTION__,'Email này đã tồn tại');
			return false;
		}else {
			return true;
		}
	}

	/*
		// Đăng ký thành viên
	*/
	function register()
	{
		//nếu thành viên đăng nhập rồi thì chuyển về trang chủ
		if($this->session->userdata('user_id_login')) {
			redirect();
		}

		//form_validat dữ liêu
		$this->load->library('form_validation');
		$this->load->helper('form');

		//nếu có dữ liệu post lên
		if($this->input->post()) {
			$this->form_validation->set_rules('name','Họ và tên','required');
			$this->form_validation->set_rules('phone','Số điện thoại','required');
			$this->form_validation->set_rules('address','Địa chỉ','required');
			$this->form_validation->set_rules('email','Email','required|valid_email|callback_check_email');
			$this->form_validation->set_rules('password','Mật khẩu đăng nhập','required|min_length[4]');
			$this->form_validation->set_rules('re_password','Nhập lại mật khẩu','matches[password]');

			//nếu nhập liệu chính xác
			if($this->form_validation->run()) {
				
				//lấy các giá trị nhập vào
				$name     = $this->input->post('name');
				$phone    = $this->input->post('phone');
				$address  = $this->input->post('address');
				$email    = $this->input->post('email');
				$password = $this->input->post('password');
				//thêm vào cơ sở dữ liệu
				$data = array(
					'name'     => $name,
					'phone'    => $phone,
					'address'  => $address,
					'email'    => $email,
					'password' => md5($password),
					'created'  => now(),
					);
				if($this->user_model->create($data)) {
					$this->session->set_flashdata('message','Đăng ký thành công');
					redirect();
				}else {
					$this->session->set_flashdata('message','Không đăng ký được');
					redirect(base_url('user/register'));

				}
			}

		}
		// load view
		$this->data['temp'] = 'site/user/register';
		$this->load->view('site/head/head-account',$this->data);
		$this->load->view('site/header/header-no-active',$this->data);
		$this->load->view('site/section/section-register',$this->data);
		$this->load->view('site/layout/layout_chung',$this->data);

	}

		/*
			// Kiểm tra đăng nhập
		*/
		function login(){

			// nếu thành viên đăng nhập rồi thì chuyển về trang chủ
			if($this->session->userdata('user_id_login')) {
				redirect(site_url('user/index'));
			}
			$this->load->library('form_validation');
	        $this->load->helper('form');
	        if($this->input->post()) {
	        	$this->form_validation->set_rules('email','Email đăng nhập','required|valid_email');
						$this->form_validation->set_rules('password','Mật khẩu đăng nhập','required|min_length[4]');
	          $this->form_validation->set_rules('login' ,'Login', 'callback_check_login');
	          if($this->form_validation->run()) {

	            	// sau khi đăng nhập thành công lấy ra thông tin thành viên
	            	$user = $this->_get_user_info();
	            	
            		// gắn session id của thành viên
                $this->session->set_userdata('user_id_login', $user->id);
                $this->session->set_flashdata('message','Đăng nhập thành công');
                redirect();
	            }
	        }

			// load view
			$this->data['temp'] = 'site/user/login';
			$this->load->view('site/head/head-account',$this->data);
			$this->load->view('site/header/header-no-active',$this->data);
			$this->load->view('site/section/section-register',$this->data);
			$this->load->view('site/layout/layout_chung',$this->data);
		}

		/*
	    * Kiem tra username va password co chinh xac khong
	  */
	    function check_login(){
	        $user = $this->_get_user_info();
	        if($user) {
            return true;
	        }
	        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
	        return false;
	    }

		/*
		// Lấy thông tin thành viên
		*/
		private function _get_user_info(){
			$email = $this->input->post('email');
      $password = $this->input->post('password');
      $password = md5($password);

      $this->load->model('user_model');
      $where = array('email' => $email , 'password' => $password);
      $user  = $this->user_model->get_info_rule($where);
      return $user;
		}

		/*
		// Thông tin của thành viên
		*/
		function index(){

			if(!$this->session->userdata('user_id_login')) {
				redirect();
			}

			// lấy thông tin thành viên
			$user_id = $this->session->userdata('user_id_login');
			$user = $this->user_model->get_info($user_id);
			if(!$user) {
				redirect();
			}
			$this->data['user'] = $user;

			// load view
			$this->data['temp'] = 'site/user/index';
			$this->load->view('site/head/head-account',$this->data);
			$this->load->view('site/header/header-no-active',$this->data);
			$this->load->view('site/section/section-register',$this->data);
			$this->load->view('site/layout/layout_chung',$this->data);
		}

		/*
		// Chinh sửa thành viên
		*/
		function edit(){
			// Nếu chưa đăng nhập rồi thì chuyển về trang Login
			if(!$this->session->userdata('user_id_login'))
			{
				redirect(site_url('user/login'));
			}
			// lấy thông tin thành viên
			$user_id = $this->session->userdata('user_id_login');
			$user = $this->user_model->get_info($user_id);
			if(!$user) {
				redirect();
			}
			$this->data['user'] = $user;

			//load thư viên form_validation và helper form
			$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post())//nếu có dữ liệu post lên
			{
				$password = $this->input->post('password');
				if($password) {
					$this->form_validation->set_rules('password','Mật khẩu đăng nhập','required|min_length[4]');
					$this->form_validation->set_rules('re_password','Nhập lại mật khẩu','matches[password]');
				}

				$this->form_validation->set_rules('name','Họ & tên','required');
				$this->form_validation->set_rules('phone','Số điện thoại','required|min_length[9]');
				$this->form_validation->set_rules('address','Địa chỉ','required');

				// nếu nhập liệu chính xác
				if($this->form_validation->run())
				{
					//lấy các giá trị nhập vào
					$name = $this->input->post('name');
					$phone = $this->input->post('phone');
					$address = $this->input->post('address');

					//thêm vào cơ sở dữ liệu
					$data = array(
						'name'     => $name,
						'phone'    => $phone,
						'address'  => $address,
					);
					if($password) {
						$data['password'] = md5($password);
					}
					if($this->user_model->update($user_id, $data)) {
						$this->session->set_flashdata('message','Cập nhật thông tin thành công');
					}else {
						$this->session->set_flashdata('message','Cập nhaath thông tin thất bại');
					}
					redirect(site_url('user/index'));
				}

			}

			// load view
			$this->data['temp'] = 'site/user/edit';
			$this->load->view('site/head/head-account',$this->data);
			$this->load->view('site/header/header-no-active',$this->data);
			$this->load->view('site/section/section-register',$this->data);
			$this->load->view('site/layout/layout_chung',$this->data);
		}


		/*
	     * Thuc hien dang xuat
	     */
	    function logout(){
	        if($this->session->userdata('user_id_login')) {
            $this->session->unset_userdata('user_id_login');
	        }
	        $this->session->set_flashdata('message','Đăng xuất thành công');
	        redirect();
	    }
	}
?>