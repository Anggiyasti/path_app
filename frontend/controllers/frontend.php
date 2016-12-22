<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class frontend extends MX_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_front');
        $this->load->helper('url');
       
        // $this->murl = 'assets/minibar/';
    }

	public function index() {
		$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/nav');
	}

	function matapel(){
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');

		if($modul=="getbab"){
		echo $this->Videobackmodel->getbab($id);
		}
		else if($modul=="getkesulitan"){
		// echo $this->Modeluser->getkes($id);
		}
		else if($modul=="kelurahan"){

		}

	}

	public function pilihmapel($id) {
    // $data = array(
    //     'judul_halaman' => 'Neon - Pilih Mata Pelajaran',
    //     'judul_header' => 'Latihan Online'
    //     );

    // $data['files'] = array(
    //     APPPATH . 'modules/homepage/views/v-header-login.php',
    //     APPPATH . 'modules/templating/views/t-f-pagetitle.php',
    //     APPPATH . 'modules/tesonline/views/v-test-show-mapel.php',
    //     APPPATH . 'modules/homepage/views/v-footer.php',
    //     );

		$this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/nav');

    $data['mapel'] = $this->load->mfront->getmapel($id);

    // $this->parser->parse('templating/index', $data);
}

}