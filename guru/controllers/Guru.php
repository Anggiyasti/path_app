<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Guru extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mguru');
        $this->load->helper(array('form', 'url', 'file', 'html'));
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->session->userdata('id_guru')) {
            # code...
        
        $this->load->view('layout/header');
        $this->load->view('layout/nav');
        $this->load->view('layout/footer');
    }
        else{
            redirect('login');
        }

}

    public function edit_guru() {
        if ($this->input->post('update')) 
        {
            $this->Mguru->update_guru();
            
            if ($this->db->affected_rows())
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
                redirect('guru/profileguru');
            }
            else
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
                redirect('guru/profileguru');
            }
        }
        
    }


    public function Profileguru() {
   
    $data['guru'] = $this->Mguru->get_guru();
    $data['email']=$this->session->userdata['email'];
        $this->load->view('layout/header');
        $this->load->view('profileset', $data);
        $this->load->view('layout/footer');
    
}

public function ubah_password() {
        if ($this->input->post('update')) 
        {
            $this->Mguru->ubah_passguru();
            
            if ($this->db->affected_rows())
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
                redirect('guru/ubahpass');
            }
            else
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
                redirect('guru/ubahpass');
            }
        }
        
    }

public function ubahpass() {
   
    $data['guru'] = $this->Mguru->get_guru();
    // $data['email']=$this->session->userdata['email'];
        $this->load->view('layout/header');
        $this->load->view('profileset', $data);
        $this->load->view('layout/footer');
    
}

function data_guru(){


}
public function ubahkatasandi() {

        //load library n helper
    $this->load->helper( array( 'form', 'url' ) );
    $this->load->library( 'form_validation' );


        //syarat pengisian form perubahan pasword
    $this->form_validation->set_rules( 'password', 'Kata Sandi Baru', 'required|matches[verifypass]' );
    $this->form_validation->set_rules( 'verifypass', 'Password Confirmation', 'required' );

        //pesan error atau pesan kesalahan pengisian form
    $this->form_validation->set_message( 'required', '*tidak boleh kosong!' );
    $this->form_validation->set_message( 'matches', '*Kata Sandi tidak sama!' );


    if ( $this->form_validation->run() == FALSE ) {
     $data['guru'] = $this->Mguru->get_guru();
     $this->load->view('layout/header');
        $this->load->view('profileset', $data);
        $this->load->view('layout/footer');
 } else {
    $katasandi = htmlspecialchars( md5( $this->input->post( 'password' ) ) );
    $id_guru = htmlspecialchars( $this->input->post( 'id_guru' ) );
    $data_post = array(
        'password' => $katasandi,
        );
    $this->Mguru->update_katasandi( $katasandi, $id_guru );
}
}



}
