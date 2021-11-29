<?php
    Class Home extends MY_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('product_model');
            $this->load->model('catalog_model');
        }

        function index(){
            $this->load->model('product_model');
            // lấy danh dách 10 sản phẩm mới nhất
            $input = array();
            $input['order'] = array('created','DESC');
            $input['limit'] = array(8,0);
            $product_new = $this->product_model->get_list($input);
            $pro_new = array();
            foreach ($product_new as $key => $value) {
                // lay slug catalog cua tung bai viet
                $value->slug_catalog = $this->catalog_model->get_info($value->catalog_id)->slug;
                $pro_new[]= $value;
            }
            $this->data['pro_new'] = $pro_new;

            // lấy thông tin status = 0
            // Có Parent = 1
            $where = array();
            $where = array('status' => 0,'parent_view'=>2);
            $info_1 = $this->catalog_model->get_info_rule($where);
            $this->data['info_1'] = $info_1;
            // pre($info_1);
            if($info_1){
                $input_catalog = array();
                $input_catalog['where']  = array('parent_id' => $info_1->id);
                $catalog_subs = $this->catalog_model->get_list($input_catalog);
                $this->data['catalog_subs'] = $catalog_subs;//lây ra danh sách danh mục cấp 2
                // pre($catalog_subs);
                if(count($catalog_subs) > 0)
                {
                    foreach($catalog_subs as $row)
                    {
                        $input1 = array();
                        $input1['where'] = array('parent_id'=>$row->id);
                        $sub4 = $this->catalog_model->get_list($input1);
                        $row->sub4 = $sub4;
                    }
                }

                if(count($catalog_subs) > 0) //neu danh muc hien tai co danh muc con
                {
                    $catalog_subs_id = array();
                    foreach ($catalog_subs as $sub)
                    {
                       if(count($sub->sub4) > 0)
                       {
                          foreach($sub->sub4 as $value)
                          {
                              $catalog_subs_id[] = $value->id;
                          }
                        $catalog_subs_id[] = array_push($catalog_subs_id,$sub->id);
                       }else
                       {
                              $catalog_subs_id[] = $sub->id;
                            $catalog_subs_id[] = array_push($catalog_subs_id,$sub->parent_id);

                       }
                    }
                    // lay tat ca san pham thuoc cac danh mục con do
                    $this->db->where_in('catalog_id', $catalog_subs_id);
                }else
                {
                    $input_1['where'] = array('catalog_id' => $info_1->id);
                }

                $input_1['limit'] = array(3,0);
                $list_1 = $this->product_model->get_list($input_1);
                $this->data['list_1'] = $list_1;
                // pre($list_1);
            }

            // lấy thông tin status = 0
            // Có Parent = 2
            $where = array();
            $where = array('status' => 0,'parent_view'=> 3);
            $info_2 = $this->catalog_model->get_info_rule($where);
            $this->data['info_2'] = $info_2;

            if($info_2){
                $input_catalog = array();
                $input_catalog['where']  = array('parent_id' => $info_2->id);
                $catalog_subs = $this->catalog_model->get_list($input_catalog);
                $this->data['catalog_subs'] = $catalog_subs;//lây ra danh sách danh mục cấp 2
                if(count($catalog_subs) > 0)
                {
                    foreach($catalog_subs as $row)
                    {
                        $input2 = array();
                        $input2['where'] = array('parent_id'=>$row->id);
                        $sub4 = $this->catalog_model->get_list($input2);
                        $row->sub4 = $sub4;
                    }
                }

                if(count($catalog_subs) > 0) //neu danh muc hien tai co danh muc con
                {
                    $catalog_subs_id = array();
                    foreach ($catalog_subs as $sub)
                    {
                       if(count($sub->sub4) > 0)
                       {
                          foreach($sub->sub4 as $value)
                          {
                              $catalog_subs_id[] = $value->id;
                          }
                        $catalog_subs_id[] = array_push($catalog_subs_id,$sub->id); 
                       }else
                       {
                              $catalog_subs_id[] = $sub->id;
                            $catalog_subs_id[] = array_push($catalog_subs_id,$sub->parent_id);
                       }
                    }
                    // lay tat ca san pham thuoc cac danh mục con do
                    $this->db->where_in('catalog_id', $catalog_subs_id);
                }else
                {
                    $input_2['where'] = array('catalog_id' => $info_2->id);
                }
                $input_2['limit'] = array(3,0);
                $list_2 = $this->product_model->get_list($input_2);
                $this->data['list_2'] = $list_2;
                // pre($list_2);
            }

            // lấy thông tin status = 0
            // Có Parent = 3
            $where = array();
            $where = array('status' => 0,'parent_view'=> 4);
            $info_3 = $this->catalog_model->get_info_rule($where);
            $this->data['info_3'] = $info_3;

            if($info_3){
                $input_catalog = array();
                $input_catalog['where']  = array('parent_id' => $info_3->id);
                $catalog_subs = $this->catalog_model->get_list($input_catalog);
                $this->data['catalog_subs'] = $catalog_subs;//lây ra danh sách danh mục cấp 3
                if(count($catalog_subs) > 0)
                {
                    foreach($catalog_subs as $row)
                    {
                        $input3 = array();
                        $input3['where'] = array('parent_id'=>$row->id);
                        $sub4 = $this->catalog_model->get_list($input3);
                        $row->sub4 = $sub4;
                    }
                }

                if(count($catalog_subs) > 0) //neu danh muc hien tai co danh muc con
                {
                    $catalog_subs_id = array();
                    foreach ($catalog_subs as $sub)
                    {
                       if(count($sub->sub4) > 0)
                       {
                          foreach($sub->sub4 as $value)
                          {
                              $catalog_subs_id[] = $value->id;
                          }
                        $catalog_subs_id[] = array_push($catalog_subs_id,$sub->id); 
                       }else
                       {
                              $catalog_subs_id[] = $sub->id;
                            $catalog_subs_id[] = array_push($catalog_subs_id,$sub->parent_id);
                       }
                    }
                    // lay tat ca san pham thuoc cac danh mục con do
                    $this->db->where_in('catalog_id', $catalog_subs_id);
                }else
                {
                    $input_3['where'] = array('catalog_id' => $info_3->id);
                }
                $input_3['limit'] = array(3,0);
                $list_3 = $this->product_model->get_list($input_3);
                $this->data['list_3'] = $list_3;
                // pre($list_3);
            }

            // Lấy nội dung của biến message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            // load view
           $this->data['temp'] = 'site/home/index';
           $this->load->view('site/layout/layouthome',$this->data);
        }
    }
?>