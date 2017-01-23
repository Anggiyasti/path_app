<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Learningline extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('learningmodel');
		$this->load->model('videoback/videobackmodel');

	}

	// FUNGSI INDEX
	public function index(){
		$this->load->view('v-header');
		$this->load->view('v-container-daftar-bab');
		$this->load->view('script-learning-daftar-bab.js');
		$this->load->view('admin/layout/footer');
	}
	// FUNGSI INDEX

	// GET LIST STEP BERDASARKAN ID TOPIK
	public function ajax_get_list_bab(){
		$list = $this->learningmodel->get_bab_for_topik();
		
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['id_bab'];			
			$row[] = $list_item['nama_mapel'];
			$row[] = $list_item['judul_bab'];
			// $row[] = $list_item['judulbab'];
			if ($list_item['statusLearningLine']==1) {
				$row[] = "<input type='checkbox' 
				class='switchery' checked onclick='update_learning_bab(".$list_item['id_bab'].",".$list_item['statusLearningLine'].")'>";
			} else {
				$row[] = "<input type='checkbox' 
				class='switchery' unchecked onclick='update_learning_bab(".$list_item['id_bab'].",".$list_item['statusLearningLine'].")'>";
			}
			
			
			$row[] = '
			<a class="btn btn-sm btn-success"  title="Detail" onclick="detail_bab('."'".$list_item['id_bab']."'".')"><i class="ico-file-plus2"></i></a>';

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode($output);	
	}


	//FUNGSI MENAMBAHKAN TOPIK
	public function formtopik($data){
		$bab_meta = $this->learningmodel->get_bab_by_id($data)[0];
		$data = array(
			'judul_halaman' => " - Add Learning Line Topik Untuk ".$bab_meta['judul_bab'],
			'mapel'=>$bab_meta['nama_mapel'],
			'bab'=>$bab_meta['judul_bab'],
			'id'=>$bab_meta['id_bab']
			);

		
		$this->load->view('v-header');
		$this->load->view('v-form-topik',$data);
		$this->load->view('script_learning-form-topik.js',$data);
		$this->load->view('admin/layout/footer');


		// $data['files'] = array(
		// 	APPPATH . 'modules/learningline/views/v-form-topik.php',
		// 	APPPATH . 'modules/learningline/views/script_learning-form-topik.js',
		// 	);

		// $this->loadparser($data);
	}
	//FUNGSI MENAMBAHKAN TOPIK

	//FUNGSI TAMBAHKAN LINE STEP
	public function formstep($data){
		$metadata = $this->learningmodel->get_topik_byid($data);
		// var_dump($metadata);
		$data = array(
			'judul_halaman' => " - Add Learning Line Step untuk ".$metadata['namaTopik'],
			'namaTopik' => $metadata['namaTopik'],
			'id'=>$metadata['id'],
			'babID'=>$metadata['babID'],
			'mapel'=>$metadata['nama_mapel'],
			'bab'=>$metadata['judul_bab'],
			);


		$this->load->view('v-header');
		$this->load->view('v-form-step',$data);
		$this->load->view('script_learning-form-step.js',$data);
		$this->load->view('admin/layout/footer');

	}
	//FUNGSI TAMBAHKAN LINE STEP

	// TB-TOPIK //
	function ajax_insert_line_topik(){
			// $data = $this->input->post();
		$data = array(
			'babID'=>$this->input->post('babID'),
			'statusLearning'=>$this->input->post('statusLearning'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'namaTopik'=>$this->input->post('namaTopik'),
			'status'=>1,
			'urutan'=>$this->input->post('urutan'),
			'UUID'=>uniqid(),

			);
		$this->learningmodel->insert_line_topik($data);
	}

	function topik($byid){
		$metadata = $this->learningmodel->get_bab_by_id($byid)[0];
		// var_dump($metadata);
		$data = array(
			'judul_halaman' => " - Daftar Topik",
			'mapel'=>$metadata['nama_mapel'],
			'bab'=>$metadata['judul_bab'],
			);

		$this->load->view('v-header');
		$this->load->view('v-daftar-topik-single.php',$data);
		$this->load->view('script_learning-single-topik.js');
		$this->load->view('admin/layout/footer');

		
	}
	// TB-TOPIK //

	public function ajax_get_list_topik($babid){
		$list = $this->learningmodel->get_topik_by_babid($babid);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['namaTopik'];
			$row[] = $list_item['urutan'];
			if ($list_item['statusLearning']==1) {
				$row[] = "<input type='checkbox' 
				class='switchery' checked onclick='updatestatus(".$list_item['id'].",".$list_item['statusLearning'].")'>";
			} else {
				$row[] = "<input type='checkbox' 
				class='switchery' unchecked onclick='updatestatus(".$list_item['id'].",".$list_item['statusLearning'].")'>";
			}			
			
			

			$row[] = '<a class="btn btn-sm btn-warning"  title="Edit" onclick="edit_topik('."'".$list_item['id']."'".')"><i class="ico-edit"></i></a>
			<a class="btn btn-sm btn-success"  title="Detail" onclick="detail_topik('."'".$list_item['id']."'".')"><i class="ico-file-plus2"></i></a>
			<a class="btn btn-sm btn-danger"  title="Delete" onclick="drop_topik('."'".$list_item['id']."'".')"><i class="ico-remove"></i></a>';

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );
	}
	// GET LIST STEP BERDASARKAN ID TOPIK

	public function ajax_list_ge_step($id_topik){
		$list = $this->learningmodel->get_step_by_id_topik($id_topik);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['urutan'];
			$row[] = $list_item['namaTopik'];
			$row[] = $list_item['jenisStep'];

			$row[] = '<a class="btn btn-sm btn-warning"  title="Edit" onclick="edit_step('."'".$list_item['id']."'".')"><i class="ico-edit"></i></a>
			<a class="btn btn-sm btn-success"  title="Detail" onclick="detail_step('."'".$list_item['id']."'".')"><i class="ico-file-plus2"></i></a>
			<a class="btn btn-sm btn-danger"  title="Delete" onclick="drop_step('."'".$list_item['id']."'".')"><i class="ico-remove"></i></a>';

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );	
	}

	function ajax_insert_line_step(){
	$uuid = uniqid();
	
	if($this->input->post('latihanID')){
		$data = array(
			'namaStep'=>$this->input->post('namastep'),
			'jenisStep'=>$this->input->post('select_jenis'),
			'videoID'=>$this->input->post('videoID'),
			'MateriID'=>$this->input->post('materiID'),
			'latihanID'=>$this->session->userdata('id_latihan'),
			'status'=>1,
			'urutan'=>$this->input->post('urutan'),
			'topikID'=>$this->input->post('topikID'),
			'jumlah_benar'=>$this->input->post('jumlah_benar'),
			'jumlah_soal_sedang'=>$this->input->post('jumlah_soal_sedang'),
			'jumlah_soal_mudah'=>$this->input->post('jumlah_soal_mudah'),
			'jumlah_soal_sulit'=>$this->input->post('jumlah_soal_sulit'),
			'depend_status'=>$this->input->post('status_depedensi'),
			'UUID'=>$uuid
			);
	}else{ 
		$data = array(
			'namaStep'=>$this->input->post('namastep'),
			'jenisStep'=>$this->input->post('select_jenis'),
			'videoID'=>$this->input->post('videoID'),
			'MateriID'=>$this->input->post('materiID'),
			'status'=>1,
			'urutan'=>$this->input->post('urutan'),
			'topikID'=>$this->input->post('topikID'),
			'depend_status'=>$this->input->post('status_depedensi'),
			'UUID'=>$uuid
			);
	}
	// 1. Cek dulu yang diinsert ada yang sama atau tidak?
	$step_urutan_sama = $this->learningmodel->get_step_sama_urutan($data['topikID'], $data['urutan']);
	if ($step_urutan_sama) {
		// kalo ada yang sama
		$list_step = $this->learningmodel->get_step_urutan_idtopik($data['topikID'], $data['urutan']);
		$data_urutan_update = array();
		if ($list_step) {
		//ambil urutan yang lebih sama dengan urutan		
			$urutanngaco  = $this->learningmodel->get_step_urutan($data['topikID'], $data['urutan']);
		//cacah di buat array baru, urutan valuenya +1
			foreach ($urutanngaco as $value) {
				$a = array('urutan'=>$value['urutan']+1);
				$b = array('id'=>$value['id']);
				$result = array_merge($a, $b);
			//update batch
				$this->learningmodel->update_step_urutan($result);
			}
		} 
		$this->learningmodel->insert_line_step($data);
	} else {
		//kalo gak ada yang sama
		$this->learningmodel->insert_line_step($data);
	}
}




	function ajax_get_video($babid){
		$list = $this->mvideos->get_all_video_by_bab($babid);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['videoID'];			
			$row[] = $list_item['judulSubBab'];
			$row[] = $list_item['judulVideo'];
			
			$row[] = "<input type='radio' name='video' value=".$list_item['videoID']."class='switchery' unchecked'>";

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );	

	}


	## --------------------------AJAX PROCESSING-------------------------- ##

	function drop_topik(){
		$data = array(
			'id'=>$this->input->post('id')
			);
		$this->learningmodel->droptopik($data);
	}


	


}


?>