<?php
	Class Tuyendung extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('tuyendung_model');
		}

		/*
		//Lấy danh sách tin tức
		*/
		function index(){
		    // lấy tất cả các tin tuyển dụng
			$list_tuyendung = $this->tuyendung_model->get_list();
			$this->data['list_tuyendung'] = $list_tuyendung;

			// load view
			$this->data['temp'] = 'site/tuyendung/index';
			$this->load->view('site/layouttuyendung',$this->data);
		}

		/*
		//hien thi bai viet tin tuc
		*/
		function view(){
			// lay thong tin bai viet theo slug
			$slug = $this->uri->rsegment(3);
			$info = $this->tuyendung_model->get_list(array('where'=>array('slug'=>$slug)));

			if(!$info)
			{
				redirect();
			}
			$info = $info[0];
			$this->data['info'] = $info;

			// cập nhật lại lượt xem
	        $data = array();
	        $data['count_view'] = $info->count_view + 1;
	        $this->tuyendung_model->update($info->id,$data);

			/*
	        //lấy danh sách tin tức liên quan
	        */
	        $input = array();

	        if(isset($id))
	        {
	            $this->db->where('id <>', $id);//hoặc sử dụng $this->db->where('id !=', $id);
	        }

	        $input['limit'] = array(4,0);
	        $related_tuyendung = $this->tuyendung_model->get_list($input);
	        $this->data['related_tuyendung'] = $related_tuyendung;
			$this->load->view('site/tuyendung/view',$this->data);
		}

	}
?>