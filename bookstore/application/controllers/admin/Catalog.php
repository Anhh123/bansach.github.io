<?php
    Class Catalog extends MY_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->model('catalog_model');
              if($this->getPermission() != 1)
            redirect(admin_url('permission/deny'));
        }
        

        /*
            * Lay ra danh sach danh muc san pham *
         */
        function index(){
            $list = $this->catalog_model->get_list();
            $this->data['list'] = $list;

            // lấy danh sách danh mục cha
            $input=array();
            $input['where'] = array('parent_id' =>0);
            $catalog_list = $this->catalog_model->get_list($input);

            // lấy ra danh mục con trong danh mục cha đó
            // danh mục con là danh mục có parent_id bằng id danh mục cha.
            // dùng vòng lặp foreach để lặp danh mục cha. sau đó lấy ra các danh mục con trong danh mục cha đó. gắn cái danh mục con vào biến mảng. để sau này lấy ra dùng
            foreach($catalog_list as $key=>$value)
            {
                $input_1 = array();
                $input_1['where'] = array('parent_id' => $value->id);
                $catalog_sub = $this->catalog_model->get_list($input_1);
                $value->subs = $catalog_sub;//tạo mảng subs chứa tất cả thông tin của biens catalog_sub
            }

            foreach($catalog_list as $row)
            {
               if(count($row->subs) > 0)
               {
                  foreach($row->subs as $row_2)
                  {
                    $input_2 = array();
                    $input_2['where'] = array('parent_id' => $row_2->id);
                    $subs_2 = $this->catalog_model->get_list($input_2);
                    $row_2->subs_2 = $subs_2;
                  }
               }
            }

            $this->data['catalog_list'] = $catalog_list;
            // lay nội dung của biến message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            
            // load view
            $this->data['temp'] = 'admin/catalog/index';
            $this->load->view('admin/main', $this->data);
        }
        

        /*
            * Them moi du lieu *
         */
        function add(){
            // load thư viện validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            // neu ma co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name', 'Tên', 'required');
                  if($this->input->post('slug') != '')
                    $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');
                
                // nhập liệu chính xác
                if($this->form_validation->run())
                {
                    //them vao csdl
                    $name       = $this->input->post('name');
                    $parent_id  = $this->input->post('parent_id');
                    $sort_order = $this->input->post('sort_order');
                    $status     = $this->input->post('status');
                    $meta_desc  = $this->input->post('meta_desc');
                    $meta_key   = $this->input->post('meta_key');
                    $site_title = $this->input->post('site_title');

                    //luu du lieu can them
                    $data = array(
                        'name'      => $name,
                        'parent_id' => $parent_id,
                        'sort_order' => intval($sort_order),
                        'image_link' => $this->input->post('image'),
                        'image_banner'=> $this->input->post('banner'),
                        'status'     =>  $status,
                        'meta_desc'  => $meta_desc,
                        'meta_key'   => $meta_key,
                        'site_title' => $site_title,
                        'intro'      => $this->input->post('intro'),
                    );

                        if($this->input->post('slug') == '')
                            $data['slug']  = str_slug($name);
                        else
                             $data['slug'] =$this->input->post('slug');

                         // them moi vao csdl
                        if($this->catalog_model->create($data))
                        {
                            //tạo ra nội dung thông báo
                            $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                        }else{
                            $this->session->set_flashdata('message', 'Không thêm được');
                        }

                        //chuyen tới trang danh sách
                        redirect(admin_url('catalog'));
                }
            }
            
            //lay danh sach danh muc cha
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $list = $this->catalog_model->get_list($input);

            foreach($list as $row)
            {
                $input1 = array();
                $input1['where'] = array('parent_id' => $row->id);
                $subs = $this->catalog_model->get_list($input1);
                $row->subs = $subs;
            }
            
            $this->data['list']  = $list;


            $this->data['temp'] = 'admin/catalog/add';
            $this->load->view('admin/main', $this->data);
        }
        

        /*
            * Cập nhật du lieu *
         */
        function edit(){
            // load thư viện validate dữ liệu
            $this->load->library('form_validation');
            $this->load->helper('form');
            

            // lay id danh mục
            $id = $this->uri->rsegment(3);
            $info = $this->catalog_model->get_info($id);
            if(!$info)
            {
                // tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'không tồn tại danh mục này');
                redirect(admin_url('catalog'));
            }
            $this->data['info'] = $info;
            
            // neu ma co du lieu post len thi kiem tra
            if($this->input->post())
            {
                $this->form_validation->set_rules('name', 'Tên', 'required');
                if($this->input->post('slug') != '')
                    $this->form_validation->set_rules('slug', 'Slug', 'callback__check_slug');
        
                // nhập liệu chính xác
                if($this->form_validation->run())
                {
                    //them vao csdl
                    $name       = $this->input->post('name');
                    $parent_id  = $this->input->post('parent_id');
                    $sort_order = $this->input->post('sort_order');
                    $status     = $this->input->post('status');
                    $meta_desc  = $this->input->post('meta_desc');
                    $meta_key   = $this->input->post('meta_key');
                    $site_title = $this->input->post('site_title');
                   
                    // luu du lieu can them
                    $data = array(
                        'name'       => $name,
                        'sort_order' => intval($sort_order),
                        'status'     => $status,
                        'image_link' =>$this->input->post('image'),
                        'image_banner'=> $this->input->post('banner'),
                        'meta_desc'  => $meta_desc,
                        'meta_key'   => $meta_key,
                        'site_title' => $site_title,
                        'intro'      => $this->input->post('intro'),
                                     
                    );
                    if($info->id == $parent_id)
                    {
                       $this->session->set_flashdata('message','danh mục này đã có, vui lòng xem lại');
                       redirect(admin_url('catalog'));
                    }else
                    {
                        $data['parent_id'] = $parent_id;
                    }
                    if($this->input->post('slug') == '')
                        $data['slug']  = str_slug($name);
                    else
                         $data['slug'] =$this->input->post('slug');
                    
                    // them moi vao csdl
                    if($this->catalog_model->update($id, $data))
                    {
                        // tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    }else{
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    // chuyen tới trang danh sách
                    redirect(admin_url('catalog'));
                }
            }
        
            //lay danh sach danh muc cha
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $list = $this->catalog_model->get_list($input);
            foreach($list as $row)
            {
                $input1 = array();
                $input1['where'] = array('parent_id' => $row->id);
                $subs = $this->catalog_model->get_list($input1);
                $row->subs = $subs;
            }
            $this->data['list']  = $list;
        
            $this->data['temp'] = 'admin/catalog/edit';
            $this->load->view('admin/main', $this->data);
        }
        

        /*
            * Xoa danh mục *
         */
        function delete(){
            // lay id danh mục
            $id = $this->uri->rsegment(3);
            $this->_del($id);
            
            // tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
            redirect(admin_url('catalog'));
        }
        

        /*
            * Xoa nhieu danh muc san pham *
         */
        function delete_all(){
            $ids = $this->input->post('ids');
            foreach ($ids as $id)
            {
                $this->_del($id , false);
            }
        }
        

        /*
            * Thuc hien xoa *
         */
        private function _del($id, $rediect = true){
            $info = $this->catalog_model->get_info($id);
            if(!$info)
            {
                // tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'không tồn tại danh mục này');
                if($rediect)
                {
                    redirect(admin_url('catalog'));
                }else{
                    return false;
                }
            }
            
            // lay danh muc con cua danh muc cha nay neu co
                $input = array();
                $input['where'] = array('parent_id'=>$info->id);
                $catalog_sub = $this->catalog_model->get_list($input);
                if(count($catalog_sub) > 0)
                {
                    $this->session->set_flashdata('message','danh mục này có chứa danh mục con, bạn phải xóa danh mục con trước');

                    if($rediect)
                        {
                            redirect(admin_url('catalog'));
                        }else{
                            return false;
                        }
                }
                
            // kiem tra xem danh muc nay co san pham khong
            $this->load->model('product_model');
            $product = $this->product_model->get_info_rule(array('catalog_id' => $id), 'id');
            if($product)
            {
                // tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'Danh mục '.$info->name.' có chứa sản phẩm,bạn cần xóa các sản phẩm trước khi xóa danh mục');
                if($rediect)
                {
                    redirect(admin_url('catalog'));
                }else{
                    return false;
                }
            }
            
            // xoa du lieu
            $this->catalog_model->delete($id);
        }
        

        /*
            * Kiểm tra slug tồn tại chưa *
         */
        function _check_slug(){
          $slug = $this->input->post('slug');
          $info = $this->catalog_model->get_info($this->uri->rsegment(3));
          if($this->uri->rsegment('3')){
           $conditional = $this->catalog_model->get_list(array('where'=>array('slug !=' =>$info->slug,'slug'=>$slug)));

          }
          else{
            $conditional = $this->catalog_model->get_list(array('where'=>array('slug'=>$slug)));
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