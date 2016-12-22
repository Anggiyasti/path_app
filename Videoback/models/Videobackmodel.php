<?php 

/**
* 
*/
class Videobackmodel extends CI_Model
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

		// get mapel 
	function provinsi(){
	$this->db->order_by('nama_mapel','ASC');
	$provinces= $this->db->get('tb_mata_pelajaran');

	return $provinces->result_array();

	}

	// insert ke db
	public function insertVideo($data_video)
	{		
		$this->db->insert('tb_video', $data_video);
		redirect(site_url('videoback/daftarvideo'));
	}

	 // get tampil video
    public function tampilvideo() {
    	$this->db->select('b.id_bab, b.judul_bab, v.id_video, v.judul_video, v.deskripsi, v.nama_file, v.link');
		$this->db->from('tb_bab b');
		$this->db->join('tb_video v', 'v.id_bab = b.id_bab');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    // get data video untuk dipake update video
    public function get_video($id)
	{	
		$this->db->select('*');
		$this->db->from('tb_video');
		$this->db->where('id_video',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	// query update video link
	public function up_video($data)
	{	
		// var_dump($data);
		$this->db->set($data['video']);
		$this->db->where('id_video',$data['id_video']);
		$this->db->update('tb_video');
		redirect(site_url('videoback/daftarvideo'));
	}

	//query hapus video
	public function del_video($videoID)
	{
		$this->db->where('id_video',$videoID);
		$this->db->delete('tb_video');
	}

	//get nama file untuk menghapus file video di Videoback->function del_file_video
  function get_nameFile($videoID){
   $this->db->select('nama_file');
   $this->db->from('tb_video');
   $this->db->where('id_video',$videoID);
   $query = $this->db->get();
   return $query->result();
 }

}

 ?>