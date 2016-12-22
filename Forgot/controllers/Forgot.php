<?php 

/**
* 
*/
class Forgot extends MX_Controller
{
	
	function __construct()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		$this->load->model('Forgot_model');
	}

    public function cobalagiah()
    {
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
        $this->email->to('anggiyasti.putri@mail.unpas.ac.id');
        $this->email->subject('klik');
        $this->email->message('Its working');

        if ($this->email->send()) {
            echo "Berhasil dikirim";
        } else {
            echo "Gagal";
            // show_error($this->email->print_debug);
        }
    }



    public function index()
	{
    
		 // $this->load->view('layout/header');
   //      $this->load->view('layout/nav');
        $this->load->view('template/header');
        $this->load->view('template/sidebar-login');
        $this->load->view('v_forget');
        
	}

	function reset() {
		$this->load->view('layout/header');
        $this->load->view('layout/nav');
        $this->load->view('v-reset-password');
        $this->load->view('layout/footer');
    }

    public function update_password()
    {
        // if (isset($_POST['email'], $_POST['email_hash']) || $_POST['email_hash'] !== sha1($_POST['email'] . $_POST['email_code'])) {
        //     die("Error");
        // }

        $result = $this->Forgot_model->ubah_pass();
        if ($result) {
            $this->load->view('sukses');
        } else {
            $this->load->view('registrasi');
        }
    }

    public function resetpassword() {

        if (!empty($this->session->userdata['reset_email']) && $this->session->userdata['reset_password'] == '1') {



            $this->load->view('v-reset-password');


        } else {

            $this->load->view('v-reset-password');

        }

    }

// fungsi berhasil kalo dirumah
    public function cobalupa()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $email = $this->input->post('email');
        if ($result = $this->Forgot_model->cekUser($email)) {
         $this->Forgot_model->kirimemail($result);
         $this->session->set_flashdata('notif', ' Cek email mu, kode reset telah dikirim');
        redirect(base_url('index.php/forgot'));
        return TRUE;
        } else {
            $this->session->set_flashdata('notif', ' Akun dengan email yang dimasukan tidak ada');
            redirect(base_url('index.php/forgot'));

            return FALSE;
        }
    }


    function verifyPassword($hash=NULL)
    {
        if ($this->Forgot_model->updatepassword($hash))
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('registrasi/register');
        }
        else
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('registrasi/register');
        }
    }

    //set verifikasi code untuk memverifikasi email

    private function set_verifikasicode($penggunaID) {

        $sql = "SELECT regTime FROM tb_siswa WHERE id= '" . $penggunaID . "'";

        $result = $this->db->query($sql);

        $row = $result->row();

        $verifikasiCode = md5((string) $row->regTime);

        $sess_array = array(

            'verifikasiCode' => $verifikasiCode,

        );

        $this->session->set_userdata($sess_array);

    }

    public function resetdatapassword() {

        $newpassword = htmlspecialchars(md5($this->input->post('password')));

        $this->Forgot_model->reset_katasandi($newpassword);

        $this->session->unset_userdata("reset_email");

        $this->session->unset_userdata('reset_password');

        $this->session->set_flashdata('notif', ' Kata sandi mu telah berhasil dirubah');

        redirect(base_url('index.php/login'));

    }

    public function reset_password_form($email, $email_code)
    {
        if (isset($email, $email_code)) {
            $email = trim($email);
            $email_hash = sha1($email . $email_code);

            $verified = $this->Forgot_model->verify_reset_pass_code($email, $email_code);

            if ($verified) {
                $this->load->view('v-update-pass', array('email_hash' => $email_hash, 'email_code' => $email_code, 'email' => $email));
            } else {
                $this->load->view('v-update-pass', array('email_hash' => $email_hash, 'email_code' => $email_code, 'email' => $email));
            }
        }
    }

    public function verifikasiPassword($address, $code) {

        $this->Forgot_model->verifikasi_password($address, $code);

    }

    public function lupapass()
    {
        //set validation rules
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[user.email]');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('v-forgot');
        }
        else
        {
            
                // send email
                if ($this->user_model->sendEmail($this->input->post('email')))
                {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
                    redirect('user/register');
                }
                else
                {
                    // error
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                    redirect('user/register');
                
            }
        }
    }
    
    function verify($hash=NULL)
    {
        if ($this->user_model->verifyEmailID($hash))
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('user/register');
        }
        else
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('user/register');
        }
    }

    //function untuk mengganti password akun

    public function ch_sent_reset() {

        //load library n helper

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');


        $email = htmlspecialchars($this->input->post('email'));


        if ($result = $this->Forgot_model->cekUser($email)) {

            //variabelSession

            $this->Forgot_model->send($email);

            $this->session->set_flashdata('notif', ' Cek email mu, kode reset telah dikirim');

            redirect(base_url('index.php/forgot'));

            return TRUE;

        } else {

            $this->session->set_flashdata('notif', ' Akun dengan email yang dimasukan tidak ada');

            redirect(base_url('index.php/forgot'));

            return FALSE;

        }

    }

    public function updatepassword()
    {
                    $email = $this->input->post('email');

        $password = md5($this->input->post('password'));
        
        if ($result = $this->Forgot_model->cekUser($email)) {
            $this->Forgot_model->reset_katasandi($email, $password);

            $this->session->set_flashdata('notif', ' Berhasil diupdate');

            $this->load->view('sukses');

            return TRUE;
        }
        else {

            $this->session->set_flashdata('notif', ' Akun dengan email yang dimasukan tidak ada');

            redirect(base_url('index.php/forgot/reset'));

            return FALSE;

        }
    }

    function sendMail()
{
    $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'mail.sibejooclass.com',
  'smtp_port' => '587',
  'smtp_user' => 'noreply@sibejooclass.com', // change it to yours
  'smtp_pass' => 'lainkaliaja123', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

        // $message = 'HEllo';
        $this->load->library('email');
        $this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from('noreply@sibejooclass.com', 'admin');
$this->email->to('anggiyasti.putri@mail.unpas.ac.id');
$this->email->subject('Registration Verification:');

$message = "Thanks for signing up! Your account has been created, you can login with your credentials after you have activated your account by pressing the url below. Please click this link to activate your account:<a href='.base_url('user/verify').'/'.$verification_code.'>Click Here</a>"; 

$this->email->message($message);

$this->email->send();

echo $this->email->print_debugger();
    //   $this->email->from('noreply@sibejooclass.com', 'anggiyasti'); // change it to yours
    //   $this->email->to('anggiyasti.putri@mail.unpas.ac.id');// change it to yours
    //   $this->email->subject('Resume from JobsBuddy for your Job posting');
    //   $this->email->message($message);
    //   $this->email->send();
    //   if($this->email->send())
    //  {
    //   echo 'Email sent.';
    //  }
    //  else
    // {
    //  show_error($this->email->print_debugger());
    //}
}


}
 ?>