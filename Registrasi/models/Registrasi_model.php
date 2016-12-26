<?php 

/**
* 
*/
class Registrasi_model extends CI_Model
{
	
	function __construct()
		{
			parent::__construct();
		}

		public function insertUser($data)
		{
			return $this->db->insert('tb_siswa', $data);
		}

		public function sendEmail($to_email)
		{
			$from_email = 'noreply@sibejooclass.com';
			$subject = 'Verify Your Email Address';
			$message = 'Dear Student Lovers,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> '. base_url() .' index.php/registrasi/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Path Team';

			//configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.sibejooclass.com'; //smtp host name
        $config['smtp_port'] = '587'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'lainkaliaja123'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);

        // send mail
        $this->email->from($from_email, 'Path Domain');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();

		}

		public function verifyEmailID($key)
		{
			$data = array('status' => 1);
			$this->db->where('md5(email)', $key);
			return $this->db->update('tb_siswa', $data);
		}
}

 ?>