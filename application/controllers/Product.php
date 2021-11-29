<?php
    Class Product extends MY_Controller
    {
        function __construct(){
            parent::__construct();
            //load model san pham
            $this->load->model('product_model');
        }

        /*
         * Hiển thị danh sách sản phẩm theo danh mục
         */
    function catalog(){
        //lấy ID của thể loại
        $slug_catalog = $this->uri->rsegment(3);
        $slug_catalog = strtolower($slug_catalog);
        if($slug_catalog == 'admin')
        {
            redirect(admin_url('admin'));
        }

        //lay ra thông tin của thể loại
        $this->load->model('catalog_model');
        $where= array('slug' => $slug_catalog);
        $catalog = $this->catalog_model->get_info_rule($where);
        if(!$catalog)
        {
            redirect(base_url());
        }
        $this->data['catalog'] = $catalog;
        $input = array();

        //kiêm tra xem đây là danh con hay danh mục cha
        if($catalog->parent_id != 0)//nếu có danh mục con
        {
            $input_catalog = array();
            $input_catalog['where']  = array('parent_id' => $catalog->id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            if(!empty($catalog_subs)) //neu danh muc hien tai co danh muc con
            {
                $catalog_subs_id = array();
                foreach ($catalog_subs as $sub)
                {
                    $catalog_subs_id[] = $sub->id;
                }
                $catalog_subs_id[] = array_push($catalog_subs_id,$catalog->id);
                //lay tat ca san pham thuoc cac danh mục con do
                $this->db->where_in('catalog_id', $catalog_subs_id);
            }else{
                $input['where'] = array('catalog_id' => $catalog->id);
            }
        }
       else//nếu là danh mục cha
        {
            $input_catalog = array();
            $input_catalog['where']  = array('parent_id' => $catalog->id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            $this->data['catalog_subs'] = $catalog_subs;//lây ra danh sách danh mục cấp 2
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

                //lay tat ca san pham thuoc cac danh mục con do
                $this->db->where_in('catalog_id', $catalog_subs_id);
            }else
            {

                $input['where'] = array('catalog_id' => $catalog->id);
            }

        }

        //lấy ra danh sách sản phẩm thuộc danh mục đó
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;

        // load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['base_url']   = base_url( $slug_catalog.'/page');

        //tong tat ca cac san pham tren website
        $config['total_rows'] = $total_rows;

        //so luong san pham hien thi tren 1 trang
        $config['per_page']   = 6;

        $config['cur_tag_open'] = '<a onclick="return false;" style="text-decoration: underline; color: #b91919;">';
        $config['cur_tag_close'] = '</a>';

        //phan doan hien thi ra so trang tren url
        $config['uri_segment'] = 3;
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';

        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->rsegment(4);
        $segment = intval($segment);
        // echo $segment;
        // die();
        $input['limit'] = array($config['per_page'], $segment);

        //lay danh sach san pham
        if(isset( $catalog_subs_id)){
            $this->db->where_in('catalog_id', $catalog_subs_id);
        }
        $list_one = $this->product_model->get_list($input);
        //pre($list_one);
        $buy = array();
        foreach ($list_one as $key => $value) {

            //lay slug catalog cua tung bai viet
            $value->slug_catalog = $this->catalog_model->get_info($value->catalog_id)->slug;
            $buy[]= $value;
        }
        $this->data['buy'] = $buy;

            // hiển thị ra view
            // $this->load->view('site/product/catalog',$this->data);
            $this->data['temp'] = 'site/product/catalog';
            $this->load->view('site/layout/layout_top_footer', $this->data);
        }

        /*
         * Xem chi tiết sản phẩm
         */
        function view(){
            // lay id san pham muon xem
            $slug = $this->uri->rsegment(3);
            $where = array('slug' => $slug);
            $product = $this->product_model->get_info_rule($where);
            if(!$product)
            {
                redirect();
            }
            $this->data['product'] = $product;
            // lấy danh sách ảnh sản phẩm kèm theo
            $image_list = array();
            $image_list = @json_decode($product->image_list);
            $image_0 = $image_list[0];
            $this->data['image_0'] = $image_0;
            $this->data['image_list'] = $image_list;

            // lay thong tin cua danh mục san pham
            $catalog = $this->catalog_model->get_info($product->catalog_id);
            $this->data['catalog'] = $catalog;

            /*
                //lấy danh sách 4 sản phẩm liên quan
            */
            $input = array();
            $input['where'] = array( 'catalog_id' => $product->catalog_id);
            if(isset($product->id))
            {
                $this->db->where('id <>', $product->id);//hoặc sử dụng $this->db->where('id !=', $id);
            }
            $input['limit'] = array(4,0);
            $related_posts = $this->product_model->get_list($input);
            $buy = array();
            foreach ($related_posts as $key => $value) {
                // lay slug catalog cua tung bai viet
                $value->slug_catalog = $this->catalog_model->get_info($value->catalog_id)->slug;
                $buy[]= $value;
            }
            $this->data['buy'] = $buy;

            // cập nhật lại lượt xem
            $data = array();
            $data['view'] = $product->view + 1;
            $this->product_model->update($product->id,$data);

            // hiển thị ra view
            $this->data['temp'] = 'site/product/view';
            $this->load->view('site/head/head-danhmuc-con', $this->data);
            $this->load->view('site/header/header-catalog', $this->data);
            $this->load->view('site/section/section-pro-view', $this->data);
            $this->load->view('site/layout/layout_chung', $this->data);
        }

        /*
            //Tìm kiếm theo tên sản phẩm
        */

        function search() {

            if($this->uri->rsegment(3) == 1){
                // lấy dữ liệu từ autocomplete
                $key = $this->input->get('term');
            }else{

                $key = $this->input->get('key-search');
            }

            //hàm trim để xóa các khoảng trống
            $this->data['key'] = trim($key);
            $input = array();
            $input['like'] = array('name', $key);
            $list = $this->product_model->get_list($input);
            $this->data['list'] = $list;

            // Đếm tổng số
            $total_rows = $this->product_model->get_total($input);
            $this->data['total_rows'] = $total_rows;

            // lấy danh sách sản phẩm
            if(isset( $catalog_subs_id)){
                $this->db->where_in('catalog_id', $catalog_subs_id);
            }
            $list_one = $this->product_model->get_list($input);

            $buy = array();
            foreach ($list_one as $key => $value) {

                // lấy slug catalog cua tung bai viet
                $value->slug_catalog = $this->catalog_model->get_info($value->catalog_id)->slug;
                $buy[]= $value;
            }
            $this->data['buy'] = $buy;

            if($this->uri->rsegment(3) == 1){
                // xử lý autocomplete
                $result = array();
                foreach ($list as $row) {
                    $item= array();
                    $item['id'] = $row->id;
                    $item['label'] = $row->name;
                    $item['value'] = $row->name;
                    $result[] = $item;
                }
                // Dữ liệu được trả về dưới dạng Json
                die(json_encode($result));
            }else{

                // load view
                $this->data['temp'] = 'site/product/search';
                $this->load->view('site/layout/layout-seach', $this->data);
            }


        }

        /*
        //Tìm kiếm theo giá
        */
        function search_price(){
            $price_from = $this->input->get('min');
            $price_from = intval($price_from);
            $this->data['price_from'] = $price_from;
            $price_to = $this->input->get('max');
            $price_to = intval($price_to);
            $this->data['price_to'] = $price_to;

            // lọc theo giá
            $input = array();
            $input['where'] = array('price >=' => $price_from, 'price <=' => $price_to);
            $input['limit'] = array(16,0);
            $input['order'] = array('created','DESC');
            $list_one = $this->product_model->get_list($input);
            $list = array();
            foreach ($list_one as $key => $value) {
                $value->slug_catalog = $this->catalog_model->get_info($value->catalog_id)->slug;
                $list[]= $value;
            }
            $this->data['list'] = $list;

           // load view
            $this->data['temp'] = 'site/product/search_price';
            $this->load->view('site/layout/layouthome',$this->data);
        }

        function redirect_page_zero($slug){
            redirect(base_url() . $slug);
        }
    }

?>