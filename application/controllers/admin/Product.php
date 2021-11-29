<?php
Class Product extends MY_Controller
{
    function __construct(){
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
    }

    /*
        * Hien thi danh sach san pham
     */
    function index(){

        // lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total();
        $this->data['total_rows'] = $total_rows;

        // load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();

        //tong tat ca cac san pham tren website
        $config['total_rows'] = $total_rows;

        //link hien thi ra danh sach san pham
        $config['base_url']   = admin_url('product/index');

        //so luong san pham hien thi tren 1 trang
        $config['per_page']   = 4;

        //phan doan hien thi ra so trang tren url
        $config['uri_segment'] = 4;
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';

        // khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        // Tiềm kiếm
        // kiem tra co thuc hien loc du lieu hay khong
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if($id > 0) {
            $input['where']['id'] = $id;
        }
        $name = $this->input->get('name');
        if($name) {
            $input['like'] = array('name', $name);
        }
        $catalog_id = $this->input->get('catalog');
        $catalog_id = intval($catalog_id);

        if($catalog_id > 0)
        {
            $input['where']['catalog_id'] = $catalog_id;
        }

        // lay danh sach san pham theo ngày
        $input['order'] = array('created','DESC');
        $list_one = $this->product_model->get_list($input);

        $buy = array();
        foreach ($list_one as $key => $value) {
            
            // lay slug catalog cua tung bai viet
            $this->load->model('catalog_model');
            $value->slug_catalog = $this->catalog_model->get_info($value->catalog_id)->slug;
            $buy[]= $value;
        }
        $this->data['buy'] = $buy;

        // lây danh mục cha
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalog_0 = $this->catalog_model->get_list($input);

        // lặp danh mục cha lấy ra menu cấp 2 nếu có
        foreach($catalog_0 as $row)
        {
            //lấy ra menu cấp 2 nếu có
            $input_1 = array();
            $input_1['where'] = array('parent_id' => $row->id);
            $menu_1 = $this->catalog_model->get_list($input_1);

            //gắn menu con vào menu_0
            $row->menu_1 = $menu_1;
        }

       foreach($catalog_0 as $value)
       {
            if(count($value->menu_1) > 0)// lấy danh mục cấp 3 nếu có
            {
                foreach($value->menu_1 as $row)
                {
                    $input_2 = array();
                    $input_2['where'] = array('parent_id' => $row->id);
                    $menu_2 = $this->catalog_model->get_list($input_2);
                    $row->menu_2 = $menu_2;
                }

            }
       }
       $this->data['catalog_0'] = $catalog_0;

        // lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // load view
        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
        * Them san pham moi
     */
    function add(){
        // lay danh sach danh muc san pham
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;  
        }
        foreach($catalogs as $value)
        {
            if(count($value->subs) > 0)
            {
                foreach($value->subs as $value2)
                {
                    $input2 = array();
                    $input2['where'] = array('parent_id'=>$value2->id);
                    $sub2 = $this->catalog_model->get_list($input2);
                    $value2->sub2 = $sub2;
                }
            }
        }
        $this->data['catalogs'] = $catalogs;

        // load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        // neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('catalog', 'Thể loại', 'required');
            if($this->input->post('slug') != '')
                $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');

            // nhập liệu chính xác
            if($this->form_validation->run())
            {
                // them vao csdl
                $name        = $this->input->post('name');
                $catalog_id  = $this->input->post('catalog'); // slug
                $tac_gia     = $this->input->post('tac_gia');
                $price       = $this->input->post('price');
                $price       = str_replace(',', '', $price); // giá giảm
                $discount    = $this->input->post('discount');
                $discount    = str_replace(',','', $discount);
                $xuat_ban    = $this->input->post('xuat_ban');
                $nxb         = $this->input->post('nxb');
                $nph         = $this->input->post('nph');
                $dang_bia    = $this->input->post('dang_bia');
                $kich_thuoc  = $this->input->post('kich_thuoc');
                $khoi_luong  = $this->input->post('khoi_luong');
                $so_trang    = $this->input->post('so_trang');

                //luu du lieu can them
                $data = array(
                    'name'       => $name,
                    'catalog_id' => $catalog_id,
                    'tac_gia'    => $tac_gia,
                    'price'      => $price,
                    'image_list' => json_encode($this->input->post('image_list')),
                    'image_link' => $this->input->post('image'),
                    'site_title' => $this->input->post('site_title'),
                    'meta_desc'  => $this->input->post('meta_desc'),
                    'meta_key'   => $this->input->post('meta_key'),
                    'noi_bat'    => $this->input->post('noi_bat'),
                    'content'    => $this->input->post('content'),
                    'status'     => 'Còn hàng',
                    'created'    => now(),
                    'discount'   => $discount,
                    'xuat_ban'   => $xuat_ban,
                    'nxb'        => $nxb,
                    'nph'        => $nph,
                    'dang_bia'   => $dang_bia,
                    'kich_thuoc' => $kich_thuoc,
                    'khoi_luong' => $khoi_luong,
                    'so_trang'   => $so_trang,
                );

                if($this->input->post('slug') == '')
                    $data['slug']  = str_slug($name);
                else
                     $data['slug'] =$this->input->post('slug');

                // them moi vao csdl
                if($this->product_model->create($data))
                {
                    // tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                // chuyen tới trang danh sách
                redirect(admin_url('product'));
            }
        }

        // load view
        $this->data['temp'] = 'admin/product/add';
        $this->load->view('admin/main', $this->data);
    }

    /*
        * Chinh sua san pham
     */
    function edit(){

        if($this->getPermission() != 1)
        redirect(admin_url('permission/deny'));

        $id = $this->uri->rsegment('3');
        $product = $this->product_model->get_info($id);
        if(!$product)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
            redirect(admin_url('product'));
        }
        $this->data['product'] = $product;

        //lay danh sach danh muc san pham
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        foreach($catalogs as $value)
        {
            if(count($value->subs) > 0)
            {
                foreach($value->subs as $value2)
                {
                    $input2 = array();
                    $input2['where'] = array('parent_id'=>$value2->id);
                    $sub2 = $this->catalog_model->get_list($input2);
                    $value2->sub2 = $sub2;
                }
            }
        }
        $this->data['catalogs'] = $catalogs;

        // load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        // neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('catalog', 'Thể loại', 'required');

             if($this->input->post('slug') != '')
                $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');

            // nhập liệu chính xác
            if($this->form_validation->run())
            {
                // them vao csdl
                $name        = $this->input->post('name');
                $catalog_id  = $this->input->post('catalog'); // slug
                $tac_gia     = $this->input->post('tac_gia');
                $price       = $this->input->post('price');
                $price       = str_replace(',', '', $price); // giá giảm
                $discount    = $this->input->post('discount');
                $discount    = str_replace(',','', $discount);
                $status      = $this->input->post('status');
                $xuat_ban    = $this->input->post('xuat_ban');
                $nxb         = $this->input->post('nxb');
                $nph         = $this->input->post('nph');
                $dang_bia    = $this->input->post('dang_bia');
                $kich_thuoc  = $this->input->post('kich_thuoc');
                $khoi_luong  = $this->input->post('khoi_luong');
                $so_trang    = $this->input->post('so_trang');


                //luu du lieu can them
                $data = array(
                    'name'       => $name,
                    'catalog_id' => $catalog_id,
                    'tac_gia'    => $tac_gia,
                    'price'      => $price,
                    'status'     => $status,
                    'image_list' => json_encode($this->input->post('image_list')),
                    'image_link' => $this->input->post('image'),
                    'gifts'      => $this->input->post('gifts'),
                    'site_title' => $this->input->post('site_title'),
                    'meta_desc'  => $this->input->post('meta_desc'),
                    'meta_key'   => $this->input->post('meta_key'),
                    'noi_bat'    => $this->input->post('noi_bat'),
                    'content'    => $this->input->post('content'),
                    'created'    => now(),
                    'discount'   => $discount,
                    'xuat_ban'   => $xuat_ban,
                    'nxb'        => $nxb,
                    'nph'        => $nph,
                    'dang_bia'   => $dang_bia,
                    'kich_thuoc' => $kich_thuoc,
                    'khoi_luong' => $khoi_luong,
                    'so_trang'   => $so_trang,
                );
                 if($this->input->post('slug') == '')
                    $data['slug']  = str_slug($name);
                else
                     $data['slug'] =$this->input->post('slug');

                // them moi vao csdl
                if($this->product_model->update($product->id, $data))
                {
                    // tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                // chuyen tới trang danh sách
                redirect(admin_url('product'));
            }
        }

        // load view
        $this->data['temp'] = 'admin/product/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
        * Xoa du lieu
     */
    function del(){
        $id = $this->uri->rsegment('3');
        $this->_del($id);

        // tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
        redirect(admin_url('product'));
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
      if($this->getPermission() != 1)
        redirect(admin_url('permission/deny'));

        $product = $this->product_model->get_info($id);
        if(!$product)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
            redirect(admin_url('product'));
        }

        //thuc hien xoa san pham
        $this->product_model->delete($id);
    }


    function _check_slug(){
        $slug = $this->input->post('slug');
        $info = $this->product_model->get_info($this->uri->rsegment(3));
        if($this->uri->rsegment('3')){
            $conditional = $this->product_model->get_list(array('where'=>array('slug !=' =>$info->slug,'slug'=>$slug)));

        }
        else{
            $conditional = $this->product_model->get_list(array('where'=>array('slug'=>$slug)));
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