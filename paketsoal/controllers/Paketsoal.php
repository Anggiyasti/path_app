<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
/**
 *
 */
class paketsoal extends MX_Controller
{
	public function __construct() {
		$this->load->library( 'parser' );
		$this->load->model( 'mpaketsoal' );
		$this->load->model( 'Banksoal/Modelbank' );
		$this->load->model( 'latihan/mlatihan' );

		$this->load->library( 'form_validation' );
		$this->load->helper( array( 'form', 'url' ) );
		// $this->load->model('templating/mtemplating');
		parent::__construct();
		if ($this->session->userdata('loggedin')==true) {
			if ($this->session->userdata('HAKAKSES')=='siswa'){
				redirect('welcome');
			}else if($this->session->userdata('HAKAKSES')=='guru'){
               // redirect('guru/dashboard');
			}else if($this->session->userdata('HAKAKSES')=='admin'){
               // redirect('guru/dashboard');
			}else{
				redirect('login');
			}
		}
	}

	##ajax untuk melakukan update pada paket soal
	public function ajax_update() {
		$data = array(
			'idpaket' => $this->input->post( 'idpaket' ),
			'nm_paket' => $this->input->post( 'nama_paket' ) ,
			'jumlah_soal' => $this->input->post( 'jumlah_soal' ),
			'deskripsi' =>$this->input->post( 'deskripsi' ),
			'durasi' =>$this->input->post( 'durasi' )
			);

		$this->mpaketsoal->rubahpaket( array( 'id' => $this->input->post( 'id' ) ), $data );
		echo json_encode( array( "status" => TRUE ) );
	}
	#

	##ajax untuk melakukan edit, mengambil nilai dari hasil query
	public function ajax_edit( $id ) {
		$data = $this->mpaketsoal->get_by_id( $id );
		echo json_encode( $data );
	}
	#

	#menampilkan semoa paket soal
	function ajax_list() {
		$list = $this->load->mpaketsoal->getpaketsoal();
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $paket_soal ) {
			// $no++;
			$row = array();
			$row[] = $paket_soal['id_paket'];
			$row[] = $paket_soal['nm_paket'];
			$row[] = $paket_soal['jumlah_soal'];
			$row[] = $paket_soal['durasi'];
			$row[] = '<a class="btn btn-sm btn-warning"  title="Edit" onclick="edit_paket('."'".$paket_soal['id_paket']."'".')"><i class="ico-edit"></i></a>
			<a class="btn btn-sm btn-success"  title="Add Soal" href="addbanksoal/'."".$paket_soal['id_paket']."".'"><i class="ico-file-plus2"></i></a>
			<a class="btn btn-sm btn-danger"  title="Hapus" onclick="delete_paket('."'".$paket_soal['id_paket']."'".')"><i class="ico-remove"></i></a>';

			$data[] = $row;

		}
	##
		

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );
	}


	#ajax untuk menampilkan soal yang terdapat pada paket soal tertentu.
	function ajax_listsoal($idpaket) {
		$list = $this->load->mpaketsoal->soal_by_paketID($idpaket);
		$data = array();


		//mengambil nilai list
		$baseurl = base_url();
		foreach ( $list as $list_soal ) {
			$kesulitan = $list_soal['kesulitan'];
			if ($kesulitan == 3) {
				$kesulitan = "Sulit";
			} else if ($kesulitan == 2) {
				$kesulitan = "Sedang";
			} else {
				$kesulitan ="Mudah";
			}
			
			$row = array();
			$row[] = $list_soal['id_bank'];
			$row[] = $list_soal['judul_soal'];
			$row[] = $list_soal['sumber'];
			$row[] = $list_soal['soal'];
			$row[] = $kesulitan;
			$row[] = '
			<a class="btn btn-sm btn-danger"  title="Hapus" onclick="drop_soal('."'".$list_soal['id']."'".')"><i class="ico-remove"></i></a>';
			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);
		echo json_encode( $output );
	}
	##

	function index() {
		$this->tambahpaketsoal();
	}

	#daftar paket soal
	function tambahpaketsoal() {
	if ($this->session->userdata('id_admin')) {
		$data['paket_soal'] = $this->load->mpaketsoal->getpaketsoal();

		$this->load->view('admin/layout/header');
          $this->load->view('v-create-paket-soal', $data);
          $this->load->view('admin/layout/footer');

			}		
	else{

	}
		

		
	}
	##

	##menambahkan soal
	function add_soal() {
		
		$data['paket_soal'] = $this->load->mpaketsoal->getpaketsoal();
		$data['judul_halaman'] = "Tambahkan Paket Soal";
		$data['files'] = array(
			APPPATH.'modules/paketsoal/views/v-create-paket-soal.php',
			);
		$hakAkses=$this->session->userdata['HAKAKSES'];
		if ($hakAkses=='admin') {
        // jika admin
			$this->parser->parse('admin/v-index-admin', $data);


		} elseif($hakAkses=='guru'){
                    // jika guru
			$this->load->view('templating/index-b-guru', $data);  


		}else{
            // jika siswa redirect ke welcome
			redirect(site_url('welcome'));
		}
	}
	##

	#menambahkan paket soal ke dalam database
	function addpaketsoal() {
		$this->form_validation->set_rules( 'nama_paket', "Error Nama Paket", 'required' );
		//$this->form_validation->set_message('required',"You can't allowed empty");

		$data = array(
			'nm_paket' => $this->input->post( 'nama_paket' ) ,
			'jumlah_soal' => $this->input->post( 'jumlah_soal' ),
			'deskripsi' =>$this->input->post( 'deskripsi' ),
			'durasi' =>$this->input->post( 'durasi' ),
			'random'=>$this->input->post('random')
			);

		$this->mpaketsoal->insertpaketsoal( $data );
	}
	##

	function droppaketsoal( $id ) {
		$this->mpaketsoal->droppaket( $id );
	}

	#mengupdate paket soal
	function updatepaketsoal() {
		$id=$this->input->post( 'id_paket' );
		$data = array(
			'nm_paket' =>  $this->input->post( 'nama_paket' ) ,
			'deskripsi' => $this->input->post( 'deskripsi' ),
			'jumlah_soal' => $this->input->post( 'jumlah_soal' ),
			'durasi' => $this->input->post( 'durasi' ),
			'random'=>$this->input->post('random')
			);

		$this->mpaketsoal->rubahpaket( $id, $data );
	}
	##

	##mengambil paket soal dirubah ke json
	function ambil_paket_soal() {
		$data = $this->output
		->set_content_type( "application/json" )
		->set_output( json_encode( $this->load->mpaketsoal->getpaketsoal() ) ) ;
	}
	##

	#menambahkan soal ada paket tertentu.

	function get_validasi($idpaket){
		$paket_soal = $this->load->mpaketsoal->getpaket_by_id($idpaket);
		$jumlah_soal = (int)$paket_soal['jumlah_soal'];
		$jumlah_soal_paket = $this->load->mpaketsoal->get_jumlah_soal($idpaket);

		if ($jumlah_soal>=$jumlah_soal_paket) {
			// gaboleh inputin
			echo json_encode(false);
		}else{
			// boleh inputin
			echo json_encode(true);
		}

	}

	function addbanksoal( $idpaket ) {
		
		$paket_soal = $this->load->mpaketsoal->getpaket_by_id($idpaket);
		$jumlah_soal = (int)$paket_soal['jumlah_soal'];

		$data['judul_halaman'] = "Tambahkan Bank Soal";
		if ($this->session->userdata('id_admin')) {

		if (!$paket_soal==array()) {
			$data['listadd_soal']=$this->load->mpaketsoal->soal_by_paketID($idpaket);
			$data['panelheading'] = "Soal Untuk Paket soal ".$paket_soal['nm_paket'];
			$data['id_paket']=$idpaket;
			$data['mapel']=$this->Modelbank->getmapel();
			
			// $data['files'] = array(
			// 	APPPATH.'modules/paketsoal/views/v-add-soal.php',
			// 	);	
			$this->load->view('admin/layout/header');
          	$this->load->view('v-add-soal.php', $data);
          	$this->load->view('admin/layout/footer');
		} else {
			// $data['files'] = array(
			// 	APPPATH . 'modules/templating/views/v-data-notfound.php',
			// 	);
			$this->load->view('admin/layout/header');
          	$this->load->view('v-data-notfound.php', $data);
          	$this->load->view('admin/layout/footer');
		}
		
		


		}else{
            // jika siswa redirect ke welcome
			redirect(site_url('welcome'));
		}


}
	
	##

	#
	function ajax_get_soal_by_subbabid( $subBabID ) {

		$list = $soal=$this->mbanksoal->get_soal( $subBabID );
		$data = array();


		//mengambil nilai list
		$baseurl = base_url();
		foreach ( $list as $list_soal ) {
			$n='1';
			$row = array();

			$row[] = "<span class='checkbox custom-checkbox custom-checkbox-inverse'>
			<input type='checkbox' name="."soal".$n." id="."soal".$list_soal['id_soal']." value=".$list_soal['id_soal'].">
			<label for="."soal".$list_soal['id_soal'].">&nbsp;&nbsp;</label>
		</span>";
		$row[] = $list_soal['judul_soal'];
		$row[] = $list_soal['sumber'];
		$row[] = $list_soal['soal'];
		$row[] = $list_soal['kesulitan'];
		$data[] = $row;
		$n++;

	}

	$output = array(
		"data"=>$data,
		);
	echo json_encode( $output );

}


	#Start Function add soal paket#
public function addsoaltopaket()
{
	
	$id_soal = $this->input->post('data');
	$id_bab = $this->input->post('pelajaranID');
	$idpaket = $this->input->post('id_paket');

	$mmpaket=array();
	foreach ($id_soal as $key ) {		 
		$mmpaket[] = array(
			'id_paket' => $idpaket,
			'id_soal' => $key,
			'id_bab' => $id_bab);

	}


	$this->mpaketsoal->insert_soal_paket($mmpaket);

}
	#END Function add soal paket#

	#hapus paket soal
public function dropsoalpaket($id)
{
	$this->mpaketsoal->drop_soal_paket($id);

}
	##

	#ajax untuk menampilkan soal yang sudah di pub, belum terdaftar di paket dan statusnya 1
function ajax_unregistered_soal( $id_paket,$id_bab) {
	$param['id_paket'] = $id_paket;
	$param['id_bab'] = $id_bab;
	$data=array();
	$list = $soal=$this->mpaketsoal->get_soal_terdaftar($param);
	

		//mengambil nilai list
	$baseurl = base_url();
	foreach ( $list as $list_soal ) {
		$n='1';
		$kesulitan = $list_soal['kesulitan'];
		if ($kesulitan == 3) {
			$kesulitan = "Sulit";
		} else if ($kesulitan == 2) {
			$kesulitan = "Sedang";
		} else {
			$kesulitan ="Mudah";
		}
		$row = array();
		$row[] = "<span class='checkbox custom-checkbox custom-checkbox-inverse'><input type='checkbox' name="."soal".$n." id="."soal".$list_soal['id_bank']." value=".$list_soal['id_bank']."><label for="."soal".$list_soal['id_bank'].">&nbsp;&nbsp;</label></span>";
		$row[] = $list_soal['judul_soal'];
		$row[] = $list_soal['sumber'];
		$row[] = $list_soal['soal'];
		$row[] = $kesulitan;
		$data[] = $row;
		$n++;

	}

	$output = array(
		"data"=>$data,
		);
	echo json_encode( $output );

}

public function get_soal_byid_paket($idpaket){
	$list = $this->mpaketsoal->get_soal_by_idpaket($idpaket);
	$data = array();
	foreach ($list as $list_soal) {
		$n='1';
		$row = array();
		$row[] = $list_soal['id_soal'];
		$row[] = $list_soal['judul_soal'];
		$row[] = $list_soal['soal'];
		$data[] = $row;

		$n++;

	}
	$output = array(
		"data"=>$data,
		);

	echo json_encode( $output );
	
}

		#
function ajax_get_soal_byid( $bab ) {

	$list = $soal=$this->mlatihan->get_soal_bybab( $bab );
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
function ajax_get_soal_bylatihanid( $latihan ) {

	$list = $soal=$this->mlatihan->get_soal_bybab( $bab );
	$data = array();


		//mengambil nilai list
	$baseurl = base_url();
	foreach ( $list as $list_soal ) {
		$n='1';
		$row = array();

		$row[] = "<span class='checkbox custom-checkbox custom-checkbox-inverse'>
		<input type='checkbox' name="."soal".$n." id="."soal".$list_soal['id_soal']." value=".$list_soal['id_soal'].">
		<label for="."soal".$list_soal['id_soal'].">&nbsp;&nbsp;</label>
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
	$row[]='<a class="btn btn-success soal-'.$list_soal['id_soal'].'" title="lihat soal" onclick=detail_soal('.$list_soal['id_soal'].') data-todo='."'".json_encode($list_soal)."'".'> <i class="ico ico-eye"></i></a>';
	$data[] = $row;
	$n++;

}

$output = array(
	"data"=>$data,
	);
echo json_encode( $output );

}

public function getbab( $id_mapel ) {
        $data = $this->output
        ->set_content_type( "application/json" )
        ->set_output( json_encode( $this->mpaketsoal->scBab( $id_mapel ) ) ) ;
    }

public function getPelajaran() {
        $data = $this->output
        ->set_content_type( "application/json" )
        ->set_output( json_encode( $this->mpaketsoal->scPelajaran() ) ) ;
    }

}
?>
