<?php 
/**
* 
*/
class Modelbank extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	

	public function getTingkat()
	{
		return $this->db->get('tb_tingkat_sekolah');
	}

	
	function getbab($id){

		$option="<option value='0'>--pilih--</pilih>";

		$this->db->order_by('judul_bab','ASC');
		$bab= $this->db->get_where('tb_bab',array('id_mapel'=>$id));

		foreach ($bab->result_array() as $data ){
		$option.= "<option value='$data[id_bab]'>$data[judul_bab]</option>";

		}

		return $option;

		}

		// get mapel 
	function getmapel(){
	$this->db->order_by('nama_mapel','ASC');
	$this->db->where('status = 1');
	$provinces= $this->db->get('tb_mata_pelajaran');
	

	return $provinces->result_array();
	}

	function getmapel2(){
	
	return $this->db->get('tb_mata_pelajaran');
	}


	public function getKesulitan()
	{
		return $this->db->get('tb_tingkat_pelajaran');
	}

	public function insert_soal($dataSoal) {
        $this->db->insert('tb_bank_soal', $dataSoal);
    }

    public function get_soalID($UUID) {
        $this->db->where('UUID', $UUID);
        
        $this->db->select('id_bank')->from('tb_bank_soal');
        $query = $this->db->get();
        return $query->result_array();
    }
    

    

    //insert pilihan jawaban 
    public function insert_jawaban($dataJawaban) {
        $this->db->insert_batch('tb_pil_jawab', $dataJawaban);
    }

    public function getdaftarsoal(){
    
    	
		$this->db->select('b.id_bank, b.judul_soal, b.soal, b.kesulitan,b.id_bab, m.nama_mapel,b.publish,p.jawaban as jawab,b.UUID, p.gambar, b.gambar_soal');
		$this->db->from('tb_mata_pelajaran m');
		$this->db->join('tb_bank_soal b', 'm.id_mapel = b.id_mapel');
		$this->db->join('tb_pil_jawab p', 'b.id_bank = p.id_soal');
		$this->db->where('p.pilihan_jawaban = b.jawaban_benar ');
		$this->db->where('b.publish= 1');
		$this->db->order_by('b.id_bank', 'desc');
		$tampil=$this->db->get();
		return $tampil->result_array();

    }
    public function update_soal() {
		$a  =  $this->input->post('id_bank');
		$b  =  $this->input->post('judul_soal');
		$c  =  $this->input->post('editor1');
		$d  =  $this->input->post('jawaban_benar');
		$e  =  $this->input->post('sumber');
		$f  =  $this->input->post('kesulitan');
		$g  =  $this->input->post('id_mapel');
		$h  =  $this->input->post('id_bab');
		$i  =  $this->input->post('random');
		$j  =  $this->input->post('publish');
		//$k  =  $this->input->post('pembahasan');

		
		$arr = array(
				'id_bank' => $a,
				'judul_soal'=> $b,
				'soal' => $c,
				'jawaban_benar'=> $d,
				'sumber' => $e,
				'kesulitan'=> $f,
				'id_mapel' => $g,
				'judul_bab'=> $h,
				'random' => $i,
				'publish'=> $j,
				//'pembahasan'=> $k,
				
			);
		$this->db->where('id_bank', $a);
		return $this->db->update('tb_bank_soal', $arr);
	}
	public function update_pilihan() {
		$a  =  $this->input->post('id_bank');
		$b  =  $this->input->post('a');
		

		
		$arr = array(
			
			'id_bank' => $a,
				'pilihan' => $b,
				
			);
		$this->db->where('id_bank', $a);
		return $this->db->update('tb_pil_jawab', $arr);
	}
	public function get_oldgambar_soal($UUID)
    {
        $this->db->where('UUID', $UUID);
        $this->db->select('id_bank, gambar_soal')->from('tb_bank_soal');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_oldgambar($soalID) {
        $this->db->where('id_soal', $soalID);
        $this->db->select('id_pilih, gambar')->from('tb_pil_jawab');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function ch_gambar($datagambar) {
        $this->db->update_batch('tb_pil_jawab', $datagambar, 'id_pilih');
        // var_dump($datagambar);
    }
   

    function getkes($kesulitan){

		$kabupaten="<option value='0'>--pilih--</pilih>";

		$kab= $this->db->get_where('tb_bank_soal',array('id_mapel'=>$kesulitan));

		foreach ($kab->result_array() as $data ){
		// $kabupaten.= "<option value='$data[id_bab]'>$data[judul_bab]</option>";
		$kabupaten.= "<option value='$data[kesulitan]'>$data[kesulitan]</option>";

		}

		return $kabupaten;

		}


  //    public function getCaribab($cbab){
  //   	$this->db->like('judul_bab',$cbab);
		// $this->db->distinct();
		// $this->db->select()->from('tb_bank_soal');
		// $query=$this->db->get();
		// return $query->result_array();


  //   }
    public function delete_soal($id_bank) {
		$this->db->where('id_bank', $id_bank);
        $this->db->set('publish', '0');
        $this->db->update('tb_bank_soal');
	}
	
	
	public function insert_mapel($datamapel) {
        $this->db->insert('tb_mata_pelajaran', $datamapel);
    }
    public function insert_bab($databab) {
        $this->db->insert('tb_bab', $databab);
    }

    public function getDaftarMapel(){
    	$this->db->distinct();
		$this->db->select()->from('tb_mata_pelajaran');
		// $this->db->where('status = 1');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }
    
    public function gambar_mapel($id, $photo) {
        $data = array(
            'gambar' => $photo
        );
        // $id_siswa = $this->session->userdata['email'];
        $this->db->where('id_mapel', $id);
        $this->db->update('tb_mata_pelajaran', $data);
        // var_dump($data);
        redirect(site_url('banksoal/daftarmapelicon'));
    }

    public function get_mapelgambar($id)

	{

		// $id_siswa=$this->session->userdata['email'] ;	

		$this->db->select('*');

		$this->db->from('tb_mata_pelajaran');

		$this->db->where('id_mapel',$id); 

		$query = $this->db->get();

		return $query->result_array();

	}
    

     public function getDaftarBab(){
    	$this->db->distinct();
		$this->db->select('m.nama_mapel, b.id_bab, b.judul_bab, b.keterangan,b.status');
		$this->db->from('tb_mata_pelajaran m');
		$this->db->join('tb_bab b', 'm.id_mapel = b.id_mapel');
		$this->db->where('b.status = 1');
		 
		$query = $this->db->get();
		return $query->result_array();


    }

    public function update_mapel() {
		$a  =  $this->input->post('id_mapel');
		$b  =  $this->input->post('nama_mapel');
		$c  =  $this->input->post('alias_mapel');
		
		$arr = array(
				'id_mapel' => $a,
				'nama_mapel'=> $b,
				'alias_mapel'=> $c
			);
		$this->db->where('id_mapel', $a);
		return $this->db->update('tb_mata_pelajaran', $arr);
	}

	public function delete_mapel($id_mapel) {
		$this->db->where('id_mapel', $id_mapel);
        $this->db->set('status', '0');
        $this->db->update('tb_mata_pelajaran');
	}

	public function update_bab() {
		$a  =  $this->input->post('id_bab');
		$b  =  $this->input->post('judul_bab');
		
		$arr = array(
				'id_bab' => $a,
				'judul_bab'=> $b
			);
		$this->db->where('id_bab', $a);
		return $this->db->update('tb_bab', $arr);
	}

	public function delete_bab($id_bab) {
		$this->db->where('id_bab', $id_bab);
        $this->db->set('status', '0');
        $this->db->update('tb_bab');
	}


	function get_detail_soal(){
		$this->db->select('id_bank','soal','jawaban_benar','sumber','judul_soal','id_mapel','judul_bab','kesulitan','publish','rendom','UUID');
		$this->db->from('tb_bank_soal');
		$this->db->where('publish','1');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_pilihan(){
		$this->db->select('*, pil.id_bank as pilID, soal.id_bank as soalID, pil.jawaban as jawaban_benar');
		$this->db->from('tb_bank_soal soal');
		$this->db->join('tb_pil_jawab pil','pil.id_bank = soal.id_bank');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function insert_gambar($datagambar) {
        $this->db->insert_batch('tb_pil_jawab', $datagambar);

    }


    
	public function getsoal() {
    	$this->db->select('b.id_bank, b.judul_soal, b.soal, b.judul_bab, b.kesulitan, m.nama_mapel,b.publish,b.jawaban_benar');
		$this->db->from('tb_bank_soal b');
		$this->db->join('tb_mata_pelajaran m', 'm.id_mapel = b.id_mapel');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    public function ch_soal($data) {
        $this->db->set($data['dataSoal']);
        $this->db->where('UUID', $data['UUID']);
        $this->db->update('tb_bank_soal');
        // var_dump($data);
    }

     public function ch_soalup($data) {
        $this->db->set($data['soal']);
        $this->db->where('UUID', $data['UUID']);
        $this->db->update('tb_bank_soal');
        // var_dump($data);
    }

    public function ch_jawaban($data) {
        // $this->db->where('id_soal',$data['id_soal']);
        $this->db->update_batch('tb_pil_jawab', $data['jawaban'], 'pilihan_jawaban');
    }
    public function get_onesoal($UUID) {
        $this->db->where('b.UUID', $UUID);
        $this->db->select('*, m.nama_mapel, bb.judul_bab');
        $this->db->from('tb_bank_soal b');
        $this->db->join('tb_mata_pelajaran m', 'b.id_mapel = m.id_mapel');
        $this->db->join('tb_bab bb', 'm.id_mapel = bb.id_mapel');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_piljawaban($id_soal) {
        $this->db->where('id_soal', $id_soal);
        $this->db->select('*')->from('tb_pil_jawab');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getkesulitanfilter() {
    	$this->db->select('kesulitan');
		$this->db->from('tb_bank_soal');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    function mapelfilter(){


	$this->db->order_by('nama_mapel','ASC');
	$provinces= $this->db->get('tb_mata_pelajaran');


	return $provinces->result_array();


	}



	public function getfilterbab($mapel) {
    	$this->db->distinct();
		$this->db->select('m.id_mapel, m.nama_mapel, m.alias_mapel, b.id_mapel, b.judul_bab');
		$this->db->from('tb_mata_pelajaran m');
		$this->db->join('tb_bab b', 'm.id_mapel = b.id_mapel');
		$this->db->where('b.id_mapel', $mapel);
		 
		$query = $this->db->get();
		return $query->result_array();
    }

  //   function getbab($provId){

		// $kabupaten="<option value='0'>--pilih--</pilih>";

		// $this->db->order_by('judul_bab','ASC');
		// $kab= $this->db->get_where('tb_bab',array('id_mapel'=>$provId));

		// foreach ($kab->result_array() as $data ){
		// // $kabupaten.= "<option value='$data[id_bab]'>$data[judul_bab]</option>";
		// $kabupaten.= "<option value='$data[judul_bab]'>$data[judul_bab]</option>";

		// }

		// return $kabupaten;

		// }

	

	// fungsi filter semua
	public function filter_soal_all($mapel, $pel, $kes) {
		$this->db->select('b.id_bank, b.judul_soal, b.soal, b.judul_bab, b.kesulitan, m.nama_mapel,b.publish, b.jawaban_benar');
		$this->db->from('tb_bank_soal b');
		$this->db->join('tb_mata_pelajaran m', 'm.id_mapel = b.id_mapel');
		$this->db->where('b.judul_bab', $mapel);
		$this->db->where('b.id_mapel',$pel);
		$this->db->where('b.kesulitan',$kes);
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    public function filter_soal_pel_bab($mapel, $pel) {
		$this->db->select('b.id_bank, b.judul_soal, b.soal, b.judul_bab, b.kesulitan, m.nama_mapel,b.publish ,b.jawaban_benar');
		$this->db->from('tb_bank_soal b');
		$this->db->join('tb_mata_pelajaran m', 'm.id_mapel = b.id_mapel');
		$this->db->where('b.judul_bab', $mapel);
		$this->db->where('b.id_mapel',$pel);
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    public function filter_soal_pel($pel) {
    	$this->db->select('b.id_bank, b.judul_soal, b.soal, b.judul_bab, b.kesulitan, m.nama_mapel,b.publish,b.jawaban_benar');
		$this->db->from('tb_bank_soal b');
		$this->db->join('tb_mata_pelajaran m', 'm.id_mapel = b.id_mapel');
		$this->db->where('b.id_mapel',$pel);
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    

    

    // fungsi getkesulitan
   



}

 ?>