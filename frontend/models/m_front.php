<?php 

/**
* 
*/
class m_front extends CI_Model
{

	// get bab
	function getbab($provId){

		$kabupaten="<option value='0'>--pilih--</pilih>";

		$this->db->order_by('judul_bab','ASC');
		$kab= $this->db->get_where('tb_bab',array('id_mapel'=>$provId));

		foreach ($kab->result_array() as $data ){
		// $kabupaten.= "<option value='$data[id_bab]'>$data[judul_bab]</option>";
		$kabupaten.= "<option value='$data[id_bab]'>$data[judul_bab]</option>";

		}

		return $kabupaten;

		}

		public function getpaketbytingkatmapel($tingpelID) {
        $this->db->select('tingpel.tingkatID as tingkatID,judulSubBab as JudulSub,tingpel.id AS tingpelID,paket.nm_paket, paket.id_paket AS paketID, jumlah_soal');
        $this->db->from('tb_mata-pelajaran mapel');
        $this->db->join('tb_tingkat-pelajaran tingpel', 'mapel.id = tingpel.mataPelajaranID');
        $this->db->join('tb_bab bab', 'bab.tingkatPelajaranID=tingpel.id');
        $this->db->join('tb_subbab subab', 'subab.babID = bab.id');
        $this->db->join('tb_paket paket', 'paket.id_subbab = subab.id');

        $this->db->where('tingpel.id', $tingpelID);
        $query = $this->db->get();
        return $query->result();
    }

		// get mapel 
	

}

 ?>