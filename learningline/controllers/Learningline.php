<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Learningline extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('learningmodel');
		// $this->load->model('Videobackmodel');
		$this->load->model('videoback/Videobackmodel');

	}

	// FUNGSI INDEX
	public function index(){
		if ($this->session->userdata('id_admin')) {
			$this->load->view('admin/layout/header');
			$this->load->view('v-container-daftar-bab');
			$this->load->view('script-learning-daftar-bab.js');
			$this->load->view('admin/layout/footer');
	}	elseif ($this->session->userdata('id_guru')) {
			$this->load->view('guru/layout/header');
			$this->load->view('v-container-daftar-bab');
			$this->load->view('script-learning-daftar-bab.js');
			$this->load->view('guru/layout/footer');
	}
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
			$row[] = $list_item['nama_mapel'];

         
             
			$row[] = $list_item['part'];
			// $row[] = $list_item['judulbab'];
			if ($list_item['status']==1) {
				$row[] = "<input type='checkbox' 
				class='switchery' checked onclick='update_learning_bab(".$list_item['id_mapel'].",".$list_item['status'].")'>";
			} else {
				$row[] = "<input type='checkbox' 
				class='switchery' unchecked onclick='update_learning_bab(".$list_item['id_mapel'].",".$list_item['status'].")'>";
			}
			
			
			$row[] = '
			<a class="btn btn-sm btn-success"  title="Detail" onclick="detail_bab('."'".$list_item['id_mapel']."'".')"><i class="ico-file-plus2"></i></a>';

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode($output);	
	}


	//FUNGSI MENAMBAHKAN TOPIK
	public function formtopik($data){
		$bab_meta = $this->learningmodel->get_bab_by_mapel($data)[0];
		$data = array(
			'judul_halaman' => " - Add Learning Line Topik Untuk ".$bab_meta['nama_mapel'],
			'mapel'=>$bab_meta['nama_mapel'],
			'part'=>$bab_meta['part'],
			'id_mapel'=>$bab_meta['id_mapel']
			
			);
		// hak akses jika admin
		if ($this->session->userdata('id_admin')) {
			$this->load->view('admin/layout/header');
			$this->load->view('v-form-topik',$data);
			$this->load->view('script_learning-form-topik.js',$data);
			$this->load->view('admin/layout/footer');
		}
		// hak akses jika guru
		elseif ($this->session->userdata('id_guru')) {
			$this->load->view('guru/layout/header');
			$this->load->view('v-form-topik',$data);
			$this->load->view('script_learning-form-topik.js',$data);
			$this->load->view('guru/layout/footer');
		}
		


		// $data['files'] = array(
		// 	APPPATH . 'modules/learningline/views/v-form-topik.php',
		// 	APPPATH . 'modules/learningline/views/script_learning-form-topik.js',
		// 	);

		// $this->loadparser($data);
	}

	public function step1($data)
	{
		$metadata['mapel'] = $this->learningmodel->get_topik_byid($data);

		$pel = $this->learningmodel->get_topik_byid($data)['nama_mapel'];
		$metadata['bab'] = $this->learningmodel->baba($pel);
		// $metadata['i'] ="helo";
		// var_dump($metadata);

		
		$this->load->view('admin/layout/header');
		$this->load->view('step1', $metadata);
		// $this->load->view('script_learning-form-step.js',$data);
		$this->load->view('admin/layout/footer');

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
			'mapel'=>$metadata['nama_mapel'],
			'id_mapel'=>$metadata['id_mapel'],
			// 'id_bab'=>$metadata['id_bab']
			
			);
		$mapel= $this->learningmodel->get_topik_byid($data)['id_mapel'];
		$data['bab'] = $this->learningmodel->get_bab($mapel);

		// var_dump($dataa);

		if ($this->session->userdata('id_admin')) {
		$this->load->view('admin/layout/header');
		$this->load->view('v-form-step',$data);
		$this->load->view('script_learning-form-step.js',$data);
		$this->load->view('admin/layout/footer');
	}
		if ($this->session->userdata('id_guru')) {
		$this->load->view('guru/layout/header');
		$this->load->view('v-form-step',$data);
		$this->load->view('script_learning-form-step.js',$data);
		$this->load->view('guru/layout/footer');
	}

	}

	public function formstep2($data, $id_bab){
		$metadata = $this->learningmodel->get_topik_byid($data);
		// $a['bab'] = $id_bab;
		// var_dump($a);
		$data = array(
			'judul_halaman' => " - Add Learning Line Step untuk ".$metadata['namaTopik'],
			'namaTopik' => $metadata['namaTopik'],
			'id'=>$metadata['id'],
			'babID'=>$metadata['babID'],
			'mapel'=>$metadata['nama_mapel'],
			'bab'=>$metadata['judul_bab'],
			'bb' => $id_bab
			);

		if ($this->session->userdata('id_admin')) {
		$this->load->view('admin/layout/header');
		$this->load->view('v-form-step',$data);
		$this->load->view('script_learning-form-step.js',$data);
		$this->load->view('admin/layout/footer');
	}
		if ($this->session->userdata('id_guru')) {
		$this->load->view('guru/layout/header');
		$this->load->view('v-form-step',$data);
		$this->load->view('script_learning-form-step.js',$data);
		$this->load->view('guru/layout/footer');
	}

	}

	public function formstep3($data){
		$metadata = $this->learningmodel->get_topik_byid($data);
		// $a['bab'] = $id_bab;
		// var_dump($a);
		$data = array(
			'judul_halaman' => " - Add Learning Line Step untuk ".$metadata['namaTopik'],
			'namaTopik' => $metadata['namaTopik'],
			'id'=>$metadata['id'],
			'id_bab'=>$metadata['id_bab'],
			'mapel'=>$metadata['nama_mapel'],
			'bab'=>$metadata['judul_bab'],
			'bb' => $this->input->post('bab')
			);

		if ($this->session->userdata('id_admin')) {
		$this->load->view('admin/layout/header');
		$this->load->view('v-form-step',$data);
		$this->load->view('script_learning-form-step.js',$data);
		$this->load->view('admin/layout/footer');
	}
		if ($this->session->userdata('id_guru')) {
		$this->load->view('guru/layout/header');
		$this->load->view('v-form-step',$data);
		$this->load->view('script_learning-form-step.js',$data);
		$this->load->view('guru/layout/footer');
	}

	}



	//FUNGSI TAMBAHKAN LINE STEP

	// TB-TOPIK //
	function ajax_insert_line_topik(){
			// $data = $this->input->post();
		$data = array(
			'id_mapel'=>$this->input->post('id_mapel'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'namaTopik'=>$this->input->post('namaTopik'),
			'part'=>$this->input->post('part'),			
			'status'=>1,
			'urutan'=>$this->input->post('urutan'),
			'UUID'=>uniqid(),

			);
		$this->learningmodel->insert_line_topik($data);
	}

		//FUNGSI MENGEDIT TOPIK
	

	function topik($byid){
		$metadata = $this->learningmodel->get_bab_by_mapel($byid)[0];


		// var_dump($metadata);
		$data = array(
			'judul_halaman' => " - Daftar Topik",
			'mapel'=>$metadata['nama_mapel'],
			// 'bab'=>$metadata['judul_bab'],
			);

		if ($this->session->userdata('id_admin')) {
		$this->load->view('admin/layout/header');
		$this->load->view('v-daftar-topik-single.php',$data);
		$this->load->view('script_learning-single-topik.js');
		$this->load->view('admin/layout/footer');
	}
		elseif ($this->session->userdata('id_guru')) {
		$this->load->view('guru/layout/header');
		$this->load->view('v-daftar-topik-single.php',$data);
		$this->load->view('script_learning-single-topik.js');
		$this->load->view('guru/layout/footer');
}
		
	}
	// TB-TOPIK //

	function step($topikID){

		$metadata = $this->learningmodel->get_topik_byid($topikID);
		// $metadata = $this->learning_model->get_step_by_id_topik($topikID)[0];
		$data = array(
			'judul_halaman' => " - Daftar Step",
			'namaTopik' => $metadata['namaTopik'],
			'id'=>$metadata['id'],
			'id_mapel'=>$metadata['id_mapel'],
			'mapel'=>$metadata['nama_mapel'],
			'bab'=>$metadata['judul_bab'],
			
			);

		if ($this->session->userdata('id_admin')) {
		$this->load->view('admin/layout/header');
		$this->load->view('v-daftar-step-single',$data);
		$this->load->view('script_learning-single-step.js');
		$this->load->view('admin/layout/footer');
	}
		
		elseif ($this->session->userdata('id_guru')) {
		$this->load->view('guru/layout/header');
		$this->load->view('v-daftar-step-single',$data);
		$this->load->view('script_learning-single-step.js');
		$this->load->view('guru/layout/footer');
	}
	

		// $data['files'] = array(
		// 	APPPATH . 'modules/learningline/views/v-daftar-step-single.php',
		// 	APPPATH . 'modules/learningline/views/script_learning-single-step.js',
		// 	);

		// $this->loadparser($data);
	}
	// DAFTAR STEP

	public function ajax_get_list_topik($babid){
		$list = $this->learningmodel->get_topik_by_mapelid($babid);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;

			$row = array();
			$row[] = $list_item['namaTopik'];
			$row[] = $list_item['part'];
			$row[] = $list_item['urutan'];
			if ($list_item['status']==1) {
				$row[] = "<input type='checkbox' 
				class='switchery' checked onclick='updatestatus(".$list_item['id'].",".$list_item['status'].")'>";
			} else {
				$row[] = "<input type='checkbox' 
				class='switchery' unchecked onclick='updatestatus(".$list_item['id'].",".$list_item['status'].")'>";
			}			
			
			

			$row[] = '<a class="btn btn-sm btn-warning"  
			title="Edit" 
			href="'.base_url().'index.php/learningline/edit_topik/'.$list_item['id'].'"><i class="ico-edit"></i></a>
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


	function edit_topik($d){
		$metatopik = $this->learningmodel->get_topik_byid($d);

		if ($metatopik==false) {
			echo "Forbiden acces";
		} else {
			// var_dump($metatopik);

			$data = array(
				'judul_halaman' =>" - Update Learning Line Topik Berjudul ".$metatopik['namaTopik'],
				'judul'=>$metatopik['namaTopik'],
				'statusLearning'=>$metatopik['statusLearning'],
				'urutan'=>$metatopik['urutan'],
				'deskripsi'=>$metatopik['deskripsi'],
				'mapel'=>$metatopik['nama_mapel'],
				'mapell'=>$this->Videobackmodel->provinsi(),
				'bab'=>$metatopik['judul_bab'],
				'topikID'=>$metatopik['id'],
				'babID'=>$metatopik['babID'],
				'mapelID'=>$metatopik['mapelID'],
				);

		// $this->load->view('v-header');
		// $this->load->view('v-form-edit-topik',$data);
		// $this->load->view('script_learning-edit-topik.js');
		// $this->load->view('admin/layout/footer');
		
		if ($this->session->userdata('id_admin')) {
		$this->load->view('admin/layout/header');
		$this->load->view('v-form-edit-topik',$data);
		$this->load->view('script_learning-edit-topik.js');
		$this->load->view('admin/layout/footer');
	}
		
		elseif ($this->session->userdata('id_guru')) {
		$this->load->view('guru/layout/header');
		$this->load->view('v-form-edit-topik',$data);
		$this->load->view('script_learning-edit-topik.js');
		$this->load->view('guru/layout/footer');
	}

			// $data['files'] = array(
			// 	APPPATH . 'modules/learningline/views/v-form-edit-topik.php',
			// 	APPPATH . 'modules/learningline/views/script_learning-edit-topik.js',
			// 	);

			// $this->loadparser($data);
		}
		
		// 
	}
	//FUNGSI MENGEDIT TOPIK

	public function ajax_list_ge_step($id_topik){
		$list = $this->learningmodel->get_step_by_id_topik($id_topik);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['urutan'];
			$row[] = $list_item['namaStep'];
			// $row[] = $list_item['jenisStep'];

			if ($list_item['jenisStep']==1) {
				$row[] = "Video";
				$row[] = '<a class="btn btn-sm btn-warning"  
				title="Edit" 
				href="'.base_url().'learningline/edit_step/'.$list_item['id'].'"><i class="ico-edit"></i></a>
				<a class="btn btn-sm btn-success detail-'.$list_item['id'].'"  title="Play" data-todo='."'".json_encode($list_item)."'".' onclick="play('."'".$list_item['id']."'".')"><i class="ico-play"></i></a>
				<a class="btn btn-sm btn-danger"  title="Delete" onclick="drop_step('."'".$list_item['id']."'".')"><i class="ico-remove"></i></a>';
			} else if ($list_item['jenisStep']==2) {
				$row[] = "Materi";
				$row[] = '<a class="btn btn-sm btn-warning"  
				title="Edit" 
				href="'.base_url().'learningline/edit_step/'.$list_item['id'].'"><i class="ico-edit"></i></a>
				<a class="btn btn-sm btn-success detail-'.$list_item['id'].'"  title="Prevew Materi" data-todo='."'".json_encode($list_item)."'".' onclick="materi_detail('."'".$list_item['id']."'".')"><i class="ico-eye-open"></i></a>
				<a class="btn btn-sm btn-danger"  title="Delete" onclick="drop_step('."'".$list_item['id']."'".')"><i class="ico-remove"></i></a>';
			}else{
				$row[] = "Latihan";
				$row[] = '<a class="btn btn-sm btn-warning"  
				title="Edit" 
				href="'.base_url().'learningline/edit_step/'.$list_item['id'].'"><i class="ico-edit"></i></a>
				<a class="btn btn-sm btn-success detail-'.$list_item['id'].'"  title="Daftar latihan" data-todo='."'".json_encode($list_item)."'".' onclick="latihan_detail('."'".$list_item['id']."'".')"><i class="ico-th-list"></i></a>
				<a class="btn btn-sm btn-danger"  title="Delete" onclick="drop_step('."'".$list_item['id']."'".')"><i class="ico-remove"></i></a>';
			}

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
			'namaStep'=>$this->input->post('namaStep'),
			'id_bab'=>$this->input->post('id_bab'),
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
			'namaStep'=>$this->input->post('namaStep'),
			'id_bab'=>$this->input->post('id_bab'),
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

function ajax_get_materi($data){
		// $=htmlspecialchars($this->input->get('keycari'));
		$list = $this->learningmodel->get_materi_babID($data);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['id'];			
			$row[] = $list_item['judulMateri'];
			// $row[] = $list_item['isiMateri'];
			$row[] = '<a class="btn btn-sm btn-primary btn-outline detail-'.$list_item['id'].'"  title="Lihat"
			data-id='."'".json_encode($list_item)."'".'
			onclick="detail('."'".$list_item['id']."'".')"
			>
			<i class=" ico-eye "></i>
		</a> ';

		$row[] = "<input type='radio' name='materi' value=".$list_item['id']." ' class='switchery' unchecked'>";

		$data[] = $row;

	}

	$output = array(
		"data"=>$data,
		);

	echo json_encode( $output );	

}

function ajax_detail_latihan($id){
	$list = $soal=$this->learningmodel->get_soal_by_id_latihan($id);
	$data = array();
		//mengambil nilai list
	$baseurl = base_url();
	foreach ( $list as $list_soal ) {
		$n='1';
		$row = array();

		$row[] = "<span class='checkbox custom-checkbox custom-checkbox-inverse'>
		<input type='checkbox' name="."soal".$n." id="."soal".$list_soal['id_bank']." value=".$list_soal['id_bank'].">
		<label for="."soal".$list_soal['id_bank'].">&nbsp;&nbsp;</label>
	</span>";
	$row[] = $list_soal['judul_soal'];
	$row[] = $list_soal['sumber'];

	$row[] = $list_soal['soal'];

	if ($list_soal['kesulitan']=='0') {
		$row[] = "Mudah";
	} else if($list_soal['kesulitan']=='1'){
		$row[] = "Sedang";
	}else{
		$row[] = "Sulit";
	}
	$row[]='<a class="btn btn-success soal-'.$list_soal['id_bank'].'" title="lihat soal" onclick=detail_soal('.$list_soal['id_bank'].') data-todo='."'".json_encode($list_soal)."'".'> <i class="ico ico-eye"></i></a>';
	$data[] = $row;
	$n++;
}

$output = array(
	"data"=>$data,
	);
echo json_encode( $output );
}

	#

function ajax_update_line_topik(){
	$data = array(
		'statusLearning'=>$this->input->post('statusLearning'),
		'deskripsi'=>$this->input->post('deskripsi'),
		'namaTopik'=>$this->input->post('namaTopik'),
		'status'=>1,
		'urutan'=>$this->input->post('urutan'),
		'id'=>$this->input->post('topikID'),
		);

	// var_dump($data['topikID']);
	$this->learningmodel->update_topik($data);
}
	// TB-TOPIK //




	function ajax_get_video($babid){
		$list = $this->learningmodel->get_all_video_by_bab($babid);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['videoID'];			
			$row[] = $list_item['judul_bab'];
			$row[] = $list_item['judul_video'];
			
			$row[] = "<input type='radio' name='video' value=".$list_item['videoID']."class='switchery' unchecked'>";

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );	

	}
	function ajax_detail_video($id_video){
	$list = $this->learningmodel->get_single_video($id_video)[0];

	$output = array(
		"data"=>$list,
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

	function drop_step(){
	$data = array(
		'id'=>$this->input->post('id')
		);
	$this->learningmodel->drop_step($data);
}

function updateaktiv_bab($data){
	$this->learningmodel->updateaktiv_bab($data);
}

function updatepasive_bab($data){
	$this->learningmodel->updatepasive_bab($data);
}

function updateaktiv($data){
	$this->learningmodel->updateaktiv($data);
}

function updatepasive($data){
	$this->learningmodel->updatepasive($data);
}



public function getPelajaran() {
        $data = $this->output
        ->set_content_type( "application/json" )
        ->set_output( json_encode( $this->learningmodel->scPelajaran() ) ) ;
    }
public function getBab( $tpelajaranID ) {
        $data = $this->output
        ->set_content_type( "application/json" )
        ->set_output( json_encode( $this->learningmodel->scBab( $tpelajaranID ) ) ) ;
    }


	


}


?>