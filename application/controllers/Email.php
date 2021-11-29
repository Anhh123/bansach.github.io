<?php if (!defined('BASEPATH')) exit('No direct script access allowod'){
	# code...

	/**
	* Sen Email
	*/

			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['charset'] = 'utf-8';
			$config['mailtype'] = 'html';
			$config['wordwrap'] = TRUE;
			$this->email->initialize($config);
			$config['protocol']     = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.googlemail.com'; //neu sử dụng gmail
			$config['smtp_user']    = 'binbiphanth11@gmail.com';
			$config['smtp_pass']    = 'Binladen123';
			$config['smtp_port']    = '465'; //nếu sử dụng gmail

			//cau hinh email va ten nguoi gui
			$this->email->from('binbiphanth11@gmail.com', 'Phan Văn Quí');

			//cau hinh nguoi nhan
			$this->email->to('binbiphanth11@gmail.com');

			$this->email->subject('Cám ơn bạn đã sử dụng');

			$this->email->message('Hello');

			//dinh kem file
			$this->email->attach('');

			//thuc hien gui
			if ( ! $this->email->send()){
			    // Generate error
			    echo $this->email->print_debugger();
			}else{
			    echo 'Gửi email thành công';
			}
}

 ?>