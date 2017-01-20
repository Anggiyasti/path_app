<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MX_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Msiswa');
        $this->load->helper(array('form', 'url', 'file', 'html'));
        $this->load->library('form_validation');
    }

    function ambil_univ_jur(){
      //fungsi ambil data unruk dropdown
    $modul=$this->input->post('modul');
    $id=$this->input->post('id');

    if($modul=="getjur"){
    echo $this->Msiswa->getjur($id);
  }
  }


	

	public function index() {
		$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/nav');
	}

	public function edit_siswa() {
		if ($this->input->post('update')) 
		{
			$this->Msiswa->update_siswa();
			
			if ($this->db->affected_rows())
			{
				 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
				redirect('Siswa/Profilesiswa');
			}
			else
			{
				 $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
				redirect('Siswa/Profilesiswa');
			}
		}
		
	}


	public function Profilesiswa() {
   
    $data['Siswa'] = $this->Msiswa->get_siswa();
    $data['univ']=$this->Msiswa->getuniv();
    $data['email']=$this->session->userdata['email'];
    	$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('profilesetsiswa',$data);
       
    
}

public function ubahpass_siswa() {
        if ($this->input->post('update')) 
        {
            $this->Msiswa->ubah_katasandi();
            
            if ($this->db->affected_rows())
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
                redirect('Siswa/passwordsiswa');
            }
            else
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
                redirect('Siswa/passwordsiswa');
            }
        }
        
    }

    public function passwordsiswa() {
   
    $data['Siswa'] = $this->Msiswa->get_siswa();
    // $data['email']=$this->session->userdata['email'];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('profilesetsiswa',$data);
       
    
}




public function upload($oldphoto) {
        unlink(FCPATH . "./assets/images/siswa/" . $oldphoto);
        $config['upload_path'] = './assets/images/siswa';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {


            $data['error'] = array('error' => $this->upload->display_errors());
            $data['siswa'] = $this->Msiswa->get_siswa();
            $this->load->view('layout/header');
        	$this->load->view('layout/sidebar');
        	$this->load->view('profilesetsiswa',$data);

            // $this->load->view('beranda/main_view',$error);,
        } else {
            $file_data = $this->upload->data();
            $photo = $file_data['file_name'];
            $this->Msiswa->update_photo($photo);
            echo "berhasil upload"; //for testing
            // $data['img'] = base_url().'/images/'.$file_data['file_name'];
            // $this->load->view('beranda/success_msg',$data);
        }
    }

     function reportSiswa($id_siswa) {
        if (!isset($id_siswa)) {
            echo 'kosong';
        } else {
            $id_siswa = $id_siswa;
            $data['report'] = $this->Msiswa->get_reportlatihan_siswa($id_siswa);
//            var_dump($data);

        $this->load->view('admin/layout/header');
        $this->load->view('reportsiswa',$data);
        $this->load->view('admin/layout/footer');
       }
    }

}