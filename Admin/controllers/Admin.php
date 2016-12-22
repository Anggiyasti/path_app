<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->murl = 'assets/adminre/';
        $this->load->model('Madmin');
        $this->load->helper(array('form', 'url', 'file', 'html'));

    }

	public function index() {
        if ($this->session->userdata('id_admin')) {
            # code...
        
        $data['mapel']=$this->Madmin->getmapel();
        $data['data'] = $this->Madmin->getsoal();
        $list= $this->Madmin->getkesulitanfilter();
		$this->load->view('layout/header',$data);
        $this->load->view('layout/nav');
        $this->load->view('layout/footer');
    }
        else{
            redirect('Login');
        }
		
	}


    public function edit_admin() {
        if ($this->input->post('update')) 
        {
            $this->Madmin->update_admin();
            
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


    public function Profileadmin() {
   
    $data['admin'] = $this->Madmin->get_admin();
    $data['username']=$this->session->userdata['username'];
        $this->load->view('layout/header');
        $this->load->view('profilesetadmin', $data);
        $this->load->view('layout/footer');
    
}

}