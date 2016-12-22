<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Clupa extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('vHome');
    }

    public function lupaPassword() {

        $data = array(

            'judul_halaman' => 'Lupa Password - Neon'

        );



        $data['files'] = array(

            APPPATH . 'modules/homepage/views/v-header.php',

            APPPATH . 'modules/register/views/vLupapassword.php',

            APPPATH . 'modules/homepage/views/v-footer.php',

        );



        $this->parser->parse('templating/index', $data);

    }


public function resetpassword() {

        if (!empty($this->session->userdata['reset_email']) && $this->session->userdata['reset_password'] == '1') {



            $data = array(

                'judul_halaman' => 'Reset Password - Neon'

            );



            $data['files'] = array(

                APPPATH . 'modules/homepage/views/v-header.php',

                APPPATH . 'modules/register/views/vResetPassword.php',

                APPPATH . 'modules/homepage/views/v-footer.php',

            );



            $this->parser->parse('templating/index', $data);

        } else {

            redirect(base_url('index.php/login'));

        }

    }



    //function untuk mengganti password akun

    public function ch_sent_reset() {

        //load library n helper

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');





        $email = htmlspecialchars($this->input->post('email'));



        if ($result = $this->mregister->cekUser($email)) {

            //variabelSession

            $this->mregister->send_reset_email($email);

            $this->session->set_flashdata('notif', ' Cek email mu, kode reset telah dikirim');

            redirect(base_url('index.php/register/lupapassword'));

            return TRUE;

        } else {

            $this->session->set_flashdata('notif', ' Akun dengan email yang dimasukan tidak ada');

            redirect(base_url('index.php/register/lupapassword'));

            return FALSE;

        }

    }



    public function verifikasiPassword($address, $code) {

        $this->mregister->verifikasi_password($address, $code);

    }



    public function resetdatapassword() {

        $newpassword = htmlspecialchars(md5($this->input->post('password')));

        $this->mregister->reset_katasandi($newpassword);

        $this->session->unset_userdata("reset_email");

        $this->session->unset_userdata('reset_password');

        $this->session->set_flashdata('notif', ' Kata sandi mu telah berhasil dirubah');

        redirect(base_url('index.php/login'));

    }

}
