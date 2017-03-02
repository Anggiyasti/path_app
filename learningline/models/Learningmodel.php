<?php 


class Learningmodel extends CI_Model{

	//fungsi ambil semua topik
	public function get_semua_topik(){
		$this->db->select('t.id,t.statusLearning, tn.`namaTingkat`, b.`judulBab`, t.`namaTopik`, m.`namaMataPelajaran`,');
		
		$this->db->from('`tb_line_topik` t');
		$this->db->where('t.status',1);
		
		$this->db->join('`tb_bab` b',' t.`babID` = b.`id` ');
		$this->db->join('`tb_tingkat-pelajaran` tp ',' b.`tingkatPelajaranID` = tp.`id`');
		$this->db->join('`tb_tingkat` tn',' tn.`id` = tp.`tingkatID`');
		$this->db->join('tb_mata-pelajaran` m',' m.`id` = tp.`mataPelajaranID`');

		$query = $this->db->get();
		return $query->result_array();
	}

		//fungsi ambil topik by id bab
	public function get_topik_by_mapelid($data){
		$this->db->select('t.urutan,t.id,t.status,t.namaTopik,t.part, m.nama_mapel');
		
		$this->db->from('tb_line_topik t');
		$this->db->join('tb_mata_pelajaran  m ','m.id_mapel = t.id_mapel');
		$this->db->where(' m.id_mapel ',$data);
		$this->db->where('t.status',1);
		$this->db->where('t.part',1);

		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_video_by_bab($idbab){
    $this->db->select('video.id_video as videoID, nama_file, link, judul_video, bab.id_bab, bab.judul_bab');
    $this->db->from( 'tb_bab bab' );
    $this->db->join('tb_video video ',' bab.id_bab = video.id_bab');
    $this->db->where('bab.id_bab',$idbab);
    $this->db->order_by('bab.id_bab');

    $query = $this->db->get();
    return $query->result_array(); 
  }

  //ambil 1 video bedasarkan id videonya
  function get_single_video( $id_video ) {
    $this->db->select( '*' );
    $this->db->from( 'tb_video video' );
    $this->db->where( 'id_video', $id_video );
    $query = $this->db->get();
    return $query->result();
  }

  function get_materi_babID($data){
		$this->db->select('m.id, judulMateri, isiMateri, b.id_bab');
		$this->db->from('tb_line_materi m');
		$this->db->JOIN('tb_bab as b ',' b.id_bab = m.id_bab'); 
		$this->db->where('b.id_bab', $data);

		$query = $this->db->get();
		return $query->result_array();
	}

	// fungi ambil semua step berdasarkan id topik tertentu
	public function get_step_by_id_topik($data){
		$this->db->select('*');
		$this->db->from('tb_line_topik tp');
		$this->db->join('tb_line_step ls','tp.id=ls.topikID');
		$this->db->where('tp.id',$data);
		$this->db->where('ls.status',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	// fungi ambil semua step berdasarkan id topik tertentu
	public function get_bab($data){
		$this->db->select('b.judul_bab, b.id_bab');
		$this->db->from('tb_mata_pelajaran m');
		$this->db->join('tb_bab b','m.id_mapel=b.id_mapel');
		$this->db->where('m.id_mapel',$data);
		$this->db->where('m.status',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_bab_by_mapel($data){
        $query = "SELECT 
         mapel.id_mapel,mapel.nama_mapel,mapel.part
        FROM tb_mata_pelajaran AS mapel
        WHERE id_mapel = $data";
        $result = $this->db->query($query);
        return $result->result_array();
    }

                      public function baba($data)
	{
		$this->db->select('ls.judul_bab, ls.id_bab');
		$this->db->from('tb_mata_pelajaran tp');
		$this->db->join('tb_bab ls','tp.id_mapel=ls.id_mapel');
		$this->db->where('tp.nama_mapel',$data);
		$query = $this->db->get();
		return $query->result_array();
	}

    function get_topik_byid($data){
		$query = "SELECT topik.id, mapel.id_mapel, namaTopik, mapel.nama_mapel,bab.judul_bab, statusLearning,topik.urutan,deskripsi, nama_mapel ,bab.id_bab
		FROM (SELECT  *  FROM  tb_line_topik WHERE  id = '$data') AS topik 
		JOIN tb_mata_pelajaran AS mapel ON mapel.id_mapel = topik.id_mapel
		JOIN tb_bab AS bab ON mapel.id_mapel = bab.id_mapel";

		$result = $this->db->query($query);
		if ($result->result_array()==array()) {
			return false;
		} else {
			return $result->result_array()[0];
		}
		

	}

	function get_topik_byid1($data){
		$query = "SELECT topik.id,bab.id_bab as babID, mapel.id_mapel as mapelID, mapel.nama_mapel, namaTopik, statusLearning,topik.urutan,deskripsi, nama_mapel, judul_bab 
		FROM (SELECT  *  FROM  tb_line_topik WHERE  id = $data) AS topik 
		JOIN tb_bab AS bab ON topik.babID = bab.id_bab
		JOIN tb_mata_pelajaran AS mapel ON mapel.id_mapel = bab.id_mapel

		";

		$result = $this->db->query($query);
		if ($result->result_array()==array()) {
			return false;
		} else {
			return $result->result_array()[0];
		}
		

	}

	// ambil semua bab
	public function get_bab_for_topik(){
		$this->db->select('m.id_mapel,m.nama_mapel,m.part,m.status');
		$this->db->from('tb_mata_pelajaran m');
		$this->db->where('m.status',1);
		$this->db->where('m.part',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	// update line topik aktiv
	function updateaktiv($data){
		$this->db->where('id', $data);
		$this->db->set('statusLearning', 1);
		$this->db->update('tb_line_topik');
	}
	// update line topik aktiv


	// update line topik passive
	function updatepasive($data){
		$this->db->where('id', $data);
		$this->db->set('statusLearning', 0);
		$this->db->update('tb_line_topik');
	}
	// update line topik passive


	function insert_line_topik($data){
		$this->db->insert( 'tb_line_topik', $data);
	}

	function droptopik($data){
		$this->db->where('id', $data['id']);
		$this->db->set('status', 0);
		$this->db->update('tb_line_topik');
	}

	#dropstep
	function drop_step($data){
		$this->db->where('id', $data['id']);
		$this->db->set('status', 0);
		$this->db->update('tb_line_step');
	}
	// update line bab aktiv
	function updateaktiv_bab($data){
		$this->db->where('id_bab', $data);
		$this->db->set('statusLearningLine', 1);
		$this->db->update('tb_bab');
	// update line topik aktiv
	}

	// update line bab passive
	function updatepasive_bab($data){
		$this->db->where('id_bab', $data);
		$this->db->set('statusLearningLine', 0);
		$this->db->update('tb_bab');
	// update line topik aktiv
	}

	// ------------------------------------TOPIK
	function update_topik($data){
		$this->db->where('id', $data['id']);
		$this->db->set($data);
		$this->db->update('tb_line_topik');
	}


	/*GET META DATA UNTUK STEP*/
	function get_meta_data_step($data){
		$this->db->select('*');
		$this->db->from('`tb_line_topik` tp');
		$this->db->where('id', $data);

		$query = $this->db->get();
		return $query->result_array();
	}
	/*GET META DATA UNTUK STEP*/

	/*insert DATA UNTUK STEP*/
	function insert_line_step($data){
		$this->db->insert( 'tb_line_step', $data );
	}
	/*insert DATA UNTUK STEP*/


	function get_step_sama_urutan($idtopik, $urutan){
		$this->db->select('*');
		$this->db->from('tb_line_step');
		$this->db->where('topikID', $idtopik);
		$this->db->where('urutan =', $urutan);

		$result = $this->db->get();
		if ($result->result_array()==array()) {
			return false;
		} else {
			return $result->result_array();
		}

	}
	public function getmapel()
	{
		return $this->db->get('tb_mata_pelajaran');
	}

	function get_step_urutan_idtopik($idtopik, $urutan){
		$this->db->select('*');
		$this->db->from('tb_line_step');
		$this->db->where('topikID', $idtopik);
		$this->db->where('urutan >=', $urutan);
		$this->db->order_by('urutan','asc');

		$result = $this->db->get();
		if ($result->result_array()==array()) {
			return false;
		} else {
			return true;
		}

	}
	function get_step_urutan($idtopik, $urutan){
		$this->db->select('*');
		$this->db->from('tb_line_step');
		$this->db->where('topikID', $idtopik);
		$this->db->where('urutan >=', $urutan);

		$result = $this->db->get();
		if ($result->result_array()==array()) {
			return false;
		} else {
			return $result->result_array();
		}

	}

	public function update_step_urutan($data) {
        $this->db->where('id',$data['id']);
        $this->db->set($data);
		$this->db->update('tb_line_step');
    }


    public function scPelajaran()
	{
		$this->db->select('id_mapel,nama_mapel')->from('tb_mata_pelajaran');
		$query = $this->db->get();
		return $query->result_array();
	}

	//mengambil value pelajaran berdasarkan id tingkatan
	public function scBab($tpelajaranID)
	{
		$this->db->select('id_bab, keterangan, judul_bab')->from('tb_bab');
		$this->db->where('id_bab', $tpelajaranID);
		$query = $this->db->get();
		return $query->result_array();
	}

		function get_bab_by_id($data){
        $query = "SELECT 
        bab.id_bab, mapel.nama_mapel, bab.judul_bab
        FROM
        (SELECT  * FROM  tb_bab
        WHERE 
        id_bab =  $data ) AS bab
        JOIN tb_mata_pelajaran AS mapel
        ON mapel.id_mapel = bab.id_mapel";
        $result = $this->db->query($query);
        return $result->result_array();
    }


}
?>