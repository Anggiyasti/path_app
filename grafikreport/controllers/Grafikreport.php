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
        // jika hak akses siswa
        if ($this->session->userdata('id_siswa')) {
            // get data nilai tertinggi
            $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
            // get data mata pelajaran
            $data['mapel'] = $this->Mgrafik->getdaftarmapel();
            // get data log activity
            $data['log']  = $this->Loginmodel->getlogact();
            $sis = $this->session->userdata('id_siswa');
            // get data siswa
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('baru/v-grafik-mapel', $data);
            $this->load->view('template/siswa2/v-footer');
        } else {
            redirect('login');
        }
	}

	// fungsi tampil grafik report workout
    public function grafik($no) {
        // jika hak akses siswa
        if ($this->session->userdata('id_siswa')) {
           // get data nilai tertinggi
            $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
            // get data mata pelajaran
            $data['mapel'] = $this->Mgrafik->getdaftarmapel();
            // get data log activity
            $data['log']  = $this->Loginmodel->getlogact();
            $sis = $this->session->userdata('id_siswa');
            // get data siswa
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $mapel = urldecode($no);
            // get nama bab
            $data['bab'] = $this->Mgrafik->get_mapel_bab($mapel);
            // get grafik report
            $data['c'] = $this->Mgrafik->chart_model($mapel);
            // get total grafik
            $total_grafik = $this->Mgrafik->hitung_total($mapel)[0]['total_grafik'];
            // get jumlah bab
            $jumlah = $this->Mgrafik->hitung_bab($mapel)[0]['jumlah'];
            if ($total_grafik == '' && $jumlah == '') {
                $data['total'] = 0;
            } else { 
            $data['total'] = $total_grafik / $jumlah;
            }
            $data['mapel'] = $mapel;

            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('baru/v-chart',$data);
            // $this->load->view('template/siswa2/v-footer'); 
        }

    }
	
}
?>