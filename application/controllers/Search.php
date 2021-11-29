<?php
    class Search extends MY_Controller
    {

    	function __construct(){
    		parent::__construct();
    		$this->load->model('product_model');
    	}

    	function index(){
            $key = $this->input->get('key-search');
            $this->data['key'] = trim($key); //hàm trim để xóa các khoảng trống

            $input = array();
            $input['like'] = array('name',$key);

            $catalog_id = $this->input->get('catalog');
            $catalog = $this->catalog_model->get_info($catalog_id);
            $catalog_id = intval($catalog_id);
            if($key == '' && $catalog_id == '')
            {
                redirect();
            }
            if($catalog_id > 0)
            {
                // kiêm tra xem đây là danh con hay danh mục cha
                if($catalog->parent_id == 0)
                {
                    $input_catalog = array();
                    $input_catalog['where']  = array('parent_id' => $catalog->id);
                    $catalog_subs = $this->catalog_model->get_list($input_catalog);
                    $this->data['catalog_subs'] = $catalog_subs;
                    if(!empty($catalog_subs)) //neu danh muc hien tai co danh muc con
                    {
                        $catalog_subs_id = array();
                        foreach ($catalog_subs as $sub)
                        {
                            $catalog_subs_id[] = $sub->id;
                        }
                        // lay tat ca san pham thuoc cac danh mục con do
                        $this->db->where_in('catalog_id', $catalog_subs_id);
                    }else{
                        $input['where'] = array('catalog_id' => $catalog->id);
                    }
                }
                else{
                    $input['where'] = array('catalog_id' => $catalog->id);
                }

            }
            $input['limit'] = array(8,0);
            $list_one = $this->product_model->get_list($input);

            $list = array();
            foreach ($list_one as $key => $value) {
                $value->slug_catalog = $this->catalog_model->get_info($value->catalog_id)->slug;
                $list[]= $value;
            }
            $this->data['list'] = $list;
            $this->data['temp'] = 'site/product/search';
            $this->load->view('site/layout/layouthome',$this->data);
        }

    }

?>