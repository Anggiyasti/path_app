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

    public function index()
	{

        $this->load->view('login/layout_login/header');
        $this->load->view('form_forget');
        $this->load->view('login/layout_login/footer');
        
	}

    public function resetpassword() {

        if (!empty($this->session->userdata['reset_email']) && $this->session->userdata['reset_password'] == '1') {



            $this->load->view('v-reset-password');


        } else {

            $this->load->view('v-reset-password');

        }

    }

    // fungsi forgot password
    public function cobalupa()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $email = $this->input->post('email');
        // pengecekan user 
        if ($result = $this->Forgot_model->cekUser($email)) {
            // call fungsi kirim email
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

    function reset() {
        $this->load->view('layout/header');
        $this->load->view('layout/nav');
        $this->load->view('v-reset-password');
        $this->load->view('layout/footer');
    }


    public function resetdatapassword() {

        $newpassword = htmlspecialchars(md5($this->input->post('password')));

        $this->Forgot_model->reset_katasandi($newpassword);

        $this->session->unset_userdata("reset_email");

        $this->session->unset_userdata('reset_password');

        $this->session->set_flashdata('notif', ' Kata sandi mu telah berhasil dirubah');

        redirect(base_url('index.php/login'));

    }

    // fungsi view form reset password
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

    // fungsi update password
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

            redirect(base_url('login'));

            return FALSE;

        }
    }

}
 ?>