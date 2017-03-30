<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MX_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Msiswa');
        $this->load->model('login/Loginmodel');
        $this->load->model('Workout1/Mworkout1');
        $this->load->helper(array('form', 'url', 'file', 'html'));
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/nav');
    }

    // get jurusan universitas
    function ambil_univ_jur(){
      //fungsi ambil data unruk dropdown
    $modul=$this->input->post('modul');
    $id=$this->input->post('id');
    var_dump($modul);

        if($modul=="getjur"){
            echo $this->Msiswa->getjur($id);
        }
    }

    // get jurusan dari universitas
    public function get_jurusan()
    {
      $univ = $this->input->post('univ');
      echo $this->Msiswa->getjur($univ);
    }

    // update prodi siswa
    public function update_siswa($jur, $univ) {
        $this->Msiswa->up_siswa($jur, $univ);
        if ($this->db->affected_rows())
        {
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">prodi berhasil diupdate </div>');
            redirect('passinggrade/univ_wilayah/1');
        }
        else
        {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">prodi sudah pernah diambil</div>');
            redirect('passinggrade/univ_wilayah/1');
            }
        
    }
    
    // fungsi update profile siswa
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

    // FUNGSI UPDATE SOCIAL MEDIA SISWA
    public function edit_sosmed() {
        if ($this->input->post('update')) 
        {
            $this->Msiswa->update_sosmed();
            
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

    // FUNGSI VIEW FORM PROFILE SISWA
	public function Profilesiswa() {
        // PENGECEKAN HAK AKSES
        if ($this->session->userdata('id_siswa')) {
            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);   
            $data['sis'] = $this->Msiswa->get_siswa();
            $data['univ']=$this->Msiswa->getuniv();
            $data['email']=$this->session->userdata['email'];
            $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
            $data['log']  = $this->Loginmodel->getlogact();

            $this->load->view('template/siswa2/v-header',$data);
            $this->load->view('profile_siswa',$data);
            $this->load->view('template/siswa2/v-footer');
        }
        else{
            redirect('Login');
        }  
    }


    // FUNGSI UBAH PASSWORD SISWA
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

    // FUNGSI VIEW PASSWORD SISWA
    public function passwordsiswa() {
        // PENGECEKAN HAK AKSES
       if ($this->session->userdata('id_siswa')) {
        $sis = $this->session->userdata('id_siswa');
        $data['sis'] = $this->Msiswa->get_siswa();
        $data['siswa']  = $this->Loginmodel->get_siswa($sis); 
        $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
        $data['log']  = $this->Loginmodel->getlogact();  

        $this->load->view('template/siswa2/v-header',$data);
        $this->load->view('profile_siswa',$data);
        $this->load->view('template/siswa2/v-footer');
        }
        else{
            redirect('Login');
        }   
    }

    // FUNGSI UPLOAD PHOTO SISWA
    public function upload($oldphoto) {
        unlink(FCPATH . "./assets/images/siswa/" . $oldphoto);
        $config['upload_path'] = './assets/images/siswa';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv';
        $config['max_size'] = 580;
        $config['max_width'] = 2500;
        $config['max_height'] = 1500;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $data['error'] = array('error' => $this->upload->display_errors());
            $data['siswa'] = $this->Msiswa->get_siswa();
            $this->Msiswa->update_photo_default();
        } else {
            $file_data = $this->upload->data();
            $photo = $file_data['file_name'];
            $this->Msiswa->update_photo($photo);
            echo "berhasil upload"; //for testing
        }
    }

    // FUNGSI VIEW REPORT SISWA
    function reportSiswa($id_siswa) {
        if (!isset($id_siswa)) {
            echo 'kosong';
        } else {
            $id_siswa = $id_siswa;
            $data['report'] = $this->Msiswa->get_reportlatihan_siswa($id_siswa);
        $this->load->view('admin/layout/header');
        $this->load->view('reportsiswa',$data);
        $this->load->view('admin/layout/footer');
       }
    }

}