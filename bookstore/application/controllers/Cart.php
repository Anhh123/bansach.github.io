<?php
	Class Cart extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
		}

		/*
		//Thêm sản phẩm vào giỏ hang
		*/
		function add(){

			// lấy ra sản phẩm muốn thêm vào giỏ hàng
			$id = $this->uri->rsegment(3);
			$id = intval($id);

			//lấy thông tin sản phẩm theo id
			$this->load->model('product_model');
			$product = $this->product_model->get_info($id);
			if(!$product) {
				redirect();
			}

			// thông tin sản phẩm thêm vào giỏ hàng
			if($this->input->post()) {
				$qty = $this->input->post('qty');
				$qty = intval($qty);
			}else {
				$qty = 1;
			}

			$price = $product->price;

			if($product->discount > 0) {
				$price = $product->price - $product->discount;
			}
			$data = array();
			$data['id']         = $product->id;
			$data['qty']        = $qty;
			$data['slug']       = $product->slug;
			$data['name']       = $product->name;
			$data['tac_gia']    = $product->tac_gia;
			$data['xuat_ban']   = $product->xuat_ban;
			$data['nxb']       	= $product->nxb;
			$data['nph']        = $product->nph;
			$data['kich_thuoc'] = $product->kich_thuoc;
			$data['khoi_luong'] = $product->khoi_luong;
			$data['so_trang']   = $product->so_trang;
			$data['image_link'] = $product->image_link;
			$data['price']      = $price;

			if(!empty($product->ma_sp)) {
				$data['ma_sp']  = $product->ma_sp;
			}

			$this->cart->insert($data);
			redirect(base_url('gio-hang'));
		}

		/*
		// Hiện thị ra các sản phẩm trong giỏ hàng
		*/
		function customer(){

		//lấy thông tin giỏ hàng
		$carts = $this->cart->contents();
		$this->data['carts'] = $carts; //truyền sang view chú ý biến này là mảng dữ liệu

		//tổng số sản phẩm có trong giỏ hàng
		$total_items = $this->cart->total_items();
		if($total_items < 0) {
			redirect();
		}

		//Nếu thành viên đã đăng nhập thì lấy thông tin thành viên
		$user_id = 0;
		$user = '';
		if($this->session->userdata('user_id_login')) {

			//lấy thông tin
			$user_id = $this->session->userdata('user_id_login');
			$user    = $this->user_model->get_info($user_id);
		}
		$this->data['user'] = $user;

		//lấy tổng số tiền cần thanh toán
		$total_amount = 0;
		foreach($carts as $row) {
			$total_amount = $total_amount + $row['subtotal'];
		}
		$this->data['total_amount'] = $total_amount;

		//nhận thông báo từ biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		
		//load thư viên form_validation và helper form
		$this->load->library('form_validation');
		$this->load->helper('form');

		//nếu có dữ liệu post lên
		if($this->input->post()) {
				$this->form_validation->set_rules('email','Email đăng nhập','required|valid_email');
				$this->form_validation->set_rules('name','Họ và tên','required');
				$this->form_validation->set_rules('phone','Số điện thoại','required');
				$this->form_validation->set_rules('message','Ghi chú','required');

			//$this->form_validation->set_rules('payment','Cổng thanh toán','required');
			//nếu nhập liệu chính xác
			if($this->form_validation->run()) {
				// lấy các giá trị nhập vào
				$user_email   = $this->input->post('email');
				$user_name    = $this->input->post('name');
				$user_phone   = $this->input->post('phone');
				$message      = $this->input->post('message');
				$address      = $this->input->post('address');
				$payment      = $this->input->post('type');
				$payment_info = $this->input->post('type1');
				$thanhpho     = $this->input->post('thanh_pho');
				
				//thêm vào cơ sở dữ liệu
				$data = array(
					'status'        => 0,//trạng thái chưa thanh toán
					'user_id'       =>$user_id,//id thành viên mua hàng nếu đã đăng nhập
					'user_name'     => $user_name,
					'user_email'    => $user_email,
					'user_phone'    => $user_phone,
					'address'       => $address.'-'.$thanhpho,
					'message'       => $message, //ghi chú khi mua hàng
					'amount'        =>$total_amount,//tổng số tiền cần thanh toán
					//'payment'		=>$payment,//cổng thanh toán
					'created'       =>now(),
				);
				if($payment == 'Individual') {
					$data['payment'] = 'Thanh toán khi nhận hàng';
				}else {
					$data['payment'] = 'Chuyển khoản';
				}
        if($payment_info == 'Individual1') {
            $data['payment_info'] = 'Giao tận nơi';
            $data['phi'] = 20000;
        }else {
            $data['payment_info'] = 'Nhận tại cửa hàng';
            $data['phi'] = 0;
        }

				//thêm dữ liệu vào transaction
				$this->load->model('transaction_model');
				$this->transaction_model->create($data);
				$transaction_id = $this->db->insert_id(); //lấy ra id giao dịch vừa thêm vào

				//thêm vào bảng order(chi tiết đơn hàng)
				$this->load->model('order_model');

				//lặp các sản phẩm trong giỏ hàng và thêm từng sản phẩm vào bảng order
				foreach($carts as $row) {
					$data = array(
						'transaction_id' => $transaction_id,
						'product_id'     => $row['id'],
						'qty'            => $row['qty'],
						'amount'         => $row['subtotal'],
						'status'         => 0,
						'product_name'   => $row['name'],
						'image_link'     => $row['image_link'],
						);
					$this->order_model->create($data);
				}

				// Sau khi thêm xong xóa toàn bộ giỏ hàng
				$this->cart->destroy();
				redirect(base_url('cart/info'));
				/*
				thanh toán online
				if($payment == 'offline')
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message','Bạn đã đặt hàng thành công, chúng tôi sẽ kiểm tra và gửi hàng');
					//chuyển tới trang chủ (nên chuyển đến trang chi tiết đơn hàng)
					redirect();
				}elseif(in_array($payment, array('nganluong','baokim')))
				{
					//load thư viện payment
					$this->load->library('payment/'.$payment .'_payment');
					//chuyển sang cổng thanh toán		
				}
				*/	
			}
		}

			//load view
			$this->data['temp'] = 'site/cart/customer';
			$this->load->view('site/layout/layout-cart', $this->data);
		}

		/*
		// Cập nhật giỏ hàng
		*/
		function update(){
			// lấy thông tin giỏ hàng
		    $carts = $this->cart->contents();
		    $id = isset($_POST['rowid']) ? $_POST['rowid'] : false;
			$number = isset($_POST['qty']) ? (int)$_POST['qty'] : false;

			//lấy số lượng sản phẩm
			$data = array();
			$data['rowid'] = $id;//cập nhất sản phẩm có rowid bằng $key
			$data['qty'] = $number;
			$this->cart->update($data);

			//chuyển về trang thông tin giỏ hang
			redirect(base_url('gio-hang'));
		}

		/*
		// Xóa sản phẩm trong gio hàng
		*/
		function delete(){
			$id = $this->uri->rsegment(3);
			$id = intval($id);

			//Trường hợp xóa 1 sản phẩm
			//chứng tỏ xóa 1 sản phẩm
			if($id > 0) {

				//lấy thông tin giỏ hàng
				$carts = $this->cart->contents();

				foreach ($carts as $key => $row) {
					if($row['id'] == $id) {

						//cập nhật qty = 0 là được
						$data = array();

						//cập nhất sản phẩm có rowid bằng $key
						$data['rowid'] = $key;
						$data['qty'] = 0;
						$this->cart->update($data);
					}
				}
			}else {

				// Xóa toàn bộ giỏ hàng
				$this->cart->destroy();
			}

			// Chuyển về trang thông tin giỏ hang
			redirect(base_url('gio-hang'));
		}

		function info(){
			
			// lấy thông báo message
			$message = $this->session->userdata('message');
			$this->data['message'] = $message;

			//load view
			$this->data['temp'] = 'site/cart/info';
			$this->load->view('site/layout/layout-cart', $this->data);
		}
	}
?>