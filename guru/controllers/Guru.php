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
    }

    public function index() {
    	if ($this->session->userdata('id_guru')) {
    		# code...
    	
        $this->load->view('guru/layout/header');
        $this->load->view('guru/layout/nav');
        $this->load->view('guru/layout/footer');
    }
    else{
            redirect('Login');
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

function data_guru(){


}



}
