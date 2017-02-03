<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Token extends MX_Controller {
	private $hakakses;

	public function __construct() {
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('token_model');
		$this->load->model('siswa/msiswa');

		$this->load->helper('string');
	}

	public function index(){
		// $this->load->view('v-header');
		$this->load->view('admin/layout/header');
		$this->load->view('v-daftar-token');
		$this->load->view('admin/layout/footer');
	}


	function ajax_data_token($data="all", $status=""){
		$list = $this->token_model->get_token($data,$status);
		$data = array();

		foreach ( $list as $token_item ) {
			$row = array();
			$row[] = $token_item->tokenid;
			$row[] = $token_item->nomorToken;

			$row[] = $token_item->masaAktif." Hari";
			if ($token_item->siswaID == NULL) {
				$row[] = "Belum Digunakan";
			}else{
				$row[] = $token_item->nama_depan." ".$token_item->nama_belakang;
			}
			$row[] = '<a class="btn btn-sm btn-danger"  title="Delete" onclick="drop_token('."'".$token_item->tokenid."'".')"><i class="ico-remove"></i></a>';
			$data[] = $row;
		}

		$output = array(
			"data"=>$data,
			);
		echo json_encode( $output );
	}

	function ajax_data_siswa(){
		$list = $this->token_model->get_siswa_unvoucher();
		$data = array();
		$n=1;
		//mengambil nilai list
		$baseurl = base_url();
		foreach ( $list as $list_siswa ) {
			$row = array();
			$row[] = "<span class='checkbox custom-checkbox custom-checkbox-inverse'>
			<input type='checkbox' name="."token".$n." id="."soal".$list_siswa['id_siswa']." value=".$list_siswa['id_siswa'].">
			<label for="."soal".$list_siswa['id_siswa'].">&nbsp;&nbsp;</label></span>";
			$row[] = $n;
			$row[] = $list_siswa['nama_depan']." ".$list_siswa['nama_belakang'];

			$data[] = $row;
			$n++;

		}

		$output = array(
			"data"=>$data,
			);
		echo json_encode( $output );
		// var_dump($list);
	}


	function ajax_rekap_penggunaan_token(){
		$list = $this->token_model->get_token($data="all",1);
		$data = array();
		$no = 1;
		foreach ( $list as $list ) {
			$date1 = new DateTime($list->tanggal_diaktifkan);
			$date_diaktifkan = $date1->format('d-M-Y');
			$date_kadaluarsa =  date("d-M-Y", strtotime($date_diaktifkan)+ (24*3600*$list->masaAktif));

			$date1 = new DateTime(date("d-M-Y"));
			$date2 = new DateTime($date_kadaluarsa);
			$sisa_aktif = $date2->diff($date1);
			
			$row = array();
			$row[] = $no;
			$row[] = $list->nama_depan." ".$list->nama_belakang;
			$row[] = $list->nomorToken;
			$row[] = $list->masaAktif;
			$row[] = $date_diaktifkan;
			$row[] = $date_kadaluarsa;
			$row[] = $sisa_aktif->days." Hari";
			$row[] = '<a class="btn btn-sm btn-danger"  title="Delete" onclick="drop_token('."'".$list->tokenid."'".')"><i class="ico-remove"></i></a>';
			$data[] = $row;
			$no = $no+1;
		}

		$output = array(
			"data"=>$data,
			);
		echo json_encode( $output );
		
		
	}

	function add_token(){
		// kalo ada yang post
		$jumlah_token = $this->input->post('jumlah_token');
		$masa_aktif = $this->input->post('masa_aktif');
		if ($jumlah_token) {
			if ($jumlah_token==1) {
				$kode_voucher = strtoupper(uniqid());
				$data = array("nomorToken"=>$kode_voucher,
					"masaAktif"=>$this->input->post('masa_aktif'));
				$this->token_model->insert_token($data);
			}else{
				for ($i=0; $i < $jumlah_token   ; $i++) { 
					$kode_voucher = strtoupper(uniqid());
					$data = array("nomorToken"=>$kode_voucher,
						"masaAktif"=>$masa_aktif);
					$this->token_model->insert_token($data);

				}
			}
		}
	}

	function set_token_to_mahasiswa(){
		if ($this->input->post()) {
			$post = $this->input->post();
			// select dulu token yang kosong
			$param_token = array("jenis_token"=>$post['masa_aktif'],
				"jumlah_token"=>$post['jumlah_mahasiswa']);
			$token_kosong = $this->token_model->token_kosong($param_token);
			$i = 0;
			foreach ($token_kosong as $value) {
			//masukan ke array, ambil id tokenya update sama id mahasiswa
				$token_update = array("id_token"=>$value->id,
					"siswaID"=>$post['id'][$i]);
				$i++;
			// update token
				$this->token_model->set_token_to_mahasiswa($token_update);
			}

		}
	}
	
	function isi_token(){
		if ($this->input->post()) {
			$post =$this->input->post();
			$data = array("kode_token" => $post['kode_token']);
			$hasil_token = $this->token_model->get_token_to_set($data);
			if($hasil_token){
				//kalo tokenya ada.
				$data_update = array("kode_token"=> $post['kode_token'],
					"id_siswa" => $this->msiswa-> get_siswaid());
				$this->token_model->set_token_single($data_update);
				$report_ajax = 1;
				$this->session->set_userdata('token',30);
				echo json_encode($report_ajax);
			}else{
				//kalo tokenya enggak ada.
				$report_ajax = 0;
				echo json_encode($report_ajax);
			}
		}
	}

	function test(){
			var_dump($this->session->userdata());
		// print_r(date('Y-m-d h:m:s'));

	}
	function ajax_get_stock(){
		$jumlah_semua_stok = $this->token_model->get_jumlah_token_stok();
		$jumlah_30_stok = $this->token_model->get_jumlah_token_stok(30);
		$jumlah_100_stok = $this->token_model->get_jumlah_token_stok(100);
		$jumlah_365_stok = $this->token_model->get_jumlah_token_stok(365);

		$data = array(
			'jumlah_semua_stok' => $jumlah_semua_stok,
			'jumlah_30_stok'  => $jumlah_30_stok, 
			'jumlah_100_stok'  => $jumlah_100_stok,
			'jumlah_365_stok'  => $jumlah_365_stok,
			);

		echo json_encode($data);


	}

	function settoken(){
		$this->load->view('token/header');
		$this->load->view('v-set-token');
	}

	function drop_token(){
		if ($this->input->post()) {
			$post = $this->input->post();
			$this->token_model->drop_token($post);
		}
	}
}