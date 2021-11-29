<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//tao ra cac link trong admin
	function admin_url($url = '')
	{
	    return base_url('admin/'.$url);
	}