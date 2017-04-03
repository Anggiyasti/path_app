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

	// GET BAB
	function getbab($id){

		$option="<option value='0'>--pilih--</pilih>";

		$this->db->select('*');
		$this->db->from('tb_bab');
        $this->db->where('id_mapel',$id);
        $this->db->where('status','1');
		$this->db->order_by('judul_bab','ASC');
		$bab = $this->db->get();
		if ($bab->result_array()==array()) {

		$option.= "<option value=''>KOSONG</option>";
			
		}
		else{
		foreach ($bab->result_array() as $data ){
		$option.= "<option value='$data[id_bab]'>$data[judul_bab]</option>";
	}

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

	// jumlah data untuk filter berdasarkan bab
	function jumlah_data_filter_bab($id_bab){
        $this->db->where('publish','1');
        $this->db->where('id_bab', $id_bab);
        return $this->db->get('tb_bank_soal')->num_rows();
    }

    // GET DATA BANK SOAL YANG PUBLISHNYA 1
	function jumlah_data(){
        $this->db->where('publish','1');
        return $this->db->get('tb_bank_soal')->num_rows();
    }

    // jumlah data filter mapel
    function jumlah_data_mapel($mapel){
        $this->db->where('publish','1');
        $this->db->where('id_mapel', $mapel);
        return $this->db->get('tb_bank_soal')->num_rows();
    }

    // jumlah data filter level
    function jumlah_data_level($l){
        $this->db->where('publish','1');
        $this->db->where('kesulitan', $l);
        return $this->db->get('tb_bank_soal')->num_rows();
    }

    // jumlah data filter pel bab leve
    function jumlah_data_pel_bab_level($pel, $bab, $level){
        $this->db->where('bs.publish','1');
        $this->db->where('bab.id_bab', $bab);
        $this->db->where('mapel.id_mapel', $pel);
        $this->db->where('bs.kesulitan', $level);
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        return $this->db->get('tb_bank_soal bs')->num_rows();
    }

    // jumlah data filter bab
    function jumlah_data_pel_bab($pel, $bab){
        $this->db->where('bs.publish','1');
        $this->db->where('bs.id_bab', $bab);
         $this->db->where('mapel.id_mapel', $pel);
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        return $this->db->get('tb_bank_soal bs')->num_rows();
    }
    
    // jumlah data filter bab
    function jumlah_data_pel_level($pel, $level){
        $this->db->where('bs.publish','1');
        $this->db->where('bs.kesulitan', $level);
         $this->db->where('mapel.id_mapel', $pel);
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        return $this->db->get('tb_bank_soal bs')->num_rows();
    }
    

    // data paginataion all soal
    function data_soal($number,$offset){
        $this->db->select('id_bank, sumber, kesulitan, judul_soal, jawaban_benar, UUID, publish, random, soal, gambar_soal, pembahasan, bab.judul_bab, mapel.id_mapel, mapel.nama_mapel');
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        $this->db->where('bs.publish','1');
        $this->db->where('bab.status','1');
        $this->db->where('mapel.status','1');
        $this->db->order_by('bs.id_bank', 'desc');
        return $query = $this->db->get('tb_bank_soal bs',$number,$offset)->result_array();       
    }

     // data paginataion filter soal pelajaran bab level
    function data_soal_pel_bab_level($number,$offset,$pel, $bab, $level){
        $this->db->select('id_bank, sumber, kesulitan, judul_soal, jawaban_benar, UUID, publish, random, soal, gambar_soal, pembahasan, bab.judul_bab, mapel.id_mapel, mapel.nama_mapel');
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        $this->db->where('bs.publish','1');
        $this->db->where('mapel.id_mapel',$pel);
        $this->db->where('bs.id_bab',$bab);
        $this->db->where('bs.kesulitan',$level);
        $this->db->order_by('mapel.id_mapel', 'desc');
        return $query = $this->db->get('tb_bank_soal bs',$number,$offset)->result_array();       
    }


     // data paginataion filter soal pelajaran 
    function data_soal_pel($number,$offset,$pel){
        $this->db->select('id_bank, sumber, kesulitan, judul_soal, jawaban_benar, UUID, publish, random, soal, gambar_soal, pembahasan, bab.judul_bab, mapel.id_mapel, mapel.nama_mapel');
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        $this->db->where('bs.publish','1');
        $this->db->where('mapel.id_mapel',$pel);
        $this->db->order_by('mapel.id_mapel', 'desc');
        return $query = $this->db->get('tb_bank_soal bs',$number,$offset)->result_array();       
    }

    // data paginataion filter soal pelajaran 
    function data_soal_level($number,$offset,$l){
        $this->db->select('id_bank, sumber, kesulitan, judul_soal, jawaban_benar, UUID, publish, random, soal, gambar_soal, pembahasan, bab.judul_bab, mapel.id_mapel, mapel.nama_mapel');
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        $this->db->where('bs.publish','1');
        $this->db->where('bs.kesulitan',$l);
        $this->db->order_by('mapel.id_mapel', 'desc');
        return $query = $this->db->get('tb_bank_soal bs',$number,$offset)->result_array();       
    }


     // data paginataion filter soal pelajaran dan bab
    function data_soal_pel_bab($number,$offset,$pel, $bab){
        $this->db->select('id_bank, sumber, kesulitan, judul_soal, jawaban_benar, UUID, publish, random, soal, gambar_soal, pembahasan, bab.judul_bab, mapel.id_mapel, mapel.nama_mapel');
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        $this->db->where('bs.publish','1');
        $this->db->where('mapel.id_mapel',$pel);
        $this->db->where('bs.id_bab',$bab);
        $this->db->order_by('mapel.id_mapel', 'desc');
        return $query = $this->db->get('tb_bank_soal bs',$number,$offset)->result_array();       
    }

     // data paginataion filter soal pelajaran dan bab
    function data_soal_pel_level($number,$offset,$pel, $level){
        $this->db->select('id_bank, sumber, kesulitan, judul_soal, jawaban_benar, UUID, publish, random, soal, gambar_soal, pembahasan, bab.judul_bab, mapel.id_mapel, mapel.nama_mapel');
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        $this->db->where('bs.publish','1');
        $this->db->where('mapel.id_mapel',$pel);
        $this->db->where('bs.kesulitan',$level);
        $this->db->order_by('mapel.id_mapel', 'desc');
        return $query = $this->db->get('tb_bank_soal bs',$number,$offset)->result_array();       
    }

    // data paginataion filter bab berdasarkan mapel, bab dan kesulitan
    function data_soal_filter1($number,$offset, $pel, $bab, $level){
        $this->db->select('bs.id_bank, bs.sumber, bs.kesulitan, bs.judul_soal, bs.jawaban_benar, bs.UUID, bs.publish, bs.random, bs.soal, bs.gambar_soal, bs.pembahasan, bab.judul_bab, mapel.id_mapel, mapel.nama_mapel');
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        $this->db->where('bs.publish','1');
        $this->db->where('mapel.id_mapel', $pel);
        $this->db->where('bab.id_bab', $bab);
        $this->db->where('bs.kesulitan', $level);
        $this->db->order_by('bs.id_bank', 'desc');
        return $query = $this->db->get('tb_bank_soal bs',$number,$offset)->result_array();       
    }

     // data paginataion filter bab berdasarkan mapel dan bab
    function data_soal_filter2($number,$offset, $pel, $bab){
        $this->db->select('bs.id_bank, bs.sumber, bs.kesulitan, bs.judul_soal, bs.jawaban_benar, bs.UUID, bs.publish, bs.random, bs.soal, bs.gambar_soal, bs.pembahasan, bab.judul_bab, mapel.id_mapel, mapel.nama_mapel');
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        $this->db->where('bs.publish','1');
        $this->db->where('mapel.id_mapel', $pel);
        $this->db->where('bab.id_bab', $bab);
        $this->db->order_by('bs.id_bank', 'desc');
        return $query = $this->db->get('tb_bank_soal bs',$number,$offset)->result_array();       
    } 

     // data paginataion filter bab berdasarkan mapel dan level
    function data_soal_filter3($number,$offset, $pel, $level){
        $this->db->select('bs.id_bank, bs.sumber, bs.kesulitan, bs.judul_soal, bs.jawaban_benar, bs.UUID, bs.publish, bs.random, bs.soal, bs.gambar_soal, bs.pembahasan, bab.judul_bab, mapel.id_mapel, mapel.nama_mapel');
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        $this->db->where('bs.publish','1');
        $this->db->where('mapel.id_mapel', $pel);
        $this->db->where('bs.kesulitan', $level);
        $this->db->order_by('bs.id_bank', 'desc');
        return $query = $this->db->get('tb_bank_soal bs',$number,$offset)->result_array();       
    }

     // data paginataion filter bab berdasarkan mapel
    function data_soal_filter4($number,$offset, $pel){
        $this->db->select('bs.id_bank, bs.sumber, bs.kesulitan, bs.judul_soal, bs.jawaban_benar, bs.UUID, bs.publish, bs.random, bs.soal, bs.gambar_soal, bs.pembahasan, bab.judul_bab, mapel.id_mapel, mapel.nama_mapel');
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        $this->db->where('bs.publish','1');
        $this->db->where('mapel.id_mapel', $pel);
        $this->db->order_by('bs.id_bank', 'desc');
        return $query = $this->db->get('tb_bank_soal bs',$number,$offset)->result_array();       
    }

      // data paginataion filter bab berdasarkan mapel
    function data_soal_filter5($number,$offset, $level){
        $this->db->select('bs.id_bank, bs.sumber, bs.kesulitan, bs.judul_soal, bs.jawaban_benar, bs.UUID, bs.publish, bs.random, bs.soal, bs.gambar_soal, bs.pembahasan, bab.judul_bab, mapel.id_mapel, mapel.nama_mapel');
        $this->db->join('tb_bab bab','bab.id_bab=bs.id_bab');
        $this->db->join('tb_mata_pelajaran mapel', 'mapel.id_mapel = bab.id_mapel' );
        $this->db->where('bs.publish','1');
        $this->db->where('bs.kesulitan', $level);
        $this->db->order_by('bs.id_bank', 'desc');
        return $query = $this->db->get('tb_bank_soal bs',$number,$offset)->result_array();       
    }

    // INSERT BANK SOAL
	public function insert_soal($dataSoal) {
        $this->db->insert('tb_bank_soal', $dataSoal);
    }

    // GET ID SOAL
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

    // GET DAFTAR SOAL
    public function getdaftarsoal(){
    
    	
		$this->db->select('b.id_bank, b.judul_soal, b.judul_bab, b.soal, b.kesulitan,b.id_bab, m.nama_mapel,b.publish,p.jawaban as jawab,b.UUID, p.gambar, b.gambar_soal');
		$this->db->from('tb_mata_pelajaran m');
		$this->db->join('tb_bank_soal b', 'm.id_mapel = b.id_mapel');
		$this->db->join('tb_pil_jawab p', 'b.id_bank = p.id_soal');
		$this->db->where('p.pilihan_jawaban = b.jawaban_benar ');
		$this->db->where('b.publish= 1');
		$this->db->order_by('b.id_bank', 'desc');
		$tampil=$this->db->get();
		return $tampil->result_array();

    }

    // UPDATE SOAL
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

		
		$arr = array(
				'id_bank' => $a,
				'judul_soal'=> $b,
				'soal' => $c,
				'jawaban_benar'=> $d,
				'sumber' => $e,
				'kesulitan'=> $f,
				'id_mapel' => $g,
				'judul_bab'=> $h,
				'id_bab'=> $h,
				'random' => $i,
				'publish'=> $j,
				
			);
		$this->db->where('id_bank', $a);
		return $this->db->update('tb_bank_soal', $arr);
	}

    // UPDATE PILIHAN JAWABAN
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

    // GET OLD GAMBAR SOAL
	public function get_oldgambar_soal($UUID)
    {
        $this->db->where('UUID', $UUID);
        $this->db->select('id_bank, gambar_soal')->from('tb_bank_soal');
        $query = $this->db->get();
        return $query->result_array();
    }

    // GET OLD GAMBAR JAWABAN
    public function get_oldgambar($soalID) {
        $this->db->where('id_soal', $soalID);
        $this->db->select('id_pilih, gambar')->from('tb_pil_jawab');
        $query = $this->db->get();
        return $query->result_array();
    }

    // UPDATE GAMBAR PILIHAN JAWABAN
    public function ch_gambar($datagambar) {
        $this->db->update_batch('tb_pil_jawab', $datagambar, 'id_pilih');
    }

    // FUNGSI GET KESULITAN
    function getkes($kesulitan){

		$kabupaten="<option value='0'>--pilih--</pilih>";

		$kab= $this->db->get_where('tb_bank_soal',array('id_mapel'=>$kesulitan));

		foreach ($kab->result_array() as $data ){
		$kabupaten.= "<option value='$data[kesulitan]'>$data[kesulitan]</option>";

		}

		return $kabupaten;

		}

    // FUNGSI DELETE SOAL
    public function delete_soal($id_bank) {
		$this->db->where('id_bank', $id_bank);
        $this->db->set('status', '0');
        $this->db->update('tb_bank_soal');
	}
	
    // INSERT MATA PELAJARAN
	public function insert_mapel($datamapel) {
        $this->db->insert('tb_mata_pelajaran', $datamapel);
    }

    // INSERT BAB
    public function insert_bab($databab) {
        $this->db->insert('tb_bab', $databab);
    }

    // GET DAFTAR MATA PELAJARAN
    public function getDaftarMapel(){
    	$this->db->distinct();
		$this->db->select()->from('tb_mata_pelajaran');
		$this->db->where('status = 1');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }
    
    // GET GAMBBAR MATA PELAJARAN
    public function gambar_mapel($id, $photo) {
        $data = array(
            'gambar' => $photo
        );
        $this->db->where('id_mapel', $id);
        $this->db->update('tb_mata_pelajaran', $data);
        redirect(site_url('banksoal/daftarmapelicon'));
    }

    // GET GAMBAR MATA PELAJARAN
    public function get_mapelgambar($id)
	{
		$this->db->select('*');
		$this->db->from('tb_mata_pelajaran');
		$this->db->where('id_mapel',$id); 
		$query = $this->db->get();
		return $query->result_array();
	}
    
    // FUNGSI GET DAFTAR BAB
    public function getDaftarBab(){
    	$this->db->distinct();
		$this->db->select('m.nama_mapel, b.id_bab, b.judul_bab, b.keterangan,b.status');
		$this->db->from('tb_mata_pelajaran m');
		$this->db->join('tb_bab b', 'm.id_mapel = b.id_mapel');
		$this->db->where('b.status = 1');
		$query = $this->db->get();
		return $query->result_array();
    }

    // UPDATE MATA PELAJARAN
    public function update_mapel() {
		$a  =  $this->input->post('id_mapel');
		$b  =  $this->input->post('nama_mapel');
		$c  =  $this->input->post('alias_mapel');
        $d  =  $this->input->post('jurusan');
		$arr = array(
				'id_mapel' => $a,
				'nama_mapel'=> $b,
				'alias_mapel'=> $c,
                'jurusan' => $d
			);
		$this->db->where('id_mapel', $a);
		return $this->db->update('tb_mata_pelajaran', $arr);
	}

    // DELETE MATA PELAJARAN
	public function delete_mapel($id_mapel) {
		$this->db->where('id_mapel', $id_mapel);
        $this->db->set('status', '0');
        $this->db->update('tb_mata_pelajaran');
	}

    // UPDATE BAB
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

    // DELETE BAB
	public function delete_bab($id_bab) {
		$this->db->where('id_bab', $id_bab);
        $this->db->set('status', '0');
        $this->db->update('tb_bab');
	}

    // GET SOAL DETAIL
	function get_detail_soal(){
		$this->db->select('id_bank','soal','jawaban_benar','sumber','judul_soal','id_mapel','judul_bab','kesulitan','publish','rendom','UUID');
		$this->db->from('tb_bank_soal');
		$this->db->where('publish','1');
		$query = $this->db->get();
		return $query->result_array();
	}

    // GET PILIHAN JAWABAN
	function get_pilihan(){
		$this->db->select('*, pil.id_bank as pilID, soal.id_bank as soalID, pil.jawaban as jawaban_benar');
		$this->db->from('tb_bank_soal soal');
		$this->db->join('tb_pil_jawab pil','pil.id_bank = soal.id_bank');
		$query = $this->db->get();
		return $query->result_array();
	}

    // INSERT GAMBAR PILIHAN JAWABAN
	public function insert_gambar($datagambar) {
        $this->db->insert_batch('tb_pil_jawab', $datagambar);

    }
    
    // GET BANK SOAL
	public function getsoal() {
    	$this->db->select('b.id_bank, b.judul_soal, b.soal, b.judul_bab, b.kesulitan, m.nama_mapel,b.publish,b.jawaban_benar');
		$this->db->from('tb_bank_soal b');
		$this->db->join('tb_mata_pelajaran m', 'm.id_mapel = b.id_mapel');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    // UPDATE UUID SOAL
    public function ch_soal($data) {
        $this->db->set($data['dataSoal']);
        $this->db->where('UUID', $data['UUID']);
        $this->db->update('tb_bank_soal');
    }

    // UPDATE UUID SOAL
     public function ch_soalup($data) {
        $this->db->set($data['soal']);
        $this->db->where('UUID', $data['UUID']);
        $this->db->update('tb_bank_soal');
    }

    // UPDATE PILIHAN JAWABAN
    public function ch_jawaban($data) {
        $this->db->where('id_soal',$data['id_soal']);
        $this->db->update_batch('tb_pil_jawab', $data['jawabann'], 'pilihan_jawaban');
    }

    // GET SINGLE SOAL
    public function get_onesoal($UUID) {
        $this->db->where('UUID', $UUID);
        $this->db->select('*, m.nama_mapel, bb.judul_bab');
        $this->db->from('tb_bank_soal b');
        $this->db->join('tb_bab bb', 'b.id_bab = bb.id_bab');
        $this->db->join('tb_mata_pelajaran m', 'b.id_mapel = m.id_mapel');
        $query = $this->db->get();
        return $query->result_array();
    }

    // GET PILIHAN JAWABAN
    public function get_piljawaban($id_soal) {
        $this->db->where('id_soal', $id_soal);
        $this->db->select('*')->from('tb_pil_jawab');
        $query = $this->db->get();
        return $query->result_array();
    }

    // GET KESULITAN UNTUK FILTER
    public function getkesulitanfilter() {
    	$this->db->select('kesulitan');
		$this->db->from('tb_bank_soal');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }
	

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

    // get piljawaban by id soal and pilihan
    public function get_jawaban($jawaban,$id_soal)
    {
        $this->db->select('jawaban, gambar as imgJawaban' );
        $this->db->from('tb_pil_jawab');
        $this->db->where('id_soal',$id_soal);
         $this->db->where('pilihan_jawaban',$jawaban);
         $query = $this->db->get();
        // cek jika hasil query null
        if($query->num_rows() == 1) {
            return $query->result_array()[0];
        }else{
             return $result='';
        }

    }
    
    // fungsi cek jawaban
    public function cek_jawaban($id_soal) {
    	$this->db->distinct();
		$this->db->select('id_soal');
        $this->db->from('tb_pil_jawab');
        $this->db->where('id_soal', $id_soal);
		
        $this->db->limit(1);



        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result(); //if data is true

        } else {
            return false; //if data is wrong

        }
    }
   
    function getmapel2(){
    
    $this->db->where('status=1');
    return $this->db->get('tb_mata_pelajaran');
    }



}

 ?>