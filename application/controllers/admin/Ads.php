<?php
    Class Ads extends MY_Controller
    {
    	function __construct(){
    		parent::__construct();
    		$this->load->model('ads_model');
            if($this->getPermission() != 1)
            redirect(admin_url('permission/deny'));

    	}
        // End
        

    	/*
    	   * lấy danh sách ads *
    	*/
    	function index(){
    		// lấy tổng số ads
    		$total_ads = $this->ads_model->get_total();
    		$this->data['total_ads'] = $total_ads;

    		// lấy list danh sách ads
    		$input=array();
    		$list = $this->ads_model->get_list($input);
    		$this->data['list'] = $list;

    		// lấy thông tin biến message
    		$message = $this->session->flashdata('message');
    		$this->data['message'] = $message;

    		// load view
    		$this->data['temp'] = 'admin/ads/index';
    		$this->load->view('admin/main',$this->data);
    	}
        //  End
        

    	/*
    	   * Thêm ads *
    	*/
    	function add(){
    		// load thư viện validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');

            // Nếu mà dữ liệu post lên thì kiểm tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name', 'Tên', 'required');
                $this->form_validation->set_rules('vi_tri', 'Vị trí', 'required');
                $this->form_validation->set_rules('href', 'Link liên kế', 'required');

                //nhập liệu chính xác
                if($this->form_validation->run())
                {
                    // Thêm vào csdl
                    $name        = $this->input->post('name');
                    $vi_tri      = $this->input->post('vi_tri');
                    $href       = $this->input->post('href');

                    // lưu dữ liệu cần thêm
                    $data = array(
                        'name'       => $name,
                        'vi_tri'     =>  $vi_tri,
                        'image_link' => $this->input->post('image'),
                        'href'       => $href,
                        );

                    // Thêm mới vào csdl
                    if($this->ads_model->create($data))
                    {
                        // Tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm mới ads thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    // Chuyển tới trang danh sách
                    redirect(admin_url('ads/index'));
                }
            }

    		// load view
    		$this->data['temp'] = 'admin/ads/add';
    		$this->load->view('admin/main',$this->data);
    	}
        // End
        

    	/*
    	   * Chỉnh sữa ads *
    	*/
    	function edit(){
    		// lấy ra ads cần chỉnh sửa theo id
    		$id = $this->uri->rsegment(3);
    		$id = intval($id);
    		$ads = $this->ads_model->get_info($id);
    		if(!$ads)
    		{
    			$this->session->set_flashdata('message','không tồn tại ads này');
    			redirect('ads');
    		}
    		$this->data['ads'] = $ads;//gửi sang view

    		 // load thư viện validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');

            // Nếu có dữ liệu post lên
            if($this->input->post())
            {
            	$this->form_validation->set_rules('href','Link liên kết','required');
            	if($this->form_validation->run())//nếu nhập liệu chính xác
            	{

            		// lấy giá trị nhập vào
            		$href = $this->input->post('href');

                    // lưu dữ liệu cần thêm vào mảng data
                    $data = array();
                    $data['href'] = $href;
                    $data['image_link'] = $this->input->post('image');
                    $data['name'] = $this->input->post('name');
                    $data['vi_tri'] = $this->input->post('vi_tri');

                     // them moi vao csdl
                    if($this->ads_model->update($ads->id, $data))
                    {
                        // tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Cập nhật ads thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không cập nhật được');
                    }
                    // chuyen tới trang danh sách
                    redirect(admin_url('ads'));

            	}
            }

    		// load view
    		$this->data['temp'] = 'admin/ads/edit';
    		$this->load->view('admin/main',$this->data);
    	}
        //  End
        

    	/*
    	   * Xóa ads *
    	*/
    	function delete(){
    		$id = $this->uri->rsegment(3);
    		$id = intval($id);
    		$ads = $this->ads_model->get_info($id);
    		if(!$ads)
    		{
    			$this->session->set_flashdata('message','không tồn tại ads này');
    			redirect(admin_url('ads'));
    		}
    		// thực hiện xóa
    		$this->ads_model->delete($ads->id);
    		 $image_link = './upload/ads/'.$ads->image_link;
            if(file_exists($image_link))
            {
                unlink($image_link);
            }
            // tạo nội dung thông báo
            $this->session->set_flashdata('message','xóa ads thành công');
            redirect(admin_url('ads'));
    	}
        // End
        

    }
?>