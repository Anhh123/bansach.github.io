<?php
	class Redirect_url extends MY_Controller

	{

		function __construct(){
			parent::__construct();
			$this->load->model('catalog_model');
		}


		function redirect_cat(){
			$slug = $this->uri->rsegment(4);

			$array = explode('-', $slug);
			array_pop($array);
			$slug = implode($array, '-');

			$input = array('where'=>array('slug'=>$slug));

			$total_rows = $this->catalog_model->get_total($input);

			if($total_rows == 0)
				redirect('/');

			redirect('/'.$slug);
		}


		function redirect_pro(){
			$this->load->model('product_model');
			$slug = $this->uri->rsegment(4);

			$array = explode('-', $slug);
			array_pop($array);
			$slug = implode($array, '-');
			$input = array('where'=>array('slug'=>$slug));

			$total_rows = $this->product_model->get_total($input);

			if($total_rows == 0)
				redirect('/');

			$this->db->select('catalog_id');
			$id_catalog = $this->product_model->get_list(array('where'=>array('slug'=>$slug)))[0]->catalog_id;

			$this->db->select('slug');
			$catalog = $this->catalog_model->get_info($id_catalog)->slug;
			redirect('/'.$catalog.'/'.$slug.'.html');
		}
	}

?>