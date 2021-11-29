<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;


//dùng regex để rewrite lại đường dẫn tới controller product ngoài view
//nên xem kỹ document hướng dẫn về router của CI link: https://www.codeigniter.com/userguide3/general/routing.html
//nên tìm đọc các bài về rewrite url, regular expression php để hiểu được link dưới cũng như các ký tự
//tại sao mình không làm link vd: https://www.phukienchinhhang.com/gia-do-de-kep/gia-do-dien-thoai-gan-khe-may-lanh.html
//hoặc link  https://www.phukienchinhhang.com/gia-do-dien-thoai-gan-khe-may-lanh.html
//cho gọn mà phải làm như phía dưới (có thêm id ở sau cùng). Vì bác Tuyền người làm cái seri này không có hướng dẫn các bạn
//tạo slug cho product và category nên bây giờ mình làm chữa cháy cho các bạn hiểu.
/*
	tại đường dẫn: webproduct\application\views\site\home\index.php
	các bạn sẽ thấy mình echo ra dạng link như sau: <?php echo base_url($slug_product . '-' . $row->id . '.html')?>
	cái $slug_product được tạo ra bằng : <?php $slug_product = str_slug($row->name); ?>
	hàm str_slug nằm ở helper webproduct\application\helpers\common_helper.php
	hàm này tạo ra name của sản phẩm không dấu đồng thời thêm dấu "-" vào mỗi khoảng trắng.
	sau khi echo ra url cả sản phẩm thì nó có dạng: webproduct/tivi-lg-520.html tương ứng với rewrite ở phía dưới: $route['([A-Za-z0-9_-]+)-(:num).html'] = 'product/view/$2';
	nó sẽ tự động lấy cái biến (:num) được quy ước bằng $2 bỏ vào function view trong controller product webproduct\application\controllers\Product.php
	lúc này function không cần sài cái này nữa $id = $this->uri->rsegment(3);
*/
$route['pcat/(:any).html'] = function($slug){
	return 'redirect_url/redirect_cat/'.$slug;
};

$route['product/(:any).html'] = function($slug){
	return 'redirect_url/redirect_pro/'.$slug;
};

$route['san-pham'] = 'sanpham';
$route['san-pham/page/(:num)'] = 'sanpham/index/$1';
$route['san-pham/([A-Za-z0-9_-]+).html'] = 'sanpham/view/$1';


$route['tin-tuc'] = 'news';
$route['tin-tuc/([A-Za-z0-9_-]+)'] = 'news/news_view/$1';
$route['tin-tuc/page/(:num)'] = 'news/index/$1';

$route['dich-vu'] = 'dichvu';
$route['dich-vu/page/(:num)'] = 'dichvu/index/$1';
$route['dich-vu/([A-Za-z0-9_-]+).html'] = 'dichvu/view/$1';

$route['lien-he'] = 'contact/view';
$route['lien-he/page/(:num)'] = 'lienhe/index/$1';
$route['lien-he/([A-Za-z0-9_-]+).html'] = 'lienhe/view/$1';

$route['bao-hanh'] = 'baohanh/view';
// $route['bao-hanh/page/(:num)'] = 'baohanh/index/$1';
// $route['bao-hanh/([A-Za-z0-9_-]+).html'] = 'baohanh/view/$1';

$route['huong-dan'] = 'info/view';
// $route['huong-dan/page/(:num)'] = 'info/index/$1';
// $route['huong-dan/([A-Za-z0-9_-]+).html'] = 'info/view/$1';

$route['gioi-thieu'] = 'gioithieu/view';
// $route['gioi-thieu/page/(:num)'] = 'gioithieu/index/$1';
// $route['gioi-thieu/([A-Za-z0-9_-]+).html'] = 'gioithieu/view/$1';

$route['gio-hang'] = 'cart/customer';
// $route['gio-hang/page/(:num)'] = 'cart/customer/$1';
// $route['gio-hang/([A-Za-z0-9_-]+).html'] = 'cart/customer/$1';

$route['thong-tin-thanh-vien'] = 'user/index';
// $route['dang-ki/page/(:num)'] = 'user/register/$1';
// $route['dang-ki/([A-Za-z0-9_-]+).html'] = 'user/register/$1';

$route['dang-ki'] = 'user/register';
// $route['dang-ki/page/(:num)'] = 'user/register/$1';
// $route['dang-ki/([A-Za-z0-9_-]+).html'] = 'user/register/$1';

$route['dang-nhap'] = 'user/login';
// $route['dang-nhap/page/(:num)'] = 'user/register/$1';
// $route['dang-nhap/([A-Za-z0-9_-]+).html'] = 'user/register/$1';

$route['dang-xuat'] = 'user/logout';
// $route['dang-nhap/page/(:num)'] = 'user/register/$1';
// $route['dang-nhap/([A-Za-z0-9_-]+).html'] = 'user/register/$1';

$route['chinh-sua-thong-tin'] = 'user/edit';

$route['tim-kiem'] = 'product/search';
// $route['tim-kiem/page/(:num)'] = 'user/register/$1';
// $route['tim-kiem/([A-Za-z0-9_-]+).html'] = 'user/register/$1';

$route['them-san-pham'] = 'cart/add';


$route['san-pham/tim-kiem'] = 'search/index';
$route['([A-Za-z0-9_-]+)/([A-Za-z0-9_-]+).html'] = 'product/view/$2';

$route['(:any)/page'] = function ($slug) {
	return 'product/redirect_page_zero/'.$slug;
};

$route['([A-Za-z0-9_-]+)/page/(:num)'] = 'product/catalog/$1/$2';
$route['(:any)'] = 'product/catalog/$1';

//link phân trang sản phẩm mới ở trang chủ
$route['trang/(:num)'] = 'home/index/$1';