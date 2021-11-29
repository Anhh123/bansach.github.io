<?php
    Class MY_Controller extends CI_Controller
    {
        //bien gui du lieu sang ben view
        public $data = array();

        function __construct(){
            // ke thua tu CI_Controller
            parent::__construct();

            $controller = $this->uri->segment(1);
            $controller = strtolower($controller);
            switch ($controller)
            {
                case 'admin' :
                    {
                        // xu ly cac du lieu khi truy cap vao trang admin
                        $this->load->helper('admin');
                        $this->_check_login();
                        $login = $this->session->userdata('login');

                        // lấy ra thông tin admin đăng nhập
                        $this->load->model('admin_model');
                        $admin_info = $this->admin_model->get_info($login['id']);
                        $this->data['admin_info'] = $admin_info;

                        /*
                        //nếu đăng nhập vào admin rùi mà admin nhập linh tinh trên url thì redirect về trang home
                        */
                        $controller2 = $this->uri->rsegment(1);

                            $controller2 = ucfirst(strtolower($controller2)) . '.php';
                            if(!file_exists(FCPATH . 'application/controllers/admin/' . $controller2)){
                                redirect(admin_url('home'));
                            }
                        break;

                    }
                default:
                    {
                        // xu ly du lieu o trang ngoai

                        // xu ly cac du lieu khi truy cap vao trang admin
                        

                        // lấy thông tin homepage
                        $this->load->model('homepage_model');
                        $id = 1;
                        $homepage = $this->homepage_model->get_info($id);
                        $this->data['homepage'] = $homepage;

                         // lấy danh sách slide
                        $this->load->model('slide_model');
                        $list_slide = $this->slide_model->get_list();
                        $this->data['list_slide'] = $list_slide;

                        // lấy danh sách banner-top
                        $this->load->model('ads_model');
                        $input_ads = array();
                        $input_ads['limit'] = array(2,0);
                        $list_ads = $this->ads_model->get_list($input_ads);
                        $this->data['list_ads'] = $list_ads;

                        // lấy danh sách banner-right
                        $this->load->model('slide_main_model');
                        $input_main = array();
                        $input_main['limit'] = array(2,0);
                        $input_main['order'] = array('sort_order','DESC');
                        $list_main = $this->slide_main_model->get_list($input_main);
                        $this->data['list_main'] = $list_main;

                        // lấy danh sach 10 sản phẩm nổi bật đầu tiên
                        $this->load->model('catalog_model');
                        $this->load->model('product_model');
                        $input_nb = array();
                        $input_nb['where'] = array('noi_bat'=>1);
                        $input_nb['limit'] = array(10,0);
                        $list_nb = $this->product_model->get_list($input_nb);
                        foreach($list_nb as $row){
                           // lấy ra catalog của từng bài
                            $catalog = $this->catalog_model->get_info($row->catalog_id);
                            $row->slug_catalog = $catalog->slug;
                        }
                        $this->data['list_nb'] = $list_nb;

                        // lấy danh sách 10 tin tức nổi bật
                        $this->load->model('news_model');
                        $input_news = array();
                        $input_news['where'] = array('status'=>1);
                        $input_news['limit'] = array(10,0);
                        $list_news = $this->news_model->get_list($input_news);
                        $this->data['list_news'] = $list_news;

                        // lấy ra 5 bài viết xem nhiều
                        $input_view = array();
                        $input_view['order'] = array('view','DESC');
                        $input_view['limit'] = array(5,0);
                        $list_view = $this->product_model->get_list($input_view);
                        foreach($list_view as $row){
                            // lấy ra catalog của từng bài
                            $catalog = $this->catalog_model->get_info($row->catalog_id);
                            $row->slug_catalog = $catalog->slug;
                        }
                        $this->data['list_view'] = $list_view;

                        // lấy danh sach 5 sản phảm bán chạy


                        //tổng số sản phẩm có trong giỏ hàng
                        $this->load->library('cart');
                        $total_items = $this->cart->total_items();
                        $this->data['total_items'] = $total_items;

                        $carts = $this->cart->contents();
                        $total_amount = 0;
                        foreach($carts as $row){
                            $total_amount = $total_amount + $row['subtotal'];
                        }
                        $this->data['total_amount'] =  $total_amount;

                        // lay thong tin social
                        $this->load->model('social_model');
                        $social_list = $this->social_model->get_list();
                        $this->data['social_list'] = $social_list;

                        // Menu
                        // lây danh mục cha
                        $input = array();
                        $input['where'] = array('parent_id' => 0);
                        $catalog_0 = $this->catalog_model->get_list($input);

                        // lặp danh mục cha lấy ra menu cấp 2 nếu có
                        foreach($catalog_0 as $row){
                            // lấy ra menu cấp 2 nếu có
                            $input_1 = array();
                            $input_1['where'] = array('parent_id' => $row->id);
                            $menu_1 = $this->catalog_model->get_list($input_1);

                            //gắn menu con vào menu_0
                            $row->menu_1 = $menu_1;
                        }
                        foreach($catalog_0 as $value){
                            //lấy danh mục cấp 3 nếu có
                            if(count($value->menu_1) > 0){
                                foreach($value->menu_1 as $row){
                                    $input_2 = array();
                                    $input_2['where'] = array('parent_id' => $row->id);
                                    $menu_2 = $this->catalog_model->get_list($input_2);
                                    $row->menu_2 = $menu_2;
                                }
                            }
                        }
                        $this->data['catalog_0'] = $catalog_0;

                        //Kiểm tra xem thành viên đã đăng nhập hay chưa
                        $user_id_login = $this->session->userdata('user_id_login');
                        $this->data['user_id_login'] = $user_id_login;

                        // Nếu đã đăng nhập thành công thì lấy thông tin thành viên
                        if($user_id_login){
                            $this->load->model('user_model');
                            $user_info = $this->user_model->get_info($user_id_login);
                            $this->data['user_info'] = $user_info;
                        }

                        /*
                            * Tìm kiếm sản phẩm theo tên và tác giả
                         */
                        function search($name){
                            $this->db->like('name', $name, 'both');
                            return $this->db->get('product')->result();
                       }

                    }

            }
        }

        /*
         * Kiem tra trang thai dang nhap cua admin
         */
        private function _check_login(){
            $controller = $this->uri->rsegment('1');
            $controller = strtolower($controller);

            $login = $this->session->userdata('login');
            $this->data['login'] = $login;

            // neu ma chua dang nhap,ma truy cap 1 controller khac login
            if(!$login && $controller != 'login')
            {
                redirect(admin_url('login'));
            }

            // neu ma admin da dang nhap thi khong cho phep vao trang login nua.
            if($login && $controller == 'login')
            {
                redirect(admin_url('home/index'));
            }
        }

        /*
        //check level của ban quản trị
        */
        function getPermission(){
            $id = json_decode($this->session->userdata('login')['id']);
            $admin_level = $this->admin_model->get_info($id)->level;
            return $admin_level;
        }
    }
?>