<?php
    Class Menu extends MY_Controller
    {
    	function __construct(){
    		parent::__construct();
    		$this->load->model('menu_model');
    	}

    	/*
    	   * Lay danh sach menu *
    	*/
    	function index(){
    		// lay tat ca menu
    		$list_menu = $this->menu_model->get_list();
    		$this->data['list_menu'] = $list_menu;

    		// lay danh sach menu cha
    		$input = array();
    		$input['where'] = array('parent_id' => 0);
    		$input['order'] = array('sort_order','ASC');
    		$menu_parent = $this->menu_model->get_list($input);

    		// lay ra danh muc con trong danh muc cha do
    		foreach($menu_parent as $row)
    		{
    			$input_1 = array();
    			$input_1['where'] = array('parent_id' => $row->id);
    			$menu_sub = $this->menu_model->get_list($input_1);
    			$row->menu_sub = $menu_sub;
    		}
    		$this->data['menu_parent'] = $menu_parent;

    		// lay nội dung của biến message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

    		// load view
    		$this->data['temp'] = 'admin/menu/index';
    		$this->load->view('admin/main',$this->data);
    	}

    	/*
    	   * them moi danh sach menu *
    	*/
    	function add(){
    		// load thu vien form_validation va helper form
    		$this->load->library('form_validation');
    		$this->load->helper('form');

    		// lay danh sach danh muc cha
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $list = $this->menu_model->get_list($input);
            $this->data['list']  = $list;

            // neu ma co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('title', 'Tên', 'required');
                  if($this->input->post('slug') != '')
                    $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');

                // nhập liệu chính xác
                if($this->form_validation->run())
                {
                    // them vao csdl
                    $title       = $this->input->post('title');
                    $parent_id  = $this->input->post('parent_id');
                    $sort_order = $this->input->post('sort_order');
                    $status     = $this->input->post('status');
                    $meta_desc  = $this->input->post('meta_desc');
                    $meta_key   = $this->input->post('meta_key');
                    $site_title = $this->input->post('site_title');

                    // luu du lieu can them
                    $data = array(
                    'title'      => $title,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order),
                    'image_link' => $this->input->post('image'),
                    'meta_desc'  => $meta_desc,
                    'meta_key'   => $meta_key,
                    'site_title' => $site_title,
                    );

                    if($this->input->post('slug') == '')
                        $data['slug']  = str_slug($title);
                    else
                         $data['slug'] =$this->input->post('slug');

                    // them moi vao csdl
                    if($this->menu_model->create($data))
                    {
                        // tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    // chuyen tới trang danh sách
                    redirect(admin_url('menu'));
                }
            }
    		// load view
    		$this->data['temp'] = 'admin/menu/add';
    		$this->load->view('admin/main',$this->data);
    	}

    	/*
    	   * Chinh sua menu *
    	*/
    	function edit(){
    		// load thu vien form_validation va helper form
    		$this->load->library('form_validation');
    		$this->load->helper('form');

    		// lay thong tin theo id
    		$id = $this->uri->rsegment(3);
    		$info = $this->menu_model->get_info($id);
    		if(!$info)
    		{
    			$this->session->set_flashdata('message','Không tồn tại menu này');
    			redirect(admin_url('menu'));
    		}

    		$this->data['info'] = $info;

    		// lấy danh sách danh mục cha
    		 $input = array();
            $input['where'] = array('parent_id' => 0);
            $list = $this->menu_model->get_list($input);
            $this->data['list']  = $list;

            // neu ma co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('title', 'Tên', 'required');
                  if($this->input->post('slug') != '')
                    $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');

                // nhập liệu chính xác
                if($this->form_validation->run())
                {
                    // them vao csdl
                    $title       = $this->input->post('title');
                    $parent_id  = $this->input->post('parent_id');
                    $sort_order = $this->input->post('sort_order');
                    $status     = $this->input->post('status');
                    $meta_desc  = $this->input->post('meta_desc');
                    $meta_key   = $this->input->post('meta_key');
                    $site_title = $this->input->post('site_title');

                    //luu du lieu can them
                    $data = array(
                    'title'      => $title,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order),
                    'image_link' => $this->input->post('image'),
                    'meta_desc'  => $meta_desc,
                    'meta_key'   => $meta_key,
                    'site_title' => $site_title,
                    );

                    if($this->input->post('slug') == '')
                        $data['slug']  = str_slug($title);
                    else
                         $data['slug'] =$this->input->post('slug');

                     // them moi vao csdl
                    if($this->menu_model->update($info->id,$data))
                    {
                        // tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    // chuyen tới trang danh sách
                    redirect(admin_url('menu'));
                }
            }

    		// load view
    		$this->data['temp'] = 'admin/menu/edit';
    		$this->load->view('admin/main',$this->data);
    	}

    	/*
    	   * xóa menu *
    	*/
    	function delete(){
    		// lấy thông tin theo id
    		$id = $this->uri->rsegment(3);
    		$info = $this->menu_model->get_info($id);
    		if(!$info)
    		{
    			$this->session->set_flashdata('message','Không tồn tại menu này');
    			redirect(admin_url('menu'));
    		}
    		if($this->menu_model->delete($info->id))
    		{
    			$this->session->set_flashdata('message','xóa dữ liệu thành công');
    			redirect(admin_url('menu'));
    		}

    	}

    	/*
    	   * hàm check slug *
    	*/
    	function _check_slug(){
            $slug = $this->input->post('slug');
            $info = $this->menu_model->get_info($this->uri->rsegment(3));
            if($this->uri->rsegment('3')){
                $conditional = $this->menu_model->get_list(array('where'=>array('slug !=' =>$info->slug,'slug'=>$slug)));
            }
            else{
                $conditional = $this->menu_model->get_list(array('where'=>array('slug'=>$slug)));
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