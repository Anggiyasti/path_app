<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report extends MX_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('mreport');
		$this->load->helper(array('form', 'url'));
        $this->murl = 'assets/adminre/';
    }

	public function index() {
		if ($this->session->userdata('id_admin')) {
 			$daftarreport = $this->mreport->getreportall();
 			if($daftarreport){
 			$data['data']= $daftarreport;	
 		}
 		$this->load->view('admin/layout/header');
 		$this->load->view('v-reportall',$data);
 		$this->load->view('admin/layout/footer');
 	}
 		elseif ($this->session->userdata('id_guru')) {
 			$daftarreport = $this->mreport->getreportall();
 		if($daftarreport){
 			$data['data']= $daftarreport;	
 		}
 		
 		$this->load->view('guru/layout/header');
 		$this->load->view('v-reportall',$data);
 		$this->load->view('guru/layout/footer');
 	}

 	}


 	public function vpersiswa($no) {
		if ($this->session->userdata('id_admin')) {
			// $data['content'] = 'kontrak/k_edit';
			$data['data'] = $this->db->get_where('tb_report_latihan',array('id_siswa'=> $no))->row();
			$this->load->view('admin/layout/header');
			$this->load->view('v-reportpersiswa', $data);
			$this->load->view('admin/layout/footer');
		}
			elseif ($this->session->userdata('id_guru')) {
			// $data['content'] = 'kontrak/k_edit';
			$data['data'] = $this->db->get_where('tb_report_latihan',array('id_siswa'=> $no))->row();
			$this->load->view('guru/layout/header');
			$this->load->view('v-reportpersiswa', $data);
			$this->load->view('guru/layout/footer');
		}

 	}


	
}