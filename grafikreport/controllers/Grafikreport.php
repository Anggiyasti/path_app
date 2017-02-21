<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafikreport extends MX_Controller {

	public function __construct() {
       parent::__construct();
		$this->load->model('Mgrafik');
        $this->load->model('login/Loginmodel');
        $this->load->model('Workout1/Mworkout1');

    }

	public function index() {
		$data['mapel'] = $this->Mgrafik->getdaftarmapel();
         $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('baru/v-grafik-mapel', $data);
        $this->load->view('template/siswa2/v-footer');
		// $this->load->view('template/header');
  //       $this->load->view('v-header');
		// $this->load->view('pilih_mapel', $data);
            // $this->load->view('template/siswa/v-head');
            // $this->load->view('v-mapel',$data);
            // $this->load->view('template/siswa/v-footer'); 
	}

	// fungsi pilihan bab
    public function pilih_bab_report($no) {
            if ($this->session->userdata('id_siswa')) {
            // $d = $this->input->post('');
            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Mgrafik->get_siswa($sis);
            $mapel = urldecode($no);
            $data['bab'] = $this->Mgrafik->get_mapel_bab($mapel);
            $data['c'] = $this->Mgrafik->chart_model($mapel);
             $data['total'] = $this->Mgrafik->chart_total($mapel);
            $data['mapel'] = $mapel;
            // $this->load->view('template/header');
            // $this->load->view('v-header');
            
            // $this->load->view('v-chart2', $data);
            // $this->load->view('bab_grafik', $data);

             $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('baru/v-chart',$data);
            // $this->load->view('template/siswa2/v-footer'); 
        }

    }

    public function greport($bab) {
    $data['report'] = $this->Mgrafik->get_greport($bab);
    $data['c'] = $this->Mgrafik->chart_model($bab);
    


        // $this->load->view('template/header');
        // $this->load->view('v-header');
        // $this->load->view('Videoback/layout/header');
    $this->load->view('template/header');
            $this->load->view('v-header');
        $this->load->view('v-greport', $data);
    }


    // buat nampilin grafik bar
    public function chart()
    {
        $data['c'] = $this->Mgrafik->chart_model();
        $this->load->view('v-chart',$data);
    }




	


}