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

		// insert siswa
		public function insertUser($data)
		{
			return $this->db->insert('tb_siswa', $data);
		}

		// fungsi send email
		public function sendEmail($to_email)
		{
			$from_email = 'noreply@sibejooclass.com';
			$subject = 'Verify Your Email Address';
			$message = 'Dear Journal Student,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> '. base_url() .' index.php/registrasi/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Path Team';

			//configure email settings
        $config['protocol'] = 'mail';
        $config['smtp_host'] = 'mail.sibejooclass.com'; //smtp host name
        $config['smtp_port'] = '587'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'lainkaliaja123'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $config['smtp_timeout'] = '15';
        $add = $to_email;
        $this->email->initialize($config);
        $list = array('putrianggiyasti@gmail.com');
        // send mail
        $this->email->from($from_email, 'Path Domain');
        $this->email->to($list);
        $this->email->subject($subject);
        $this->email->message($message);
         if ($this->email->send()) {
        echo 'Your email was sent, thanks chamil.';
    } else {
        show_error($this->email->print_debugger());
    }
        // return $this->email->send();

		}

		// FUNGSI VERIFY KODE EMAIL
		public function verifyEmailID($key)
		{
			$data = array('status' => 1);
			$this->db->where('md5(email)', $key);
			return $this->db->update('tb_siswa', $data);
		}

		public function send_cobaemail($email) {

        // $this->set_resetcode($email);

        $this->load->library('email'); // load email library

        // $verifikasiCode = $this->verifikasiCode;

        $address = $email;

        $this->email->from('noreply@sibejooclass.com', 'Neon');

        $this->email->to($address);

        $this->email->subject('Reset Password');

        $message = '<html><meta/><head/><body>';

        $message .='<p> Permintaan reset password telah diproses,</p>';

        $message .='<p>Silahkan <strong><a href="' . base_url() . 'index.php/register/verifikasiPassword>klik disini</a></strong> untuk melakukan reset password akun anda. </p>';

        $message .= '<p>Terimakasih</p>';

        $message .= '<p>Neon</p>';

        $message .= '</body></html>';

        $this->email->message($message);

        $this->email->send();

       if ($this->email->send())

           echo "Mail Sent!"; //untuk testing

       else

           show_error($this->email->print_debugger()); //untuk testing

    }
}

 ?>