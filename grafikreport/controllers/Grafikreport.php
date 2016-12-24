<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafikreport extends MX_Controller {

	public function __construct() {
       parent::__construct();
		$this->load->model('Mgrafik');
    }

	public function index() {
		$data['mapel'] = $this->Mgrafik->getdaftarmapel();
		$this->load->view('template/header');
        $this->load->view('v-header');
		$this->load->view('pilih_mapel', $data);
	}

	// fungsi pilihan bab
    public function pilih_bab_report($no) {
            $data['bab'] = $this->Mgrafik->get_mapel_bab($no);
            $data['c'] = $this->Mgrafik->chart_model($no);
            $data['mapel'] = $no;
            $this->load->view('template/header');
            $this->load->view('v-header');
            $this->load->view('bab_grafik', $data);

    }

    public function greport($bab) {
    $data['report'] = $this->Mgrafik->get_greport($bab);
    


        // $this->load->view('template/header');
        // $this->load->view('v-header');
        // $this->load->view('Videoback/layout/header');
        $this->load->view('v-greport', $data);
    }


    // buat nampilin grafik bar
    public function chart()
    {
        $data['c'] = $this->Mgrafik->chart_model();
        $this->load->view('v-chart',$data);
    }




	


}