<?php
	Class Test_new extends MY_Controller
	{
		function __contruct(){
			parent::__construct();

		}

		//lay danh sach tin tuc
		//domain/tieu-de-chuyen-muc
		function lists($page = 1){
			var_dump($page);
		}

		function detail(){

		}

	}
?>