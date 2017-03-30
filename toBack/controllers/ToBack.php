<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
/**
 *
 */
class Toback extends MX_Controller
{
	public function __construct() {
		$this->load->library( 'parser' );
		$this->load->model('Mtoback');
		// $this->load->model('cabang/mcabang');

		$this->load->model( 'paketsoal/mpaketsoal' );
		$this->load->model('siswa/msiswa');
		// $this->load->model('templating/mtemplating');
		parent::__construct();

		if ($this->session->userdata('loggedin')==true) {
			if ($this->session->userdata('HAKAKSES')=='siswa'){
				redirect('welcome');
			}else if($this->session->userdata('HAKAKSES')=='guru'){
               // redirect('guru/dashboard');
			}else if($this->session->userdata('HAKAKSES')=='admin'){
               // redirect('guru/dashboard');
			}else if($this->session->userdata('HAKAKSES')=='admin_cabang'){

			}else{
				redirect('login');
			}
		}
	}

	#START Function buat TO#
	public function buatTo()
	{
		
		$nmpaket=htmlspecialchars($this->input->post('nmpaket'));
		$tglMulai=htmlspecialchars($this->input->post('tglmulai'));
		$tglAkhir=htmlspecialchars($this->input->post('tglakhir'));
		$publish=htmlspecialchars($this->input->post('publish'));
		$UUID = uniqid();
		$wktMulai=htmlspecialchars($this->input->post('wktmulai'));
		$wktAkhir=htmlspecialchars($this->input->post('wktakhir'));

		$dat_To=array(
			'nm_tryout'=>$nmpaket,
			'tgl_mulai'=>$tglMulai,	
			'tgl_berhenti'=>$tglAkhir,	
			'wkt_mulai'=>$wktMulai,	
			'wkt_berakhir'=>$wktAkhir,	
			'publish'=>$publish,
			'UUID' =>$UUID
			);

		$this->Mtoback->insert_to($dat_To);
		redirect(site_url('toback/addPaketTo/'.$UUID));
	}
	#END Function buat TO#

	#START Function add pakket to Try Out#
	// menampilkan halaman add to
	public function addPaketTo($UUID='')
	{	
		if ($UUID!=null) {
			$this->cek_PaketTo($UUID);
		} else {
			if ($this->session->userdata('id_admin')) {
		

			$this->load->view('admin/layout/header');
          $this->load->view('paketsoal/v-data-notfound.php');
          $this->load->view('admin/layout/footer');

				}		
			else{

		}
			}
		
	}

	public function cek_PaketTo($UUID)
	{
		$data['tryout'] = $this->mpaketsoal->get_id_by_UUID($UUID);
	if ($this->session->userdata('id_admin')) {
		if (!$data['tryout']==array()) {		
			$id_to = $data['tryout']['id_tryout'];
			$data['id_to']=$data['tryout']['id_tryout'];
			$data['nm_to']=$data['tryout']['nm_tryout'];
			$data['siswa'] = $this->msiswa->get_siswa_blm_ikutan_to();
			// var_dump($data);
		

			$this->load->view('admin/layout/header');
          	$this->load->view('v-bundlepaket',$data);
          	$this->load->view('admin/layout/footer');

		} else {
			$this->load->view('admin/layout/header');
          	$this->load->view('paketsoal/v-data-notfound.php',$data);
          	$this->load->view('admin/layout/footer');
			}
		}		
			else{

		}


	}
	//add paket ke TO
	public function addPaketToTO()
	{
		$id_paket=$this->input->post('idpaket');
		$id_tryout=$this->input->post('id_to');
		$dat_paket=array();//testing
		foreach ($id_paket as $key) {
			$dat_paket[] = array(
				'id_tryout'=>$id_tryout,
				'id_paket'=>$key);
		}
		$this->Mtoback->insert_addPaket($dat_paket);

	}
	// add hak akses to siswa 
	public function addsiswaToTO()
	{
		$id_siswa=$this->input->post('idsiswa');
		$id_tryout=$this->input->post('id_to');

		//menampung array id siswa
		$dat_siswa=array();
		foreach ($id_siswa as $key) {
			$dat_siswa[] = array(
				'id_tryout'=>$id_tryout,
				'id_siswa'=>$key);
			
		}
		//add siswa ke paket 
		$this->Mtoback->insert_addSiswa($dat_siswa);
		
	}


	//menampikan paket yg sudah di add
	function ajax_listpaket_by_To($idTO) {
		$list = $this->load->Mtoback->paket_by_toID($idTO);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_paket ) {
			// $no++;
			$row = array();
			$row[] = $list_paket['paketID'];
			$row[] = $list_paket['nm_paket'];
			$row[] = $list_paket['deskripsi'];
			$row[] = '
			<a class="btn btn-sm btn-danger"  title="Hapus" onclick="dropPaket('."'".$list_paket['idKey']."'".')"><i class="ico-remove"></i></a>';

			$data[] = $row;
		}
		$output = array(
			"data"=>$data,
			);
		echo json_encode( $output );
	}




	function ajax_listsiswa_by_To($idTO) {
		

		$list = $this->load->Mtoback->siswa_by_totID($idTO);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_siswa ) {
			// $no++;
			$row = array();
			$row[] = $list_siswa ['siswaID'];
			$row[] = $list_siswa ['namaDepan'];
			$row[] = $list_siswa['aliasTingkat'];
			$row[] = '
			<a class="btn btn-sm btn-danger"  title="Hapus" onclick="dropSiswa('."'".$list_siswa['idKey']."'".')"><i class="ico-remove"></i></a>';

			$data[] = $row;

		}

		$output = array(
			
			"data"=>$data,
			);

		echo json_encode( $output );
	}

	#END Function add pakket to Try Out#

	#START Function di halaman daftar TO#
	//menampilkan halaman list TO
	public function listTO()
	{
		$data['tampil'] = $this->Mtoback->get_tampil_To();

		if ($this->session->userdata('id_admin')) {
		

		$this->load->view('admin/layout/header');
          $this->load->view('v-list-to.php',$data);
          $this->load->view('admin/layout/footer');

			}		
	else{

	}
		

	}
	// menampilkan list to
	public function ajax_listsTO()
	{
		$list =$this->Mtoback->get_To();
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_to ) {
			// $no++;
			if ($list_to['publish']=='1') {
				$publish='Publish';
			} else {
				$publish='Tidak Publish';
			}
			
			$row = array();
			$row[] = $list_to ['id_tryout'];
			$row[] = $list_to ['nm_tryout'];
			// $row[] = $list_to['tgl_mulai'];
			// $row[] = $list_to['wkt_mulai'];
			// $row[] = $list_to['tgl_berhenti'];
			// $row[] = $list_to['wkt_berakhir'];
			$row[] = $publish;
			$row[] = '
			<a class="btn btn-sm btn-primary"  title="Ubah" onclick="edit_TO('."'".$list_to['id_tryout']."'".')">
			<i class="ico-file5"></i></a>
			<a class="btn btn-sm btn-success"  title="ADD PAKET to TO" href='."addPaketTo/".$list_to['UUID'].' >
			<i class="ico-file-plus2"></i></a>

			

			<a class="btn btn-sm btn-danger"  title="Hapus" onclick="dropTO('."'".$list_to['id_tryout']."'".')">
			<i class="ico-remove"></i></a>
			'

			;

			$data[] = $row;

		}

		$output = array(

			"data"=>$data,
			);

		echo json_encode( $output );

	}
	public function dropTO($id_tryout)
	{
		$this->Mtoback->drop_TO($id_tryout);
	}

	public function ajax_edit( $id_tryout) {
		$data = $this->Mtoback->get_TO_by_id( $id_tryout );
		echo json_encode( $data );
	}
	#END Function di halaman daftar TO#

	// Drop paketb to TO
	public function dropPaketTo($idKey)
	{
		$this->Mtoback->drop_paket_toTO($idKey);
	}

	// Drop siswa to to
	public function dropSiswaTo($idKey)
	{
		$this->Mtoback->drop_siswa_toTO($idKey);
	}


	//FUNGSI EDIT TRYOUT
	public function editTryout()
	{
		$data['id_tryout']=htmlspecialchars($this->input->post('id_tryout'));
		$nm_tryout=htmlspecialchars($this->input->post('nama_tryout'));
		$tglMulai=htmlspecialchars($this->input->post('tgl_mulai'));
		$tglAkhir=htmlspecialchars($this->input->post('tgl_berhenti'));
		$publish=htmlspecialchars($this->input->post('publish'));
		$wktMulai=htmlspecialchars($this->input->post('wkt_mulai'));
		$wktAkhir=htmlspecialchars($this->input->post('wkt_akhir'));

		$data['tryout']=array(
			'nm_tryout'=>$nm_tryout,
			'tgl_mulai'=>$tglMulai,
			'tgl_berhenti'=>$tglAkhir,
			'wkt_mulai'=>$wktMulai,
			'wkt_berakhir'=>$wktAkhir,
			'publish'=>$publish,
			);
		

		$this->Mtoback->ch_To($data);
	}

	#####OPIK#########################################

	public function reportto($uuid){
		$data['tryout'] = $this->Mtoback->get_to_byuuid($uuid);

		if (!$data['tryout']==array()) {
			$id_to  = $data['tryout'][0]['id_tryout'];
			$data['daftar_peserta'] =$this->Mtoback->get_all_report($id_to);
			$data['files'] = array(
				APPPATH . 'modules/toback/views/v-list-peserta.php',
				);
			$data['judul_halaman'] = "Laporan Untuk TO : ".$data['tryout'][0]['nm_tryout'];

		} else {
			$data['files'] = array(
				APPPATH . 'modules/templating/views/v-data-notfound.php',
				);
			$data['judul_halaman'] = "Daftar Peserta";
			$this->load->view('templating/v-data-notfound');
		}

		$this->load->view('templating/index-b-guru', $data);
	}

		##menampilkan paket yang belum ada di TO.
	function ajax_list_all_paket($id_to){
		$list = $this->mpaketsoal->get_paket_unregistered($id_to);
		$data = array();
		$baseurl = base_url();
		$n = 1;
		foreach ( $list as $list_paket ) {
			$row = array();
			$row[] = "<input type='checkbox' value=".$list_paket['id_paket']." id=".$list_paket['nm_paket'].$list_paket['id_paket']." name=".$list_paket['nm_paket'].$n.">";
			$row[] = $list_paket['id_paket'];
			$row[] = $list_paket['nm_paket'];
			$row[] = $list_paket['deskripsi'];
			$row[] = "<a onclick="."lihatsoal(".$list_paket['id_paket'].")"." class='btn btn-primary'>Lihat</a>";
			$data[] = $row;
			$n++;
		}

		$output = array(
			"data"=>$data,
			);
		echo json_encode( $output );
	}
			###menampilkan paket yang belum ada di TO.

	##menampilkan siswa yang belum ikutan TO.
	function ajax_list_siswa_belum_to($id){
		$list = $this->msiswa->get_siswa_blm_ikutan_to($id);
		$data = array();
		$baseurl = base_url();
		foreach ( $list as $list_siswa ) {
			$row = array();
			$row[] = "<input type='checkbox' value=".$list_siswa['id']." >";
			$row[] = $list_siswa ['id'];
			$row[] = $list_siswa ['namaDepan']." ".$list_siswa['namaBelakang'];
			if($list_siswa['namaCabang']!=null){
				$row[] = $list_siswa['namaCabang'];
			}else{
				$row[] = "Non-neutron";

			}
						
			$data[] = $row;
		}
		$output = array(
			"data"=>$data,
			);
		echo json_encode( $output );
	}
		###menampilkan siswa yang belum ikutan TO.
					// menampilkan list Pkaet by to for Report
	public function reportPaketSiswa()
	{
		$data['id_to']=htmlspecialchars($this->input->get('id_to'));
		$penggunaID=htmlspecialchars($this->input->get('id_pengguna'));
		$data['idPengguna']=$penggunaID;
		$data['siswa']=$this->Mtoback->get_nama_siswa($penggunaID)[0];
		$data['reportPaket']=$this->Mtoback->get_report_paket($data);
		$data['files'] = array(
			APPPATH . 'modules/toback/views/v-report-paket-siswa.php',
			);
		$data['judul_halaman'] = "Report Siswa Perpaket";
		$this->load->view('templating/index-b-guru', $data);
	}
					//menampilkan report paket 
	public function reportpaket($idpaket)
	{
		$data['report']=$this->Mtoback->get_all_report_paket($idpaket);

		$data['files'] = array(
			APPPATH . 'modules/paketsoal/views/v-report-paket.php',
			);
		$data['judul_halaman'] = "Report Siswa Perpaket";
		$this->load->view('templating/index-b-guru', $data);

	}

	function get_cabang_all_cabang(){
		$data = $this->output
		->set_content_type( "application/json" )
		->set_output( json_encode( $this->mcabang->get_all_cabang() ) );
	}



	// FUNGSI view tryout
	public function tryout(){
		if ($this->session->userdata('id_admin')) {
			$this->load->view('admin/layout/header');
			$this->load->view('v_tryout');
			$this->load->view('admin/layout/footer');
	}	elseif ($this->session->userdata('id_guru')) {
			$this->load->view('guru/layout/header');
			$this->load->view('v_tryout');
			$this->load->view('guru/layout/footer');
	}
	else{

	}
}
	// GET LIST STEP BERDASARKAN ID TOPIK
	public function ajax_get_list_to(){
		$list = $this->Mtoback->get_view_to();
		
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
		
			// $no++;
			$row = array();		
			$row[] = $list_item['nm_tryout'];
			$row[] = $list_item['publish'];
			if ($list_item['active']==1) {
				$row[] = "<input type='checkbox' 
				class='switchery' checked onclick='updatestatus(".$list_item['id_tryout'].",".$list_item['active'].")'>";
			} else {
				$row[] = "<input type='checkbox' 
				class='switchery' unchecked onclick='updatestatus(".$list_item['id_tryout'].",".$list_item['active'].")'>";
			}		
			
			
			
			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode($output);	
	}


function updateaktiv($data){
	$this->Mtoback->updateaktiv($data);
}

function updatepasive($data){
	$this->Mtoback->updatepasive($data);
}

//tampil to aktif
function tampil_to(){
	if ($this->input->post('update')) 
		{
			$this->Mtoback->tampilto();
			
			if ($this->db->affected_rows())
			{
				 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
				redirect('toback/listTO');
			}
			else
			{
				 $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
				redirect('toback/listTO');
			}
		}

}

	
  public function gettampilto() {
   
    $data['tampil'] = $this->Mtoback->get_tampil_To();
    
       if ($this->session->userdata('id_admin')) {
			$this->load->view('admin/layout/header');
			$this->load->view('');
			$this->load->view('admin/layout/footer');
	}	elseif ($this->session->userdata('id_guru')) {
			$this->load->view('guru/layout/header');
			$this->load->view('v_tryout');
			$this->load->view('guru/layout/footer');
	}
	else{

	}
    
}





}
?>
