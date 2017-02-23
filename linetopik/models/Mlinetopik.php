<?php 
/**
 * 
 */
 class Mlinetopik extends CI_Model
 {

 	public function get_line_topik($babID)
 	{
 		$this->db->select('namaTopik,step.UUID as stepUUID, namaStep, jenisStep, topik.deskripsi, bab.judul_bab, step.latihanID,step.id as stepID, step.urutan');
 		$this->db->from('tb_line_topik topik');
 		$this->db->join('tb_line_step step','step.topikID=topik.id');
 		$this->db->join('tb_bab bab','bab.id_bab=topik.babID');
 		$this->db->where('bab.id_bab',$babID);
 		$this->db->order_by('topik.namaTopik');
 		$this->db->order_by('step.urutan', 'asc');
 		$query=$this->db->get();
 		return  $query->result_array();

 	}

 	// get topik untuk side bar
 	public function get_topik($babID)
 	{
 		$this->db->select('id,UUID,namaTopik');
 		$this->db->from('tb_line_topik');
 		$this->db->where('babID',$babID);
 		$this->db->where('status',1);
 		$this->db->where('statusLearning',1);
 		$this->db->order_by('namaTopik');
 		$query=$this->db->get();
 		return $query->result_array();
 	}

 	//untuk mengecek log 
    public function get_log($stepID, $id_siswa)
    {
    	$this->db->select('id');
    	$this->db->from('tb_line_log');
    	$this->db->where('stepID',$stepID);
        $this->db->where('penggunaID',$id_siswa);
    	$query = $this->db->get();
    	if ($query->result_array()==array()) {
    		return false;
    	} else {
    		return true;
    	}
    	
    }

    // get id step line by UUID
    public function get_stepID($UUID)
    {
        $this->db->select('id');
        $this->db->from('tb_line_step');
        $this->db->where('UUID',$UUID);
        $query = $this->db->get();
        return $query->result_array()[0]['id'];
    }

    //savelog step line siswa
    public function save_log($datLog)
    {
        $this->db->insert('tb_line_log',$datLog);
    }

    public function get_datMateri($UUID)
    {
        $this->db->select('namaStep,namaTopik,judulMateri,isiMateri,materi.date_created,topik.UUID');
        $this->db->from('tb_line_topik topik');
        $this->db->join('tb_line_step step','step.topikID=topik.id');
        $this->db->join('tb_line_materi materi','materi.id=step.materiID');
        $this->db->where('step.UUID',$UUID);
        $query=$this->db->get();
        return $query->result_array()[0];
    }

    // get step line berdasarkan UUID step dan info tingkat mp dan bab
    public function get_topic_step2($UUID)
    {
        $UUIDTopik=$this->get_uuidTopik($UUID);
         $this->db->select('namaTopik,topik.babID,topik.UUID as topikUUID,step.UUID as stepUUID, namaStep, jenisStep, topik.deskripsi,step.urutan,step.id as stepID,step.latihanID,bab.judul_bab');
        $this->db->from('tb_line_topik topik');
        $this->db->join('tb_line_step step','step.topikID=topik.id');
        $this->db->join('tb_bab bab','bab.id_bab=topik.babID');
        $this->db->where('topik.UUID',$UUIDTopik
            );
        $this->db->order_by('topik.namaTopik');
        $this->db->order_by('step.urutan', 'asc');
        $query=$this->db->get();
        return  $query->result_array();
    }

    public function get_uuidTopik($UUID)
    {
        $this->db->select('topik.UUID');
        $this->db->from('tb_line_topik topik');
        $this->db->join('tb_line_step step','step.topikID=topik.id');
        $this->db->where('step.UUID',$UUID);
        $this->db->order_by('step.urutan', 'asc');
        $query=$this->db->get();
        return  $query->result_array()[0]['UUID'];
    }

    //get UUID step by id latihan
    public function get_UUID($id_latihan)
    {
        $this->db->select('UUID');
        $this->db->from('tb_line_step');
        $this->db->where('latihanID',$id_latihan);
        $query=$this->db->get();
        return $query->result_array()[0]['UUID'];
    }


    //get step id and UUID
    public function get_stepID2($id_latihan)
    {
        $this->db->select('id,UUID');
        $this->db->from('tb_line_step');
        $this->db->where('latihanID',$id_latihan);
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    //mengambil data step line quize 
    public function get_datQuiz($latihanID)
    {
        $this->db->select('jumlah_benar');
        $this->db->from('tb_line_step');
        $this->db->where('latihanID',$latihanID);
        $query=$this->db->get();
        return $query->result_array()['0'];
    }

    public function get_caritopik($kunciCari)
    {
        $this->db->select('namaTopik,topik.babID,topik.UUID as topikUUID,step.UUID as stepUUID, namaStep, jenisStep, topik.deskripsi,step.urutan,step.id as stepID,step.latihanID,bab.judul_bab');
        $this->db->from('tb_line_topik topik');
        $this->db->join('tb_line_step step','step.topikID=topik.id');
        $this->db->join('tb_bab bab','bab.id_bab=topik.babID');
        $this->db->like('topik.namaTopik',$kunciCari
            );
        $this->db->order_by('topik.namaTopik');
        $this->db->order_by('step.urutan', 'asc');
        $query=$this->db->get();
        return  $query->result_array();
    }

    // get topik untuk side bar by namatopik
    public function get_topik_bynama($kunciCari)
    {
        $this->db->select('id,z,namaTopik');
        $this->db->from('tb_line_topik');
        $this->db->like('namaTopik',$kunciCari);
        $this->db->where('status',1);
        $this->db->where('statusLearning',1);
        $this->db->order_by('namaTopik');
        $query=$this->db->get();
        return $query->result_array();
    }

 }
 ?>