<?php 
/**
 * 
 */
 class Mmateri extends CI_Model
 {
 	
 	public function in_materi($data)
 	{
 		$this->db->insert('tb_line_materi',$data);
 	}

 	// get data materi unutuk halaman list materi
 	public function get_all_materi()
 	{
 		$this->db->select('m.id as materiID,judulMateri,isiMateri,publish,m.date_created as tgl,bab.judul_bab,UUID, ma.nama_mapel');
 		$this->db->from('tb_line_materi m');
 		$this->db->join('tb_bab bab ','m.id_bab=bab.id_bab');
 		$this->db->join('tb_mata_pelajaran ma ',' ma.id_mapel=bab.id_mapel');
 		$this->db->where('m.status','1');
 		$query = $this->db->get();
        return $query->result_array();
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
        function getmapel(){
    $this->db->order_by('nama_mapel','ASC');
    $this->db->where('status = 1');
    $provinces= $this->db->get('tb_mata_pelajaran');
    

    return $provinces->result_array();
    }

 	// get materi berdasarkan UUID
    public function get_single_materi($UUID)
    {
        $this->db->select('id,UUID,judulMateri,isiMateri,publish');
        $this->db->from('tb_line_materi');
        $this->db->where('UUID',$UUID);
        $query= $this->db->get();
        return $query->result_array()[0];
    }

    // get materi berdasarkan UUID
    public function get_single_materi_byid($id)
    {
        $this->db->select('id,judulMateri,isiMateri,publish,subBabID');
        $this->db->from('tb_line_materi');
        $this->db->where('id',$id);
        $query= $this->db->get();
        return $query->result();
    }


 	public function ch_materi($data)
 	{
 		$this->db->set($data['datMateri']);
 		$this->db->where('UUID',$data['UUID']);
 		$this->db->update('tb_line_materi');


 	}
    //menghapus materi
 	public function drop_materi($UUID)
 	{
 		   $this->db->where('UUID', $UUID);
        $this->db->set('status', '0');
        $this->db->update('tb_line_materi');
 	}

 	// get info tingkat materi
    public function get_tingkat_info($BabID)
    {
        $this->db->select('m.id_mapel as id_mp, m.nama_mapel as np, bab.id_bab , bab.judul_bab');
         $this->db->from('tb_bab bab');
         $this->db->join('tb_mata_pelajaran m',' m.id_mapel=bab.id_mapel ');
        $query = $this->db->get();
        return $query->result_array()[0];
    }
 } ?>