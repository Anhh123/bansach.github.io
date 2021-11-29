<?php
    class Sanpham extends MY_Controller
    {

    	function __construct(){
    		parent::__construct();
    		 $this->load->model('catalog_model');
    		 $this->load->model('product_model');
    	}

    	function index(){
    		$slug_catalog = $this->uri->segment(1);
            $slug_catalog = strtolower($slug_catalog);

    		$this->db->select('id');
    		$cats = $this->catalog_model->get_list();
    		$products = array();
    		$cats_array = array();
    		foreach ($cats as $key => $value) {
    			$cats_array[] = $value->id;

    		}
    		$input['where_in'] = array('catalog_id',$cats_array);

    		// die();
    		$this->load->library('pagination');
            $config = array();
            $config['base_url']   = base_url( $slug_catalog.'/page');
            $config['total_rows'] = $this->product_model->get_total($input);
            $config['per_page']   = 25;

            $config['cur_tag_open'] = '<a onclick="return false;" style="background:#ddd">';
            $config['cur_tag_close'] = '</a>';
            $config['uri_segment'] = 3;//phan doan hien thi ra so trang tren url
            $config['next_link']   = 'Trang kế tiếp';
            $config['prev_link']   = 'Trang trước';

            //khoi tao cac cau hinh phan trang
            $this->pagination->initialize($config);
            $segment = $this->uri->rsegment(3);
            $segment = intval($segment);
            $input['limit'] = array($config['per_page'], $segment);
            $list = $this->product_model->get_list($input);
            $list_slug = array();
            foreach ($list as $key => $value) {
            	$value->slug_catalog = $this->catalog_model->get_info($value->catalog_id)->slug;
            	$list_slug[] = $value;
            }
            $this->data['lists'] = $list_slug;

            // pre($list_slug);
           	 $viewest = $this->product_model->get_list(array('order'=>array('view','DESC'),'limit'=>array(8,0)));
             foreach ($viewest as $key =>$value)
             {
                $value->slug_catalog = $this->catalog_model->get_info($value->catalog_id)->slug;
                $viewest_slug[] = $value;
             
             $this->data['viewest_slug'] = $viewest_slug;
            $this->data['temp'] = 'site/product/sanpham';
            $this->load->view('site/layoutdm', $this->data);
    	}
    }
?>