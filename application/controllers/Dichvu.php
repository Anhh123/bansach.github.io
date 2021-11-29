<?php
	Class Dichvu extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('dichvu_model');
		}

		/*
		//Lấy danh sách tin tức
		*/
		function index(){
			// lấy ra tin tức nổi bật
			$input = array();
			$input['where'] = array('status' => 1);
			$list_status = $this->dichvu_model->get_list($input);
			$this->data['list_status'] = $list_status;

			// lay tong so luong ta bài viết tin tức có trong website trừ tin nôi bật
			$total_rows = $this->dichvu_model->get_total();

	        $this->data['total_rows'] = $total_rows;
	         $slug_catalog = $this->uri->segment(1);
	        $slug_catalog = strtolower($slug_catalog);
	        // die();
	        // load ra thu vien phan trang
	       $this->load->library('pagination');
	        $config = array();
	        $config['base_url']   = base_url( $slug_catalog.'/page'); 
	        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
	        $config['per_page']   = 8;//so luong san pham hien thi tren 1 trang
	        $config['cur_tag_open'] = '<a onclick="return false;" style="background:#9966CC">';
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

	        //l ấy tất cả các tin tức trừ tin tức nổi bật
			$list_all = $this->dichvu_model->get_list($input_1);
			$this->data['list_all'] = $list_all;

			// load view
			$this->data['temp'] = 'site/dichvu/index';
			$this->load->view('site/layout/layouthome',$this->data);
		}

		/*
		//hien thi bai viet tin tuc
		*/
		function view(){
			//lay thong tin bai viet theo slug
			$slug = $this->uri->rsegment(3);
			$info = $this->dichvu_model->get_list(array('where'=>array('slug'=>$slug)));
			// $info = $this->dichvu_model->get_info($id);

			if(!$info)
			{
				redirect();
			}
			$info = $info[0];
			$this->data['info'] = $info;

			// cập nhật lại lượt xem
	        $data = array();
	        $data['count_view'] = $info->count_view + 1;
	        $this->dichvu_model->update($info->id,$data);

			/*
	        //lấy danh sách tin tức liên quan
	        */
	        $input = array();

	        if(isset($info->id))
	        {
	            $this->db->where('id <>', $info->id);//hoặc sử dụng $this->db->where('id !=', $id);
	        }

	        $input['limit'] = array(4,0);
	        $related_dichvu = $this->dichvu_model->get_list($input);
	        $this->data['related_dichvu'] = $related_dichvu;
			//load view
			$this->data['temp'] = 'site/dichvu/view';
			$this->load->view('site/layout/layouthome',$this->data);
		}

	}
?>