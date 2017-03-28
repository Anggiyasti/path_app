<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->model('Madmin');
        $this->load->helper(array('form', 'url', 'file', 'html'));

    }

	public function index() {
		//hak akses admin
        if ($this->session->userdata('id_admin')) {        
        $data['mapel']=$this->Madmin->getmapel();
        $data['data'] = $this->Madmin->getsoal();
        $list= $this->Madmin->getkesulitanfilter();
		$this->load->view('layout/header',$data);
        $this->load->view('layout/nav');
        $this->load->view('layout/footer');
    }
    //jika bukan admin akan dialihkan ke login
        else{

            redirect('Login');
        }
		
	}


    public function edit_admin() {
    	//edit profile setting admin
        if ($this->input->post('update')) 
        {
            $this->Madmin->update_admin();
            //jika profile berhasil diedit
            if ($this->db->affected_rows())
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
                redirect('admin/Profileadmin');
            }
            //jika profile tidak berhasil diedit
            else
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
                redirect('admin/Profileadmin');
            }
        }
        
    }


//untuk tampil profile setting admin
    public function Profileadmin() {
   
    $data['admin'] = $this->Madmin->get_admin();
    $data['id_admin']=$this->session->userdata['id_admin'];
        $this->load->view('layout/header');
        $this->load->view('profilesetadmin', $data);
        $this->load->view('layout/footer');
    
}


}