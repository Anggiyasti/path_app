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
	public function get_topik_by_babid($data){
		$this->db->select('t.urutan,t.id,t.statusLearning,t.namaTopik, b.judul_bab, m.nama_mapel');
		
		$this->db->from('tb_line_topik t');
		$this->db->join('tb_bab b','t.babID = b.id_bab');
		$this->db->join('tb_mata_pelajaran m',' m.id_mapel = b.id_mapel');
		$this->db->where('b.id_bab',$data);
		$this->db->where('t.status',1);

		$query = $this->db->get();
		return $query->result_array();
	}

	// fungi ambil semua step berdasarkan id topik tertentu
	public function get_step_by_id_topik($data){
		$this->db->select('*');
		$this->db->from('`tb_line_topik` tp');
		$this->db->join('`tb_line_step` ls','tp.`id`=ls.`topikID`');
		$this->db->where('tp.id',$data);
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

	// ambil semua bab
	public function get_bab_for_topik(){
		$this->db->select('b.id_bab, m.nama_mapel,b.judul_bab,b.statusLearningLine');
		$this->db->from('tb_bab b');
		$this->db->join('tb_mata_pelajaran m',' m.id_mapel = b.id_mapel');
		$this->db->where('b.status',1);
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

	function drop_topik($data){
		$this->db->where('id', $data['id']);
		$this->db->set('status', 0);
		$this->db->update('tb_line_topik');
	}

	// update line bab aktiv
	function updateaktiv_bab($data){
		$this->db->where('id', $data);
		$this->db->set('statusLearningLine', 1);
		$this->db->update('tb_bab');
	// update line topik aktiv
	}

	// update line bab passive
	function updatepasive_bab($data){
		$this->db->where('id', $data);
		$this->db->set('statusLearningLine', 0);
		$this->db->update('tb_bab');
	// update line topik aktiv
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

}
?>