<?php
	Class News extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('news_model');
		}

		/*
		//Lấy danh sách tin tức
		*/
		function index(){
			//lấy ra tin tức nổi bật
			$input = array();
			$input['where'] = array('status' => 1);
			$list_status = $this->news_model->get_list($input);
			$this->data['list_status'] = $list_status;

			// lay tong so luong ta bài viết tin tức có trong website
	        $total_rows = $this->news_model->get_total();
	        $this->data['total_rows'] = $total_rows;
	        $slug_catalog = $this->uri->segment(1);
	        $slug_catalog = strtolower($slug_catalog);
	        // die();

	        // load ra thu vien phan trang
	    	$this->load->library('pagination');
	        $config = array();
	        $config['base_url']   = base_url( $slug_catalog.'/page');
	        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
	        $config['per_page']   = 6;//so luong san pham hien thi tren 1 trang
	        $config['cur_tag_open'] = '<a onclick="return false;" style="background:#ddd">';
	        $config['cur_tag_close'] = '</a>';
	        $config['uri_segment'] = 3;//phan doan hien thi ra so trang tren url
	        $config['next_link']   = 'Trang kế tiếp';
	        $config['prev_link']   = 'Trang trước';

	        // khoi tao cac cau hinh phan trang
	        $this->pagination->initialize($config);
	        $segment = $this->uri->rsegment(3);
	        $segment = intval($segment);
	        $input_1 = array();
	        $input_1['limit'] = array($config['per_page'], $segment);

	        // lấy tất cả các tin tức trừ tin tức nổi bật
			$list_all = $this->news_model->get_list($input_1);
			$this->data['list_all'] = $list_all;

			// load view
			$this->data['temp'] = 'site/news/index';
			// Head
			$this->load->view('site/head/head-new', $this->data);
			// Header
			$this->load->view('site/header/header-blog', $this->data);
			//Section
			$this->load->view('site/section/section-new', $this->data);
			// Footer
      $this->load->view('site/layout/layout_chung', $this->data);
		}

		/*
		//Hiển thị ta nài viết tin tức
		*/
		function news_view(){
			// lay thong tin bai viet theo slug
			$slug = $this->uri->rsegment(3);
			$where = array('slug' => $slug);
			$info = $this->news_model->get_info_rule($where);
			if(!$info)
			{
				redirect();
			}
			$this->data['info'] = $info;

			// cập nhật lại lượt xem
	        $data = array();
	        $data['count_view'] = $info->count_view + 0.5;
	        $this->news_model->update($info->id,$data);

			 /*
	        // lấy danh sách tin tức liên quan
	        */
	        $input = array();
	        $id = $info->id;
	        if(isset($id)){
	            $this->db->where('id <>', $info->id);//hoặc sử dụng $this->db->where('id !=', $id);
	        }
	        $input['limit'] = array(3,0);
	        $related_news = $this->news_model->get_list($input);
	        $this->data['related_news'] = $related_news;

			// load view
			$this->data['temp'] = 'site/news/view';
			// Head
			$this->load->view('site/head/head-new', $this->data);
			// Header
			$this->load->view('site/header/header-blog', $this->data);
			//Section
			$this->load->view('site/section/section-new-view', $this->data);
			// Footer
            $this->load->view('site/layout/layout_chung', $this->data);
		}
	}
?>