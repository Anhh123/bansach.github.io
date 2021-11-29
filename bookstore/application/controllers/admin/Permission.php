<?php
	class Permission extends MY_Controller
	{

		function __construct()
		{
			parent::__construct();
		}

		function deny(){
			 $this->data['temp'] = 'admin/permission';
	         $this->load->view('admin/main', $this->data);
		}
	}
?>