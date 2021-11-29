<?php
    Class Post extends MY_Controller
    {
    	function __construct(){
    		parent::__construct();
    		$this->load->model('post_model');
    		$this->load->model('menu_model');
    	}

    	/*
    	   * Lay danh sach bai viet
    	*/
    	function index(){
    		// lấy ra menu cha
    		$input = array();
    		$input['where'] = array('parent_id' => 0);
    		$menu = $this->menu_model->get_list($input);
    		foreach($menu as $value)
    		{
    			$input_1 = array();
    			$input_1['where'] = array('parent_id' => $value->id);
    			$sub_menu = $this->menu_model->get_list($input_1);
    			$value->sub_menu = $sub_menu;
    		}
    		$this->data['menu'] = $menu;

    		// lay thong bao message
    		$message = $this->session->userdata('message');
    		$this->data['message'] = $message;

    		// lấy tổng số tất cả các bài viết
    		$total_rows = $this->post_model->get_total();
    		$this->data['total_rows'] = $total_rows;

    		// load ra thu vien phan trang
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
            $config['base_url']   = admin_url('post/index'); //link hien thi ra danh sach san pham
            $config['per_page']   = 3;//so luong san pham hien thi tren 1 trang
            $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
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
            $name = $this->input->get('name');
            if($name)
            {
                $input['like'] = array('title', $name);
            }

            $catalog_id = $this->input->get('catalog');
            $catalog_id = intval($catalog_id);

            if($catalog_id > 0)
            {
                $input['where']['menu_id'] = $catalog_id;
            }
            // lay danh sach san pham theo ngày  
            $input['order'] = array('created','DESC');
            $list_one = $this->post_model->get_list($input);
                $buy = array();
                foreach ($list_one as $key => $value) {
                    //lay slug catalog cua tung bai viet
                    $value->slug_catalog = $this->menu_model->get_info($value->menu_id)->slug;
                    $buy[]= $value;
                }
                $this->data['buy'] = $buy;
    		// load view
    		$this->data['temp'] = 'admin/post/index';
    		$this->load->view('admin/main',$this->data);
    	}

    	/*
    	   * them moi bai viet
    	*/
    	function add(){
    		// lây ra danh sach danh mục cha
    		$this->load->model('menu_model');
    		$input = array();
    		$input['where'] = array('parent_id' => 0);
    		$menu = $this->menu_model->get_list($input);
    		// lấy ra danh mục con của mỗi danh mục cha
    		foreach($menu as $key=>$value)
    		{
    			$input = array();
    			$input['where'] = array('parent_id' => $value->id);
    			$sub_menu = $this->menu_model->get_list($input);
    			$value->sub_menu = $sub_menu;
    		}
    		$this->data['menu'] = $menu;

    		// load thu vien library form_validation va helper form
    		$this->load->library('form_validation');
    		$this->load->helper('form');
    		if($this->input->post())
    		{
    			$this->form_validation->set_rules('title','Tiêu đề','required');
    			$this->form_validation->set_rules('menu','Thể loại','required');
    			if($this->input->post('slug') != '')
    				{
    	             $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');
    				}

    			if($this->form_validation->run())
    			{
    				// lấy giá trị post lên
    				$title = $this->input->post('title');
    				$menu_id = $this->input->post('menu');
    				$image_link = $this->input->post('image');
    				$image_list = $this->input->post('image_list');
                    $content = $this->input->post('content');
                    // lưu vào cơ sở dữ liệu
                    $data = array(
                    	'title' => $title,
                    	'menu_id' => $menu_id,
                    	'site_title' => $this->input->post('site_title'),
                        'meta_desc'  => $this->input->post('meta_desc'),
                        'meta_key'   => $this->input->post('meta_key'),
                        'status'     => $this->input->post('status'),
                        'content'    => $content,
                        'image_link' => $image_link,
                        'image_list' => json_encode($image_list),
                        'created'    => now(),
                    	);
                    if($this->input->post('slug') == '')
                    {
                    	$data['slug'] = str_slug($title);
                    }else
                    {
                    	$data['slug'] = $this->input->post('slug');
                    }

                    if($this->post_model->create($data))
                    {
                    	$this->session->set_flashdata('message','thêm mới thành công');
                    }else
                    {
                    	$this->session->set_flashdata('message','không thêm được');
                    }
                    redirect(admin_url('post'));
    			}
    		}
    		// load view
    		$this->data['temp'] = 'admin/post/add';
    		$this->load->view('admin/main',$this->data);
    	}

    	/*
    	   * chỉnh sửa bài viết
    	*/
    	function edit(){
    		// lây ra danh sach danh mục cha
    		$this->load->model('menu_model');
    		$input = array();
    		$input['where'] = array('parent_id' => 0);
    		$menu = $this->menu_model->get_list($input);
    		// lấy ra danh mục con của mỗi danh mục cha
    		foreach($menu as $key=>$value)
    		{
    			$input = array();
    			$input['where'] = array('parent_id' => $value->id);
    			$sub_menu = $this->menu_model->get_list($input);
    			$value->sub_menu = $sub_menu;
    		}
    		$this->data['menu'] = $menu;

    		// lấy thông tin theo id
    		$id = $this->uri->rsegment(3);
    		$id = intval($id);
    		$info = $this->post_model->get_info($id);
    		if(!$info)
    		{
    			$this->session->set_flashdata('message','không tồn tại bài viết này');
    			redirect(admin_url('post'));
    		}
    		$this->data['info'] = $info;

    		// load thư viện form_validation và helper form
    		$this->load->library('form_validation');
    		$this->load->helper('form');

    		if($this->input->post())
    		{
    			$this->form_validation->set_rules('title','Tiêu đề','required');
    			$this->form_validation->set_rules('menu','Thể loại','required');
    			if($this->input->post('slug') != '')
    				{
    	             $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');
    				}

    			if($this->form_validation->run())
    			{
    				// lấy giá trị post lên
    				$title = $this->input->post('title');
    				$menu_id = $this->input->post('menu');
    				$image_link = $this->input->post('image');
    				$image_list = $this->input->post('image_list');
                    $content = $this->input->post('content');
                    // lưu vào cơ sở dữ liệu
                    $data = array(
                    	'title' => $title,
                    	'menu_id' => $menu_id,
                    	'site_title' => $this->input->post('site_title'),
                        'meta_desc'  => $this->input->post('meta_desc'),
                        'meta_key'   => $this->input->post('meta_key'),
                        'status'     => $this->input->post('status'),
                        'content'    => $content,
                        'image_link' => $image_link,
                        'image_list' => json_encode($image_list),
                        'created'    => now(),
                    	);
                    if($this->input->post('slug') == '')
                    {
                    	$data['slug'] = str_slug($title);
                    }else
                    {
                    	$data['slug'] = $this->input->post('slug');
                    }

                    if($this->post_model->update($info->id,$data))
                    {
                    	$this->session->set_flashdata('message','Cập nhật thành công');
                    }else
                    {
                    	$this->session->set_flashdata('message','không thêm được');
                    }
                    redirect(admin_url('post'));
    			}
    		}

    		// load view
    		$this->data['temp'] = 'admin/post/edit';
    		$this->load->view('admin/main',$this->data);
    	}

    	 /*
            * Xoa du lieu
         */
        function del(){
            $id = $this->uri->rsegment('3');
            $this->_del($id);

            // tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Xóa thành công');
            redirect(admin_url('post'));
        }

        /*
            * Xóa nhiều sản phẩm
         */
        function delete_all(){
            $ids = $this->input->post('ids');
            foreach ($ids as $id)
            {
                $this->_del($id);
            }
        }

        /*
            * Xoa san pham
         */
        private function _del($id){
            $post = $this->post_model->get_info($id);
            if(!$post)
            {
                // tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'không tồn tại bài viết này');
                redirect(admin_url('post'));
            }
            // thuc hien xoa san pham
            $this->post_model->delete($id);
        }

        /*
            * Check *
         */
        function _check_slug(){
            $slug = $this->input->post('slug');
            $info = $this->post_model->get_info($this->uri->rsegment(3));
            if($this->uri->rsegment('3')){
                $conditional = $this->post_model->get_list(array('where'=>array('slug !=' =>$info->slug,'slug'=>$slug)));
            }
            else{
                $conditional = $this->post_model->get_list(array('where'=>array('slug'=>$slug)));
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
