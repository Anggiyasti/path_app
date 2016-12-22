<?php 

/**
* 
*/
class Forgot_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

    public function cobalagiah()
    {
        $email = $this->input->post('email');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.sibejooclass.com',
            'smtp_port' => 587,
            'smtp_user' => 'noreply@sibejooclass.com',
            'smtp_pass' => 'lainkaliaja123'
            );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('noreply@sibejooclass.com', 'Coba');
        $this->email->to($email);
        $this->email->subject('THis email');
        $this->email->message('Its working');

        if ($this->email->send()) {
            echo "Berhasil dikirim";
        } else {
            show_error($this->email->print_debug);
        }
    }

    // fungsi udah berhasil kalo dirumah
    // public function kirimemail($nama_depan, $email)
    // {
    public function kirimemail($nama_depan)
    {
        $ci = get_instance();
        $ci->load->library('email');
        $config = Array(
            //configure email settings
        $config['protocol'] = 'smtp',
        $config['smtp_host'] = 'mail.sibejooclass.com', //smtp host name
        $config['smtp_port'] = '587', //smtp port number
        $config['smtp_user'] = 'noreply@sibejooclass.com',
        $config['smtp_pass'] = 'lainkaliaja123', //$from_email password
        $config['mailtype'] = 'html',
        $config['charset'] = 'iso-8859-1',
        $config['wordwrap'] = TRUE,
        $config['newline'] = "\r\n"
        ); //use double quotes

        // $this->load->library('email');
        
        
        $ci->email->initialize($config);
        $email_code = '123';
        // $email_code = md5($this->config->item('salt') . $nama_depan);
        // $email_code = sha1($this->config->item('salt') . $nama_depan);
        $ci->email->from('noreply@sibejooclass.com', 'Your Name');
        $list = $this->input->post('email');
        // $list = $email;
        $ci->email->to(array($list));
        $ci->email->subject('Verifikasi Password');
        $message = '<html><meta/><head/><body>';

        $message .='<p> Permintaan reset password telah diproses,</p>';

        // $message .='<p>Silahkan <strong><a href="' . base_url() . 'index.php/registrasi/verify/' . $email_code . '">klik disini</a></strong> untuk melakukan reset password akun anda. </p>';
        // yang udh berhasil
        // $message .='<p>Silahkan <strong><a href="' . base_url() . 'index.php/forgot/verifikasiPassword/' . $list . '/' .$email_code . '">klik disini</a></strong> untuk melakukan reset password akun anda. </p>';
        $message .='<p>Silahkan <strong><a href="' . base_url() . 'index.php/forgot/reset_password_form/' . $list . '/' .$email_code . '">klik disini</a></strong> untuk melakukan reset password akun anda. </p>';

        $message .= '<p>Terimakasih</p>';

        $message .= '<p>Neon</p>';

        $message .= '</body></html>';
        $ci->email->message($message);
        if ($this->email->send()) {
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }
}

public function verify_reset_pass_code($email, $code)
{
    $sql = "SELECT nama_depan, email FROM tb_siswa WHERE email = '{$email}' LIMIT 1";
    $result = $this->db->query($sql);
    $row = $result->row();

    if ($result->num_rows() === 1) {
        return ($code == md5($this->config->item('salt') . $row->nama_depan)) ? true : false;
    } else {
        return false;
    }
}

public function ubah_pass()
{
    $email = $this->input->post('email');
    $password = sha1($this->config->item('salt') . $this->input->post('password'));

    $sql = "UPDATE tb_siswa SET password = '{$password}' WHERE email = '{$email}' LIMIT 1";
    $this->db->query($sql);

    if ($this->db->affected_rows() === 1) {
        return true;
    } else {
        return false;
    }
}

public function verifikasi_password($address, $code) {

        $this->db->select('regTime');

        $this->db->from('tb_siswa');

        $this->db->where('email', $address);

        $this->db->limit(1);

        $result = $this->db->get();

        $row = $result->row();



        if ($result->num_rows() === 1) {

            if (md5((string) $row->regTime) === $code) {

                $this->session->set_userdata('reset_email', $address);

                $this->session->set_userdata('reset_password', '1');

                redirect(base_url('index.php/forgot/resetpassword'));

            } else {

                redirect(base_url('index.php/forgot/resetpassword'));
            }

        } else {

            redirect(base_url('index.php/forgot/resetpassword'));

        }

    }


     //cek user dari validasi email

    public function cekUser($email) {

        $this->db->select('*');

        $this->db->from('tb_siswa');

        $this->db->where('email', $email);

        $this->db->limit(1);



        $query = $this->db->get();

        if ($query->num_rows() == 1) {

//            echo "ada akun";

            return $query->result(); //if data is true

        } else {

//            echo 'tidak ada akun';

            return false; //if data is wrong

        }

    }


    //send verification email to user's email id
    function sendEmail($to_email)
    {
        $from_email = 'noreply@sibejooclass.com'; //change this to yours
        $subject = 'Reset Password';
        $message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://www.mydomain.com/user/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Mydomain Team';
        
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
        
        //send mail
        $this->email->from($from_email, 'Mydomain');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }

	public function send($to_email)
		{

        $config = Array(
            //configure email settings
        $config['protocol'] = 'smtp',
        $config['smtp_host'] = 'mail.sibejooclass.com', //smtp host name
        $config['smtp_port'] = '587', //smtp port number
        $config['smtp_user'] = 'noreply@sibejooclass.com',
        $config['smtp_pass'] = 'lainkaliaja123', //$from_email password
        $config['mailtype'] = 'html',
        $config['charset'] = 'iso-8859-1',
        $config['wordwrap'] = TRUE,
        $config['newline'] = "\r\n"); //use double quotes

        $this->load->library('email', $config);

			$subject = 'Verify Your Email Address';
			$message = 'Dear Student Lovers,<br /><br />Please click on the below activation link to verify your email address';
			$message = '<p>Silahkan <strong><a href="' . base_url() . 'index.php/register/verifikasiPassword/' . md5($from_email) . ' ">klik disini</a></strong> untuk melakukan reset password akun anda. </p>';

        // send mail
    $this->email->from('noreply@sibejooclass.com'); // change it to yours
      $this->email->to('putrianggiyasti@gmail.com');// change it to yours
      $this->email->subject('Resume from JobsBuddy for your Job posting');
      $this->email->message($message);
      return $this->email->send();
        if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }


		}

		public function verifyEmailID($key)
		{
			$data = array('status' => 1);
			$this->db->where('md5(email)', $key);
			return $this->db->update('tb_siswa', $data);
		}

		//cek user dari validasi email

//     public function cekUser($email) {

//         $this->db->select('*');

//         $this->db->from('tb_siswa');

//         $this->db->where('email', $email);

//         $this->db->limit(1);



//         $query = $this->db->get();

//         if ($query->num_rows() == 1) {

// //            echo "ada akun";

//             return $query->result(); //if data is true

//         } else {

// //            echo 'tidak ada akun';

//             return false; //if data is wrong

//         }

//     }

    public function send_reset_email($email) {

        // $this->set_resetcode($email);

        $this->load->library('email'); // load email library

        $verifikasiCode = $this->verifikasiCode;

        $address = $email;

        $from_email = 'noreply@sibejooclass.com';
        $subject = 'Verify Your Email Address';
        $message = '<html><meta/><head/><body>';

        $message .='<p> Permintaan reset password telah diproses,</p>';

        $message .='<p>Silahkan <strong><a href="' . base_url() . 'index.php/forgot/verifikasiPassword/' . $address . '/' . $verifikasiCode . '">klik disini</a></strong> untuk melakukan reset password akun anda. </p>';

        $message .= '<p>Terimakasih</p>';

        $message .= '<p>Neon</p>';

        $message .= '</body></html>';


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
        $this->email->to($address);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();

       if ($this->email->send())

           echo "Mail Sent!"; //untuk testing

       else

           echo "There is error in sending mail!"; //untuk testing

    }

    public function reset_katasandi($email, $password) {

        // $email = $this->session->userdata['reset_email'];

        $this->db->where('email', $email);

        $this->db->set('password', $password);

        $this->db->update('tb_siswa');

    }

    public function updatepassword($key)
    {
        $password = sha1($this->config->item('salt') . $this->input->post('password'));

        $sql = "UPDATE tb_siswa SET password = '{$password}' WHERE email = '{$email}' LIMIT 1";
        $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return true;
        } else{
            return false;
        }

    }
}



 ?>